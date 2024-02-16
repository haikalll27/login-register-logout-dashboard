<?php  

include(__DIR__ . '/database.php');

// Memastikan fungsi select() hanya dideklarasikan jika belum ada
if (!function_exists('select')) {
    function select($query) {
        // LOGIC PANGGIL KONEKSI DATABASE
        global $koneksi;

        $result = mysqli_query($koneksi, $query);
        $rows   = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
}

//*============================================================* OPEN CONTROLLER BARANG *============================================================*\\
// FUNGSI MENAMBAHKAN DATA BARANG
function create_barang($post) {
    global $koneksi;

    $name_barang   = strip_tags($post['name_barang']);
    $jumlah        = strip_tags($post['jumlah']);
    $harga         = strip_tags($post['harga']);

    // QUERY TAMBAH DATA 
    $query = "INSERT INTO barang VALUES(null, '$name_barang', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// FUNGSI EDIT DATA BARANG
function update_barang($post) {
    global $koneksi;

    $id_barang     = strip_tags($post['id_barang']);
    $name_barang   = strip_tags($post['name_barang']);
    $jumlah        = strip_tags($post['jumlah']);
    $harga         = strip_tags($post['harga']);

    // QUERY EDIT DATA 
    $query = "UPDATE barang SET name_barang = '$name_barang', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// FUNGSI DELETE DATA BARANG
function delete_barang($id_barang) {
    global $koneksi;

    // QUERY DELETE DATA BARANG
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}
//*============================================================* CLOSE CONTROLLER BARANG *============================================================*\\

//*============================================================* OPEN CONTROLLER MAHASISWA *============================================================*\\
// FUNGSI MENAMBAHKAN DATA MAHASISWA
function create_mahasiswa($post) {
    global $koneksi;

    $name           = strip_tags($post['name']);
    $email          = strip_tags($post['email']);
    $prodi          = strip_tags($post['prodi']);
    $jenis_kelamin  = strip_tags($post['jenis_kelamin']);
    $telpon         = strip_tags($post['telpon']);

    // Panggil fungsi upload_file() untuk mengunggah gambar
    $image      = upload_file();

    // Cek apakah upload gambar berhasil
    if ($image === false) {
        // Jika upload gagal, mungkin Anda ingin menangani ini sesuai kebutuhan
        echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
        return false;
    }

    // Query tambah data
    $query = "INSERT INTO mahasiswa (name, email, prodi, jenis_kelamin, telpon, image) VALUES ('$name', '$email', '$prodi', '$jenis_kelamin', '$telpon', '$image')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// FUNGSI MENAMBAHKAN GAMBAR
function upload_file() {
    $namaFile   = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error      = $_FILES['image']['error'];
    $tmpName    = $_FILES['image']['tmp_name'];

    // CHECK UKURAN IMAGE
    $extensifileValid   = ['png', 'jpeg', 'jpg'];
    $extensifile        = explode('.', $namaFile);
    $extensifile        = strtolower(end($extensifile));

    // CHECK FORMAT / EXTENSI FILE
    if (!in_array($extensifile, $extensifileValid)) {
        // PESAN GAGAL
        echo "<script>
                alert('Format File Tidak Valid');
                document.localtion.href = 'create.php';
              </script>";
        die();
    }

    if ($ukuranFile > 2048000) {
        // PESAN GAGAL
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.localtion.href = 'create.php';
             </script>";
        die();
    }

    // GENERATE NAME FILE BARU
    $namaFileBaru    = uniqid();
    $namaFileBaru   .= '.';
    $namaFileBaru   .= $extensifile;

    // PINDAHKAN KE LOCAL FOLDER
    move_uploaded_file($tmpName, '../../../admin/assets/image/'. $namaFileBaru);
    return $namaFileBaru;

}



// FUNGSI EDIT DATA BARANG
function update_mahasiswa($post) {
    global $koneksi;

    $id_mahasiswa   = strip_tags($post['id_mahasiswa']);
    $name           = strip_tags($post['name']);
    $email          = strip_tags($post['email']);
    $prodi          = strip_tags($post['prodi']);
    $jenis_kelamin  = strip_tags($post['jenis_kelamin']);
    $telpon         = strip_tags($post['telpon']);
    $image          = strip_tags($post['image']);

    // QUERY EDIT DATA 
    $query = "UPDATE mahasiswa SET name = '$name', email = '$email', prodi = '$prodi', jenis_kelamin = '$jenis_kelamin', telpon = '$telpon', image = '$image' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


// FUNGSI DELETE DATA BARANG
function delete_mahasiswa($id_mahasiswa) {
    global $koneksi;

    // QUERY DELETE DATA MAHASISWA
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}
//*============================================================* CLOSE CONTROLLER MAHASISWA *============================================================*\\
?>
