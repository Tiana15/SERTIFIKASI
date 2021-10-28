
<div class="page-body">
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>ARSIPKAN SURAT</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Tabel ARSIP</li>
                    <li class="breadcrumb-item active">Tambah Arsip Surat</li>
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
                    <h5>Unggah Arsip Surat</h5> <br> <p> Unggah Surat Yang Telah Terbit Pada Form Ini Untuk Di Arsipkan Catatan : <br> <b> Gunakan File berfomat PDF </b>
                </div>
                <div class="card-body add-post">
                    <form class="row needs-validation" method="POST" action="<?php echo site_url('Admin/proseseditarsip');?>" enctype="multipart/form-data">
                        <div class="col-sm-12">
                        <input type="hidden" name="id_surat" <?= $surat['id_surat']; ?>">
                            <div class="mb-3">
                                <label for="nomor_surat">Nomor Surat </label>
                                <input class="form-control" name="nomor_surat" id="nomor_surat" type="text" placeholder="Isikan Nomor Surat"
                                    required="" value="<?= $surat['nomor_surat']; ?>">
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="kategori">kategori</label>
                                    <select class="form-select form-control-lg digits" name="kategori"
                                        value="<?= $surat['kategori']; ?>" required="">
                                        <option selected="" disabled="" value="">Pilih kategori</option>
                                        <option value="undangan"
                                        <?php if ($surat['kategori'] == "undangan") echo 'selected="selected"'; ?>>
                                        undangan</option>
                                    <option value="nota_dinas"
                                        <?php if ($surat['kategori'] == "nota_dinas") echo 'selected="selected"'; ?>>
                                        Nota Dinas</option>
                                    <option value="pemberitahuan"
                                        <?php if ($surat['kategori'] == "pemeberitahuan") echo 'selected="selected"'; ?>>
                                        pemberitahuan</option>
                                    <option value="pengumuman"
                                        <?php if ($surat['kategori'] == "pengumuman") echo 'selected="selected"'; ?>>
                                        pengumuman</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="judul">Judul : </label>
                                <input class="form-control" name="judul" id="judul" type="text" placeholder="Isikan Perihal"
                                value="<?= $surat['judul']; ?>" required="">
                            </div>
                            
                            <div class="mb-3">
                            <label class="form-label" id="namaberkas">Foto</label>
                            <input name="namaberkas" class="form-control" type="file" rows="3" cols="50" aria-label="file example" required="" id="namaberkas">
                            <div class="invalid-feedback">Anda Belum Upload Foto</div>
                          </div>
                        </div>

                        <div class="btn-showcase">
                    <button class="btn btn-primary" type="submit" value="simpan" >Simpan Data</button>
                        <input class="btn btn-light" type="reset" value="Reset">
                        <a href="<?= base_url('Admin/arsip'); ?>" class="btn btn-light"
                                type="submit">Cancel</a>
                    </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- Container-fluid Ends-->