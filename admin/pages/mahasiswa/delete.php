<?php  

include('../../config/app.php');

// MENERIMA ID BARANG YANG DIPILIG PENGGUNA
$id_mahasiswa = (int)$_GET['id_mahasiswa'];
if (delete_mahasiswa($id_mahasiswa) > 0) {
    echo "<script>
            alert('Data Mahasiswa Berhasil Dihapus');
            window.location.href = 'index.php';
          </script>";
        exit; // Hindari pemrosesan tambahan setelah redirect
}else {
    echo "<script>
            alert('Data Mahasiswa Gagal Dihapus');
            window.location.href = 'index.php';
         </script>";
        exit; // Hindari pemrosesan tambahan setelah redirect
}

?>