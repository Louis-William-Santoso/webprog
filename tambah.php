<?php
    $pesan = "";
    $color = '';
    if(isset($_POST['tanggal']) && isset($_POST['nominal'])){
            $tgl = $_POST['tanggal'];
            $nom = $_POST['nominal'];
            if ($tgl =="" || $nom == ""){
                $pesan = "Tanggal dan nominal wajib diisi!";
                $color = "style='color:red;'";
            }  else {
                $pesan = "Data berhasil disimpan!";
                $color = "style='color:green;'";
            }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/out.css">
</head>
<body class="bg-zinc-900 text-[white] font-mono">
    <div class="m-[10%]">
        <nav class="w-4xl items-center m-4">
            <h1 class="m-2 text-4xl font-bold">Tambah Transaksi</h1>
        <p class="border-2 border-zinc-400 mt-3.5"></p>
    </nav>

    <?php if ($pesan != "") echo "<p $color>$pesan</p>"?>
    <form action="" method="post">
        <label for="tanggal">Tanggal :</label>
        <input type="date" name="tanggal" class="border-2 border-[#ffff] p-1 w-52">
        <br></br>
        <label for="nominal">Nominal :</label>
        <input type="number" name="nominal" class="border-2 border-[#ffff] p-1 w-52">
        <br></br>
        <div class="flex">
            <a href="index.php" class="p-3.5 bg-red-500 m-2 rounded-2xl">&lt;&lt; Kembali</a>
            <button type="submit" class="p-3.5 bg-green-600 m-2 rounded-2xl">Simpan</button>
        </div>
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
            $transaksi[$tgl] = (int)$nom;
            echo "<h2>Transaksi :</h2>";
            foreach($transaksi as $key => $data){                  
                    echo "<p>tgl:{$key}<br>nom: " . number_format($data,0,'.',',') . "</p>";
            }   

            // sorting($transaksi);
            setcookie('transaksi', json_encode($transaksi));    
         }
        }
        
    ?>
    </div>

    <footer class="bottom-0 fixed bg-zinc-600 w-screen h-44">
        <div class="m-4">
            <h2 class="text-2xl">Made By :</h2>
            <ul>
                <li>Kelvin Adrian R G (160424089)</li>
                <li>Clarissa Nadine M (160424021)</li>
                <li>Louis William S (160424006)</li>
            </ul>
        </div>
    </footer>
</body>
</html>