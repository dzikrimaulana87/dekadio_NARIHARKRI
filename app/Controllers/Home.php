<?php

namespace App\Controllers;

use Kreait\Firebase\Factory;


class Home extends BaseController
{
    protected $database;
    protected $auth;
    protected $session;

    public function __construct()
    {
        $this->session = session();

        $firebaseUrl = 'https://dekadio-default-rtdb.asia-southeast1.firebasedatabase.app/';
        $serviceAccount = __DIR__ . DIRECTORY_SEPARATOR . 'dekadio-firebase-adminsdk-env38-e696477d86.json';
        $factory = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri($firebaseUrl);

        try {
            $this->auth = $factory->createAuth();
        } catch (\Exception $e) {
            die('Firebase Authentication initialization error: ' . $e->getMessage());
        }

        $this->database = $factory->createDatabase();
    }

    public function index(): string
    {
        return view('home_page');
    }

    // ...

    public function profilePage()
    {
        // Periksa apakah token akses ada di sesi PHP
        $idToken = $this->session->get('user_token');

        if (!$idToken) {
            // Pengguna tidak login, redirect ke halaman login
            return redirect()->to('/login');
        }
        $userData = $this->session->get('user_data');
        $userData['profile']['level'] = $this->session->get('user_level');

        return view('user/profile', ['userData' => $userData]);
    }


    public function levelPage(): string
    {

        return view('user/level_page');
    }

    public function modulPage(): string
    {
        return view('user/modul_page');
    }
    public function vidPage(): string
    {
        return view('user/video_page');
    }

    public function leaderboardPage()
    {
        $users = $this->getUsersFromDatabase();

        // Urutkan data pengguna berdasarkan level dan waktu pendaftaran
        usort($users, function ($a, $b) {
            return $b['level'] - $a['level'];
        });

        // Tampilkan tampilan leaderboard dengan data pengguna yang telah diurutkan
        return view('user/leaderboard', ['users' => $users,]);

    }

    protected function getUsersFromDatabase()
    {

        $reference = $this->database->getReference('users');
        $snapshot = $reference->getSnapshot();

        $users = [];

        foreach ($snapshot->getValue() as $userId => $userData) {

            if (!empty($userData['profile'])) {

                $users[] = [
                    'user_id' => $userId,
                    'full_name' => $userData['profile']['full_name'],
                    'level' => $userData['profile']['level'],
                ];
            }
        }

        return $users;
    }




}