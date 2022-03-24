<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/') ?>default.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name'] ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo date('d F Y'); ?></small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-12">
                 <?= $this->session->flashdata('message') ?>
                <div class="card-body">

                    <b>UBAH PROFIL</b><hr>
                    <form action="<?php echo base_url() ?>user/ganti" method="post">
                        <div class="form-group">
                            <label for="inputAddress">Username</label>
                            <input type="text" required="" class="form-control" name="username" placeholder="" value="<?= $user['email'] ?>">
                            
                            <label for="inputAddress">Nama</label>
                            <input type="text" required="" class="form-control" name="nama" value="<?= $user['name'] ?>" placeholder="">

                        <label for="inputAddress">Password</label>
                        <input type="password" required="" class="form-control" name="password" placeholder="">

                        <label for="inputAddress">Ulangi Password</label>
                        <input type="password" required="" class="form-control" name="password2" placeholder="">
                    </div>
                     <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Ganti</button>
                 </div>
                    </form>
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
    $('li#user').addClass('active');
  });
</script>