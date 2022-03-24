<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    $date1 = date_create($this->session->flashdata('tglawal'));
    $date2 = date_create($this->session->flashdata('tglakhir'));

    ?>
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?> : <?= date_format($date1, "d-m-Y") ?> / <?= date_format($date2, "d-m-Y") ?> </h1>

    <form class="form-inline" action="<?= base_url('laporan/search') ?>" method="post">

        <div class="form-group mb-2">
            <input class="form-control" type="date" id="tanggal_awal" value="<?= $this->session->flashdata('tglawal') ?>" name="tanggal_awal">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input class="form-control" type="date" id="tanggal_akhir" value="<?= $this->session->flashdata('tglakhir') ?>" name="tanggal_akhir">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>

    </form>

    <div class="row">


        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
            </div>') ?>
            <?= $this->session->flashdata('message') ?>
            <div class="card">
                <div class="card-header">
                    Buku Kas Umum
                </div>

                <div class="card-body">
                    <!-- <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#cetakLaporan"><i class="fas fa-print"></i> Cetak Buku Kas Umum</a> -->
                    <a href="<?= base_url('laporan/cetak?p=') ?>excel&tglawal=<?= $this->session->flashdata('tglawal') ?>&tglakhir=<?= $this->session->flashdata('tglakhir') ?>" class=" btn btn-success mb-4"><i class="fas fa-file-excel"></i> Download Excel</a>
                    <!-- <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#cetakLaporan"><i class="fas fa-fw fa-book"></i> Kirim ke email</a> -->
                    <div class="table-responsive">

                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <<th>Tanggal</th>
                                    <th>Jumlah beli</th>
                                    <th>Jumlah(Rp)</th>
                                    <th>Pelanggan</th>
                                    <th>Barang</th>
                                    <th>Jenis</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($jurnal as $d) : 
                                    $date = date_create($d['tgl_pembelian']);

                                    ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                        
                                        <td><?= date_format($date,"d F Y") ?></td>
                                        <td><?= $d['jml_pembelian'] ?></td>
                                        <td><?= number_format($d['total_harga'],0,',','.') ?></td>
                                        <td><?= $d['nama_plg']?></td>
                                        <td><?= $d['nama_cup']?></td>
                                        <td>Pemasukan</td>
                                        <td><?php if ($d['keterangan'] == 0) {
                                        echo "-";
                                    }else{
                                        echo $d['keterangan'];
                                    } ?></td>
                                    
                                        
                                        
                                    </tr>
                                    
                                    <?php $i++;
                                endforeach ?>

                                <?php
                                
                                foreach ($jurnal2 as $d) : 
                                    $date = date_create($d['tgl_pengeluaran']);

                                    ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                        
                                        <td><?= date_format($date,"d F Y") ?></td>
                                        <td>-</td>
                                        <td><?= number_format($d['jml_pengeluaran'],0,',','.') ?></td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Pengeluaran</td>
                                        <td><?= $d['keterangan'] ?></td>
                                        
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="cetakLaporan" tabindex="-1" role="dialog" aria-labelledby="cetakLaporanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakLaporanLabel">Kirim ke email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('laporan/sendEmail') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputAddress">Isi pesan</label>
                        <textarea class="form-control" name="pesan" required=""></textarea>
                    </div>
                    
                    <div class="form-group">
                     <label for="inputAddress2">Email penerima</label>
                     <input type="email" name="email" class="form-control" required="">
                 </div>

                 <div class="form-group">
                     <label for="inputAddress2">File dikirim</label>
                     <input type="file" style="height:45px" class="form-control form-control-user" id="" name="uploaded_file">
                 </div>


                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>

</div>
</div>