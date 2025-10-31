<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EVOTING - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-select.min.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color: #47597E" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <div class="sidebar-heading">
                    Menu Control
                </div>

                <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>

                <a class="nav-link" href="<?php echo base_url(); ?>petugas">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Admin</span>
                </a>

                <a class="nav-link" href="<?php echo base_url(); ?>pemilih">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pemilih</span>
                </a>

                <a class="nav-link" href="<?php echo base_url(); ?>kandidat">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Kandidat</span>
                </a>

                <a class="nav-link" href="<?php echo base_url(); ?>voting">
                    <i class="fas fa-fw fa-file"></i>
                    <span>E-Voting</span>
                </a>
               

            </li>

            <!-- Divider -->
            


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        


                        <div class="topbar-divider d-none d-sm-block">
                          

                        </div>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $this->session->userdata('nama_admin'); ?></span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" OnClick = "return confirm('Yakin Ingin Keluar?')"  href="<?php echo base_url(); ?>admin/logout" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    

                    <?php echo $contents;?>
                    

                </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

     <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-select.min.js"></script>

    <!-- panggil ckeditor.js -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <!-- panggil adapter jquery ckeditor -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/adapters/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <script>
    var xValues = [<?php foreach ($list_kandidat as $k): ?>'<?php echo $k->nama_kandidat; ?>',<?php endforeach; ?>];
    var yValues = [<?php foreach ($list_kandidat as $k): ?><?php echo $k->poin; ?>,<?php endforeach; ?>];
    var barColors = [
      "#ffff00",
      "#d30000",
      "#4040ff",
      "#24a319",
      "#000000"
    ];

    new Chart("myChart", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: ""
        }
      }
    });
</script>


    <!-- setup selector -->
    <script type="text/javascript">
        $('#desc').ckeditor();
        $('#visi').ckeditor();
        $('#misi').ckeditor();
    </script>


    <script type="text/javascript">
      
      // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});


$(document).ready(function() {
  $('#dataTables').DataTable();
});

$(document).ready(function() {
  $('#dataTabless').DataTable();
});
    </script>

    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>



<script type="text/javascript">
        
    $(document).ready(function() {
      var desc = CKEDITOR.instances['desc'].getData();
      var visi = CKEDITOR.instances['visi'].getData();
      var misi = CKEDITOR.instances['misi'].getData();
    });

</script>

</body>

</html>