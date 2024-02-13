<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= JUDUL ?> - Tambah Invoice Semua Siswa</title>
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
                                <h4 class="card-title">Tambah Data Invoice</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <!--<form autocomplete="off">-->
                                    <div class="form-row">
                                        <textarea id="nis_siswa" name="nis_siswa" hidden><?php foreach ($list as $siswa) {
                                                                                                echo $siswa->id_siswa . "\n";
                                                                                            } ?></textarea>
                                        <div class="form-group col-md-6">
                                            <label>Nama Pembayaran</label>
                                            <input type="text" class="form-control" id="nama_pembayaran" name="nama_pembayaran" placeholder="Nama Pembayaran" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Total Pembayaran</label>
                                            <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" placeholder="Total Pembayaran" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Tanggal Jatuh Tempo</label>
                                            <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Keterangan Invoice</label>
                                            <textarea class="form-control" rows="3" id="keterangan" name="keterangan"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary simpan"><i class="fa fa-save"></i> SIMPAN</button>
                                    <!--</form>-->



                                </div>
                            </div>
                            <center>
                                <div class="col-md-6" id="loader"></div>
                            </center>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group col-md-12">
                                        <label>Progres</label>
                                        <textarea class="form-control" id="hasil" rows="3" readonly="true"></textarea>
                                    </div>

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

    <script>
        $(document).ready(function() {
            $(".simpan").click(function() {
                var nis_siswa = $("#nis_siswa").val().split('\n');
                var nama_pembayaran = $("#nama_pembayaran").val().split('\n');
                var total_pembayaran = $("#total_pembayaran").val();
                var keterangan = $("#keterangan").val();
                var jatuh_tempo = $("#jatuh_tempo").val();
                var current = 0;
                var total = nis_siswa.length;
                if (nis_siswa.length == 0 || total_pembayaran.length == 0 || keterangan.length == 0 || jatuh_tempo.length == 0) {
                    swal({
                        text: "Form Tidak Boleh Kosong !",
                        icon: "error",
                        button: false,
                        timer: 1500,
                    });
                } else {
                    for (let i = 0; i < nis_siswa.length - 1; i++) {
                        var idnya = nis_siswa[i];
                        $("#loader").html('<h5 style="color: #FFF;font-weight: bold;"><b>Dalam Proses .... ' + idnya + '</b></h5><div class="progress progress-striped active"><div class="progress-bar" style="width: 50%"></div></div>');
                        $.ajax({
                            url: '<?= base_url("invoice/save_mass") ?>',
                            cache: false,
                            method: 'post',
                            data: {
                                nis_siswa: idnya,
                                nama_pembayaran: nama_pembayaran,
                                total_pembayaran: total_pembayaran,
                                keterangan: keterangan,
                                jatuh_tempo: jatuh_tempo,
                            },
                            success: function(result) {
                                d = JSON.parse(result);
                                if (d.type == "success") {
                                    $('#hasil').append(d.message + "\n");
                                } else {
                                    $('#hasil').append(d.message + "\n");
                                }
                            }
                        });
                    }


                    $("#loader").html('');
                    alert('Selesai');



                }
            });
        });
    </script>
</body>

</html>