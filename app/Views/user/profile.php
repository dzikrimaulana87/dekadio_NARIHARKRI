<!-- Views/profile.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Connect to font awesome -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        body {
            height: 100vh;
            display: flex;
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

        .sidebar-text {
            color: #666;
        }

        .sidebar-text:hover {
            color: #530FAA;
        }

        .wrap-text {
            border: solid #666 1px;
            border-radius: 15px;
        }

        .wrap-text:hover {
            border: solid #530FAA 2px;
        }

        .wrap-icon {
            background-color: rgba(83, 15, 170, 0.2);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            color: #530FAA;
        }

        .wrap-icon:hover {
            background-color: rgba(83, 15, 170, 0.4);
            border: solid #530FAA 2px;
        }

        main .misi {
            font-size: 0.6em;
        }

        .wrap-fav:hover {
            border: solid #530FAA 2px;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="sidebar container-fluid d-flex flex-column align-items-center border-end border-secondary w-25 pt-3">
        <h1 style="color: #530FAA;">dekadio.</h1>
        <div class="w-100">
            <a href="<?= base_url('/'); ?>" class="sidebar-text">
                <div class="d-flex align-items-center wrap-text text-center mt-5 mb-3">
                    <span class="material-symbols-outlined w-25" style="color: tomato;">
                        sports_esports
                    </span>
                    <div class="w-75 text-start">
                        <h4>practice</h3>
                    </div>
                </div>
            </a>
            <a href="<?= base_url('/leaderboard') ?>" class="sidebar-text">
                <div class="d-flex align-items-center wrap-text text-center mb-3">
                    <span class="material-symbols-outlined w-25" style="color: yellow;">
                        leaderboard
                    </span>
                    <div class="w-75 text-start">
                        <h4>Leaderboard</h4>
                    </div>
                </div>
            </a>
            <a href="<?= base_url('/modul-page') ?>" class="sidebar-text">
                <div class="d-flex align-items-center wrap-text text-center mb-3">
                    <span class="material-symbols-outlined w-25" style="color: violet;">
                        sticky_note_2
                    </span>
                    <div class="w-75 text-start">
                        <h4>Course</h4>
                    </div>
                </div>
            </a>
            <a href="<?= base_url('/profile'); ?>" class="sidebar-text">
                <div class="d-flex align-items-center wrap-text text-center mb-3">
                    <span class="material-symbols-outlined w-25" style="color: violet;">
                        face_3
                    </span>
                    <div class=" w-75 text-start">
                        <h4>Profile</h4>
                    </div>
                </div>
            </a>
            <a href="<?= base_url('/logout'); ?>" class="sidebar-text">
                <div class="d-flex align-items-center wrap-text text-center mb-3">
                    <span class="material-symbols-outlined w-25" style="color: red;">
                        logout
                    </span>
                    <div class=" w-75 text-start">
                        <h4>Logout</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <nav
            class="navbar d-flex justify-content-center align-items-center navbar-expand-lg border-bottom border-secondary">
            <div class="w-75 h-100 me-5 text-center">
                <h4 style="color: #530FAA;">Profile</h4>
            </div>
            <div class="d-flex justify-content-center align-items-center text-center w-5 ms-5">
                <a href="">
                    <div class="wrap-icon me-3">
                        <span class="material-symbols-outlined">
                            folder
                        </span>
                    </div>
                </a>
                <a href="">
                    <div class="wrap-icon">
                        <span class="material-symbols-outlined">
                            settings
                        </span>
                    </div>
                </a>
            </div>
        </nav>

        <main class="d-flex justify-content-center align-items-center mt-3">
            <div class="container-fluid">
                <?php if (isset($userData)): ?>
                    <div class="card">
                        <div class="container-fluid d-flex p-3" style="background-color: #530FAA; border-radius: 50px;">
                            <div class="w-25 d-flex justify-content-center align-items-center"
                                style="width: 215px; height: 215px; border-radius: 999px; background-color: tomato;">
                                <img src="" alt="img" class="">
                            </div>
                            <div class="w-75">
                                <div class="container-fluid h-50 d-flex justify-content-start align-items-center">
                                    <h3 class="card-tite text-white ms-2">
                                        <?= $userData['profile']['full_name']; ?>
                                    </h3>
                                </div>
                                <div class="container-fluid h-50 d-flex justify-content-start align-items-center">
                                    <h5 class="card-text text-white ms-2">Level
                                        <?= $userData['profile']['level']; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="mt-3">
                                <h2>Profile</h2>
                                <a href="" class="text-decoration-none" style="color: black;">
                                    <div class="wrap-fav d-flex align-items-center m-4">
                                        <span class="material-symbols-outlined">
                                            bookmark
                                        </span>
                                        <div class="ms-3 pt-1 w-75">
                                            <h5>Favorite</h5>
                                        </div>
                                        <span class="material-symbols-outlined w-25 d-flex justify-content-end">
                                            arrow_forward_ios
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="mt-3">
                                <h2>Account</h2>
                                <div class="d-flex align-items-center m-4">
                                    <span class="material-symbols-outlined">
                                        mail
                                    </span>
                                    <div class="ms-3 pt-1 w-75">
                                        <h5>
                                            <?= $userData['email']; ?>
                                        </h5>
                                    </div>
                                    <a href="" class="w-25 d-flex justify-content-end" style="color: black;">
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center m-4">
                                    <span class="material-symbols-outlined">
                                        lock
                                    </span>
                                    <div class="ms-3 pt-1 w-75">
                                        <h5>
                                            Password
                                        </h5>
                                    </div>
                                    <a href="" class="w-25 d-flex justify-content-end" style="color: black;">
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Data pengguna tidak ditemukan.</p>
                <?php endif; ?>

                <br>
            </div>
        </main>
    </div>

    <!-- Connect to js bootstrap   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/pjs/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>