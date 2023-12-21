<?php
require_once "DesainPattern.php";

$createPattern = new Pattern();
if(isset($_POST["namaRegister"]) && isset($_POST["passRegister"])){
    $data = [
        "nama" => $_POST["namaRegister"],
        "pass" => $_POST["passRegister"],
    ];

    if (!empty($data["nama"]) && !empty($data["pass"])) {
        $createPattern->register($data);
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
        body {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <a href="index.php">login</a>
    <h1 style="text-align:center;">Halaman Register</h1>
    <form action="register.php" class="form" method="post">
        <input type="text" name="namaRegister" placeholder="Username">
        <br>
        <input type="password" name="passRegister" placeholder="Password">
        <br>
        <button type="submit">Kirim</button>
        <p>Sudah punya akun? Silahkan <a href="login.php">login</a></p>
    </form>
</body>
</html>
