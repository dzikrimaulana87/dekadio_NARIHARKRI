<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Pilih Level</h2>
    <?php
    //cari di db soal, total soal dengan level unique
    $totalLevel = 12;
    for( $i = 1; $i < $totalLevel; $i++):
    ?>
    <a href="<?= base_url('/quiz/level/' . $i);?>"> level <?= $i;?></a>
    <br>

    <?php endfor; ?>
</body>
</html>