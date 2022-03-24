<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Finance - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <style media="screen">
    .card {
      background-image: url('assets/img/wave.svg') !important;
      background-size: cover;
      background-position: left;
    }
  </style>

</head>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        <form action="<?php echo base_url('email/sendEmail') ?>" method="post" enctype="multipart/form-data">

          <div style="margin-top: 15%;" class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg">
                  <div class="text-center">
                    <h1 style="color:white" class="h3 mb-4 mt-4">Inponow Send Message</h1>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="form-group">
                      <label for="pesan" style="color:black">Pesan Anda :</label>
                      <textarea class="form-control" name="pesan" rows="6" style="width:100%"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="form-group ">
                      <label for="username" style="padding-left:1px;color:black">Ketikan Email Anda</label>
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder=" Email Anda..." name="email" value="<?php echo set_value('username') ?>">
                      <br>
                      <input type="file" style="height:45px" class="form-control form-control-user" id="" name="uploaded_file">
                    </div>
                    <button type="submit" style="background:#0099ff !important;border-color:#0099ff !important" class="btn btn-primary btn-user btn-block shadow">
                      Kirim Sekarang
                    </button>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- Core plugin JavaScript-->
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
  <!-- Page level custom scripts -->
  <script type="text/javascript">
    var baseurl = '<?php echo base_url(); ?>';
  </script>


</body>

</html>
