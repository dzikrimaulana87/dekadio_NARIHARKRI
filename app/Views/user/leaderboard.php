<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            display: flex;
            margin: 0;
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
    </style>
</head>

<body>
    <div class="sidebar container-fluid d-flex flex-column align-items-center border-end border-secondary w-25 pt-3">
        <h3 class="m-3" style="color: #530FAA; font-family: 'Press Start 2P', system-ui;">dekadio.</h3>
        <div class="w-100">
            <a href="<?= base_url('/'); ?>" class="sidebar-text">
                <div class="d-flex align-items-center wrap-text text-center mt-5 mb-3">
                    <span class="material-symbols-outlined w-25" style="color: tomato;">
                        sports_esports
                    </span>
                    <div class="w-75 text-start">
                        <h4>practice</h4>
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
                <h4 style="color: #530FAA;">Leaderboard</h4>
                <div>
                    <a href="<?= base_url('/leaderboard') ?>" class="me-5"
                        style="color: #530FAA; border-bottom: solid #530FAA 3px;">Harian </a>
                    <a href="" class="ms-5" style="color: #530FAA;">Season</a>
                </div>
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

        <main class="d-flex justify-content-center mt-3">
            <div class="w-75 ms-4">
                <table class="table">
                    <tbody>
                        <?php foreach ($users as $key => $user): ?>
                            <tr>
                                <td class="d-flex align-items-center">
                                    <?php if ($key == 0): ?>
                                        <span class="material-symbols-outlined" style="color: yellow; font-size: 35px;">
                                            trophy
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($key == 1): ?>
                                        <span class="material-symbols-outlined" style="color: #C0C0C0; font-size: 35px;">
                                            trophy
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($key == 2): ?>
                                        <span class="material-symbols-outlined" style="color: #8B4513; font-size: 35px;">
                                            trophy
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($key > 2): ?>
                                        <h4>
                                            <?= $key + 1; ?>
                                        </h4>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $user['full_name']; ?>
                                </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <span class="material-symbols-outlined" style="color: blue;">
                                        military_tech
                                    </span>
                                    <h6>
                                        <?= $user['level']; ?>
                                    </h6>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="w-25 ms-3">
                <div class="border-start border-1 border-black border-bottom border-top">
                    <div class="p-3">
                        <h5>Profile</h5>
                    </div>
                    <div class="h-75 d-flex align-items-center">
                        <p class="ms-2">Silakan pilih aktivitas disebelah kiri untuk melihat detailnya</p>
                    </div>
                </div>
                <div>
                    <div class="p-3">
                        <h5>Your Profile</h5>
                    </div>
                    <div class="h-75 d-flex align-items-center">
                        <?php
                        $userData = session('user_data');
                        if ($userData): ?>
                            <p class="ms-2" style="white-space: nowrap;">
                                <?= $userData['profile']['full_name']; ?>
                            </p>
                        <?php else: ?>
                            <p class="ms-2" style="white-space: nowrap;">
                                Data pengguna tidak ditemukan!
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/pjs/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
