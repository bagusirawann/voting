<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EVOTING - Dashboard</title>

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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h6 class="m-0 font-weight-bold text-primary"></h6> 
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo $this->session->userdata('nama_pemilih'); ?></span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" OnClick = "return confirm('Yakin Ingin Keluar?')"  href="<?php echo base_url(); ?>login/logout" >
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

                   <div class="row"> 
                    <div class="col-9 mt-2 mb-5"  style="height: 100%">
                        
                      <div class="card shadow mb-4">

                        <div style="background-color: #47597E" class="card-header py-3">
                             <center><h6 class="m-0 font-weight-bold" style="color: #fff">Pemilihan Ketua <b><?= $validate['nama_voting'] ?></b></h6>
                              </center>
                          </div>
                          <div class="card-body text-center">

                            <div class="card-body">
                              <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>


                              <?php 
                                  $cek = $this->db->get_where('voting',['id_voting'=>$validate['id_voting'],'date_end'=>null])->row_array();
                                  if($cek['id_voting']!=''){

                              ?>


                              <?php 
                                  $cek = $this->db->get_where('riwayat_voting',['id_voting'=>$validate['id_voting'],'id_pemilih'=>$this->session->userdata('id_pemilih')])->row_array();
                                  if($cek['id_voting']==''){

                              ?>

                                <div class="row">
                                <?php foreach ($list_kandidat as $kandidat) { ?>
                                    <div class="card ml-5 mr-5" style="width: 18rem;">
                                      <img class="card-img-top" src="<?= base_url().'upload/'.$kandidat->image ?>" alt="Card image cap">
                                      <div class="card-body">
                                        <center><h3 class="card-text">
                                            <?= ucfirst($kandidat->nama_kandidat) ?>
                                        </h3>
                                        
                                        <a class="btn btn-primary mt-5" data-toggle="modal" data-target="#modals<?= $kandidat->id_detail_voting ?>">Lihat Detail</a> 


                                        <a href="<?= base_url().'evoting/pilih/'.$kandidat->id_detail_voting.'/'.$kandidat->id_voting.'/'.$kandidat->id_kandidat ?>" class="btn btn-danger mt-5" onclick = "return confirm('Yakin ingin memilih <?= $kandidat->nama_kandidat ?>')">Pilih</a>
                                        </center>
                                      </div>
                                    </div>





                                    <!-- Modal -->
                                        <div class="modal fade" id="modals<?= $kandidat->id_detail_voting ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?= $kandidat->nama_kandidat ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body text-left">
                                                <center><img class="img-fluid" style="width: 30%" src="<?= base_url().'upload/'.$kandidat->image ?>" ></center><br><br>
                                                <center>Visi<hr></center>
                                                <?= $kandidat->visi ?>
                                                <center>Misi<hr></center>
                                                <?= $kandidat->misi ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>


                                <?php } ?>
                                </div>

                              <?php }else{?>

                                <div class="alert alert-success alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Anda sudah memilih</strong>, Hasil pemilihan baru bisa dilihat setelah voting ditutup
                              </div>

                              <?php }}else{ ?>

                                <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong>Voting Telah Ditutup</strong>, Anda Bisa Melihat Hasil Voting
                              </div>


                         <div class="card-body">
                            <h6 class="m-0 font-weight-bold" style="color: #47597E">Pemilihan Ketua Karang Taruna <?= $val['nama_voting']; ?></h6>
                            <hr>

                            <div class="row">
                            <?php foreach ($list_kandidat as $kandidat) { ?>
                                <div class="card ml-5 mr-5" style="width: 14rem;">
                                  <img class="card-img-top" src="<?= base_url().'upload/'.$kandidat->image ?>" alt="Card image cap">
                                  <div class="card-body">
                                    <center><h3 class="card-text">
                                        <?= ucfirst($kandidat->nama_kandidat) ?>
                                    </h3>
                                    <hr>
                                    <br>
                                    <h3><b>Suara : <?= number_format($kandidat->poin) ?></b></h3>
                                    </center>
                                  </div>
                                </div>
                            <?php } ?>
                            </div>

                            <hr>

                            <div class="col-lg-12 col-xs-12" style="margin-bottom: 50px;" >
                              <canvas id="myChart" width="300" height="100"></canvas>
                           </div>

                           <div class="row justify-content-center">
                               <div class="col-lg-3">
                                   <p disabled>
                                    Jumlah Pemilih : <?php if($pemilih['total']!=''){echo $pemilih['total'];}else{ echo "0";} ?> Orang 
                                   </p>
                               </div>
                               <div class="col-lg-3">
                                   <p disabled>
                                    Sudah Memilih : <?php if($sudah['total']!=''){echo $sudah['total'];}else{ echo "0";} ?> Orang 
                                   </p>
                               </div>
                               <div class="col-lg-3">
                                   <p disabled>
                                    Tidak Memilih : <?php if($pemilih['total']!=''){echo $pemilih['total'] - $sudah['total'];}else{ echo "0";} ?> Orang 
                                   </p>
                               </div>
                           </div>

                     </div>

                              <?php } ?>

                             </div>

                          </div>
                      </div>

                    </div>

                    <div class="col-3 mt-2 mb-5"  style="height: 100%">
                        
                      
                      <div class="card shadow mb-4">

                        <div style="background-color: #47597E" class="card-header py-3">
                             <center>
                             <h6 class="m-0 font-weight-bold" style="color: #fff">Profile</h6>
                             </center>
                          </div>
                            

                          <div class="card-body text-center">
                            <img src="<?= base_url() ?>assets/img/kisspng.png" class="img-fluid" style="width: 40%"><br><br><b>
                            <h3><?= $profile['nama_pemilih']; ?></h3></b>
                            <?= $profile['no_ktp']; ?>
                            <hr>
                            <b>Alamat</b><br>
                            <?= $profile['alamat']; ?>
                          </div>

                      </div>

                    </div>
                  </div>
                    
                    

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

</body>

</html>