<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Arsip Surat</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Tabel Arsip Surat</li>
                    <li class="breadcrumb-item active">Detail Arsip Surat</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Lihat Arsip Surat</h5>
                  </div>
                  <div class="card-body">
                    <p><b>Nomor Surat : <?= $surat['nomor_surat'];?></b> </p>
                    <p><b>Kategori : <?= $surat['kategori'];?></b> </p>
                    <p><b>Judul : <?= $surat['judul'];?></b> </p>
                    <p><b>Waktu Unggah : <?= $surat['dibuat_pada'];?></b> </p>
                    <center><h3><p><b>FILE</b></p></h3></center>
                    <center>
                    <?php
                        
                        if ( $surat['namaberkas'] ) {
                        
                            echo '<embed src="'.base_url('assets/datapenting/' . $surat['namaberkas']).'" height="500px" width="100%" type="application/pdf"> <br>';
                        } else {
                    
                            echo '<img src="'.base_url('assets/Home/images/hero/cv.gif').'" style="width:50%; align:top;" alt="">;
                            <center><span>
                                   <br> <h5>Belum Ada File Arsip Surat
                                </span></h5></center>';
                        }
                        ?>
                    </center> <br><br>
                    <div class="btn-showcase">
                    <a href="<?= base_url('Admin/arsip'); ?>" class="btn btn-light"
                    type="submit">Cancel</a>
                       
                        <a href="<?= base_url('Admin/editarsip'); ?>" class="btn btn-success"
                                type="submit">edit/gantifile</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->