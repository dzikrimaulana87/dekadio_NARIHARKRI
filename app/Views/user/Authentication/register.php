<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Font dekadio -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url('/img/registBg.png');
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: end;
        }
    </style>
</head>

<body>
    <div class="w-50 d-flex align-items-center" style="height: 100vh; padding-right: 30px;">
        <div class="container-fluid w-50 rounded">
            <h2 class="text-center pt-1 mb-5" style="color: #530faa; font-family: 'Press Start 2P', system-ui;">dekadio.
            </h2>

            <form action="<?= base_url('/register-action'); ?>" method="post">

                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Username"
                        value="<?= (isset($validation) ? old('name') : ''); ?>" required>
                </div>


                <div class="form-group">
                    <input type="email" name="email" placeholder="Email"
                        class="form-control <?= (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                        value="<?= (isset($validation) ? old('email') : ''); ?>" required>
                    <!-- Tampilkan pesan kesalahan jika ada -->
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password"
                        class="form-control <?= (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                        required>
                    <!-- Tampilkan pesan kesalahan jika ada -->
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="d-flex flex-column justify-content-center align-items-center pb-3">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
                    <div class=" mt-3">
                        <p>Do you have an account ? <a href="<?= base_url('/login'); ?>" style="color: #530FAA">Login
                                Here</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>