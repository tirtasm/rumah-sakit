<?php
require_once realpath(__DIR__."/vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$db = $_ENV['DB_CONNECTION'];
$username = $_ENV ['DB_USERNAME'];
$pass = '';
$dbName = $_ENV['DB_DATABASE'];
$koneksi = mysqli_connect($db, $username, $pass, $dbName);

$id = $_GET['id'];
$delete = mysqli_query($koneksi, "DELETE FROM rumahsakit WHERE id = '$id'");
if ($delete) {
    echo "Row deleted successfully.";
} else {
    echo "Error deleting row: " . mysqli_error($koneksi);
}

?>
 <script>
           
            document.location.href = 'index.php';
          </script>

