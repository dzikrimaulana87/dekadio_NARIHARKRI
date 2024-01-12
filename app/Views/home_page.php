<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>

    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: max-content;
        display: flex;
        gap: 5px;
    }

    a {
        width: 100%;
        justify-self: center;
        text-decoration: none;
    }

    .wrap-quiz {
        border: solid black 1px;
        border-radius: 20px;
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    button {
        height: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <a href="<?= base_url('/modul-page') ?>">
            <div class="wrap-quiz">
                <p>Modul Pembelajaran</p>
            </div>
        </a>
        <a href="<?= base_url('/level-page'); ?>">
            <div class="wrap-quiz">
                <p>Quiz</p>
            </div>
        </a>
        <a href="<?= base_url('/vid-page'); ?>">
            <div class="wrap-quiz">
                <p>Video Pembelajaran</p>
            </div>
        </a>
    </div>
</body>

</html>