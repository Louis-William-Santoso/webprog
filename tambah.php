<?php
    $pesan = "";

    if(isset($_POST['tanggal']) && isset($_POST['nominal'])){
            $tgl = $_POST['tanggal'];
            $nom = $_POST['nominal'];
            if ($tgl =="" || $nom == ""){
                $pesan = "Tanggal dan nominal wajib diisi!";
            }  else {
                $pesan = "Data berhasil disimpan!";
            }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Transaksi</h1>
    <hr style="height: 1px; background-color:black; margin-top: -10px;">

    <?php if ($pesan != "") echo "<p style='color: red;'>$pesan</p>"?>
    <form action="" method="post">
        <label for="tanggal">Tanggal :</label>
        <input type="date" name="tanggal">
        <br></br>
        <label for="nominal">Nominal :</label>
        <input type="number" name="nominal">
        <br></br>
        <button type="submit">Simpan</button>
        <br></br>
    </form>

    <?php
        // require_once 'setting.php';
        if(isset($_POST['tanggal']) && isset($_POST['nominal'])){
            if($tgl != '' && $nom != ''){
            if(isset($_COOKIE['transaksi'])){
                $cookie = json_decode($_COOKIE['transaksi']);
                foreach ($cookie as $key => $data) {
                    $transaksi[$key] = $data;
                 }
            }
            $transaksi[$tgl] = $nom;
            echo "<h2>Transaksi :</h2>";
            foreach($transaksi as $key => $data){                  
                    echo "<p>tgl:{$key}<br>nom: " . number_format($data,0,'.',',') . "</p>";
            }   

            // sorting($transaksi);
            setcookie('transaksi', json_encode($transaksi));    
         }
        }
        
    ?>

    <a href="index.php">&lt;&lt;Kembali</a>
</body>
</html>