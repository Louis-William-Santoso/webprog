<?php
function sorting($arr, $urutan) {
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
    $res      = [];
    while (count($kiri) > 0 && count($kanan) > 0) {
        $keyKiri  = array_key_first($kiri);
        $keyKanan = array_key_first($kanan);
        if($urutan === 'asc'){
            $kondisi = ($kiri[$keyKiri] <= $kanan[$keyKanan]);
        }else{
            $kondisi = ($kiri[$keyKiri] >= $kanan[$keyKanan]);
        }
        
        if ($kondisi) {
            if (is_string($keyKiri)) {
                $res[$keyKiri] = $kiri[$keyKiri];
            } else {
                $res[] = $kiri[$keyKiri];
            }
            unset($kiri[$keyKiri]);
        } else {
            if (is_string($keyKanan)) {
                $res[$keyKanan] = $kanan[$keyKanan];
            } else {
                $res[] = $kanan[$keyKanan];
            }
            unset($kanan[$keyKanan]);
        }
    }
    return array_merge($res, $kiri, $kanan);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
        th, td{
            border: 1px solid black;
        }
    </style>
    <link rel="stylesheet" href="css/out.css">
</head>
<body class="bg-zinc-900 text-[white] font-mono ">
    <div class="m-[10%]">
        <nav class="w-4xl items-center m-4">
            <h1 class="m-2 text-4xl font-bold">Data Transaksi</h1>
            <div class="flex justify-start">
                <a class="p-3.5 bg-red-500 m-2 rounded-2xl" href="./tambah.php">Tambah Transaksi</a>
                <a class="p-3.5 bg-red-500 m-2 rounded-2xl" href="./setting.php">Settings</a>
            </div>
        <p class="border-2 border-zinc-400 mt-3.5"></p>
        </nav>
        <?php
        if(isset($_COOKIE['sort'])){
            $sort = get_object_vars(json_decode($_COOKIE['sort']));
        }else{
            $sort = ([
                'urutDari' => 'nom',
                'arah'     => 'dsc'
            ]);
        }

        if(isset($_COOKIE['transaksi'])){   
            echo "<table style='margin: 1rem; margin-bottom: 2rem;'>
                    <tr>
                        <th style='border: 2px white solid; padding: 0.7rem;'>no</th>
                        <th style='border: 2px white solid; padding: 0.7rem;'>Tanggal</th>
                        <th style='border: 2px white solid; padding: 0.7rem;'>Nominal</th>
                    </tr>";
            $strData = "no,Tanggal, nominal\n";
            $index = 0;
            $data = get_object_vars(json_decode($_COOKIE['transaksi']));
            
            
            switch ($sort['urutDari']) {
                case 'tgl':
                    $dataKey = sorting(array_keys($data), $sort['arah']);
                    $arrSort = [];
                    foreach($dataKey as $key){
                        $arrSort[$key] = $data[$key];
                    }
                    $data = $arrSort;
                    break;
                default:
                    $data = sorting($data, $sort['arah']);
                    break;
            }
            foreach($data as $key => $val){
                $index +=1 ;
                $val = number_format($val,0,'.',',');
                echo "<tr>
                        <td style='border: 2px white solid; padding-left: 5px;'>$index</td>
                        <td style='border: 2px white solid; padding: 5px;'>$key</td> 
                        <td style='border: 2px white solid; padding: 5px;'>$val</td>
                    </tr>";

                $strData = $strData . "$index,$key,$val\n";
            }
            setcookie('transaksi', json_encode($data));

            if(!is_dir("docs")){
                mkdir("docs", 777, true, null);
            }
            file_put_contents('./docs/tableData.csv',$strData);
            echo "</table>
                <a style='background-color: #fb2c36; margin: 1rem; padding:0.7rem;' href='./docs/tableData.csv' download='Data-Transaksi.csv'>Download table</a>";

        
        }else{
            echo "<i style='margin: 1rem;'>Belum ada Data</i>";
        }
        ?>
    </div>
    
    <footer class="bottom-0 fixed bg-zinc-600 w-screen h-44">
        <div class="m-4">
            <h2 class="text-2xl">Made By :</h2>
            <ul>
                <li>Louis William S (160424006)</li>
                <li>Clarissa Nadine M (160424021)</li>
                <li>Kelvin Adrian R G (160424089)</li>
            </ul>
        </div>
    </footer>
</body>
</html>