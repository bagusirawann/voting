
                    <div class="card shadow mb-4">
                        <div style="background-color: #47597E" class="card-header py-3">
                           <h6 class="m-0 font-weight-bold" style="color: #fff">Data Voting</h6>
                        </div>
                         <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

                        <div class="card-body py-3">
                           <a href="<?php echo base_url() ?>voting/create" class="btn btn-primary">Tambah Voting</a>
                        </div>

                         
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="111%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>ID Voting</th>
                                            <th>Nama Voting</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                        foreach ($record as $dt) {
                                          
                                       ?> 

                                        <tr>
                                            <td><?php echo $dt->id_voting; ?></td>
                                            <td><?php echo $dt->nama_voting; ?></td>
                                            <td><?php echo $dt->date_start; ?></td>
                                            <td><?php echo $dt->date_end; ?></td>
                                            <td><b><?php if($dt->status == '2'){echo "<font color='orange'>Berlangsung</font>";}else{echo "<font color='green'>Sudah selesai</font>";} ?></b></td>

                                            <td>

                                                <?php if($dt->status == '2'){?>

                                                <a href="<?php echo base_url(); ?>Voting/edit/<?php echo $dt->id_voting;?>" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                                                <a href="<?php echo base_url(); ?>Voting/arsip/<?php echo $dt->id_voting;?>" Onclick = "return confirm('Yakin Ingin Mengarsipkan?')" class="btn btn-danger"><i class="fas fa-trash" ></i></a>

                                            <?php }else{ ?>

                                                <a href="<?php echo base_url(); ?>Voting/edit/<?php echo $dt->id_voting;?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                                                

                                            <?php } ?>

                                                </td>

                                        </tr>

                                        <?php  } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>