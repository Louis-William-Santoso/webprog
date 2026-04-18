<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Urut dari:</label>
        <input type="radio" name="urutDari" value="tgl" onchange="this.form.submit()">
        <label for="tgl">Tanggal</label>
        <input type="radio" name="urutDari" value="nom" onchange="this.form.submit()">
        <label for=""nom>Nominal</label>
    </form>

    <?php
    if(isset($_POST['urutDari'])){
        var_dump($_POST['urutDari']);
    }
    ?>
</body>
</html>