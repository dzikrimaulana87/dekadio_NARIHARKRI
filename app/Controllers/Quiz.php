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

        $questions = $this->readData($level - 1);
        // dd($questions);

        if ($this->userLevel >= $level) {

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
                $this->session->set('user_level', ($this->session->get('user_level')) + 1);
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


    public function readData($level)
    {
        // Konfigurasi Firebase
        $firebaseUrl = 'https://dekadio-default-rtdb.asia-southeast1.firebasedatabase.app/';
        $factory = (new Factory)
            ->withServiceAccount(__DIR__ . '\dekadio-firebase-adminsdk-env38-e696477d86.json')
            ->withDatabaseUri($firebaseUrl);

        $database = $factory->createDatabase();

        // Mendapatkan referensi ke data di Firebase Realtime Database
        $reference = $database->getReference('levels/' . $level);
        $data = $reference->getValue();
        return $data;
    }

    public function assignmentPage()
    {
        return view('user/assignment');
    }
}
