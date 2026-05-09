<?php
ob_start();
$pesan = "";
$data  = "";
$urutDari = "tgl";
$arah = "asc";
if(isset($_POST['urutDari']) && isset($_POST['arah'])){
    $data = ([
        'urutDari' => $_POST['urutDari'],
        'arah'     => $_POST['arah']
    ]);
    $pesan = "<i style='color:green'>Data berhasil Disimpan<br>Urut:{$_POST['urutDari']} Arah:{$_POST['arah']}</i>";
    setcookie('sort', json_encode($data));
    $urutDari = $_POST['urutDari'];
    $arah = $_POST['arah'];
} elseif(isset($_COOKIE['sort'])) {
    $sortCookie = json_decode($_COOKIE['sort'], true);
    if(is_array($sortCookie)) {
        $urutDari = isset($sortCookie['urutDari']) ? $sortCookie['urutDari'] : "tgl";
        $arah = isset($sortCookie['arah']) ? $sortCookie['arah'] : "asc";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /*! tailwindcss v4.3.0 | MIT License | https://tailwindcss.com */
        @layer properties{@supports (((-webkit-hyphens:none)) and (not (margin-trim:inline))) or ((-moz-orient:inline) and (not (color:rgb(from red r g b)))){*,:before,:after,::backdrop{--tw-border-style:solid;--tw-font-weight:initial}}}@layer theme{:root,:host{--font-sans:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";--font-mono:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;--color-red-500:oklch(63.7% .237 25.331);--color-green-600:oklch(62.7% .194 149.214);--color-zinc-400:oklch(70.5% .015 286.067);--color-zinc-600:oklch(44.2% .017 285.786);--color-zinc-900:oklch(21% .006 285.885);--spacing:.25rem;--container-4xl:56rem;--text-2xl:1.5rem;--text-2xl--line-height:calc(2 / 1.5);--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5 / 2.25);--font-weight-bold:700;--radius-2xl:1rem;--default-font-family:var(--font-sans);--default-mono-font-family:var(--font-mono)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;-webkit-text-decoration:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1}@supports (not ((-webkit-appearance:-apple-pay-button))) or (contain-intrinsic-size:1px){::placeholder{color:currentColor}@supports (color:color-mix(in lab, red, red)){::placeholder{color:color-mix(in oklab, currentcolor 50%, transparent)}}}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}::-webkit-calendar-picker-indicator{line-height:1}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){appearance:button}::file-selector-button{appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.fixed{position:fixed}.bottom-0{bottom:calc(var(--spacing) * 0)}.m-1{margin:calc(var(--spacing) * 1)}.m-2{margin:calc(var(--spacing) * 2)}.m-4{margin:calc(var(--spacing) * 4)}.m-\[10\%\]{margin:10%}.mt-3\.5{margin-top:calc(var(--spacing) * 3.5)}.flex{display:flex}.table{display:table}.h-44{height:calc(var(--spacing) * 44)}.w-4xl{width:var(--container-4xl)}.w-52{width:calc(var(--spacing) * 52)}.w-screen{width:100vw}.items-center{align-items:center}.justify-start{justify-content:flex-start}.rounded-2xl{border-radius:var(--radius-2xl)}.border{border-style:var(--tw-border-style);border-width:1px}.border-2{border-style:var(--tw-border-style);border-width:2px}.border-\[\#ffff\]{border-color:#fff}.border-zinc-400{border-color:var(--color-zinc-400)}.bg-green-600{background-color:var(--color-green-600)}.bg-red-500{background-color:var(--color-red-500)}.bg-zinc-600{background-color:var(--color-zinc-600)}.bg-zinc-900{background-color:var(--color-zinc-900)}.p-1{padding:calc(var(--spacing) * 1)}.p-3\.5{padding:calc(var(--spacing) * 3.5)}.font-mono{font-family:var(--font-mono)}.text-2xl{font-size:var(--text-2xl);line-height:var(--tw-leading,var(--text-2xl--line-height))}.text-4xl{font-size:var(--text-4xl);line-height:var(--tw-leading,var(--text-4xl--line-height))}.font-bold{--tw-font-weight:var(--font-weight-bold);font-weight:var(--font-weight-bold)}.text-\[white\]{color:#fff}}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-font-weight{syntax:"*";inherits:false}
    </style>
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
                    <input type="radio" name="urutDari" value="tgl" onchange="this.form.submit()" <?php echo ($urutDari == 'tgl') ? 'checked' : ''; ?>>
                    <label for="tgl">Tanggal</label>
                    <input type="radio" name="urutDari" value="nom" onchange="this.form.submit()" <?php echo ($urutDari == 'nom') ? 'checked' : ''; ?>>
                    <label for="nom">Nominal</label>
                </div>
            </div>

            <div class="flex">
                <p class="w-52">Arah</p>:
                <div class="m-1">    
                    <input type="radio" name="arah" value="asc" onchange="this.form.submit()" <?php echo ($arah == 'asc') ? 'checked' : ''; ?>>
                    <label for="tgl">Ascending</label>
                    <input type="radio" name="arah" value="dsc" onchange="this.form.submit()" <?php echo ($arah == 'dsc') ? 'checked' : ''; ?>>
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