<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Pembelajaran</title>

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
            gap: 10px;
        }

        .wrap-modul {
            border: solid black 1px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 70%;
            gap: 10px;
        }

        .wrap-img {
            border: solid black 1px;
            width: 40px;
            height: 40px;
        }

        button {
            border-radius: 20px;
            background-color: violet;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Pilih Modul</h3>
        <div class="wrap-modul">
            <div class="wrap-img">
                <img src="" alt="image">
            </div>
            <h4>Mengenal Bahasa Isyarat</h4>
            <button>Read</button>
        </div>
        <div class="wrap-modul">
            <div class="wrap-img">
                <img src="" alt="image">
            </div>
            <h4>Apa itu Bahasa Isyarat</h4>
            <button>Read</button>
        </div>
        <div class="wrap-modul">
            <div class="wrap-img">
                <img src="" alt="image">
            </div>
            <h4>Bahasa Isyarat dalam Profesi</h4>
            <button>Read</button>
        </div>
        <div class="wrap-modul">
            <div class="wrap-img">
                <img src="" alt="image">
            </div>
            <h4>Perbedaan Bisi dan Bisindo</h4>
            <button>Read</button>
        </div>
        <div class="wrap-modul">
            <div class="wrap-img">
                <img src="" alt="image">
            </div>
            <h4>Etika komunikasi</h4>
            <button>Read</button>
        </div>
        <a href="<?= base_url('/') ?>">Kembali ke halaman pertama</a>
    </div>
</body>

</html>