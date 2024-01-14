<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Kreait\Firebase\Factory;

class Quiz extends BaseController
{



    //Sementara selagi autentifikasi belum dibuat
    protected $userLevel = 1;
    protected $session;
    protected $auth;
    protected $database;


    public function __construct()
    {
        $this->session = session();
        if ($this->session->get('user_level') == null) {
            $userLevel = 1;
            $this->session->set('user_level', $userLevel);
        }

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

    public function quizViewer($level): string
    {

        $questions = $this->readData($level - 1);
        // dd($questions);

        if ($this->session->get('user_level') >= $level) {

            if (isset($questions)) {
                $levelQuestions = $questions['questions'];
                $quizDetail = [
                    'title' => 'quiz level ' . $level,
                    'level' => $level,
                    'questions' => $levelQuestions,
                ];
                // return 'tes array';
                return view('user/quiz', $quizDetail);
            } else {
                return 'Level not found.';
            }
        } else {
            return "You can't open the quiz, the user level is low";
        }
    }

    public function submitAnswer()
    {

        if ($this->request->getMethod() === 'post') {
            $rightAnswer = $this->request->getPost('score');
            $currentLevel = $this->request->getPost('level');
            $totalQuestion = $this->request->getPost('questionCount');
            $wrongQuestionIndexj = $this->request->getPost('wrongQuestionIndex');
            $wrongQuestionIndex = json_decode($wrongQuestionIndexj, true);
            $score = $rightAnswer / $totalQuestion;

            if ($score >= 0.8 && $currentLevel >= $this->session->get('user_level')) {
                
                $updatedLevel = $this->session->get('user_level') + 1;
                $this->updateLevelInFirebase($updatedLevel);
                $this->session->set('user_level', $updatedLevel);

                

            }

            $assignmentData = [
                'score' => $score * 100,
                'wrongQuestionIndex' => $wrongQuestionIndex,
                'userLevel' => $this->session->get('user_level')
            ];
            return view('/user/assignment', $assignmentData);
        } else {
            $response = ['status' => 'error', 'message' => 'Invalid Request'];
            return $this->response->setJSON($response);
        }
    }

    public function updateLevelInFirebase($newLevel)
    {
        $userId = $this->session->get('user_data')['localId'];

        // Ubahlah path sesuai dengan struktur database Anda
        $reference = $this->database->getReference('users/' . $userId . '/profile');

        // Update level pengguna di Firebase Realtime Database
        $reference->update([
            'level' => $newLevel,
        ]);
    }



    public function readData($level)
    {
        $reference = $this->database->getReference('levels/' . $level);
        $data = $reference->getValue();
        return $data;
    }

    public function assignmentPage()
    {
        return view('user/assignment');
    }
}
