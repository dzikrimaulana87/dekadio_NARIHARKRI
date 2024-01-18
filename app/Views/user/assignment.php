<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian</title>

    <!-- Connect to bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        text-align: center;
        padding: 20px;
    }

    .result-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    h1 {
        color: #333;
    }

    .score {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .message {
        font-size: 24px;
        color: #222;
    }

    .level {
        font-size: 16px;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="result-container">
        <h1 style="color: #530faa;"> Level
            <?= $userLevel - 1; ?>
        </h1>
        <div>
            <?php if ($score >= 80): ?>
            <img src="/img/trophy.png" alt="" style="height: 200px;">
            <?php else: ?>
            <img src="/img/sad.png" alt="" style="height: 200px;">
            <?php endif; ?>
        </div>

        <div class="message">
            <?php if ($score >= 80): ?>
            <h3>Selamat!</h3>
            <?php else: ?>
            <h3>Coba Lagi!</h3>
            <?php endif; ?>
        </div>

        <div class="score">
            <?php if ($score >= 80): ?>
            <p>Kamu telah sukses menyelesaikan level ini dengan score
                <?= $score . '%' ?>
            </p>
            <?php else: ?>
            <p>Kamu belum sukses menyelesaikan level ini dengan minimun score 80%. Silakan coba lagi.
            </p>
            <?php endif; ?>
        </div>

        <div class="message">
            <?php
            if (empty($wrongQuestionIndex)) {
                echo "<p>Tidak ada soal yang salah.</p>";
            } else {
                echo "<p>Nomor Soal yang Salah: ";
                foreach ($wrongQuestionIndex as $index) {
                    echo ($index + 1) . ', ';
                }
                echo "</p>";
            }
            ?>

        </div>

        <div class="d-flex justify-content-between text-center">
            <a href="<?= base_url('/'); ?>" class="text-decoration-none text-black w-50 d-flex justify-content-center">
                <div class="w-50 rounded bg-white" style="border: solid #530faa 2px">Home</div>
            </a>
            <a href="<?= base_url('/'); ?>" class="text-decoration-none text-white w-50 d-flex justify-content-center">
                <div class="w-50 rounded" style="background-color: #530faa">Next</div>
            </a>
        </div>
    </div>

    <!-- Connect to js bootstrap   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/pjs/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>