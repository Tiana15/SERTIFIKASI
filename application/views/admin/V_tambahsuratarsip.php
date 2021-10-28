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
                    <form class="row needs-validation"
                        action="<?php echo base_url('admin/prosesTambahsurat') ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="col-sm-12">
                        <!-- <input class="form-control" name="id_surat" id="id_surat" type="text" placeholder="Isikan Nomor Surat"
                                    required="" hidden> -->
                            <div class="mb-3">
                                <label for="nomor_surat">Nomor Surat </label>
                                <input class="form-control" name="nomor_surat" id="nomor_surat" type="text" placeholder="Isikan Nomor Surat"
                                    required="">
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="kategori">Kategori : </label>
                                    <select class="form-select form-control-lg digits" name="kategori" id="kategori"
                                        required="">
                                        <option selected="" disabled="" value="">Pilih Kategori</option>
                                        <option value="undangan">Undangan</option>
                                        <option value="pengumuman">Pengumuman</option>
                                        <option value="nota_dinas">Nota Dinas</option>
                                        <option value="pemberitahuan">Pemberitauan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="judul">Judul : </label>
                                <input class="form-control" name="judul" id="judul" type="text" placeholder="Isikan Perihal"
                                    required="">
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="namaberkas">Upload Data | Data berupa PDF</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="file" id="upload" placeholder="Foto Berupa JPEG,JPG Dan PNG"
                                            name="namaberkas[]" required multiple>
                                    </div>
                                </div>

    

                    </form>
                    <div class="btn-showcase">
                    <button class="btn btn-primary" type="submit">Save
                            Data</button>
                        <input class="btn btn-light" type="reset" value="Reset">
                        <a href="<?= base_url('Admin/arsip'); ?>" class="btn btn-light"
                                type="submit">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Container-fluid Ends-->