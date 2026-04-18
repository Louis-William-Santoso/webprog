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
</head>
<body>
    <nav>
        <a href="./setting.php">Settings</a>
        <a href="./tambah.php">Tambah</a>
    </nav>
    <?php 
    if(isset($_COOKIE['transaksi'])){
        echo "<table style='table-layout: fixed;'>
                <tr>
                    <th>no</th>
                    <th>Tanggal</th>
                    <th>Nominal</th>
                </tr>";
        $strData = "no,Tanggal, nominal\n";
        $index = 0;
        $data = json_decode($_COOKIE['transaksi']);
        foreach($data as $key => $val){
            $index +=1 ;
            echo "<tr>
                    <td>$index</td>
                    <td>$key</td> 
                    <td>$val</td>
                  </tr>";

            $strData = $strData . "$index,$key,$val\n";
        }
        file_put_contents('tableData.csv',$strData);
        echo "<tr>
                <th><a href='tableData.csv' download='Data-Transaksi.csv'>tess Download table</a></th>
            </tr>
             </table>";

       
    }else{
        echo "Data kosong";
    }
    ?>
</body>
</html>