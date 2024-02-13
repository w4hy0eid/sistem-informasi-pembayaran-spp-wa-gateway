<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= JUDUL ?> - Ubah Invoice</title>
    <?php $this->load->view("dashboard/partials/css") ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                <h4 class="card-title">Ubah Invoice</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <?php if ($this->session->flashdata('pesan') != null) { ?>
                                        <p class="text-center"><?= $this->session->flashdata('pesan'); ?></p>
                                    <?php } ?>
                                    <form action="<?= base_url("invoice/save_edit") ?>" method="POST">
                                        <div class="form-row">
                                            <input type="hidden" value="<?= $edit->no_invoice ?>" name="no_invoice" readonly="true" required>
                                            <div class="form-group col-md-6">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" placeholder="Nama Siswa" value="<?= $edit->nama_siswa ?>" readonly="true" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Nama Pembayaran</label>
                                                <input type="text" class="form-control" placeholder="Nama Pembayaran" value="<?= $edit->nama_pembayaran ?>" readonly="true" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Total Pembayaran</label>
                                                <input type="text" class="form-control" readonly="true" placeholder="Total Pembayaran" value="<?= $edit->jumlah_bayar ?>" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Tanggal Jatuh Tempo</label>
                                                <input type="date" class="form-control" readonly="true" value="<?= $edit->jatuh_tempo ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Keterangan Invoice</label>
                                                <textarea class="form-control" rows="3" readonly="true"><?= $edit->keterangan ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <option selected="" value="<?= $edit->status ?>"><?= $edit->status ?></option>
                                                        <option value="Belum Bayar">Belum Bayar</option>
                                                        <option value="Konfirmasi">Konfirmasi</option>
                                                        <option value="Sudah Bayar">Sudah Bayar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
                                    </form>
                                </div>
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
    <!-- Datatable -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-siswa').select2();
        });
    </script>
</body>

</html>