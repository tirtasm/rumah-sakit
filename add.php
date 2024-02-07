<?php
 require_once realpath(__DIR__."/vendor/autoload.php");
 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 $dotenv->load();
 $db = $_ENV['DB_CONNECTION'];
 $username = $_ENV["DB_USERNAME"];
 $pass = '';
 $dbName = $_ENV['DB_DATABASE'];
 $koneksi = mysqli_connect($db, $username, $pass, $dbName);
 


//  var_dump($_POST[""]);


$id_dokter = htmlspecialchars($_POST['id_dokter']);
$ruang = htmlspecialchars($_POST['ruang']);
$visite = htmlspecialchars($_POST['visite']);
$konsul  = htmlspecialchars($_POST['konsul']);
$id_tindakan  = htmlspecialchars($_POST['id_tindakan']);

$tanggal = htmlspecialchars($_POST['tanggal']);

// echo $tanggal . "<br>"; 
// echo $id_dokter . "<br>"; 
// echo $ruang . "<br>";
// echo $visite . "<br>";
// echo $konsul . "<br>";
// echo $id_tindakan . "<br>";

mysqli_query($koneksi, "INSERT INTO `rumahsakit` (`id`, `tanggal`, `id_dokter`, `ruang`, `visite`, `konsul`, `id_tindakan`) 
VALUES (NULL, '$tanggal', '$id_dokter', '$ruang', '$visite', '$konsul', '$id_tindakan');");
?>
<script>
    alert('Data Berhasil Ditambahkan');
    document.location.href = 'index.php';
    </script>
