<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= JUDUL ?> - List Invoice</title>
    <link href="<?= base_url() ?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
            <div class="container-fluid">

                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Invoice</h4>
                            </div>
                            <div class="col text-right">
                                <a href="<?= base_url() ?>invoice/add_one" class="btn btn-facebook">Tambah Persiswa <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                <a href="<?= base_url() ?>invoice/add_mass" class="btn btn-instagram">Tambah Semua Siswa<span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                            </div>
                            <?php if ($this->session->flashdata('pesan') != null) { ?>
                                <p class="text-center"><?= $this->session->flashdata('pesan'); ?></p>
                            <?php } ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px; color:black;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Invoice</th>
                                                <th>NIS Siswa</th>
                                                <th>Total Pembayaran</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($list as $invoice) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $invoice->no_invoice ?></td>
                                                    <td><?= $invoice->id_siswa ?></td>
                                                    <td><?= "Rp " . number_format($invoice->jumlah_bayar, 0, ',', '.') ?></td>
                                                    <td><?= $invoice->keterangan ?></td>
                                                    <td><?php if ($invoice->status == "Sudah Bayar") { ?><button type="button" class="btn btn-success">SUDAH BAYAR</button><?php } elseif ($invoice->status == "Konfirmasi") { ?><button type="button" class="btn btn-warning">KONFIRMASI</button> <?php } else { ?><button type="button" class="btn btn-danger">BELUM BAYAR</button><?php } ?></td>
                                                    <td><a href="<?= base_url() ?>invoice/edit/<?= $invoice->no_invoice ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <button id="<?= $invoice->no_invoice ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i></button></td>
                                                </tr>
                                            <?php endforeach ?>

                                        </tbody>

                                    </table>
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
    <script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
    <?php $this->load->view("dashboard/partials/js") ?>
    <!-- Datatable -->
    <script src="<?= base_url() ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins-init/datatables.init.js"></script>
    <script type="text/javascript">
        //Delete Data POH
        $(document).ready(function() {
            $(".delete").click(function() {
                swal({
                        title: "Yakin ingin menghapus Data Invoice?",
                        text: "Data yang telah dihapus tidak dapat dikembalikan !",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var no_invoice = $(this).attr('id');
                            $.ajax({
                                method: 'post',
                                url: "<?= base_url() ?>invoice/hapus",
                                data: {
                                    no_invoice: no_invoice,
                                },
                                success: function(result) {
                                    d = JSON.parse(result);
                                    if (d.message == "success") {
                                        swal({
                                            text: "Data Berhasil dihapus !",
                                            icon: "success",
                                            button: false,
                                            timer: 1500,
                                        });
                                        setTimeout(function() {
                                            window.location = "<?= base_url() ?>invoice";
                                        }, 2000);
                                    } else {
                                        swal({
                                            text: "Data Gagal dihapus !",
                                            icon: "error",
                                            button: false,
                                            timer: 1500,
                                        });
                                    }

                                }
                            });
                        }

                    });
            });
        });
    </script>
</body>

</html>