<?php
$pesan = "";
$data  = "";
if(isset($_POST['urutDari']) && isset($_POST['arah'])){
    $pesan = "<i style='color:green'>Data berhasil Disimpan</i>";
    $data = ([
        'urutDari' => $_POST['urutDari'],
        'arah'     => $_POST['arah']
    ]);
    setcookie('sort', json_encode($data));
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
<body  class="bg-zinc-900 text-[white] font-mono">
    <div class="m-[10%]">
        <nav>
            <h1 class="m-2 text-4xl font-bold">Settings</h1>
            <p class="border-2 border-zinc-400 mt-3.5"></p>
        </nav>
        
        <?php if ($pesan != "") echo $pesan?>
        <form action="" method="POST">
            <div class="flex">
                <p class="w-52">Urut Berdasarkan</p>:
                <div class="m-1">
                    <input type="radio" name="urutDari" value="tgl" onchange="this.form.submit()" checked>
                    <label for="tgl">Tanggal</label>
                    <input type="radio" name="urutDari" value="nom">
                    <label for="nom">Nominal</label>
                </div>
            </div>

            <div class="flex">
                <p class="w-52">Arah</p>:
                <div class="m-1">    
                    <input type="radio" name="arah" value="asc" onchange="this.form.submit()" checked>
                    <label for="tgl">Ascending</label>
                    <input type="radio" name="arah" value="dsc">
                    <label for="nom">Descending</label>
                </div>
            </div>
            <br></br>
            <div class="flex">
                <div class="flex">
                <a href="index.php" class="p-3.5 bg-red-500 m-2 rounded-2xl">&lt;&lt; Kembali</a>
                <button type="submit" class="p-3.5 bg-green-600 m-2 rounded-2xl">Simpan</button>
                </div>
            </div>
        </form>
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