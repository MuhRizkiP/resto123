<?php
     $nama_kategori_menu    = $_POST['nama_kategori_menu'];
     $foto_kategori_menu    = $_FILES['foto_kategori_menu']['name'];
     
     // Folder Tempat Foto
     $targetLokasi          = "../../assets/image/kategori_menu/";
     
     // Pindahkan Gambar
     move_uploaded_file($_FILES['foto_kategori_menu']['tmp_name'],$targetLokasi.$foto_kategori_menu);
     $query = $koneksi->query("INSERT INTO kategori_menu VALUES('','$nama_kategori_menu','$foto_kategori_menu')");
     if ($query) 
     {
          ?>
               <script>
                    window.alert('Data berhasil disimpan!');
                    window.location.href='../layout/admin.php?page=kategori_menu';
               </script>
          <?php
     }
     else
     {
          ?>
               <script>
                    window.alert('Data gagal disimpan!');
                    window.location.href='../layout/admin.php?page=kategori_menu-create';
               </script>
          <?php
     }
?>