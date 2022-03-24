<html>
<head>
    <title>Invoice</title>
</head>
<body>
<?php
foreach ($invoice as $i) :
    ?>
<div class="card" >
  <div class="card-body">
    <div class="container">
			<div class="text-center">
				<table>
					<tr>
						<td width="30%"><img src="<?= base_url('assets/img/') ?>inv2.jpg" width="10px" height="10px" alt="berkat-mulia-sablon"></td>
						<td><p style="font-size: 14px; line-height: normal;" ><b>Berkat Mulia Sablon</b></p>
						<p style="font-size: 10px; line-height: normal;">Jl. Trikora (perumahan galuh marindu samping indomaret pom bensin trikora), <br> Kota Banjar Baru, Kalimantan Selatan 70713</p></td>
					</tr>
				</table>
				<!-- <div class="row">
					<div class="col-md-3">
						
					</div>
					<div class="col-md-6">
						
					</div>
				</div> -->
				
		</div>
      <p class="my-2 mx-2 center" style="font-size: 20px;"><b>Invoice Tagihan</b></p>
      <div class="row">
        <ul class="list-unstyled">
          <li class="text-black"><?=$i['nama_plg']?></li>
          <li class="text-muted "><span class="text-black">Invoice</span> #INV<?=$i['id_pemasukan']?></li>
		  <?php $date = date_create($i['tgl_pembelian']); ?>
          <li class="text-black"><?= date_format($date,"d F Y")?></li>
          </ul>
          <hr style="border:2px;">
      </div>
      </div>
	  <div class="row">
        <div class="col-xs-10">
			<p><?=$i['keterangan_cup']?> x <?=$i['jml_pembelian']?> pcs</p>
        </div>
        <hr style="border:2px;">
      </div>
	  <div class="row">
        <div class="col-xs-10">
          <p>Total Tagihan : Rp. <?=$i['total_tagihan']?></p>
        </div>
        <hr style="border:2px;">
      </div>
      <div class="row">
        <div class="col-xs-10">
          <p>Jumlah Dibayar : Rp. <?=$i['total_harga']?></p>
        </div>
        <hr style="border:2px;">
      </div>
      <div class="row">
        <div class="col-xs-10">
          <p>Sisa Tagihan : Rp. <?=$i['sisa_tagihan']?></p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="row text-black">
        <div class="col-xs-12">
          <p class="float-end fw-bold">Total : <?=$i['total_harga']?>
          </p>
        </div>
        <hr style="border: 2px solid black;">
		</div>
		<!-- <div class="text-center" style="margin-top: 5px;">
				<img src="<?= base_url('assets/img/') ?>logo0.png" class="rounded mx-auto d-block" width="5px" alt="berkat-mulia-sablon">
		</div> -->
	</div>
</div>
<?php endforeach ?>
</body>
</html>

