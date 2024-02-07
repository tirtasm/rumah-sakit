<?php
include_once('koneksi.php');

$dtDokter = mysqli_query($koneksi, "SELECT * FROM nama_dokter");
$dtTindakan = mysqli_query($koneksi, "SELECT * FROM jenistindakan");

// Ambil data yang akan diedit


if(isset($_POST['update']))
{

    $id = $_POST['id'];

    $id_dokter = htmlspecialchars($_POST['id_dokter']);
    $ruang = htmlspecialchars($_POST['ruang']);
    $visite = htmlspecialchars($_POST['visite']);
    $konsul  = htmlspecialchars($_POST['konsul']);
    $id_tindakan  = htmlspecialchars($_POST['id_tindakan']);
    
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);


$delete = mysqli_query($koneksi, "UPDATE `rumahsakit` SET 
`tanggal` = '$tanggal',
`id_dokter` = '$id_dokter',
`ruang` = '$ruang',
`visite` = '$visite',
`konsul` = '$konsul',
`id_tindakan` = '$id_tindakan'
WHERE `id` = '$id';");



}   
?>
<?php
// $id = $_GET['id'];


// $result = mysqli_query($koneksi, "SELECT * FROM rumahsakit WHERE id='$id'");

 
// while($data = mysqli_fetch_array($result))
// {
//     $id = $data['id'];
//     $tanggal = $data['tanggal'];
//     $id_dokter = $data['id_dokter'];
//     $ruang = $data['ruang'];
//     $visite = $data['visite'];
//     $konsul = $data['konsul'];
//     $id_tindakan = $data['id_tindakan'];
    
// }



// Perbarui data berdasarkan ID
if ($result) {
    echo "<script>
            alert('Data Berhasil Diedit');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal Mengedit Data');
            document.location.href = 'index.php';
          </script>";
}
?>
