<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="<?= base_url() ?>dashboard" aria-expanded="false"><i class="icon icon-home"></i><span class="nav-text">Dashboard</span></a></li>
            <li class="nav-label"><?= $this->session->userdata('SES-ROLE') ?></li>
            <li><a href="<?= base_url() ?>profil"><i class="fa fa-user"></i>Data Saya</a></li>
            <li class="nav-label">Master Data</li>
            <?php
            if($this->session->userdata('SES-ROLE') == 'admin'){ ?>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Data Bendahara</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url() ?>bendahara">List Bendahara</a></li>
                </ul>
            </li>
            <?php } ?>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Data Siswa</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url() ?>siswa">List Data Siswa</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Data Invoice</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url() ?>invoice">List Data Invoice</a></li>
                    <li><a href="<?= base_url() ?>invoice/add_mass">Tambah Semua Siswa</a></li>
                    <li><a href="<?= base_url() ?>invoice/add_one">Tambah Persiswa</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Data Laporan</span></a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url() ?>laporan">List Data Laporan</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>