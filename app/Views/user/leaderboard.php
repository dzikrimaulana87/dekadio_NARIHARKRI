<!-- Views/user/leaderboard.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Leaderboard</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Full Name</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user): ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $user['full_name']; ?></td>
                        <td><?= $user['level']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Tambahkan script Bootstrap JS di sini jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
