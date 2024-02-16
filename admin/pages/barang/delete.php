<?php  

include('../../config/app.php');

// MENERIMA ID BARANG YANG DIPILIG PENGGUNA
$id_barang = (int)$_GET['id_barang'];
if (delete_barang($id_barang) > 0) {
    echo "<script>
            alert('Data Barang Berhasil Dihapus');
            window.location.href = 'index.php';
          </script>";
        exit; // Hindari pemrosesan tambahan setelah redirect
}else {
    echo "<script>
            alert('Data Barang Gagal Dihapus');
            window.location.href = 'index.php';
         </script>";
        exit; // Hindari pemrosesan tambahan setelah redirect
}

?>