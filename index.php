<?php
    require_once realpath(__DIR__."/vendor/autoload.php");
    require_once 'koneksi.php';

    $dtrumahsakit = mysqli_query($koneksi, "SELECT rumahsakit.id, rumahsakit.tanggal, nama_dokter.nama_dokter, rumahsakit.ruang, rumahsakit.visite, rumahsakit.konsul, jenistindakan.nama_pelayanan FROM `rumahsakit` JOIN jenistindakan on jenistindakan.id_tindakan = rumahsakit.id_tindakan JOIN nama_dokter on nama_dokter.id_dokter = rumahsakit.id_dokter");
    $idrumahsakit = mysqli_query($koneksi, "SELECT id FROM `rumahsakit`");
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <title>RUMAH SAKIT</title>

    
</head>

<body class="bg-success-subtle">

<div class="container mt-5">
        <div class="card card-info card-outline border-0 shadow-sm rounded">
            <div class="card-header">
                <div class="card-tools">
                    <a href="tambah.php" class="btn btn-primary">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Dokter</th>
                            <th scope="col">Ruang</th>
                            <th scope="col">Visite</th>
                            <th scope="col">Konsul</th>
                            <th scope="col">Jenis Tindakan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        
                        <?php while ($data = mysqli_fetch_array($dtrumahsakit)) { ?>
                            <tr>            
                                <td class="text-center" ><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                <td style="word-wrap: break-word; max-width: 160px;"><?= $data['nama_dokter'] ?></td>
                                <td style="word-wrap: break-word; max-width: 160px;"><?= $data['ruang'] ?></td>
                                <td style="word-wrap: break-word; max-width: 160px;"><?= $data['visite'] ?></td>
                                <td style="word-wrap: break-word; max-width: 160px;"><?= $data['konsul'] ?></td>
                                <td style="word-wrap: break-word; max-width: 160px;"><?= $data['nama_pelayanan']; ?></td>
                                <td>
                                    <div class="btn-group" style="display: flex; flex-wrap: wrap;">
                                        <a href="edit.php?id=<?= $data["id"] ?>" style="flex-grow: 1; min-width: 50%;" class="btn btn-warning" role="button">Edit</a>
                                        <a href="delete.php?id=<?=$data["id"]?>" onClick="return confirm('Are you sure you want to delete?')" style="flex-grow: 1; min-width: 50%;"class="btn btn-danger" role="button">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    


                    </thead>
                </table>
            </div>


        </div>
    </div>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>