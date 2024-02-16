<?php  

$title = "Create Barang";

include('../../layouts/header.php');

// CEK APAKAH TOMBOL/BUTTON TAMBAH BERFUNGSI
if (isset($_POST['tambah'])) {
    if (create_barang($_POST) > 0) {
        echo "<script>
                alert('Data Barang Berhasil Ditambahkan');
                window.location.href = 'index.php';
            </script>";
        exit; // Hindari pemrosesan tambahan setelah redirect
    } else {
        echo "<script>
                alert('Data Barang Gagal Ditambahkan');
                window.location.href = 'index.php';
            </script>";
        exit; // Hindari pemrosesan tambahan setelah redirect
    }
}


?>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5">
                <div class="">
                    <h1 class="text-dark fw-bold mb-3">Buat Barang</h1>
                    <hr>
                </div>
                <form action="" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-md-12" style="background: #25a78a; width: 100%; height: 400px;">
                            <div class="row justify-content-center">
                                <div class="col-md-8 mt-5">
                                    <div class="col-md-12 mb-3">
                                        <label for="name_barang" class="fw-medium form-label">Nama Barang</label>
                                        <input type="text" name="name_barang" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="jumlah" class="fw-medium form-label">Jumlah Barang</label>
                                        <input type="number" name="jumlah" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="harga" class="fw-medium form-label">Harga Barang</label>
                                        <input type="number" name="harga" class="form-control" required>
                                    </div>
                                    <div class="text-center">
                                        <a href="../../pages/barang/index.php" class="btn btn-primary fw-medium me-lg-5" style="width: 100px;">Kembali</a>
                                        <button type="submit" name="tambah" class="btn btn-primary fw-medium" style="width: 100px;">Tambah</button>
                                    </div>
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