<!-- File: app/Views/reset_password.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Reset Password</h2>

        <?php if (isset($validation) && $validation instanceof \CodeIgniter\Validation\Validation): ?>
            <p>
                <?= $validation->listErrors(); ?>
            </p>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <p class="text-danger"><?= $error; ?></p>
        <?php endif; ?>

        <form action="<?= base_url('/reset-password-action'); ?>" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control <?= (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                    value="<?= (isset($validation) ? old('email') : ''); ?>" required>
                <!-- Tampilkan pesan kesalahan jika ada -->
                <?php if (isset($validation) && $validation->hasError('email')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Send Reset Link</button>
        </form>
    </div>
    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
