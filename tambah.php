<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <form action="" method="post">
        <label for="tanggal">Tanggal :</label>
        <input type="date" name="tanggal">
        <br>
        <label for="nominal">Nominal :</label>
        <input type="number" name="nominal">
        <button type="submit">Submit</button>
    </form>

    <?php
        // require_once 'setting.php';

        if(isset($_POST['tanggal']) && isset($_POST['nominal'])){
            $tgl = $_POST['tanggal'];
            $nom = $_POST['nominal'];

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
                        echo "<p>tgl:{$key}<br>nom:{$data}</p>";
                }

                // sorting($transaksi);
                setcookie('transaksi', json_encode($transaksi));
            }else {
                echo "Isi dulu mas.....";
            }
        }
    ?>

    <a href="index.php">back</a>
</body>
</html>