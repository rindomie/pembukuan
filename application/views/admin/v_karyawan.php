<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah karyawan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_karyawan ?> </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                  </div>

                  <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonatur">Tambah Karyawan</a>
           <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Nama</th>
                            <th >Alamat</th>
                            <th >Telpon</th>
                            <th>Gaji(Rp)</th>
                            
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($karyawan as $d) : ?>
                            <tr>
                                <th ><?= $i ?></th>
                                <td><?= $d['nama_karyawan'] ?></td>
                                <td><?= $d['alamat_karyawan'] ?></td>
                                <td><?= $d['telp_karyawan'] ?></td>
                                <td><?= $d['gaji_karyawan'] ?></td>
                                
                                <td>
                                    <a href="" class="badge badge-primary" data-toggle="modal" data-target="#bayargaji<?= $d['id_karyawan'] ?>">Bayar gaji</a>
                                    <a href="#" class="badge badge-success" data-toggle="modal" data-target="#updateDonatur<?= $d['id_karyawan'] ?>">Edit</a>
                                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deletePelanggan<?= $d['id_karyawan'] ?>">Delete</a>

                                </td>
                            </tr>
                            <!--update donatur-->
                            <div class="modal fade" id="updateDonatur<?= $d['id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Update Karyawan </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('karyawan/updatekaryawan') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $d['id_karyawan'] ?>">
                                                    <label>Nama</label>

                                                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?= $d['nama_karyawan'] ?>" placeholder="Nama" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input type="text" class="form-control" id="alamat_karyawan" name="alamat_karyawan" value="<?= $d['alamat_karyawan'] ?>" placeholder="Alamat" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Telpon</label>
                                                    <input type="number" required="" class="form-control" id="telp_karyawan" name="telp_karyawan" value="<?= $d['telp_karyawan'] ?>" placeholder="Telpon">
                                                </div>

                                                <div class="form-group">
                                                    <label>Gaji</label>
                                                    <input type="number" required="" class="form-control" id="gaji_karyawan" name="gaji_karyawan" value="<?= $d['gaji_karyawan'] ?>" placeholder="Gaji">
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
                            <!--delete donatur-->
                            <div class="modal fade" id="deletePelanggan<?= $d['id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Karyawan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus karyawan <?= $d['nama_karyawan'] ?></p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('karyawan/deleteKaryawan?id=') ?><?= $d['id_karyawan'] ?>" class="btn btn-primary">Hapus</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--bayar gaji-->
                            <div class="modal fade" id="bayargaji<?= $d['id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Bayar gaji Karyawan A/N <?php echo $d['gaji_karyawan'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('karyawan/bayar_gaji') ?>" method="post">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input class="form-control" type="date"  id="tanggal" name="tanggal" required="">
                                            </div>

                                            <div class="form-group">
                                                
                                                <input type="hidden" required="" class="form-control" id="keterangan" name="keterangan" placeholder="ex: pembayaran ....." value="Bayar gaji karyawan A/N <?= $d['nama_karyawan'] ?>">
                                                
                                            </div>
                                            

                                            <div class="form-group">
                                               
                                               <input type="hidden" required="" class="form-control"  name="nominal" id="nominal" placeholder="ex: 100000" value="<?php echo $d['gaji_karyawan'] ?>">
                                               
                                           </div>

                                           <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Bayar</button>
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
<div class="modal fade" id="addNewDonatur" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonaturLabel">Tambah Karyawan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('karyawan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama_karyawan2" name="nama_karyawan2" placeholder="Nama Karyawan" required="">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat_karyawan" name="alamat_karyawan" placeholder="Alamat" required="">
                    </div>
                    <div class="form-group">
                        <label>Telpon</label>
                        <input type="number" class="form-control" id="telp_karyawan" name="telp_karyawan" placeholder="Telpon" required="">
                    </div>
                    <div class="form-group">
                        <label>Gaji</label>
                        <input type="number" class="form-control" id="gaji_karyawan" name="gaji_karyawan" placeholder="Gaji" required="">
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
    $('li#karyawan').addClass('active');
  });
</script>