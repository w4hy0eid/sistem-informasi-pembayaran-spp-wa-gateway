<html>

<head>
    <title></title>
    <style>
        * {
            margin-right: 15px;
            margin-left: 7px;
            padding: 0;
        }

        body {
            font-family: arial narrow;
            font-size: 14px;
        }

        .tdrh {
            border: 1px solid #000000;
            font-weight: bold;
            text-align: center;
        }

        .tdrh0 {
            border: 1px solid #5A5A5A;
            text-align: center;
            font-size: 10px;
            padding-left: 2px;
            padding-right: 2px;
        }

        .tdrc1 {
            border: 1px solid #5A5A5A;
            padding-left: 5px;
            padding-right: 5px;
        }

        .tdrc2 {
            border: 1px solid #ddd;
            width: 100%;
            padding-left: 5px;
            padding-right: 5px;
        }

        img {
            padding: 0 0 0 15%;
            width: 6%;
            position: fixed;
        }
    </style>
</head>

<body>
    <center>
        <font size="4"><b>LAPORAN SPP</b>
    </center>
    </font>
    <div class="top">
							<div colspan="3">
								<table>
									<tr>
										<td>
                                        <b>Periode : <?=$this->input->post("tanggal_awal")?> - <?=$this->input->post("tanggal_akhir")?></b>
										</td>
									</tr>
								</table>
							</div>
						</div>
<br>
     <table width="100%" cellspacing="0" cellpadding="0" align="center">
     <thead>
         <tr>
             <td class="tdrh">No</td>
             <td class="tdrh">No Invoice</td>
             <td class="tdrh">Nama Siswa</td>
             <td class="tdrh">No Hp</td>
             <td class="tdrh">Tanggal</td>
            </tr>
            </thead>
            <tbody>
            <?php $no = 1;foreach ($laporan as $laporan): ?>
                <tr>
                    <td class="tdrc1" style="text-align: center;"><?=$no++;?></td>
                    <td class="tdrc1" style="text-align: center;"><?=$laporan->no_invoice?></td>
                    <td class="tdrc1" style="text-align: center;"><?=$laporan->nama_siswa?></td>
                    <td class="tdrc1" style="text-align: center;"><?=$laporan->no_tlp?></td>
                    <td class="tdrc1" style="text-align: center;"><?=$laporan->tanggal?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>

</html>