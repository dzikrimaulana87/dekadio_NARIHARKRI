<!-- Views/login.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="pt-5" style="background-color: #520FAA;">
        <div class="container-fluid w-50 bg-white rounded">
            <h2 class="text-center pt-1">User Login</h2>

            <?php if (isset($success)): ?>
                <div class="alert alert-success">
                    <?= $success; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/login-action'); ?>" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email"
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
                    <label for="password">Password:</label>
                    <input type="password" name="password"
                        class="form-control <?= (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                        required>
                    <!-- Tampilkan pesan kesalahan jika ada -->
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-center align-items-center pb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#530FAA" fill-opacity="1"
            d="M0,224L34.3,234.7C68.6,245,137,267,206,272C274.3,277,343,267,411,256C480,245,549,235,617,202.7C685.7,171,754,117,823,117.3C891.4,117,960,171,1029,202.7C1097.1,235,1166,245,1234,234.7C1302.9,224,1371,192,1406,176L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
        </path>
    </svg>

    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>