<?php
require_once __DIR__ . "/koneksi.php";

interface Repository
{
    public function create(array $data);
    public function getData();
    public function putById(array $data);
    public function deleteById($nisn);
    public function register(array $data);
    public function login(array $data);
}


class Pattern implements Repository
{
    private $db;

    public function __construct()
    {
        $this->db = getConnection();
    }

    public function create(array $data)
    {
       try {
        $namaFile = $_FILES["gambar"]["name"];
        $tmp_name= $_FILES["gambar"]["tmp_name"];
        if($_FILES["gambar"]["size"]> 500000){
            echo "<script>alert('Ukuran file terlalu besar. Maksimum 500 KB.')</script>";
            return;
        }
        move_uploaded_file($tmp_name, __DIR__ . "/upload/" . $namaFile);
        $exec = $this->db->prepare("insert into siswa (nisn,siswa ,kelas,file ) values (:nisn ,:name , :kelas,:file) ");
        $exec->bindParam(":nisn", $data["nisn"]);
        $exec->bindParam(":name", $data["name"]);
        $exec->bindParam(":kelas", $data["kelas"]);
        $exec->bindParam(":file", $namaFile);
        $exec->execute();
        echo "<script>alert('sukses mengirim data')</script>";
        header("location: get.php");
    } catch (PDOException $error) {
        echo "gagal mengirim data" . $error->getMessage();
    }finally{
        $this->db = null;
    }
}
public function getData() {
    try {
        $exec = $this->db->prepare("select * from siswa");
        $exec->execute(); 
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
            echo "gagal mengirim data" . $error->getMessage();
        }
    }
public function putById(array $data )  {
        try {
            $this->db->beginTransaction();
            $exec = $this->db->prepare("update siswa set siswa = :siswaUpdate  ,kelas = :kelasUpdate 
            where nisn = :nisn");
            $exec->bindParam(":nisn" , $data["nisn"]);
            $exec->bindParam(":siswaUpdate" , $data["siswa"]);
            $exec->bindParam(":kelasUpdate" , $data["kelas"]);
            $exec->execute();
            $this->db->commit();
            echo "<script>alert('sukses update data')</script>";
            header("location: get.php");
            
        } catch (PDOException $error) {
            echo "<script>alert('gagal mengupdate data')</script>";
            echo "gagal mengupdate data" . $error->getMessage();
        }
    }
    public function deleteById($nisn)  {
        try {
            $exec = $this->db->prepare("delete from siswa where nisn = :nisn");
            $exec->bindParam("nisn", $nisn);
            $exec->execute();
            echo "<script>alert('sukses hapus data')</script>";
            header("location: get.php");
        } catch (PDOException $error) {
            echo "<script>alert('gagal menghapus data')</script>";
            echo "gagal menghapus data" . $error->getMessage();
        }    
    }
    public function register(array $data) {
            try {
                $exec = $this->db->prepare("insert into login (nama,pass) values (:nama , :pass)");
                $exec->bindParam("nama", $data["nama"]);
                $exec->bindParam("pass", $data["pass"]);
                $exec->execute();
                echo "<script>alert('sukses register akun')</script>";
            } catch (PDOExceptiom $error) {
                echo "<script>alert('gagal register akun')</script>";
                echo "gagal register akun" . PHP_EOL  . $error->getMessage();
            }
    }
    public function login(array $data) {
        try {
            $exec = $this->db->prepare("select * from login where nama = :name and pass = :pass");
            $exec->bindParam("name" , $data["name"]);
            $exec->bindParam("pass" , $data["pass"]);
            $exec->execute();
            if ($exec->rowCount() > 0) {
                $_SESSION["name"] = $data["name"];
                $_SESSION["pass"] = $data["pass"];
                header("Location: get.php");
                exit();
            } else {
                echo "<script>alert('Username tidak ditemukan');</script>";
            }

        } catch (PDOExceptiom $error) {
            echo "<script>alert('gagal login')</script>";
            echo "gagal login" . PHP_EOL  . $error->getMessage();
        }
    }
}
?>
