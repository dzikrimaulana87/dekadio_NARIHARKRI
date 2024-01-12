<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
            width: 200px;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding-bottom: 5px;
        }

        a {
            text-decoration: none;
        }

        .wrap-level {
            border: solid black 1px;
            border-radius: 20px;
            height: 30px;
            width: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 3px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $session = session();

        $userLevel = $session->get('user_level');
        ?>
        <h3>Level Anda:
            <?= $userLevel ?? 1 ?>
        </h3>

        <h2>Pilih Level</h2>
        <div class="wrap">
            <?php
            $userLevel = 1;
            $totalLevel = 12;
            for ($i = 1; $i < $totalLevel; $i++):
                ?>
                <a href="<?= base_url('/quiz/level/' . $i); ?>">
                    <div class="wrap-level">
                        <p>level
                            <?= $i; ?>
                        </p>
                    </div>
                </a>
            <?php endfor; ?>
        </div>
        <a href="<?= base_url('/') ?>">Kembali ke halaman pertama</a>
    </div>
</body>

</html>