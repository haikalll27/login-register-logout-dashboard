<?php  

$title = "Data Mahasiswa";

include('../../layouts/header.php');
// include('../../layouts/navbar.php');
// include('../../layouts/sidebar.php');

// Menyertakan file controller.php
require_once('../../config/controller.php');

// Memanggil fungsi select untuk mendapatkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5">
                <div class="">
                    <h1 class="text-dark fw-bold mb-3"><?= $title ?></h1>
                    <hr>
                    <a href="../../pages/mahasiswa/create.php" class="btn btn-primary mb-3">Tambah+</a>
                </div>
                <table id="table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telpon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                    <tr>
                        <th><?= $no++; ?></th>
                        <td><?= $mahasiswa['name'] ?></td>
                        <td><?= $mahasiswa['prodi'] ?></td>
                        <td><?= $mahasiswa['jenis_kelamin'] ?></td>
                        <td><?= $mahasiswa['telpon'] ?></td>
                        <td widht="15%" class="text-center">
                            <a href="detail.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="edit.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="delete.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Barang Akan Dihapus?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>

<?php  

include('../../layouts/footer.php');
include('../../layouts/script.php');

?>