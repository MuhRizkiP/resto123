<center>
     <br>
     <h2>Selamat Datang <?= $_SESSION['nama_user'] ?></h2>
     <br>
     <div class="row">
          <div class="col">
               <div class="card text-bg-light mb-3 w-200" style="max-width: 18rem;">
                    <div class="card-header">Menu Tersedia</div>
                    <div class="card-body">
                         <h5 class="card-title">
                              <?php
                              $query_select_menu = $koneksi->query("SELECT * FROM menu");
                              $jumlahmenu = mysqli_num_rows($query_select_menu);
                              echo $jumlahmenu; ?>

                         </h5>
                         <hr>
                         <p class="card-text"><a href="#" class="btn btn-primary">Click Here For Detail</a></p>

                    </div>
               </div>
          </div>
          <div class="col">
               <div class="card text-bg-light mb-3 w-200" style="max-width: 18rem;">
                    <div class="card-header">Transaksi On Proses</div>
                    <div class="card-body">
                         <h5 class="card-title">
                              <?php
                              $query_count_onproses = $koneksi->query("SELECT COUNT(*) FROM transaksi WHERE status_transaksi='onproses'");                  
                              $row_count_onproses = $query_count_onproses->fetch_assoc();
                              $jumlah_onproses = $row_count_onproses['COUNT(*)'];
                              echo $jumlah_onproses;

                              ?>
                         </h5>
                         <hr>

                         <p class="card-text"><a href="#" class="btn btn-primary">Click Here For Detail</a></p>

                    </div>
               </div>
          </div>
          <div class="col">
               <div class="card text-bg-light mb-3 w-200" style="max-width: 18rem;">
                    <div class="card-header">Transaksi Selesai</div>
                    <div class="card-body">
                         <h5 class="card-title">
                         <?php
                              $query_count_selesai = $koneksi->query("SELECT COUNT(*) FROM transaksi WHERE status_transaksi='selesai'");                  
                              $row_count_selesai = $query_count_selesai->fetch_assoc();
                              $jumlah_selesai = $row_count_selesai['COUNT(*)'];
                              echo $jumlah_selesai;

                              ?>
                         </h5>
                         <hr>
                         <p class="card-text"><a href="#" class="btn btn-primary">Click Here For Detail</a></p>

                    </div>
               </div>
          </div>
     </div>
</center>