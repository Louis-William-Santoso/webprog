<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="./setting.php">Settings</a>
        <a href="./tambah.php">Tambah</a>
    </nav>

    <ul>
    <?php 
    if(isset($_COOKIE['transaksi'])){
        $data = json_decode($_COOKIE['transaksi']);
        foreach($data as $key => $val){
            echo "<li>tgl:{$key} nom:{$val}</li>";
        }
       
    }else{
        echo "Data kosong";
    }
    ?>
    </ul>
</body>
</html>