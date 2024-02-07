<!DOCTYPE html>
<html lang="en">

<?php
    require_once realpath(__DIR__ . "/vendor/autoload.php");
    require_once 'koneksi.php';

    $dtDokter = mysqli_query($koneksi, "SELECT * FROM nama_dokter");
    $dtTindakan = mysqli_query($koneksi, "SELECT * FROM jenistindakan");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <title>Document</title>
</head>

<body class="bg-success-subtle">
    <div class="container mt-5 mb-5">
        
            <div class="card card-info card-outline border-0 shadow-sm rounded">
            <div class="card-header">
                <div class="card-tools">
                    <a href="index.php" class="btn btn-success">Kembali<i class="fas fa-plus-square"></i></a>
                </div>
            </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">

                        <form action="add.php" method="POST">

                            <div class="form-group">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input required type="date" name="tanggal" class="form-control" id="tanggal" />
                            </div>

                            <div class="form-group">
                                <label for="dokter">Nama Dokter</label>
                                <select name="id_dokter" class="dokter form-control"  data-rel="chosen">
                                    <?php
                                    while ($row = $dtDokter->fetch_assoc()) {
                                        echo "<option value=" . $row['id_dokter'] . ">" . $row["nama_dokter"]. "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ruang">Ruang</label>
                                <select name="ruang" id="ruang" class="form-control " name="ruang">
                                    <option value="ICU 1">ICU 1</option>
                                    <option value="ICU 2">ICU 2</option>
                                    <option value="ICCU">ICCU</option>
                                    <option value="PICO NICO">PICU-NICU</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="visite">Visite</label>
                                <input type="number" name="visite" id="visite" class="form-control" placeholder="Visite" required>

                            </div>
                            <div class="form-group">
                                <label for="konsul">Konsul</label>
                                <input type="number" name="konsul" id="konsul" class="form-control" placeholder="Konsul" required>

                            </div>
                            <div class="form-group">
                                <label for="tindakan">Jenis Tindakan</label>
                                <select name="id_tindakan" class="tindakan form-control" data-rel="chosen">
                                    <?php
                                    while ($row = $dtTindakan->fetch_assoc()) {
                                        echo "<option value=" . $row['id_tindakan'] . ">" . $row["nama_pelayanan"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn mt-3 btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn mt-3 btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        
    </div>


</body>

<script type="text/javascript">
    $('.dokter').select2({});
    $('.tindakan').select2({});
</script>




</html>