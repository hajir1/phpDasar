<?php
require_once __DIR__ . "/DesainPattern.php";

$createPattern = new Pattern();
$data = $createPattern->getData();

$count = count($data);
// session_start();
// if(!isset($_SESSION["name"])){
//     header("location: index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

    <h2>Data Table</h2>
        <a href="tambah.php">tambah</a>
        <p>jumlah data :<?=$count?></p>
    <?php if (!empty($data)): ?>
        <table>
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo $row['nisn']; ?></td>
                        <td><?php echo $row['siswa']; ?></td>
                        <td><?php echo $row['kelas']; ?></td>
                        <td class="display:flex;justify-content:center;">
                            <a class="color:black;" href="update.php?nisn=<?php echo $row["nisn"]?>">edit</a>
                            <a class="color:black;" href="delete.php?nisn=<?php echo $row["nisn"]?>">hapus</a>
                            <a class="color:black;" href="upload/<?php echo $row["file"]?>">gambar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Data tidak tersedia.</p>
    <?php endif; ?>

</body>
</html>
