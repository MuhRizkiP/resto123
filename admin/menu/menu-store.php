<?php
$id_kategori_menu    = $_POST['id_kategori_menu'];
$nama_menu    = $_POST['nama_menu'];
$deskripsi_menu    = $_POST['deskripsi_menu'];
$harga_menu    = $_POST['harga_menu'];
$status_menu    = $_POST['status_menu'];

//Ambil Foto
$foto_menu    = $_FILES['foto_menu']['name'];

// Folder Tempat Foto
$targetLokasi          = "../../assets/image/menu/";

// Pindahkan Gambar
move_uploaded_file($_FILES['foto_menu']['tmp_name'],$targetLokasi.$foto_menu);


$query = $koneksi->query("INSERT INTO menu VALUES ('',
                                                    '$id_kategori_menu',
                                                    '$nama_menu',
                                                    '$deskripsi_menu',
                                                    '$harga_menu',
                                                    '$status_menu',
                                                    '$foto_menu'
                                                    )");
if ($query) {
?>
    <script>
        window.alert('data berhasil disimpan!!');
        window.location.href = '../layout/admin.php?page=menu';
    </script>
<?php
} else {
?>
    <script>
        window.alert('data gagal disimpan!!');
        window.location.href = '../layout/admin.php?page=menu-create';
    </script>
<?php
}
?>