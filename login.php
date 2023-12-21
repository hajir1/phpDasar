<?php
require_once "DesainPattern.php";

$createPattern = new Pattern();
if (isset($_POST["namaLogin"]) && isset($_POST["passLogin"])) {
    $data = [
        "name" => $_POST["namaLogin"],
        "pass" => $_POST["passLogin"],
    ];

    if (!empty($data["name"]) && !empty($data["pass"])) {
        $createPattern->login($data);
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
    <h1 style="text-align:center;">halaman login</h1>
    <form action="login.php" class="form" method="post">
        <input type="text" name="namaLogin" placeholder="username">
        <br>
        <input type="password" name="passLogin" placeholder="password">
        <br>
        <button type="submit">kirim</button>
        <p>belum punya akun ? silahkan <a href="register.php">register</a></p>
    </form>
</body>
</html>
