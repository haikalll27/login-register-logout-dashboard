<?php  

$title = "Detail Mahasiswa";

include('../../layouts/header.php');

// MENGAMBIL ID_BARANG DARI URL
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5">
                <div class="">
                    <h1 class="text-dark fw-bold mb-3"><?= $title ?></h1>
                    <hr>
                </div>
                <form action="" method="">
                    <div class="row justify-content-center">
                        <div class="col-md-12" style="background: #25a78a; width: 100%; height: 550px;">
                            <div class="row justify-content-center">

                                <div class="col-md-5 text-center mb-3">
                                    <p class="fw-medium text-black text-center">Foto</p>
                                    <img src="../../../admin/assets/image/<?=($mahasiswa['image']) ?>" width="60%" height="80%" alt="">
                                </div>
                                <div class="col-md-7 mt-5">
                                    <div class="col-md-12 mb-3">
                                        <label for="name" class="fw-medium form-label">Nama</label>
                                        <input type="text" name="name" value="<?= $mahasiswa['name'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="fw-medium form-label">Email</label>
                                        <input type="email" name="email" value="<?= $mahasiswa['email'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="prodi" class="fw-medium form-label">Prodi</label>
                                        <input type="text" name="prodi" value="<?= $mahasiswa['prodi'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <label for="prodi" class="fw-medium form-label">Jenis Kelamin</label>
                                        <select class="form-select" aria-label="Default select example" readonly>
                                            <?php 
                                            $options = ['laki-laki', 'perempuan']; // Opsi yang mungkin
                                            foreach ($options as $option): ?>
                                                <option value="<?= $option ?>" <?= ($mahasiswa['jenis_kelamin'] == $option) ? 'selected' : ''; ?>>
                                                    <?= ucfirst($option) ?> <!-- Capitalize option value -->
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="telpon" class="fw-medium form-label">No Telpon</label>
                                        <input type="number" name="telpon" value="<?= $mahasiswa['telpon'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="text-center">
                                        <a href="../../pages/mahasiswa/index.php" class="btn btn-primary fw-medium" style="width: 100px;">Kembali</a>
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