<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>

    <!-- Connect to bootstrap -->
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
                <h4 style="color: #530FAA;">Practice</h4>
                <p style="color: #530FAA;">Dasar</p>
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
            <div class="w-75 d-flex justify-content-center">
                <div class="d-flex flex-column justify-content-center flex-nowrap gap-5">
                    <?php
                    $session = session();

                    $userLevel = $session->get('user_level');
                    ?>
                    <div class="d-flex gap-3">
                        <?php
                        $userLevel = $userData['profile']['level'];
                        $totalLevel = 12;
                        for ($i = 1; $i < $totalLevel; $i++):
                            if ($userLevel >= $i):
                                ?>
                                <a href="<?= base_url('/quiz/level/' . $i); ?>">
                                    <div class="d-flex justify-content-center align-items-center text-white"
                                        style="height: 50px; width:50px; border-radius: 999px; background-color: #530FAA;">
                                        <h3>
                                            <?= $i; ?>
                                        </h3>
                                    </div>
                                </a>
                                <?php
                            endif;
                            if ($userLevel < $i):
                                ?>
                                <a href="<?= base_url('/quiz/level/' . $i); ?>">
                                    <div class="d-flex justify-content-center align-items-center text-white"
                                        style="height: 50px; width:50px; border-radius: 999px; background-color: #666;">
                                        <h3>
                                            <?= $i; ?>
                                        </h3>
                                    </div>
                                </a>
                                <?php
                            endif;
                        endfor;
                        ?>
                    </div>
                </div>
            </div>
            <div class="w-25 ms-3">
                <div class="">
                    <h5>Progress Harian</h5>
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="material-symbols-outlined" style="color: #530FAA; width: 30px; height: 30px;">
                            monitoring
                        </span>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100" style="background-color:#aaa">
                        <div class="progress-bar" style="width: 25%; background-color: #530FAA;">25%</div>
                    </div>
                </div>
                <div class="">
                    <div class="d-flex justify-content-between mt-3">
                        <h5>Misi</h5>
                        <p>0/100 Xp</p>
                    </div>
                    <div class="misi d-flex justify-content-around">
                        <span class="material-symbols-outlined" style="color: #530FAA;">
                            gamepad
                        </span>
                        <p>Main selama tiga kali beruntun dan menang!</p>
                        <p style="color: #530FAA;">50 Xp</p>
                    </div>
                    <div class="misi d-flex justify-content-between ps-1 pe-1">
                        <span class="material-symbols-outlined" style="color: #530FAA;" style="color: #530FAA;">
                            target
                        </span>
                        <p>Targetkan 100% ditingkat dasar!</p>
                        <p style="color: #530FAA;">30 Xp</p>
                    </div>
                    <div class="misi d-flex justify-content-between ps-1 pe-1">
                        <span class="material-symbols-outlined" style="color: #530FAA;">
                            diversity_3
                        </span>
                        <p>Bagikan ke 3 temanmu!</p>
                        <p style="color: #530FAA;">20 Xp</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Connect to js bootstrap   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/pjs/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>