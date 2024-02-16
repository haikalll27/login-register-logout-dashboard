<?php  

$title = "Data Barang";

include('../../layouts/header.php');

$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");
?>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt-5">
                <div class="">
                    <h1 class="text-dark fw-bold mb-3">Data Barang</h1>
                    <hr>
                    <a href="../../pages/barang/create.php" class="btn btn-primary mb-3">Tambah+</a>
                </div>
                <table id="table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_barang as $barang) : ?>
                    <tr>
                        <th><?= $no++; ?></th>
                        <td><?= $barang['name_barang'] ?></td>
                        <td><?= $barang['jumlah'] ?></td>
                        <td>Rp. <?= number_format($barang['harga'],0,',','.'); ?></td>
                        <td><?= date('D-M-Y | H:i:s', strtotime($barang['tanggal'])); ?></td>
                        <td widht="15%" class="text-center">
                            <a href="detail.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="edit.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="delete.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Data Barang Akan Dihapus?');">Delete</a>
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