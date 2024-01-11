<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Quiz extends BaseController
{

    
    public function __construct()
    {
        $this->session = session();

    }


    //Sementara selagi autentifikasi belum dibuat
    protected $userLevel = 1;
    protected $session;

    public function quizViewer($level): string
    {
        session();
        $this->userLevel = $this->session->get('user_level') ?? 1;

        $questions = $this->readData();

        if ($this->userLevel >= $level) {

            if (isset($questions[$level - 1])) {
                $levelQuestions = $questions[$level - 1]['questions'];
                $quizDetail = [
                    'title' => 'quiz level ' . $level,
                    'level' => $level,
                    'questions' => $levelQuestions,
                ];

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
            $totalQuestion = $this->request->getPost('questionCount');
            $wrongQuestionIndex = $this->request->getPost('wrongQuestionIndex');
            $score = $rightAnswer / $totalQuestion;
            var_dump($totalQuestion);
            if ($score >= 0.8) {
                $this->session->set('user_level', $this->userLevel + 1);
            }

            $assignmentData = [
                'score' => $score * 100 . '%',
                'wrongQuestionIndex' => $wrongQuestionIndex
            ];

            dd($assignmentData);

        } else {
            $response = ['status' => 'error', 'message' => 'Invalid Request'];
            return $this->response->setJSON($response);
        }
    }

    public function readData()
    {
        // Konfigurasi Firebase
        $firebaseUrl = 'https://dekadio-default-rtdb.asia-southeast1.firebasedatabase.app/';
        $factory = (new Factory)
            ->withServiceAccount(__DIR__ . '\dekadio-firebase-adminsdk-env38-e696477d86.json')
            ->withDatabaseUri($firebaseUrl);

        $database = $factory->createDatabase();

        // Mendapatkan referensi ke data di Firebase Realtime Database
        $reference = $database->getReference('levels');
        $data = $reference->getValue();
        return $data;
    }
}
