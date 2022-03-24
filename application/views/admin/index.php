<!-- Begin Page Content -->
<div class="container-fluid">
  <?php 
foreach ($tanggal_grafik0 as $data_tanggal) {
   //$nama[] = $data_pie->nama;
 $tanggal_grafik2[] = date('F Y', strtotime($data_tanggal->tgl_pembelian));
 $tanggal_grafik4[] = date('F Y', strtotime($data_tanggal->tgl_pembelian));
 $tanggal_grafik2_bulan[] = date('m', strtotime($data_tanggal->tgl_pembelian));
 $tanggal_grafik2_tahun[] = date('Y', strtotime($data_tanggal->tgl_pembelian));
 $tanggal_grafik3_bulan[] = date('m', strtotime($data_tanggal->tgl_pembelian));
 $tanggal_grafik3_tahun[] = date('Y', strtotime($data_tanggal->tgl_pembelian));
 $tanggal_grafik5_bulan[] = date('m', strtotime($data_tanggal->tgl_pembelian));
 $tanggal_grafik5_tahun[] = date('Y', strtotime($data_tanggal->tgl_pembelian));
}

?>

<?php foreach ($tanggal_grafik_tahun as $tahun) {
  $tanggal_grafik3[] = $tahun->tahun;
} 
//echo $tanggal_grafik3[1];
?>

<?php foreach ($tanggal_grafik_tahun as $tahun) {
  $tanggal_grafik5[] = $tahun->tahun;
} 
//echo $tanggal_grafik3[1];
?>


<?php 
foreach ($tanggal_grafik22 as $tanggal) {
   $tgl[] =  date('F Y', strtotime($tanggal['tgl_pembelian']));
 } ?>

<?php
foreach ($tanggal_grafik33 as $tanggal3) {
   $tgl3[] =  date('F Y', strtotime($tanggal['tgl_pembelian']));
 } ?>

<?php
foreach ($tanggal_grafik55 as $tanggal5) {
   $tgl5[] =  date('F Y', strtotime($tanggal['tgl_pembelian']));
 } ?>


<?php 
foreach ($grafik22 as $tanggal) {
   $data2[] = $tanggal['total'];
 } ?>
<br>

<?php 
foreach ($grafik11 as $tanggal) {
   $data1[] = $tanggal['total'];
 } ?>

 <br>

<?php 
foreach ($grafik33 as $tanggal) {
   $data3[] = $tanggal['total'];
 } ?>

<?php 
foreach ($grafik55 as $tanggal) {
   $data5[] = $tanggal['total_order'];
 } ?>

<?php
 // $i=0;
 //  foreach ($grafik as $key ) {
 //    $hitung = $data1[$i] - $data2[$i];
 //    if ($data1[$i] > $data2[$i]) {
 //      $data0[]= $tgl[$i]." Untung (Rp.".$hitung.")";
 //    }else{
 //      $data0[] = $tgl[$i]." Rugi (Rp.".$hitung.")";
 //    }
   
 //   $i++;
 // } ?>

 <?php
$i = 0;
if ($kas_masuk_g == $kas_keluar_g) {
  foreach ($grafik as $key ) {
    $hitung = $data1[$i] - $data2[$i];
    if ($data1[$i] > $data2[$i]) {
      $data0[]= $tgl[$i]." Untung (Rp.".$hitung.")";
    }else{
      $data0[] = $tgl[$i]." Rugi (Rp.".$hitung.")";
    }
   
   $i++;
 }
}else{
  $min = min($kas_masuk_g, $kas_keluar_g);
  for ($i=0; $i < $min ; $i++) {
    $hitung = $data1[$i] - $data2[$i];
    if ($data1[$i] > $data2[$i]) {
      $data0[]= $tgl[$i]." Untung (Rp.".$hitung.")";
    }else{
      $data0[] = $tgl[$i]." Rugi (Rp.".$hitung.")";
    }
  }
}

?>
<!-- 
 <?= json_encode($data0) ?> -->


  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <br>
  <div class="row">


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($kas_masuk['total_harga']) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-hand-holding-usd fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= number_format($kas_keluar['jml_pengeluaran']) ?></div>
                </div>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-hands fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendapatan Bersih</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($kas_masuk['total_harga'] - $kas_keluar['jml_pengeluaran']) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-12 col-lg-7">

      <!-- Area Chart -->
      <div class="card shadow mb-4">
       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Statistik pendapatan bersih <?= $tanggal_; ?></h6>

        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php 
            $ii = 0;
            foreach ($tanggal_grafik_tahun as $key) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik3[$ii]; ?>"><?php echo $tanggal_grafik3[$ii] ?></a>
          <?php $ii++; 
        } ?>
          </div>
        </div>

      </div>
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div>
        <hr>
       
      </div>
    </div>

    <!-- Bar Chart -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Bar Chart <?=  $tanggal_; ?></h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php 
            $ii = 0;
            foreach ($tanggal_grafik_tahun as $key) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik3[$ii]; ?>"><?php echo $tanggal_grafik3[$ii] ?></a>
          <?php $ii++; 
        } ?>
          </div>
        </div>
      </div>
      <div class="card-body">
      <div class="row">
                <?php
          $this->db->select_sum('jml_pengeluaran');
          $this->db->where('YEAR(tgl_pengeluaran)', $tanggal_);
          $query1 = $this->db->get('tbl_pengeluaran')->result_array();
          ?>
          <?php
          $this->db->select_sum('total_harga');
          $this->db->where('YEAR(tgl_pembelian)', $tanggal_);
          $query2 = $this->db->get('tbl_pemasukan')->result_array();
          ?>

          <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                            <?php
          $i = 1;
          foreach ($query1 as $avg_pengeluaran) : ?>
           <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-danger">Total Pengeluaran</div>
          <div class="mb-0 font-weight-bold text-gray-800">Rp <?= number_format($avg_pengeluaran['jml_pengeluaran']) ?></div>
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-danger">Rata-Rata Pengeluaran</div>
          <div class="mb-0 font-weight-bold text-gray-800">Rp <?= number_format($avg_pengeluaran['jml_pengeluaran']/count($data0)) ?></div>
          <!-- echo $avg_pengeluaran['jml_pengeluaran']"; -->
          <?php $i++;
          endforeach ?>
                </div>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-hands fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                            <?php
          $b = 1;
          foreach ($query2 as $avg_pemasukan) : ?>
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-success">Total Pemasukan</div>
          <div class="mb-0 font-weight-bold text-gray-800">Rp <?= number_format($avg_pemasukan['total_harga']) ?></div>
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-success">Rata-Rata Pemasukan</div>
          <div class="mb-0 font-weight-bold text-gray-800">Rp <?= number_format($avg_pemasukan['total_harga']/count($data0)) ?></div>
          <!-- echo $avg_pengeluaran['jml_pengeluaran']"; -->
          <?php $b++;
          endforeach ?>
                </div>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw fa-hands fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
      
      </div>

        <div class="chart-bar">
          <canvas id="myBarChart"></canvas>
        </div>
        <hr>
        
      </div>


    </div>

    <!-- Area Chart -->
      <div class="card shadow mb-4">
       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Statistik Penjualan Cup <?= $tanggal_; ?></h6>

        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php 
            $ii = 0;
            foreach ($tanggal_grafik_tahun as $key) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik3[$ii]; ?>"><?php echo $tanggal_grafik3[$ii] ?></a>
          <?php $ii++; 
        } ?>
          </div>
        </div>

      </div>
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myCupChart1"></canvas>
        </div>
        <hr>
       
      </div>
    </div>

		   <!-- Area Chart -->
			 <div class="card shadow mb-4">
       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Statistik Order Cup <?= $tanggal_; ?></h6>

        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php 
            $iii = 0;
            foreach ($tanggal_grafik_tahun as $key) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik5[$iii]; ?>"><?php echo $tanggal_grafik5[$iii] ?></a>
          <?php $iii++; 
        } ?>
          </div>
        </div>

      </div>
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myCupChart2"></canvas>
        </div>
        <hr>
       
      </div>
    </div>

    

  </div>
  <div class="col-xl-12 col-lg-7">
  <hr>
  </div>
  <div class="col-xl-12 col-lg-7">
  <hr>
  </div>

  <!-- Donut Chart -->
  <div class="col-xs-12 col-xl-6 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $tanggal_g ?> - Cup</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php for ($i=0; $i < $tanggal_transaksi ; $i++) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik2_tahun[$i]."/".$tanggal_grafik2_bulan[$i] ?>"><?php echo $tanggal_grafik2[$i] ?></a>
          <?php } ?>
            
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4">
          <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">

          <hr>
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Nama Cup</th>
                            <th >Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($grafik_pie as $data_pie) : ?>
                            <tr>
                                <th ><?= $i ?></th>
                                <td><?= $data_pie->nama_cup ?></td>
                                <td><?= $data_pie->total ?></td>
                            </tr>
                        <?php $i++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-xl-6 col-lg-6">

    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $tanggal_g ?> - Pelanggan</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php for ($i=0; $i < $tanggal_transaksi ; $i++) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik2_tahun[$i]."/".$tanggal_grafik2_bulan[$i] ?>"><?php echo $tanggal_grafik2[$i] ?></a>
          <?php } ?>
            
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4">
          <canvas id="myPieChart1"></canvas>
        </div>
        <div class="mt-4 text-center small">

          <hr>
            <div class="table-responsive">
                <table class="table table-hover display" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Nama Pelanggan</th>
                            <th >Jumlah Orderan Cup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($grafik_pie_plg as $data_plg) : ?>
                            <tr>
                                <th ><?= $i ?></th>
                                <td><?= $data_plg->nama_plg ?></td>
                                <td><?= $data_plg->total ?></td>
                            </tr>
                        <?php $i++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
          
        </div>
      </div>
    </div>
  </div>

	<div class="col-xs-12 col-xl-6 col-lg-6">

<div class="card shadow mb-4">
	<!-- Card Header - Dropdown -->
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary"><?php echo $tanggal_g ?> - Order</h6>
		<div class="dropdown no-arrow">
			<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
				<div class="dropdown-header">Dropdown Header:</div>
				<a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
				<?php for ($i=0; $i < $tanggal_transaksi ; $i++) {
				 ?>
				<a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik2_tahun[$i]."/".$tanggal_grafik2_bulan[$i] ?>"><?php echo $tanggal_grafik2[$i] ?></a>
			<?php } ?>
				
			</div>
		</div>
	</div>
	<!-- Card Body -->
	<div class="card-body">
		<div class="chart-pie pt-4">
			<canvas id="myPieChartOrder"></canvas>
		</div>
		<div class="mt-4 text-center small">

			<hr>
				<div class="table-responsive">
						<table class="table table-hover display" id="" width="100%" cellspacing="0">
								<thead>
										<tr>
												<th >#</th>
												<th >Nama Pelanggan</th>
												<th >Jumlah Order</th>
										</tr>
								</thead>
								<tbody>
										<?php
										$i = 1;
										foreach ($grafik_pie_order_plg as $data_order_plg) : ?>
												<tr>
														<th ><?= $i ?></th>
														<td><?= $data_order_plg->nama_plg ?></td>
														<td><?= $data_order_plg->total ?></td>
												</tr>
										<?php $i++;
										endforeach ?>
								</tbody>
						</table>
				</div>
			
		</div>
	</div>
</div>
</div>

  <div class="col-xs-12 col-xl-6 col-lg-6">

    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $tanggal_g ?> - Pengeluaran</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php for ($i=0; $i < $tanggal_transaksi ; $i++) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik2_tahun[$i]."/".$tanggal_grafik2_bulan[$i] ?>"><?php echo $tanggal_grafik2[$i] ?></a>
          <?php } ?>
            
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4">
          <canvas id="myPieChart2"></canvas>
        </div>
        <div class="mt-4 text-center small">

          <hr>
          <div class="table-responsive">
                <table class="table table-hover display" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Nama Pengeluaran</th>
                            <th >Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($grafik_pie_pengeluaran as $data_pengeluaran) : ?>
                            <tr>
                                <th ><?= $i ?></th>
                                <td><?= $data_pengeluaran->keterangan_jenis ?></td>
                                <td>Rp <?= number_format($data_pengeluaran->total) ?></td>
                            </tr>
                        <?php $i++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
          
        </div>
      </div>
    </div>

    
  </div>

    <div class="col-xs-12 col-xl-6 col-lg-6">

    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $tanggal_g ?> - Total Pengeluaran</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="<?php echo base_url('admin') ?>">Tahun ini</a>
            <?php 
            $ii = 0;
            foreach ($tanggal_grafik_tahun as $key) {
             ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/index') ?>/<?php echo $tanggal_grafik3[$ii]; ?>"><?php echo $tanggal_grafik3[$ii] ?></a>
          <?php $ii++; 
        } ?>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">

        <div class="mt-4 text-center small">

          <div class="table-responsive">
                <table class="table table-hover display" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Bulan</th>
                            <th >Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($grafik2 as $data_pengeluaran2) : ?>
                            <tr>
                                <th ><?= $i ?></th>
                                <td><?= date('F', strtotime($data_pengeluaran2->tgl_pengeluaran)) ?></td>
                                <td>Rp <?= number_format($data_pengeluaran2->total) ?></td>
                            </tr>
                        <?php $i++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
          
        </div>
      </div>
    </div>

    
  </div>

  </div>



</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript">
  $(document).ready(function(){
    $('li#dashboard').addClass('active');
  });
</script>

<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>


<?php 
foreach ($grafik as $data) {
 $tgl_transaksi[] = date('F Y', strtotime($data->tgl_pembelian));
 $total[] = $data->total;
} ?>

<?php 
foreach ($grafik2 as $data2) {
 $tgl_transaksi2[] = date('F Y', strtotime($data2->tgl_pengeluaran));
 $total2[] = $data2->total;
} ?>

<?php 
foreach ($grafik3 as $data3) {
 $tgl_transaksi3[] = date('F Y', strtotime($data3->tgl_pembelian));
 $total3[] = $data3->total;
} ?>

<?php 
foreach ($grafik5 as $data5) {
 $tgl_transaksi5[] = date('F Y', strtotime($data5->tgl_pembelian));
 $total5[] = $data5->total_order;
} ?>

<?php 
$no = 0;
foreach ($grafik_pie as $data_pie) {
 $nama[] = $data_pie->nama_cup;
 $total_pie[] = $data_pie->total;

} ?>

<?php 
$no = 0;
foreach ($grafik_pie_plg as $data_pie) {
 $nama_plg[] = $data_pie->nama_plg;
 $total_pie_plg[] = $data_pie->total;

} ?>

<?php 
$no = 0;
foreach ($grafik_pie_order_plg as $data_pie) {
 $nama_plg[] = $data_pie->nama_plg;
 $total_pie_order_plg[] = $data_pie->total;

} ?>

<?php 
$no = 0;
foreach ($grafik_pie_pengeluaran as $data_pie) {
 $nama_pengeluaran[] = $data_pie->keterangan_jenis;
 $total_pie_pengeluaran[] = $data_pie->total;
} ?>

<?php
$no = 0;
if ($kas_masuk_g == $kas_keluar_g) {
  foreach($tanggal_grafik as $a) {
    $var[] = $total[$no] - $total2[$no];
    $no++;   
  }
}else{
  $min = min($kas_masuk_g, $kas_keluar_g);
  for ($i=0; $i < $min ; $i++) {
    $var[] = $total[$i] - $total2[$i];
  }
}

?>
<!-- 
<?php echo json_encode($data0) ?>
<?php echo json_encode($var) ?> -->

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
  s = '',
  toFixedFix = function(n, prec) {
    var k = Math.pow(10, prec);
    return '' + Math.round(n * k) / k;
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($tgl_transaksi) ?>,
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($var) ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>



<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  
  var randomColorGenerator = function () {
           return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
        };

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo json_encode($nama) ?>,
    datasets: [{
      data: <?php echo json_encode($total_pie) ?>,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f56954','#f39c12','#00c0ef','#3c8dbc','#d2d6de','#f56954','#4e7323', '#1cc88c', '#32b9bc', '#f5675b','#f39ccc','#00c0cb','#3c6de9','#d2d6cd','#f5cece'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      // backgroundColor: randomColorGenerator(),
      // hoverBackgroundColor: randomColorGenerator(),
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,

    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
  s = '',
  toFixedFix = function(n, prec) {
    var k = Math.pow(10, prec);
    return '' + Math.round(n * k) / k;
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    //labels: <?php echo json_encode($tanggal_grafik2) ?>,
    labels: <?php echo json_encode($data0) ?>,


    datasets: [{
      label: "Pemasukan",
      backgroundColor: "#1cc88a",
      //hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: <?php echo json_encode($total) ?>,
      //data: ['coba']
    },{
      label: "Pengeluaran",
      backgroundColor: "#DD2011",
      //hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: <?php echo json_encode($total2) ?>,
    }
    // {
    //   label: "Pendapatan bersih",
    //   backgroundColor: "#1cc88a",
    //   //hoverBackgroundColor: "#2e59d9",
    //   borderColor: "#4e73df",
    //   data: <?php echo json_encode($var) ?>,
    // }
    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

</script>

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';


// Bar Chart Example
var ctx = document.getElementById("myCupChart1");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($tgl_transaksi) ?>,
    // labels: <?php echo json_encode($data2) ?>,


    datasets: [{
      label: "Total Cup",
      backgroundColor: "#1cc88a",
      //hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: <?php echo json_encode($total3) ?>,
      //data: ['coba']
    }
    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ' ' + tooltipItem.yLabel;
        }
      }
    },
  }
});

</script>

<script>
// Bar Chart Example
var ctx = document.getElementById("myCupChart2");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($tgl_transaksi) ?>,
    // labels: <?php echo json_encode($data2) ?>,


    datasets: [{
      label: "Total Order",
      backgroundColor: "#1cc88a",
      //hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: <?php echo json_encode($total5) ?>,
      //data: ['coba']
    }
    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ' ' + tooltipItem.yLabel;
        }
      }
    },
  }
});

</script>


<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart1");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo json_encode($nama_plg) ?>,
    datasets: [{
      data: <?php echo json_encode($total_pie_plg) ?>,
      backgroundColor: '#DD2011',
      hoverBackgroundColor: '#dd201a',
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,

    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChartOrder");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo json_encode($nama_plg) ?>,
    datasets: [{
      data: <?php echo json_encode($total_pie_order_plg) ?>,
      backgroundColor: '#008800',
      hoverBackgroundColor: '#008800',
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,

    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart2");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo json_encode($nama_pengeluaran) ?>,
    datasets: [{
      data: <?php echo json_encode($total_pie_pengeluaran) ?>,
      backgroundColor: '#4e73df',
      hoverBackgroundColor: '#2e59d9',
      //backgroundColor: randomColorGenerator(),
      //hoverBackgroundColor: randomColorGenerator(),
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,

    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>
