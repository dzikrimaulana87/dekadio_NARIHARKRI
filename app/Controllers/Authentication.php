<?php

namespace App\Controllers;

use Kreait\Firebase\Factory;

class Authentication extends BaseController
{
    protected $auth;
    protected $database;
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

    public function registerPage()
    {
        return view('user/authentication/register');
    }

    public function register()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
            ];

            if (!$this->validate($rules)) {
                return view('user/authentication/register', ['validation' => $validation]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $nama = $this->request->getPost('name');

                try {
                    // Buat akun di Firebase Authentication
                    $user = $this->auth->createUserWithEmailAndPassword($email, $password);

                    $this->addUserDataToDatabase($user->uid, $nama);

                    return redirect()->to('login')->with('success', 'Registration successful. Please login.');
                } catch (\Exception $e) {
                    return view('user/authentication/register', ['validation' => $validation, 'error' => $e->getMessage()]);
                }
            }
        }

        return view('user/authentication/register');
    }

    protected function addUserDataToDatabase($userId, $nama)
    {
        echo "succes memanggil adduser";
        $userData = [
            'full_name' => $nama,
            'level' => '1'
        ];

        try {
            $this->database->getReference('users/' . $userId)->set([]);
            $this->database->getReference('users/' . $userId . '/profile')->update($userData);
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function loginPage()
    {
        return view('user/authentication/login');
    }
    public function login()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                return view('/login', ['validation' => $validation]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                try {
                    $user = $this->auth->signInWithEmailAndPassword($email, $password);

                    $idToken = $user->idToken();
                    $email = $user->data()['email'];

                    // Ambil UID pengguna
                    $userId = $user->data()['localId'];
                    $reference = $this->database->getReference('users/' . $userId);
                    $snapshot = $reference->getSnapshot();

                    if ($snapshot->exists()) {
                        $userDataFromDatabase = $snapshot->getValue();
                        $userDataFromDatabase['email'] = $email;
                        $userDataFromDatabase['localId'] = $userId;


                        $this->session->set('user_level', $userDataFromDatabase['profile']['level']);
                        $this->session->set('user_data', $userDataFromDatabase);
                    }


                    // Set sesi untuk ID token
                    $this->session->set('user_token', $idToken);

                    return redirect()->to('/');
                } catch (\Exception $e) {
                    return view('user/authentication/login', ['validation' => $validation, 'error' => 'Invalid Login Credential']);
                }
            }
        }

        return view('user/authentication/login');
    }


    public function resetPassword()
    {
        return view('user/authentication/reset-password');
    }

    public function sendResetLink()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
            ];

            if (!$this->validate($rules)) {
                return view('reset_password', ['validation' => $validation]);
            } else {
                $email = $this->request->getPost('email');

                try {
                    // Kirim tautan reset password ke email
                    $this->auth->sendPasswordResetLink($email);

                    return redirect()->to('login')->with('success', 'Reset link sent to your email.');
                } catch (\Exception $e) {
                    return view('reset_password', ['validation' => $validation, 'error' => $e->getMessage()]);
                }
            }
        }

        return view('reset_password');
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to('/login');
    }


}
