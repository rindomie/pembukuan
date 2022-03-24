<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Kas Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format($total_masuk['nominal']) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>


    <div class="row">

        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
            </div>') ?>
            <?= $this->session->flashdata('message') ?>
            
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kas Masuk</h6>
                </div>

                <div class="card-body">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewDonasi"><i class="fas fa-fw fa-coins"></i> Input Kas Masuk</a>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Transaksi</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal transaksi</th>
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kas_keluar as $d) : 
                                    $date = date_create($d['tgl_transaksi']);

                                    ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                        
                                        <td><?= $d['id_transaksi'] ?></td>
                                        <td><?= $d['keterangan'] ?></td>


                                        <td><?= date_format($date,"d F Y") ?></td>
                                        <td> <?= number_format($d['nominal'],0,',','.') ?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#deleteDonasi<?= $d['id_transaksi'] ?>" class="badge badge-danger">Delete</a>
                                            

                                        </td>
                                    </tr>
                                    <!--delete donasi-->
                                    <div class="modal fade" id="deleteDonasi<?= $d['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewDonaturLabel">Hapus Donasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus kas keluar dengan ID Transaksi <?= $d['id_transaksi'] ?></p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('transaksi/deletekasmasuk?id=') ?><?= $d['id_transaksi'] ?>" class="btn btn-primary">Hapus</a>
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
                <h5 class="modal-title" id="addNewDonasiLabel">Input Kas Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
            </div>

            <div class="modal-header">
                <button type="button" id="btn-tambah-form" class="btn btn-primary mb-3" >Tambah Data Form</button> <button type="button" id="btn-reset-form" " class="btn btn-primary mb-3">Reset Form</button>
                
            </div>

            <form action="<?= base_url('transaksi/savekasmasuk') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="date"  id="tanggal" name="tanggal" required="">
                    </div>
                    <hr>
                    <b>Data 1 :</b><br><br>

                    <div class="form-group">
                        <label for="inputAddress">Keterangan</label>
                        <input type="text" required="" class="form-control" id="keterangan" name="keterangan[]" placeholder="ex: pembayaran .....">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                    </div>
                    

                    <div class="form-group">
                       <label for="inputAddress2">Nominal</label>
                       <input type="text" required="" class="form-control" onkeyup="hit()" name="nominal[]" placeholder="ex: 100000">
                       <?= form_error('nominal', '<small class="text-danger pl-3">', ' </small>') ?>
                   </div>

                   <div id="insert-form"></div>
                   <hr><div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Rp</span>
                        </div>
                        <input type="text" class="form-control" id="total" name="total" placeholder="0" aria-label="Nominal" readonly="" aria-describedby="addon-wrapping">
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




<script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append(`<hr><b>Data ${nextform} :</b><br><br>
                    <div class="form-group">
                        <label for="inputAddress">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" required="" name="keterangan[]" placeholder="ex: pembayaran .....">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>
                    </div>

                    <div class="form-group">
                       <label for="inputAddress2">Nominal</label>
                       <input type="text" required="" class="form-control" onkeyup="hit()"  name="nominal[]" placeholder="ex: 100000">
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
    $('li#kasmasuk').addClass('active');
  });
</script>