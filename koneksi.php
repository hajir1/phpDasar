<?php

function getConnection() : PDO {
    try {
        $connections = new PDO("mysql:host=localhost:3306;dbname=belajar_php","root","");
        $connections->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connections;
    } catch (PDOException $error) {
        echo "Gagal terkoneksi: " . $error->getMessage() . PHP_EOL;
    }
}

?>
