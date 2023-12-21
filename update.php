<?php
require_once "DesainPattern.php";
$createPattern = new Pattern();
if (isset($_POST["nameUpdate"]) && isset($_POST["kelasUpdate"]) && isset($_GET["nisn"])) {
    var_dump($_GET["nisn"]);

    $data = [
        "nisn"=>$_GET["nisn"],
        "siswa" => $_POST["nameUpdate"],
        "kelas" => $_POST["kelasUpdate"],
    ];
    $createPattern->putById($data);
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
    <a href="./get.php">kembali</a>
<form action="update.php?nisn=<?php echo $_GET["nisn"]; ?>" method="post">
    <input type="text" name="nameUpdate" placeholder="siswa">
    <input type="number" name="kelasUpdate" placeholder="kelas">
    <button type="submit">kirim</button>
</form>
</body>
</html>