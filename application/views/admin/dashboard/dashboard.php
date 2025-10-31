<!-- Page Heading -->
                   


                  
                    <?php if($val['id_voting']!=''){  ?>

                        <div class="card shadow mb-4">

                        <div style="background-color: #47597E" class="card-header py-3">
                           <h6 class="m-0 font-weight-bold" style="color: #fff">Voting Sedang Berlangsung</h6>
                        </div>

                         <div class="card-body">
                            <center>
                            <h5 class="m-0 font-weight-bold" style="color: #47597E">Pemilihan <?= $val['nama_voting']; ?></h5>
                            </center>
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
                                    Belum Memilih : <?php if($pemilih['total']!=''){echo $pemilih['total'] - $sudah['total'];}else{ echo "0";} ?> Orang 
                                   </p>
                               </div>
                           </div>


                          <a href="<?= base_url().'voting/end/'.$val['id_voting'] ?>" class="btn btn-danger mt-5" onclick = "return confirm('Yakin ingin Mengakhiri Voting?')" >Akhiri Voting</a>

                     </div>

                 <?php }else{ ?>

                    <div class="card shadow mb-4">

                        <div style="background-color: #47597E" class="card-header py-3">
                           <h6 class="m-0 font-weight-bold" style="color: #fff">Tidak Ada Voting</h6>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>

                 <?php } ?>




              



</div>