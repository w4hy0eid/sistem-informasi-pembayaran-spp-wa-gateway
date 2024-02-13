<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=JUDUL?> - List Laporan</title>
    <link href="<?=base_url()?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="<?=base_url()?>assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
       <!-- Pick date -->
       <link rel="stylesheet" href="<?=base_url()?>assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendor/pickadate/themes/default.date.css">
    <?php $this->load->view("dashboard/partials/css")?>
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
        <?php $this->load->view("dashboard/partials/header")?>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <?php $this->load->view("dashboard/partials/sidebar")?>

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
                                <h4 class="card-title">Data Laporan</h4>
                            </div>
                            <form id="formlaporan" action="<?=base_url()?>laporan/print_laporan" method="post">
                            <div class="row text-right">
                                            <div class="col-6 mt-1 ">
												<span>Periode</span>
											</div>
											<div class="col-2">
												<input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?=date("Y-m-d")?>">
											</div>
                                            <div class="col-1 text-center"> <b>-</b> </div>
											<div class="col-2">
												<input type="date"  name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?=date("Y-m-d")?>">

											</div>
                                            <div class="col-1">
                                            <button type="submit" class="btn btn-md btn-success btn-icon-split">
													<span class="icon"><i class="fa fa-print"></i> Print</span>
												</button>
                                            </div>
										</div>

                                    </div>
                                </form>
                                            <?php if ($this->session->flashdata('pesan') != null) {?>
                                <p class="text-center"><?=$this->session->flashdata('pesan');?></p>
                            <?php }?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px; color:black;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Invoice</th>
                                                <th>Nama Siswa</th>
                                                <th>No Hp</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
foreach ($list as $laporan): ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <td><?=$laporan->no_invoice?></td>
                                                    <td><?=$laporan->nama_siswa?></td>
                                                    <td><?=$laporan->no_tlp?></td>
                                                    <td><?=$laporan->tanggal?></td>
                                                </tr>
                                            <?php endforeach?>

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
        <?php $this->load->view("dashboard/partials/footer")?>
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
    <script src="<?=base_url()?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/sweetalert.min.js"></script>
    <?php $this->load->view("dashboard/partials/js")?>
    <!-- Datatable -->
    <script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins-init/datatables.init.js"></script>
    <script src="<?=base_url()?>assets/vendor/moment/moment.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
     <!-- pickdate -->
     <script src="<?=base_url()?>assets/vendor/pickadate/picker.js"></script>
    <script src="<?=base_url()?>assets/vendor/pickadate/picker.date.js"></script>



    <!-- Daterangepicker -->
    <script src="<?=base_url()?>assets/js/plugins-init/bs-daterange-picker-init.js"></script>
</body>

</html>