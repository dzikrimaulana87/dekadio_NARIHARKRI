<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Quiz extends BaseController
{
    public function quizViewer($level): string
{
    $questions = $this->readData();

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
}


    public function submitAnswer()
    {
        // Pastikan ini adalah permintaan POST
        if ($this->request->getMethod() === 'post') {
            $score = $this->request->getPost('score');
            $wrongQuestionIndex = $this->request->getPost('wrongQuestionIndex');

            dd($score, $wrongQuestionIndex);
        } else {
            // Jika bukan permintaan POST, kembalikan respons kesalahan
            $response = ['status' => 'error', 'message' => 'Metode permintaan tidak valid'];
            return $this->response->setJSON($response);
        }

    }

    public function readData()
    {
        // Konfigurasi Firebase
        $firebaseUrl = 'https://dekadio-default-rtdb.asia-southeast1.firebasedatabase.app/'; // Replace this with your actual database URL
        $factory = (new Factory)
            ->withServiceAccount(__DIR__ . '\dekadio-firebase-adminsdk-env38-e696477d86.json')
            ->withDatabaseUri($firebaseUrl);

        $database = $factory->createDatabase();

        // Mendapatkan referensi ke data di Firebase Realtime Database
        $reference = $database->getReference('levels');

        // Mendapatkan nilai dari referensi
        $data = $reference->getValue();

        // Tampilkan hasil
        return $data;
    }



}
