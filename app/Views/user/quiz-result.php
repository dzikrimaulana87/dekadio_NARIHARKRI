<!-- app/Views/quiz/result.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
</head>

<body>
    <h2>Quiz Result</h2>

    <?php if (session()->has('selected_options')) : ?>
        <pre>
            <?= print_r(session('selected_options')); ?>
        </pre>
    <?php else : ?>
        <p>No quiz data available.</p>
    <?php endif; ?>
</body>

</html>
