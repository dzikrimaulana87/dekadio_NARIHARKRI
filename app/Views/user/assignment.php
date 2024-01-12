<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian</title>
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
            font-size: 24px;
            margin-bottom: 20px;
        }

        .message {
            font-size: 18px;
            color: #555;
        }

        .level {
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="result-container">
        <h1>Hasil Penilaian</h1>

        <div class="score">
            <p>Skor Anda:
                <?= $score . '%' ?>
            </p>
        </div>

        <div class="message">
            <?php if ($score >= 80): ?>
                <p>Selamat! Anda berhasil melewati level ini.</p>
            <?php else: ?>
                <p>Mohon maaf, Anda belum mencapai skor yang cukup untuk melanjutkan ke level selanjutnya.</p>
            <?php endif; ?>
        </div>

        <div class="message">
            <?php
            if (empty($wrongQuestionIndex)) {
                echo "<p>Tidak ada soal yang salah.</p>";
            } else {
                echo "<p>Masih ada beberapa jawaban yang salah. Perbaiki ini di kesempatan selanjutnya!</p>";
                echo "<p>Nomor Soal yang Salah: ";
                foreach ($wrongQuestionIndex as $index) {
                    echo ($index + 1) . ', ';
                }
                echo "</p>";
            }
            ?>

        </div>

        <div class="level">
            <p>Level Anda:
                <?= $userLevel; ?>
            </p>
        </div>
        <a href="<?= base_url('/level-page'); ?>">Kembali ke halaman level</a>
    </div>
</body>

</html>