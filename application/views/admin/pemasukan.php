<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<form action="<?= base_url('admin/pemasukan') ?>" method="post">
				<div class="row">
					<div class="col md-1">
						<label for="datefrom">Periode Awal</label>
					</div>
					<div class="col-md-3">
						<input type="date" class="form-control" name="datea" required/>	
					</div>
					<div class="col md-1">
						<label for="datefrom">Periode Akhir</label>
					</div>
					<div class="col-md-3">
						<input type="date" class="form-control" name="dateb" required/>
					</div>
					<div class="col-md-3">
						<button class="btn btn-success btn-sm" type="submit"><i class="fas fa-fw fa-sort"></i> Filter</button>
						<a href="<?= base_url('admin/pemasukan') ?>" class="btn btn-warning btn-sm""><i class="fas fa-fw fa-spinner"></i> Reset</a>
					</div>
				</div>					
			</form>
		</div>
	</div>

    <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pemasukan['total_harga']) ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
	</div>') ?>
	<?= $this->session->flashdata('message') ?>

	<div class="row">

		
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="row align-right">
						<div class="col-md-12">
							<h6 class="m-0 font-weight-bold text-primary">Data Input Pemasukan</h6>
						</div>

					</div>

				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover display" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal</th>
									<th>Jumlah Inputan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($count_pemasukan as $cp) : 
									// $date = date_create($cp['tgl_pembelian']);

									?>
									<tr>
										<th><?= $i ?></th>
										<?php
										if($cp['bulan'] == 1){
											$bulan = 'Januari';
										}else if($cp['bulan'] == 2){
											$bulan = 'Februari';
										}else if($cp['bulan'] == 3){
											$bulan = 'Maret';
										}else if($cp['bulan'] == 4){
											$bulan = 'April';
										}else if($cp['bulan'] == 5){
											$bulan = 'Mei';
										}else if($cp['bulan'] == 6){
											$bulan = 'Juni';
										}else if($cp['bulan'] == 7){
											$bulan = 'Juli';
										}else if($cp['bulan'] == 8){
											$bulan = 'Agustus';
										}else if($cp['bulan'] == 9){
											$bulan = 'September';
										}else if($cp['bulan'] == 10){
											$bulan = 'Oktober';
										}else if($cp['bulan'] == 11){
											$bulan = 'November';
										}else if($cp['bulan'] == 12){
											$bulan = 'Desember';
										}
										?>
										<td>
											<?= $cp['tgl'].' '.$bulan.' '.$cp['tahun'] ?>
										</td>
										<td><?= $cp['jml'] ?></td>
									</tr>
									<?php $i++;
								endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
			</div>') ?>
			<?= $this->session->flashdata('message') ?> -->
			
			
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="row align-right">
						<div class="col-md-12">
							<h6 class="m-0 font-weight-bold text-primary">Data Input Pemasukan Lain</h6>
						</div>

					</div>

				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover display" id="" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal</th>
									<th>Jumlah Inputan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($count_pemasukan_lain as $cpl) : 
									// $date = date_create($cp['tgl_pembelian']);

									?>
									<tr>
										<th><?= $i ?></th>
										<?php
										if($cp['bulan'] == 1){
											$bulan = 'Januari';
										}else if($cp['bulan'] == 2){
											$bulan = 'Februari';
										}else if($cp['bulan'] == 3){
											$bulan = 'Maret';
										}else if($cp['bulan'] == 4){
											$bulan = 'April';
										}else if($cp['bulan'] == 5){
											$bulan = 'Mei';
										}else if($cp['bulan'] == 6){
											$bulan = 'Juni';
										}else if($cp['bulan'] == 7){
											$bulan = 'Juli';
										}else if($cp['bulan'] == 8){
											$bulan = 'Agustus';
										}else if($cp['bulan'] == 9){
											$bulan = 'September';
										}else if($cp['bulan'] == 10){
											$bulan = 'Oktober';
										}else if($cp['bulan'] == 11){
											$bulan = 'November';
										}else if($cp['bulan'] == 12){
											$bulan = 'Desember';
										}
										?>
										<td><?= $cpl['tgl'].' '.$bulan.' '.$cpl['tahun'] ?></td>
										<td><?= $cpl['jml'] ?></td>
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

    <div class="row">

        <div class="col-lg">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
            </div>') ?>
            <?= $this->session->flashdata('message') ?> -->
            
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
					<div class="row align-right">
						<div class="col-md-3">
							<h6 class="m-0 font-weight-bold text-primary">Data Pemasukan</h6>
						</div>

					</div>

                </div>

                <div class="card-body">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonasi"><i class="fas fa-fw fa-coins"></i> Tambah Pemasukan</a>
                    <div class="table-responsive">
                        <table class="table table-hover display" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
									<th>Nomor Pemasukan</th>
                                    <th>Jumlah</th>
                                    <th>Total Tagihan(Rp)</th>
									<th>Total Dibayar(Rp)</th>
									<th>Sisa Tagihan(Rp)</th>
                                    <th>Pelanggan</th>
                                    <th>Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pemasukan as $d) : 
                                    $date = date_create($d['tgl_pembelian']);

                                    ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                        
                                        <td><?= date_format($date,"d F Y") ?></td>
										<td><?= $d['no_pemasukan'] ?></td>
                                        <td><?= $d['jml_pembelian'] ?></td>
										<td><?= number_format($d['total_tagihan'],0,',','.') ?></td>
                                        <td><?= number_format($d['total_harga'],0,',','.') ?></td>
										<td><?= number_format($d['sisa_tagihan'],0,',','.') ?></td>
                                        <td><?= $d['nama_plg']?></td>
                                        <td><?= $d['keterangan_cup']?></td>
                                        
                                        <td>
											<?php if($d['sisa_tagihan'] > '0') { ?>
												<a href="#" class="badge badge-success" data-toggle="modal" data-target="#editDonasi<?= $d['id_pemasukan'] ?>">Pelunasan</a>
											<?php } ?>
											<!-- <a href="<?= base_url('admin/invoice/') . $d['id_pemasukan'] ?>" class="badge badge-primary">Invoice</a> -->
											<a href="<?= base_url('admin/invoice/') . $d['id_pemasukan'] ?>" class="badge badge-primary">Invoice</a>
                                            <a href="#" data-toggle="modal" data-target="#deleteDonasi<?= $d['id_pemasukan'] ?>" class="badge badge-danger">Delete</a>
                                            <!-- <a href="<?= base_url('admin/cetak?id=') . $d['id'] ?>" rel="noopener noreferrer" target="#blank" class="badge badge-warning">Print</a> -->
                                        </td>
                                    </tr>
									<!-- pelunasan modal -->
									
									<div class="modal fade" id="editDonasi<?= $d['id_pemasukan'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonasiLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="addNewDonasiLabel">Pelunasan</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="<?= base_url('admin/pelunasan') ?>" method="post">
													<div class="modal-body">
														<input type="hidden" name="keterangan" value="0">
														<input type="hidden" name="id" value="<?= $d['id_pemasukan'] ?>">
														<div class="form-group">
															<label>Nomor Pemasukan</label>
															<input class="form-control" type="text" value="<?= $d['no_pemasukan'] ?>" readonly="">
														</div>
														<div class="form-group">
															<label>Nama Pelanggan</label>
															<input class="form-control" type="text" value="<?= $d['nama_plg'] ?>" readonly="">
														</div>
														<div class="form-group">
															<label>Barang</label>
															<input class="form-control" type="text" value="<?= $d['keterangan_cup'] ?>" readonly="">
														</div>
														<div class="form-group">
															<label>Jumlah Beli</label>
															<input class="form-control" type="text" value="<?= $d['jml_pembelian'] ?>" readonly="">
														</div>

														<label>Total Tagihan</label>
														<div class="input-group flex-nowrap form-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="addon-wrapping">Rp</span>
															</div>
															<input type="text" class="form-control" id="nominal1" name="nominal_tagihan" placeholder="Nominal" aria-label="Nominal" aria-describedby="addon-wrapping" required="" readonly="" value="<?= $d['total_tagihan'] ?>">
														</div>

														<label>Jumlah Pelunasan</label>
														<div class="input-group flex-nowrap form-group">
															<div class="input-group-prepend">
																<span class="input-group-text" id="addon-wrapping">Rp</span>
															</div>
															<input type="text" class="form-control" id="nominal_lunas" name="nominal_bayar" placeholder="Nominal" aria-label="Nominal" aria-describedby="addon-wrapping" required="" readonly=""  value="<?= $d['sisa_tagihan'] ?>">
														</div>

														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary">Add</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
                                    <!--delete donasi-->
                                    <div class="modal fade" id="deleteDonasi<?= $d['id_pemasukan'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDonaturLabel">Hapus Pemasukan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus pemasukan data ke-<?= $i ?></p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('admin/deletepemasukan?id=') ?><?= $d['id_pemasukan'] ?>" class="btn btn-primary">Hapus</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-lg">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
            </div>') ?>
            <?= $this->session->flashdata('message') ?> -->
            
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pemasukan Lain</h6>
                </div>

                <div class="card-body">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonasi2"><i class="fas fa-fw fa-coins"></i> Tambah Pemasukan lain</a>
                    <div class="table-responsive">
                        <table class="table table-hover display" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Pemasukan</th>
                                    <th>Total(Rp)</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pemasukan_lain as $d) : 
                                    $date = date_create($d['tgl_pembelian']);

                                    ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                        
                                        <td><?= date_format($date,"d F Y") ?></td>
                                        <td><?= $d['no_pemasukan']?></td>
                                        <td><?= number_format($d['total_harga'],0,',','.') ?></td>
                                        <td><?= $d['keterangan']?></td>
                                        
                                        
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#deleteDonasi<?= $d['id_pemasukan'] ?>" class="badge badge-danger">Delete</a>
                                            <!-- <a href="<?= base_url('admin/cetak?id=') . $d['id'] ?>" rel="noopener noreferrer" target="#blank" class="badge badge-warning">Print</a> -->

                                        </td>
                                    </tr>
                                    <!--delete donasi-->
                                    <div class="modal fade" id="deleteDonasi<?= $d['id_pemasukan'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDonaturLabel">Hapus Pemasukan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus pemasukan data ke-<?= $i ?></p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('admin/deletepemasukan?id=') ?><?= $d['id_pemasukan'] ?>" class="btn btn-primary">Hapus</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->

<!--modal-->
<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade" id="addNewDonasi" tabindex="-1" role="dialog" aria-labelledby="addNewDonasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonasiLabel">Tambah pemasukan baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pemasukan') ?>" method="post">
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonatur">Tambah pelanggan</a>

                    </div> -->
                    <input type="hidden" name="keterangan" value="0">
					<label>Nomor Pemasukan</label>
                    <div class="input-group flex-nowrap form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">PM</span>
                        </div>
                        <input type="number" class="form-control" id="no_masuk" name="no_masuk" placeholder="Nomor Pemasukan" aria-label="Nomor Pemasukan" aria-describedby="addon-wrapping" required="" value="">
						<script type="text/javascript">
							$(document).ready(function() {
								$('#no_masuk').change(function() {
									var no_masuk = $('#no_masuk').val();
									if (no_masuk != '') {
										$.ajax({
											url: "<?php echo base_url(); ?>admin/cek_pemasukan",
											method: "POST",
											data: {
												no_masuk: no_masuk
											},
											success: function(data) {
												$('#hasil').html(data);
											}
										});
									}
								});
							});
						</script>
						<br>
                    </div>
					<div class="row mt-1">
						<div class="col-md-12 col-sm-12">
							<span id="hasil"></span>
						</div>
					</div>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select class="form-control" id="id_plg" name="id_plg" style="width:465px" required="">
                            <option value="">- Silahkan masukkan nama pelanggan -</option>
                            <?php foreach ($pelanggan as $a) : ?>
                                <option value="<?= $a['id_plg'] ?>"><?= $a['nama_plg'] ?> - <?= $a['alamat_plg'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control" id="id_cup" name="id_cup" style="width:465px" required="">
                            <option value="">- Silahkan masukkan nama cup -</option>
                            <?php foreach ($cup as $a) : ?>
                                <option value="<?= $a['id_cup'] ?>"><?= $a['nama_cup'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Beli</label>
                        <input class="form-control" type="number"  id="jumlah_beli" name="jumlah_beli" placeholder="Jumlah beli" onkeyup="hit()">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" type="date"  id="tanggal" name="tanggal" required="">
                    </div>
                    <input type="hidden" name="" id="harga">
                    <input type="hidden" name="" id="harga2">
                    <input type="hidden" name="" id="harga3">
                    <input type="hidden" name="" id="harga4">

                    <input type="hidden" name="stok" id="stok">

					<label>Total Tagihan</label>
                    <div class="input-group flex-nowrap form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Rp</span>
                        </div>
                        <input type="number" class="form-control" id="nominal_tagihan" name="nominal_tagihan" placeholder="Nominal" aria-label="Nominal" aria-describedby="addon-wrapping" required="" readonly="" value="0">
                    </div>

					<label>Jumlah Dibayar</label>
					<div class="input-group flex-nowrap form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Rp</span>
                        </div>
                        <input type="number" class="form-control" id="nominal_bayar" name="nominal_bayar" onkeyup="hit()" placeholder="Nominal" aria-label="Nominal" aria-describedby="addon-wrapping" required=""  value="0">
                    </div>

					<label>Sisa Tagihan</label>
					<div class="input-group flex-nowrap form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Rp</span>
                        </div>
                        <input type="number" class="form-control" id="nominal_sisa" name="nominal_sisa" placeholder="Nominal" aria-label="Nominal" aria-describedby="addon-wrapping" required="" readonly="" value="0">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" disabled="" id="tombol" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addNewDonasi2" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
    <div class="modal-dialog" role="docmuent">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonaturLabel">Tambah Pemasukan Lain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pemasukan') ?>" method="post">
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonatur">Tambah pelanggan</a>

                    </div> -->
                    <div class="form-group">
                        
                        <input type="hidden" name="id_plg" value="0">
                        
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_cup" value="0">
                        
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="jumlah_beli" value="0">
                        
                    </div>
					<label>Nomor Pemasukan</label>
                    <div class="input-group flex-nowrap form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">PM</span>
                        </div>
                        <input type="number" class="form-control" id="no_masuk_lain" name="no_masuk_lain" placeholder="Nomor Pemasukan" aria-label="Nomor Pemasukan" aria-describedby="addon-wrapping" required="" value="">
						<script type="text/javascript">
							$(document).ready(function() {
								$('#no_masuk_lain').change(function() {
									var no_masuk_lain = $('#no_masuk_lain').val();
									if (no_masuk_lain != '') {
										$.ajax({
											url: "<?php echo base_url(); ?>admin/cek_pemasukan_lain",
											method: "POST",
											data: {
												no_masuk_lain: no_masuk_lain
											},
											success: function(data) {
												$('#hasil_lain').html(data);
											}
										});
									}
								});
							});
						</script>
						<br>
                    </div>
					<div class="row mt-1">
						<div class="col-md-12 col-sm-12">
							<span id="hasil_lain"></span>
						</div>
					</div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" type="date"  id="tanggal" name="tanggal" required="">
                    </div>
                    <input type="hidden" name="" id="harga">

                    <input type="hidden" name="stok" id="stok">

                    <div class="form-group">
                        <label>Jumlah(Rp)</label>
                        <input type="number" name="nominal_bayar" class="form-control">
						<input type="number" name="nominal_tagihan" class="form-control" value="0" hidden>
						<input type="number" name="nominal_sisa" class="form-control" value="0" hidden>
                        
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="tombol" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNewDonasi22" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
    <div class="modal-dialog" role="docmuent">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonaturLabel">Tambah Pemasukan Lain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addPelanggan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_plg" name="nama_plg" placeholder="Nama Lengkap" required="">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="alamat_plg" name="alamat_plg" placeholder="Alamat" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="telp_plg" name="telp_plg" placeholder="Telpon" required="">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="deleteNewDonasi" tabindex="-1" role="dialog" aria-labelledby="deleteNewDonasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteNewDonasiLabel">Are you sure to delete ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/delete') ?>">Delete</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 $(document).ready(function() {
     $('#id_plg').select2();
      $('#id_cup').select2();
 });
</script>


<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Format mata uang.
        $('.uang').mask('0.000.000.000', {
            reverse: true
        });

        // Format nomor HP.
        $('.no_hp').mask('0000−0000−0000');

        // Format tahun pelajaran.
        $('.tapel').mask('0000/0000');
    })
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('li#pemasukan').addClass('active');
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_cup').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>admin/get_harga_cup",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                   document.getElementById('harga').value = data[0].harga_jual;
                   document.getElementById('harga2').value = data[0].harga_jual500;
                   document.getElementById('harga3').value = data[0].harga_jual1000;
                   document.getElementById('harga4').value = data[0].harga_jual2000;
                   document.getElementById('stok').value = data[0].stok;
                   document.getElementById('jumlah_beli').value = "";
                    document.getElementById('tombol').disabled = true;
                     document.getElementById('nominal_tagihan').value = "0";                    
                }
            });
        });
    });

    function hit(){
        
        var jumlah_beli = parseFloat(document.getElementById('jumlah_beli').value);
        var stok = parseFloat(document.getElementById('stok').value);
        if (jumlah_beli > stok) {
            document.getElementById('nominal').value = `tidak cukup, sisa stok ${stok}`;
            document.getElementById('tombol').disabled = true;
        }else{
			var bayar = parseFloat(document.getElementById('nominal_bayar').value);
            var tot=0;
			var sisa=0;
            
            if (jumlah_beli >= 2000) {
                var harga = parseFloat(document.getElementById('harga4').value);
            }else if (jumlah_beli >= 1000) {
                var harga = parseFloat(document.getElementById('harga3').value);
            }else if (jumlah_beli >= 500) {
                var harga = parseFloat(document.getElementById('harga2').value);
            }else {
                var harga = parseFloat(document.getElementById('harga').value);
            }


            tot = harga * jumlah_beli;
			sisa = tot-bayar;
            document.getElementById('nominal_tagihan').value = tot;
			document.getElementById('nominal_sisa').value = sisa;
            document.getElementById('tombol').disabled = false;
        }
        
    }
</script>
