<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS-webprog</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .top{
            display: flex;
            gap: 20px;
            background: white;
            margin-bottom: 30px;
            justify-content: 30px;
        }
        .top-group{
            width: 48%;
        }
        .form-group{
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .form-group label{
             width:120px;
        }
        .bottom{
            width: 100%;
            margin-top: 20vh;
        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }
        td{
            border: 1px solid black;
            height: 30px;
            text-align: center;
        }
        .available{
            background: white;
        }
        .unavailable{
            background: grey;
        }
    </style>
</head>
<body>

    <div class="top">
        <div class="top-group">
            <h2>Inisialisasi</h2>
            <form action="/table/">
                <div class="form-group">
                    <label for="baris">Jumlah Baris:</label>
                    <input id="jumlahBaris" type="number" min=1>
                </div>
                <div class="form-group">
                    <label for="kolom">Jumlah Kolom:</label>
                    <input id="jumlahKolom" type="number" min=1>
                </div>
                <button id="inisialisasi" type="button">Generate</button>
            </form>
        </div>

        <div class="top-group">
            <h2>Okupasi</h2>
            <form action="/">
                <div class="form-group">
                    <label for="baris">Baris:</label>
                    <input style="width:180px;"id="okupasiBaris" type="number" min=1><br>
                </div>
                <div class="form-group">
                    <label for="kolom">Kolom:</label>
                    <input style="width:180px;"id="okupasiKolom" type="number" min=1><br>
                </div>
                <div class="form-group">
                    <label>Jenis</label>
                    <input type="radio" name="jenis" value="available" checked>
                    <label for="available">Available</label>
                    <input type="radio" name="jenis" value="unavailable">
                    <label for="unvailable">Unvailable</label><br>
                </div>
                <button type="button" id="simpan">Simpan</button>
            </form>
        </div>
    </div>

    <div class="bottom">
        <h2>Denah</h2>
        <div id="tableGenerate">
        </div>
    </div>

<script>
    $(document).ready(function(){
        $("#inisialisasi").click(function(){
            let baris = $("#jumlahBaris").val();
            let kolom = $("#jumlahKolom").val();

            if(baris==""||kolom==""){
                alert("WAJIB mengisi jumlah baris dan kolom!");
                return;
            }

            let table ="<table border='1'>";
            for(let i=1; i <=baris; i++){
                table += "<tr>";
                for (let j =1; j<=kolom; j++){
                    table += "<td id='cell-" + i+"-"+j+"'></td>";
                }
                table += "</tr>";
            }
            table+= "</table>";
            $("#tableGenerate").html(table);
            $("#okupasiBaris").attr("max", baris);
            $("#okupasiKolom").attr("max", kolom);
        });
        $("#simpan").click(function(){
            let baris =  $("#okupasiBaris").val();
            let kolom = $("#okupasiKolom").val();
            let jenis = $("input[name='jenis']:checked").val();

            if(baris==""||kolom==""){
                alert("WAJIB mengisi baris dan kolom!");
                return;
            }

            let col = $("#cell-" + baris + "-" + kolom);
            if (jenis=="unavailable"){
                col.css("background-color", "gray");
            } else{
                col.css("background-color", "white")
            }
            alert("Tabel berhasil diupdate!");
        });     
    }); 
</script>
</body>
</html>