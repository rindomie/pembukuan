<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pelanggan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pelanggan ?> </div>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
                  </div>

                  <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonatur">Tambah Pelanggan</a>
           <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Nama</th>
                            <th >Alamat</th>
                            <th >Telpon</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pelanggan as $d) : ?>
                            <tr>
                                <th ><?= $i ?></th>
                                <td><?= $d['nama_plg'] ?></td>
                                <td><?= $d['alamat_plg'] ?></td>
                                <td><?= $d['telp_plg'] ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/riwayat/<?= $d['id_plg'] ?>" class="badge badge-primary" >Riwayat</a>
                                    <a href="#" class="badge badge-success" data-toggle="modal" data-target="#updateDonatur<?= $d['id_plg'] ?>">Edit</a>
                                    <!-- <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deletePelanggan<?= $d['id_plg'] ?>">Delete</a> -->

                                </td>
                            </tr>
                            <!--update donatur-->
                            <div class="modal fade" id="updateDonatur<?= $d['id_plg'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Update Pelanggan </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/updatepelanggan') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_plg" id="id_plg" value="<?= $d['id_plg'] ?>">
                                                    <input type="text" class="form-control" id="nama_plg" name="nama_plg" value="<?= $d['nama_plg'] ?>" placeholder="Nama Lengkap" required="">
                                                </div>
                                                <div class="form-group">
                                                    <textarea type="text" required="" class="form-control" id="alamat_plg" name="alamat_plg" placeholder="Alamat"><?= $d['alamat_plg'] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <input type="number" required="" class="form-control" id="telp_plg" name="telp_plg" value="<?= $d['telp_plg'] ?>" placeholder="Telpon">
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
                            <div class="modal fade" id="deletePelanggan<?= $d['id_plg'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Pelanggan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Mengahapus pelanggan akan menghapus juga data pembeliannya, Anda yakin ingin menghapus pelanggan A/n <?= $d['nama_plg'] ?></p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('admin/deletePelanggan?id=') ?><?= $d['id_plg'] ?>" class="btn btn-primary">Hapus</a>
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
                <h5 class="modal-title" id="addNewDonaturLabel">Tambah Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pelanggan') ?>" method="post">
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

<script type="text/javascript">
  $(document).ready(function(){
    $('li#pelanggan').addClass('active');
  });
</script>