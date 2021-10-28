 <!-- Page Sidebar Ends-->
        <div class="container-fluid">
          <div class="page-title">
            <div class="row">
              <div class="col-6">
                <h3>Arsip Surat</h3>
              </div>
              <div class="col-6">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item active">Arsip Surat</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Tabel Arsip Surat</h5><span><b>Berikut ini adalah surat-surat yang telah diterbitkan dan diarsipkan.
                  <br> Klik "Lihat" pada kolom aksi untuk menampilkan surat.</code>.</span></b><br>
                  <?php echo $this->session->flashdata('surat') ?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="basic-1">
                      <thead>
                        <tr>
                           <th> No </th>
                          <th>Nomor surat</th>
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Waktu Pengarsipan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;
                        foreach ($arsip as $ars) { ?>
                        <tr>
                        <td><?= $no++ ?></td>
                          <td><?= $ars['nomor_surat']; ?></td>
                          <td><?= $ars['kategori']; ?></td>
                          <td><?= $ars['judul']; ?></td>
                          <td><?= $ars['dibuat_pada']; ?></td>
                          <td>
											<!-- detail -->
											<a href="<?= base_url(); ?>admin/detailarsip/<?= $ars['id_surat'];?>"
												class="badge badge-secondary">
												<i class="fa fa-eye" aria-hidden="true"></i></a></a>

											<!-- cetak -->
											<a href="<?= base_url(); ?>admin/editarsip/ <?= $ars['id_surat'];?>"
												class="badge badge-success">
												<i class="fa fa-edit" aria-hidden="true"></i></a>

                                                <!-- hapus -->
											<!-- pop up  -->
											<a href="#" data-bs-toggle="modal"
												data-bs-target="#aksi-hapus-<?php echo $ars['id_surat'] ?>"
												class="badge badge-danger "> <i class="fa fa-trash"
													aria-hidden="true"></i></a>
											<div class="modal fade" id="aksi-hapus-<?php echo $ars['id_surat'] ?>"
												tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenter"
												aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-body">
															<h4>Hapus Akun</h4>
															<p>Apakah anda yakin ingin menghapus surat yang diterima
																pada :
																<b><?php echo date('d-m-Y', strtotime($ars['dibuat_pada'])) ?></b>
																<p>Perihal Surat<?php echo $ars['judul'];?></p>
															</p>
														</div>
														<div class="modal-footer">
															<button class="btn btn-primary btn-sm" type="button"
																data-bs-dismiss="modal">Batal</button>
															<a href="<?php echo base_url('Admin/deletesurat/' . $ars['id_surat']) ?>"
																class="btn btn-danger btn-sm" type="button"><i
																	class="fa fa-trash"></i> Hapus</a>
														</div>
													</div>
                                            </a>
										</td>
                                        <?php
                                                }
                                                ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <!-- Tambah Data -->
					<a href="<?= base_url('admin/tambahSuratarsip'); ?>" class="btn btn-outline-primary" type="button"
						data-original-title="btn btn-outline-danger-2x" style="width: 250px;">Arsipkan Surat</a>
                </div>
              </div>
            </div>
</div>
</div>
            <!-- Zero Configuration  Ends-->