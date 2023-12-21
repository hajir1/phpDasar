<?php
require_once "DesainPattern.php";
$createPattern = new Pattern();
if(isset($_POST["name"]) && isset($_POST["kelas"]) && isset($_POST["nisn"])){
    $data =[
        "nisn"=> $_POST["nisn"],
        "name"=> $_POST["name"],
        "kelas"=> $_POST["kelas"],
    ];
    $createPattern->create($data);
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
    <form action="tambah.php" method="post" enctype="multipart/form-data">
        <input type="number" name="nisn" placeholder="nisn" >
        <input type="text" name="name" placeholder="siswa">
        <input type="number" name="kelas" placeholder="kelas">
        <input type="file" name="gambar" placeholder="kelas">
        <button type="submit">kirim</button>
    </form>
</body>
</html>