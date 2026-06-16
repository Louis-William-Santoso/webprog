<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS-webprog</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Project Webprog</h1>
    <div style="display: flex;">
        <p style="margin-right:2rem;">Made By:</p>
        <div>
            <li>Clarissa Nadine M (160424021)</li>
            <li>Kelvin Adrian R G (160424089)</li>
            <li>Louis William S (160424006)</li>
        </div>
    </div>

    <div style="display:flex;">
        <div style="padding:3rem;">
            <h2>Inisialisasi</h2>
            <form action="/table/">
                <label for="baris" style="margin-right:0.7rem;">Jumlah Baris:</label>
                <input name="baris" type="number"><br>

                <label for="kolom">Jumlah Kolom:</label>
                <input name="kolom" type="number"><br>
                <button id="inisialisasi" type="submit">Save</button>
            </form>
        </div>

        <div style="padding:3rem;">
            <h2>Okupasi</h2>
            <form action="/">
                <label for="baris" style="margin-right:0.7rem;">Baris:</label>
                <input name="baris" type="number"><br>

                <label for="kolom">Kolom:</label>
                <input name="kolom" type="number"><br>

                <label>Jenis</label>
                <input type="radio" name="jenis" vlaue="available" id="available" checked>
                <label for="available">Available</label>
                <input type="radio" name="jenis" vlaue="unvaiable" id="unvailable">
                <label for="unvailable">Unvailable</label><br>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <table hidden>

    </table>
<script>
    $.get("/table/", function(res){
        console.log(res);
    });
</script>
</body>
</html>