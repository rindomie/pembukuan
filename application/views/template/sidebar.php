<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <img src="<?= base_url('assets/img/') ?>logo0.png" width="30%">
        <div class="sidebar-brand-text mx-3">Berkat Mulia Sablon</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->

    <div class="sidebar-heading">
            Admin        </div>

        <!-- sub menu -->

                                            <li id="dashboard" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <!-- Divider -->
                  <li id="pelanggan" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>admin/pelanggan">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pelanggan</span></a>
                </li>
                
                <!-- Divider -->
                
                        <hr class="sidebar-divider">
                <div class="sidebar-heading">
            Transaksi        </div>

        <!-- sub menu -->

                                            <!-- <li id="donasi" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>admin/donasi">
                    <i class="fas fa-fw fa-coins"></i>
                    <span>Data Donasi</span></a>
                </li> -->
                <!-- Divider -->
                                        <li id="pemasukan" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>admin/pemasukan">
                    <i class="fas fa-fw fa-hands"></i>
                    <span>Pemasukan</span></a>
                </li>
                <!-- Divider -->
                                        <li id="pengeluaran" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>transaksi/pengeluaran">
                    <i class="fas fa-fw fa-hand-holding-usd"></i>
                    <span>Pengeluaran</span></a>
                </li>

                <hr class="sidebar-divider">
                <div class="sidebar-heading">
            Data        </div>
            <li id="cup" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>cup">
                    <i class="fas fa-fw fa-inbox"></i>
                    <span>Cup</span></a>
                </li>

                <!-- <li id="karyawan" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>karyawan">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Karyawan</span></a>
                </li> -->

               <!--  <li id="operasional" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>operasional">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Operasional & Karyawan</span></a>
                </li> -->

                
                                      
                        <hr class="sidebar-divider">
                <div class="sidebar-heading">
            Laporan        </div>

        <!-- sub menu -->

                                            <li id="laporankas" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>laporan/bukukasumum">
                    <i class="fas fa-fw fa-coins"></i>
                    <span>Laporan</span></a>
                </li>
                <!-- Divider -->
                        <hr class="sidebar-divider">
                <div class="sidebar-heading">
            User        </div>

        <!-- sub menu -->

                                            <li id="user" class="nav-item">
                                <a class="nav-link" href="<?= base_url('') ?>user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span></a>
                </li>
               
                        <hr class="sidebar-divider">
        


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
<!-- End of Sidebar -->

<script>
  $(document).ready(function(){
    $('li').removeClass('active');
  })
</script>
