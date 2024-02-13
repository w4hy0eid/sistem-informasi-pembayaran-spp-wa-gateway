<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= JUDUL ?> - Tambah Data</title>
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
                                <form action="<?= base_url("siswa/save") ?>" method="POST">
                                    <div>
                                        <hr>
                                        <h4>Data Siswa</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Nama Lengkap Siswa</label>
                                                        <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>NIS (Nomor Induk Sekolah)</label>
                                                        <input type="text" class="form-control" name="nis_siswa" placeholder="Nomor Induk Sekolah" maxlength="10" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <input type="text" class="form-control" name="kelas_siswa" placeholder="Kelas" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Tempat, Tanggal Lahir</label>
                                                        <input type="text" class="form-control" name="ttl_siswa" placeholder="Jakarta, 30 Juni 2000" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select name="jk_siswa" class="form-control" required>
                                                            <option selected="">Jenis Kelamin..</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="agama_siswa" class="form-control" required>
                                                            <option selected="">Pilih Agama..</option>
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
                                                        <label>Alamat Siswa</label>
                                                        <textarea class="form-control" rows="3" name="alamat_siswa" require></textarea>
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
                                                        <input type="text" name="nama_ortu" class="form-control" placeholder="Nama Orang Tua" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">No Handphone (Whatsapp)</label>
                                                        <input type="text" name="no_hp" class="form-control" placeholder="62xxxxxxxxx" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select name="jk_ortu" class="form-control" required>
                                                            <option selected="">Jenis Kelamin..</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select name="agama_ortu" class="form-control" required>
                                                            <option selected="">Pilih Agama..</option>
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
                                                        <textarea class="form-control" rows="3" name="alamat_ortu" require></textarea>
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