<?php  

$title = "Detail Barang";

include('../../layouts/header.php');

// MENGAMBIL ID_BARANG DARI URL
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

// CEK APAKAH TOMBOL/BUTTON EDIT BERFUNGSI

?>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5">
                <div class="">
                    <h1 class="text-dark fw-bold mb-3">Detail Data <?= $barang['name_barang'] ?></h1>
                    <hr>
                </div>
                <form action="" method="">
                    <!-- <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>"> -->
                    <div class="row justify-content-center">
                        <div class="col-md-12" style="background: #25a78a; width: 100%; height: 400px;">
                            <div class="row justify-content-center">
                                <div class="col-md-8 mb-3 mt-5">
                                        <label for="name_barang" class="fw-medium form-label">Nama Barang</label>
                                        <input type="text" name="name_barang" value="<?= $barang['name_barang'] ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="jumlah" class="fw-medium form-label">Jumlah Barang</label>
                                    <input type="number" name="jumlah" value="<?= $barang['jumlah'] ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="harga" class="fw-medium form-label">Harga Barang</label>
                                    <input type="number" name="harga" value="<?= $barang['harga'] ?>" class="form-control" readonly>
                                </div>
                                <div class="text-center">
                                    <a href="../../pages/barang/index.php" class="btn btn-primary fw-medium" style="width: 100px;">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

<?php  

include('../../layouts/footer.php');
include('../../layouts/script.php');

?>