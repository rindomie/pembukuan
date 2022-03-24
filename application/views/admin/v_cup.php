<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jenis Cup</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_cup ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-inbox fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
            </div>') ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Cup</h6>
                </div>

                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonatur">Tambah Jenis Cup</a>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th >Nama</th>

                                    <th >Harga Beli(Rp)</th>
                                    <th>Harga Jual Normal(Rp)</th>
                                    <th>Harga Jual >= 500(Rp)</th>
                                    <th>Harga Jual >= 1000</th>
                                    <th>Harga Jual >= 2000(Rp)</th>
                                    <th>Stok</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($cup as $d) : ?>
                                    <tr>
                                        <th ><?= $i ?></th>
                                        <td><?= $d['nama_cup'] ?></td>

                                        <td><?= $d['harga_beli'] ?></td>
                                        <td><?= $d['harga_jual'] ?></td>
                                        <td><?= $d['harga_jual500'] ?></td>
                                        <td><?= $d['harga_jual1000'] ?></td>
                                        <td><?= $d['harga_jual2000'] ?></td>

                                        <td><?= $d['stok'] ?></td>
                                        <td>
                                            <!-- <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#tambahstok<?= $d['id_cup'] ?>">Tambah stok</a> -->
                                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#updateDonatur<?= $d['id_cup'] ?>">Edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deletePelanggan<?= $d['id_cup'] ?>">Delete</a>

                                        </td>
                                    </tr>
                                    <!--update donatur-->
                                    <div class="modal fade" id="updateDonatur<?= $d['id_cup'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDonaturLabel">Update Cup </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('cup/updatecup') ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_cup" id="id_cup" value="<?= $d['id_cup'] ?>">
                                                            <label>Nama</label>

                                                            <input type="text" class="form-control" id="nama_cup" name="nama_cup" value="<?= $d['nama_cup'] ?>" placeholder="Nama Cup" required="">
                                                        </div>

                                                        <div class="form-group">
                                                         <!--  <label>Keterangan</label> -->
                                                         <input type="hidden" class="form-control" id="keterangan_cup" name="keterangan_cup" value="<?= $d['keterangan_cup'] ?>" placeholder="Keterangan Cup" required="">
                                                     </div>

                                                     <div class="form-group">
                                                        <label>Stok</label>
                                                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" required="" value="<?= $d['stok'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Harga beli</label>
                                                        <input type="number" required="" class="form-control" id="harga_beli" name="harga_beli" value="<?= $d['harga_beli'] ?>" placeholder="Harga beli">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Harga jual normal</label>
                                                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga jual" required="" value="<?= $d['harga_jual'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Harga jual >= 500</label>
                                                        <input type="number" class="form-control" id="harga_jual500" name="harga_jual500" placeholder="Harga jual" required="" value="<?= $d['harga_jual500'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Harga jual >= 1000</label>
                                                        <input type="number" class="form-control" id="harga_jual1000" name="harga_jual1000" placeholder="Harga jual" required="" value="<?= $d['harga_jual1000'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Harga jual >= 2000</label>
                                                        <input type="number" class="form-control" id="harga_jual2000" name="harga_jual2000" placeholder="Harga jual" required="" value="<?= $d['harga_jual2000'] ?>">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- tambah stok -->
                                <!--update donatur-->
                                <div class="modal fade" id="tambahstok<?= $d['id_cup'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Tambah stok Cup <?= $d['nama_cup'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('cup/tambah_stok') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_cup" id="id_cup" value="<?= $d['id_cup'] ?>">

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Harga beli</label>
                                                        <input type="number" required="" class="form-control" id="harga_beli" name="harga_beli" value="" placeholder="Harga beli">
                                                    </div>

                                                    <input type="hidden" name="stok_sisa" value="<?= $d['stok']?>">

                                                    <input type="hidden" name="nama_cup" value="<?=$d['nama_cup']?>">


                                                    <div class="form-group">
                                                        <label>Stok</label>
                                                        <input type="number" required="" class="form-control" id="stok" name="stok" value="" placeholder="Stok">
                                                    </div>

                                               <!--  <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" required="" class="form-control" id="tanggal" name="tanggal" >
                                                </div> -->

                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Tambah stok</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!--delete donatur-->
                            <div class="modal fade" id="deletePelanggan<?= $d['id_cup'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Cup</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus cup <?= $d['nama_cup'] ?></p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('cup/deleteCup?id=') ?><?= $d['id_cup'] ?>" class="btn btn-primary">Hapus</a>
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
<div class="modal fade" id="addNewDonatur" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonaturLabel">Tambah Cup Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('cup') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama_cup2" name="nama_cup2" placeholder="Nama Cup" required="">
                    </div>
                    <div class="form-group">
                     <!--  <label>Keterangan</label> -->
                     <input type="hidden" class="form-control" id="keterangan_cup" name="keterangan_cup" placeholder="Keterangan" required="" value="">
                 </div>
                 <div class="form-group">
                    <label>Harga beli</label>
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga beli" required="">
                </div>
                <div class="form-group">
                    <label>Harga jual normal</label>
                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga jual" required="">
                </div>
                <div class="form-group">
                    <label>Harga jual >= 500</label>
                    <input type="number" class="form-control" id="harga_jual500" name="harga_jual500" placeholder="Harga jual" required="">
                </div>
                <div class="form-group">
                    <label>Harga jual >= 1000</label>
                    <input type="number" class="form-control" id="harga_jual1000" name="harga_jual1000" placeholder="Harga jual" required="">
                </div>
                <div class="form-group">
                    <label>Harga jual >= 2000</label>
                    <input type="number" class="form-control" id="harga_jual2000" name="harga_jual2000" placeholder="Harga jual" required="">
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" required="">
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

<script type="text/javascript">
  $(document).ready(function(){
    $('li#cup').addClass('active');
});
</script>