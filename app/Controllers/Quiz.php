<?php

namespace App\Controllers;

class Quiz extends BaseController
{
    public function quizViewer($level): string
    {
        $quizDetail = [
            'title' => 'quiz level ' . $level,
            'level' => $level,
        ];
        return view('user/quiz', $quizDetail);
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
}
