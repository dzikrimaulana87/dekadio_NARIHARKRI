<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        display: flex;
        border: solid black 1px;
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
    }

    .option-image.selected {
        border: 2px solid blue;
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
    </style>
</head>

<body>
    <div class="container">

        <h2>Ini adalah level
            <?= $level ?>
        </h2>

        <?php
        $score = 0;

        echo '<h2Dekadio Quiz</h2>';
        echo '<form method="post" id="quizForm" action="' . base_url('quiz/submit-answer') . '">';
        echo '<div id="questionContainer">';

        for ($i = 0; $i < count($questions); $i++) {
            echo '<div class="question" id="question_' . $i . '">';
            echo '<p><strong>Soal ' . ($i + 1) . ':</strong> ' . $questions[$i]['question'] . '</p>';

            // Memeriksa tipe pertanyaan (teks atau gambar)
            if (is_numeric($questions[$i]['options'][0])) {
                // Jika opsi jawaban adalah teks
                for ($j = 0; $j < count($questions[$i]['options']); $j++) {
                    echo '<p onclick="answerSelected(' . $i . ',' . $j . ')" id="option_' . $i . '_' . $j . '">' . $questions[$i]['options'][$j] . '</p>';
                }
            } else {
                // Jika opsi jawaban adalah gambar
                for ($j = 0; $j < count($questions[$i]['options']); $j++) {
                    echo '<img src="' . $questions[$i]['options'][$j] . '" alt="Option ' . ($j + 1) . '" class="option-image" onclick="answerSelected(' . $i . ',' . $j . ')" id="option_' . $i . '_' . $j . '">';
                }
            }

            echo '<div class="feedback" id="feedback_' . $i . '"></div>';
            echo '</div>';
        }

        echo '<div class="next-link" id="nextLink"><button type="button" onclick="nextQuestion()">Next</button></div>';
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

    </div>


    <script>
    let currentQuestion = 0;
    let selectedOptions = {};
    let score = 0;
    let wrongQuestionIndices = [];

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('question_0').classList.add('show');
    });

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
                document.getElementById('nextLink').style.display = 'block';
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
            feedbackElement.innerHTML = '<p class="correct">Jawaban Anda benar!</p>';
            score++;
        } else {
            feedbackElement.innerHTML = '<p class="incorrect">Jawaban Anda salah. Jawaban yang benar adalah opsi ' + (
                correctAnswer + 1) + '</p>';
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