<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   

    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>

          <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat pembelian <?php foreach ($pelanggan_id as $p) {
                            echo $p['nama_plg'];
                        } ?></h6>
                  </div>

                  <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            
           <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th>Tanggal</th>
                            <th >Cup</th>
                            <th >Jumlah beli</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pelanggan as $d) : ?>
                            <tr>
                                <th ><?= $i ?></th>
                                <td><?= date('d F Y', strtotime($d['tgl_pembelian'])) ?></td>
                                <td><?= $d['keterangan_cup'] ?></td>
                                <td><?= $d['jml_pembelian'] ?></td>
                                
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

<script type="text/javascript">
  $(document).ready(function(){
    $('li#pelanggan').addClass('active');
  });
</script>