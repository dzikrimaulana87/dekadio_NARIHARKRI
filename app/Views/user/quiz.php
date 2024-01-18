<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>

    <!-- Connect to bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            border-radius: 20px;
            width: 500px;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding-bottom: 5px;
        }

        .question {
            display: none;
            transition: opacity 0.5s ease-in-out;
        }

        .question.show {
            display: block;
            opacity: 1;
        }

        .question.hide {
            opacity: 0;
        }

        .option-image {
            width: 100px;
            height: auto;
            display: block;
            margin-bottom: 10px;
            cursor: pointer;
            border: 1px solid #666;
        }

        .option-image.selected {
            border: 2px solid #530FAA;
        }

        .feedback {
            display: none;
            margin-top: 10px;
        }

        .correct {
            color: green;
        }

        .incorrect {
            color: red;
        }

        .next-link {
            display: none;
            margin-top: 10px;
        }

        .question p,
        .option-image {
            display: inline-block;
            margin-right: 10px;
            transition: none;
        }
    </style>
</head>

<body>
    <div class="container">

        <h2 class="mb-5" style="color: #530FAA;">Level
            <?= $level ?>
        </h2>

        <?php
        $score = 0;

        echo '<h2Dekadio Quiz</h2>';
        echo '<form method="post" id="quizForm" action="' . base_url('quiz/submit-answer') . '">';
        echo '<div id="questionContainer">';

        for ($i = 0; $i < count($questions); $i++) {
            echo '<div class="question" id="question_' . $i . '">';
            echo '<p>' . $questions[$i]['question'] . '</p><br>';

            // Memeriksa tipe pertanyaan (teks atau gambar)
            for ($j = 0; $j < count($questions[$i]['options']); $j++) {
                if (!preg_match('/^https/', $questions[$i]['options'][$j])) {
                    // Jika opsi jawaban adalah teks
                    echo '<p onclick="answerSelected(' . $i . ',' . $j . ')" id="option_' . $i . '_' . $j . '">' . $questions[$i]['options'][$j] . '</p>';
                } else {
                    // Jika opsi jawaban adalah gambar
                    echo '<img src="' . $questions[$i]['options'][$j] . '" alt="Option ' . ($j + 1) . '" class="option-image" onclick="answerSelected(' . $i . ',' . $j . ')" id="option_' . $i . '_' . $j . '">';
                }
            }


            echo '</div>';
            echo '<div class="feedback text-center" id="feedback_' . $i . '"></div>';
        }

        echo '<div class="next-link justify-content-center align-items-center" id="nextLink"><button class="btn btn-primary" type="button" onclick="nextQuestion()">Next</button></div>';
        echo '</div>';
        echo '</form>';
        ?>

        <form method="post" action="<?= base_url('quiz/submit-answer') ?>" onsubmit="return submitForm()">
            <input type="hidden" name="score" id="scoreInput" value="0">
            <input type="hidden" name="level" value="<?= ($level); ?>">
            <input type="hidden" name="questionCount" value="<?= count($questions); ?>">
            <input type="hidden" name="wrongQuestionIndex" id="wrongQuestionIndexInput" value="[]">
            <div class="next-link" id="finishLink" style="display:none;">
                <button type="submit">Selesai</button>
            </div>
        </form>

        <div id="loading" style="display: none;">
            Loading...
        </div>
    </div>

    <!-- Connect to js bootstrap   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/pjs/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <script>
        let currentQuestion = 0;
        let selectedOptions = {};
        let score = 0;
        let wrongQuestionIndices = [];

        document.addEventListener('DOMContentLoaded', function () {
            showLoading();
            document.getElementById('question_0').classList.add('show');
            hideLoading();
        });

        function showLoading() {
            document.getElementById('loading').style.display = 'block';
        }

        function hideLoading() {
            document.getElementById('loading').style.display = 'none';
        }

        function answerSelected(questionIndex, optionIndex) {
            if (!selectedOptions.hasOwnProperty(questionIndex)) {
                saveSelectedOption(questionIndex, optionIndex);
                displayFeedback(questionIndex);
                document.getElementById('option_' + questionIndex + '_' + optionIndex).classList.add('selected');
                if (questionIndex === <?= count($questions) - 1 ?>) {
                    document.getElementById('nextLink').style.display = 'none';
                    document.getElementById('finishLink').style.display = 'block';
                    showScore();
                } else {
                    document.getElementById('nextLink').style.display = 'flex';
                }
            }
        }


        function saveSelectedOption(questionIndex, optionIndex) {
            selectedOptions[questionIndex] = optionIndex;
            const correctIndex = <?= json_encode(array_column($questions, 'correct_index')) ?>;
            const correctAnswer = correctIndex[questionIndex];
            if (optionIndex !== correctAnswer) {
                wrongQuestionIndices.push(questionIndex);
            }
        }

        function displayFeedback(questionIndex) {
            const correctIndex = <?= json_encode(array_column($questions, 'correct_index')) ?>;
            const userAnswer = selectedOptions[questionIndex];
            const correctAnswer = correctIndex[questionIndex];
            const feedbackElement = document.getElementById('feedback_' + questionIndex);
            feedbackElement.style.display = 'block';
            if (userAnswer === correctAnswer) {
                feedbackElement.innerHTML = '<h4 class="correct">Jawaban Anda benar!</h4>';
                score++;
            } else {
                feedbackElement.innerHTML = '<h4 class="incorrect">Jawaban Anda salah. Jawaban yang benar adalah opsi ' + (
                    correctAnswer + 1) + '</h4>';
            }
        }

        function nextQuestion() {
            document.getElementById('question_' + currentQuestion).classList.remove('show');
            document.getElementById('question_' + currentQuestion).classList.add('hide');
            currentQuestion++;
            if (currentQuestion < <?= count($questions) ?>) {
                document.getElementById('question_' + currentQuestion).classList.remove('hide');
                document.getElementById('question_' + currentQuestion).classList.add('show');
                hideFeedback();
                document.getElementById('nextLink').style.display = 'none';
                document.getElementById('finishLink').style.display = 'none';
            } else {
                showScore();
            }
        }

        function hideFeedback() {
            const feedback = document.getElementById('feedback_' + currentQuestion);
            feedback.style.display = 'none';
        }

        function showScore() {
            document.getElementById('score').innerText = score;
            if (wrongQuestionIndices.length > 0) {
                const wrongQuestionMessage = 'Indeks Soal yang Salah: ' + wrongQuestionIndices.join(', ');
                document.getElementById('wrongQuestionMessage').innerText = wrongQuestionMessage;
            }
            document.getElementById('scoreInput').value = score;
            document.getElementById('wrongQuestionIndexInput').value = JSON.stringify(wrongQuestionIndices);
            document.getElementById('scoreContainer').style.display = 'block';
            document.getElementById('finishLink').style.display = 'block';
        }

        async function submitForm() {
            document.getElementById('scoreInput').value = score;
            document.getElementById('wrongQuestionIndexInput').value = JSON.stringify(wrongQuestionIndices);
            return true;
        }
    </script>

</body>

</html>