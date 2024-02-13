<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= JUDUL ?> - Ubah Data</title>
    <?php $this->load->view("dashboard/partials/css") ?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <?php $this->load->view("dashboard/partials/header") ?>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <?php $this->load->view("dashboard/partials/sidebar") ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container">

                <!-- row -->

                <div class="row">
                    <div class="col-xl-12 col-xxl-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url("siswa/save_edit") ?>" method="POST">
                                    <div>
                                        <hr>
                                        <h4>Data Siswa</h4>
                                        <section>
                                            <div class="row">
                                                <input type="hidden" name="id_siswa" value="<?= $edit->id_siswa ?>" required>
                                                <input type="hidden" name="nis_lama" value="<?= $edit->id_siswa ?>" required>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap Siswa</label>
                                                        <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa" value="<?= $edit->nama_siswa ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>NIS (Nomor Induk Sekolah)</label>
                                                        <input type="text" class="form-control" name="nis_siswa" placeholder="Nomor Induk Sekolah" value="<?= $edit->id_siswa ?>" maxlength="10" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <input type="text" class="form-control" name="kelas_siswa" placeholder="Kelas" value="<?= $edit->kelas_siswa ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Tempat, Tanggal Lahir</label>
                                                        <input type="text" class="form-control" name="ttl_siswa" placeholder="Jakarta, 30 Juni 2000" value="<?= $edit->ttl_siswa ?>" required>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select name="jk_siswa" class="form-control" required>
                                                            <option selected="" value="<?= $edit->jk_siswa ?>"><?= $edit->jk_siswa ?></option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="agama_siswa" class="form-control" required>
                                                            <option selected="" value="<?= $edit->agama_siswa ?>"><?= $edit->agama_siswa ?></option>
                                                            <option value="Buddha">Buddha</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Katolik">Katolik</option>
                                                            <option value="Khonghucu">Khonghucu</option>
                                                            <option value="Protestan">Protestan</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div> -->

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Alamat Siswa</label>
                                                        <textarea class="form-control" rows="3" name="alamat_siswa" require><?= $edit->alamat_siswa ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </section>
                                        <hr>
                                        <h4>Data Ortu</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Nama Orang Tua</label>
                                                        <input type="text" name="nama_ortu" class="form-control" placeholder="Nama Orang Tua" value="<?= $edit->nama_ortu ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">No Handphone (Whatsapp)</label>
                                                        <input type="text" name="no_hp" class="form-control" placeholder="62xxxxxxxxx" value="<?= $edit->no_hp ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select name="jk_ortu" class="form-control" required>
                                                            <option selected="" value="<?= $edit->jk_ortu ?>"><?= $edit->jk_ortu ?></option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="agama_ortu" class="form-control" required>
                                                            <option selected="" value="<?= $edit->agama_ortu ?>"><?= $edit->agama_ortu ?></option>
                                                            <option value="Buddha">Buddha</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Katolik">Katolik</option>
                                                            <option value="Khonghucu">Khonghucu</option>
                                                            <option value="Protestan">Protestan</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Alamat Orang Tua</label>
                                                        <textarea class="form-control" rows="3" name="alamat_ortu" require><?= $edit->alamat_ortu ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
                                    </div>
                                </form>



                            </div>
                        </div>




                    </div>

                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php $this->load->view("dashboard/partials/footer") ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <?php $this->load->view("dashboard/partials/js") ?>
</body>

</html>