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
        <input type="radio" name="urutDari" value="tgl" onchange="this.form.submit()" checked>
        <label for="tgl">Tanggal</label>
        <input type="radio" name="urutDari" value="nom" onchange="this.form.submit()">
        <label for=""nom>Nominal</label>
    </form>

     <form action="" method="post">
        <label>Urut dari:</label>
        <input type="radio" name="urutan" value="asc" onchange="this.form.submit()" checked>
        <label for="tgl">Ascending</label>
        <input type="radio" name="urutan" value="dsc" onchange="this.form.submit()">
        <label for=""nom>Descending</label>
    </form>

    <?php
    $cookie = json_decode($_COOKIE['transaksi']);
    foreach($cookie as $key=>$val){
        $data[$key] = $val; 
    }

    function sorting($arr, $urutan = 'asc') {
        $count = count($arr);
        if ($count <= 1) return $arr;

        $mid   = (int)($count / 2);
        $kiri  = array_slice($arr, 0, $mid);
        $kanan = array_slice($arr, $mid);

        $kiri  = sorting($kiri, $urutan);
        $kanan = sorting($kanan, $urutan);

        return merge($kiri, $kanan, $urutan);
    }

    function merge($kiri, $kanan, $urutan) {
        $res = [];
        while (count($kiri) > 0 && count($kanan) > 0) {
             if($urutan === 'asc'){
                $kondisi = ($kiri[0] <= $kanan[0]);
            }else{
                $kondisi = ($kiri[0] >= $kanan[0]);
            }
            
            if ($kondisi) {
                $res[] = array_shift($kiri);
            } else {
                $res[] = array_shift($kanan);
            }
        }
        return array_merge($res, $kiri, $kanan);
    }

    // sorting($data, $_POST['urutDari'], $_POST['urutan']);
    // foreach($data as $key => $val){
    //     echo "<p>$key | $val</p>";
    // }
    $tess = [4, 5, 9, 1, 10, 8 ,7];
    print_r(sorting($tess, 'asc'));
    echo count($tess);
    ?>
</body>
</html>