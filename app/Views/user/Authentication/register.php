<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>User Registration</h2>

        <form action="<?= base_url('/register-action'); ?>" method="post">

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control"
                    value="<?= (isset($validation) ? old('name') : ''); ?>" required>
            </div>


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

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>