<!-- Views/profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>User Profile</h2>

        <?php if (isset($userData)): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Username: <?= $userData['profile']['full_name']; ?></h5>
                    <p class="card-text">Level: <?= $userData['profile']['level']; ?></p>
                    <p class="card-text">Nama: <?= $userData['email']; ?></p>
                </div>
            </div>
        <?php else: ?>
            <p>Data pengguna tidak ditemukan.</p>
        <?php endif; ?>

        <br>

        <a href="<?= base_url('/logout'); ?>" class="btn btn-primary">Logout</a>
    </div>

    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
