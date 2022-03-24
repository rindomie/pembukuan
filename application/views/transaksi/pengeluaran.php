<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<form action="<?= base_url('transaksi/pengeluaran') ?>" method="post">
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
						<a href="<?= base_url('transaksi/pengeluaran') ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-spinner"></i> Reset</a>
					</div>
				</div>					
			</form>
		</div>
	</div>
	


        <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengeluaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($total_pengeluaran['jml_pengeluaran']) ?></div>
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
					<h6 class="m-0 font-weight-bold text-primary">Data Input Pengeluaran</h6>
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
						foreach ($count_pengeluaran as $cp) : 
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
</div>


    <div class="row">

        <div class="col-lg">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
            </div>') ?>
            <?= $this->session->flashdata('message') ?>
             -->
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
				<div class="row align-right">
						<div class="col-md-12">
							<h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
						</div>
					</div>
                </div>

                <div class="card-body">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonasi"><i class="fas fa-fw fa-coins"></i> Input Pengeluaran</a>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
									<th>Nomor Pengeluaran</th>
                                    <th>Jumlah(Rp)</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pengeluaran as $d) : 
                                    $date = date_create($d['tgl_pengeluaran']);

                                    ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                  


                                        <td><?= date_format($date,"d F Y") ?></td>
										<td><?= $d['no_pengeluaran']?></td>
                                        <td> <?= number_format($d['jml_pengeluaran'],0,',','.') ?>
                                            
                                        </td>
                                        <td><?= $d['keterangan_jenis']?></td>
                                        <td><?= $d['keterangan']?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#deleteDonasi<?= $d['id_pengeluaran'] ?>" class="badge badge-danger">Delete</a>
                                            

                                        </td>
                                    </tr>
                                    <!--delete donasi-->
                                    <div class="modal fade" id="deleteDonasi<?= $d['id_pengeluaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDonaturLabel">Hapus pengeluaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus pengeluaran ke-<?= $i ?></p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('transaksi/deletepengeluaran?id=') ?><?= $d['id_pengeluaran'] ?>" class="btn btn-primary">Hapus</a>
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

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jenis Pengeluaran</h6>
                </div>

                <div class="card-body">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewJenis"><i class="fas fa-fw fa-coins"></i> Tambah Jenis Pengeluaran</a>
                    <div class="table-responsive">
					<table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($jenis_pengeluaran as $j) : 

                                    ?>
                                    <tr>
                                        <th><?= $i ?></th>

                                        <td><?= $j['keterangan_jenis']?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editJenis<?= $j['id_jenis_pengeluaran'] ?>" class="badge badge-primary">Edit</a>
                                        </td>
                                    </tr>

                                    <!--edit jenis pengeluaran-->
                                    <div class="modal fade" id="editJenis<?= $j['id_jenis_pengeluaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDonaturLabel">Edit Pengeluaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('transaksi/editjenispengeluaran') ?>" method="post">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <input class="form-control" type="text" value="<?= $j['keterangan_jenis'] ?>"  id="keterangan" name="keterangan" required="">
                                                            <input type="text" name="id_jenis" value="<?= $j['id_jenis_pengeluaran'] ?>" hidden>
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
                <h5 class="modal-title" id="addNewDonasiLabel">Input pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
            </div>


            <form action="<?= base_url('transaksi/savepengeluaran') ?>" method="post">
                <div class="modal-body">

                    
					<label>Nomor Pemasukan</label>
                    <div class="input-group flex-nowrap form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">PM</span>
                        </div>
                        <input type="number" class="form-control" id="no_keluar" name="no_keluar" placeholder="Nomor Pengeluaran" aria-label="Nomor Pengeluaran" aria-describedby="addon-wrapping" required="" value="">
						<script type="text/javascript">
							$(document).ready(function() {
								$('#no_keluar').change(function() {
									var no_keluar = $('#no_keluar').val();
									if (no_keluar != '') {
										$.ajax({
											url: "<?php echo base_url(); ?>transaksi/cek_pengeluaran",
											method: "POST",
											data: {
												no_keluar: no_keluar
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
                        <label>Tanggal</label>
                        <input class="form-control" type="date"  id="tanggal" name="tanggal" required="">
                    </div>

                    <div class="form-group">
                        <label>Jenis Pengeluaran</label>
                        <select class="form-control" id="id_jenis_pengeluaran" name="id_jenis_pengeluaran" style="width:465px" required="">
                            <option value="">- Silahkan masukkan jenis pengeluaran -</option>
                            <?php foreach ($jenis_pengeluaran as $a) : ?>
                                <option value="<?= $a['id_jenis_pengeluaran'] ?>"><?= $a['keterangan_jenis'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Keterangan</label>
                        <input type="text" required="" class="form-control" id="keterangan" name="keterangan" placeholder="ex: pembayaran .....">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                    </div>
                    

                    <div class="form-group">
                       <label for="inputAddress2">Nominal</label>
                       <input type="text" required="" class="form-control"  name="nominal" id="nominal" placeholder="ex: 100000" >
                       <?= form_error('nominal', '<small class="text-danger pl-3">', ' </small>') ?>
                   </div>

                   <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
        <input type="hidden" id="jumlah-form" name="jumlah" value="1">
        
    </div>
</div>
</div>

<div class="modal fade" id="addNewJenis" tabindex="-1" role="dialog" aria-labelledby="addNewJenisLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewJenisLabel">Input Jenis pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
            </div>

            <form action="<?= base_url('transaksi/savejenispengeluaran') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" type="text"  id="keterangan" name="keterangan" required="">
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




<script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        //$("#tes").append('0');
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append(`<hr><b>Data ${nextform} :</b><br><br>
                    <div class="form-group">
                        <label for="inputAddress">Keterangan</label>
                        <input type="text" required="" class="form-control" id="keterangan" name="keterangan[]" placeholder="ex: pembayaran .....">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                    </div>

                    <div class="form-group">
                       <label for="inputAddress2">Nominal</label>
                       <input type="text" required="" class="form-control"  name="nominal[]" placeholder="ex: 100000" onkeyup="hit()">
                       <?= form_error('nominal', '<small class="text-danger pl-3">', ' </small>') ?>
                   </div>`);
            
            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });

    function hit(){
        var arr = document.getElementsByName('nominal[]');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = tot;
    }
    </script>

    <script type="text/javascript">
  $(document).ready(function(){
    $('li#pengeluaran').addClass('active');
  });
</script>
