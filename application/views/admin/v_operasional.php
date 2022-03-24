<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>

          <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Operasional</h6>
                  </div>

                  <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonatur">Tambah Operasional</a>
           <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Keterangan</th>
                            <th >Biaya</th>
                            <th >Waktu</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($operasional as $d) : ?>
                            <tr>
                                <?php $date = date_create($d['waktu_operasional']) ?>
                                <th ><?= $i ?></th>
                                <td><?= $d['keterangan'] ?></td>
                                <td><?= $d['biaya_operasional']?></td>
                                <td><?= date_format($date, "d F Y") ?></td>
                               
                                <td>
                                    
                                   <!--  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#updateDonatur<?= $d['id_operasional'] ?>">Edit</a> -->
                                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deletePelanggan<?= $d['id_operasional'] ?>">Delete</a>

                                </td>
                            </tr>
                            <!--update donatur-->
                            <div class="modal fade" id="updateDonatur<?= $d['id_operasional'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Update Operasional </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('operasional/updateoperasional') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_operasional" id="id_operasional" value="<?= $d['id_operasional'] ?>">
                                                    <label>Keterangan</label>

                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $d['keterangan'] ?>" placeholder="Keterangan" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Biaya</label>
                                                    <input type="text" class="form-control" id="biaya_operasional" name="biaya_operasional" value="<?= $d['biaya_operasional'] ?>" placeholder="biaya" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Waktu</label>
                                                    <input type="date" required="" class="form-control" id="waktu_operasional" name="waktu_operasional" value="<?= $d['waktu_operasional'] ?>" >
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
                            <div class="modal fade" id="deletePelanggan<?= $d['id_operasional'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDonaturLabel">Hapus Operasional</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus  <?= $d['keterangan'] ?></p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('operasional/deleteOperasional?id=') ?><?= $d['id_operasional'] ?>" class="btn btn-primary">Hapus</a>
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
                <h5 class="modal-title" id="addNewDonaturLabel">Tambah Operasional Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('operasional') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" id="keterangan2" name="keterangan2" placeholder="Keterangan" required="">
                    </div>
                    <div class="form-group">
                        <label>Biaya(Rp)</label>
                        <input type="number" class="form-control" id="biaya_operasional" name="biaya_operasional" placeholder="Biaya" required="">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="waktu_operasional" name="waktu_operasional" required="">
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
    $('li#operasional').addClass('active');
  });
</script>