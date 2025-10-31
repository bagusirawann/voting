
                    <div class="card shadow mb-4">
                        <div style="background-color: #47597E" class="card-header py-3">
                           <h6 class="m-0 font-weight-bold" style="color: #fff">Data Admin</h6>
                        </div>
                         <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

                        <div class="card-body py-3">
                           <a href="<?php echo base_url() ?>petugas/create" class="btn btn-primary">Tambah Admin</a>
                        </div>

                         
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="111%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>ID Admin</th>
                                            <th>Nama Admin</th>
                                            <th>Alamat</th>
                                            <th>No Handphone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                        foreach ($record as $dt) {
                                          
                                       ?> 

                                        <tr>
                                            <td><?php echo $dt->id_admin; ?></td>
                                            <td><?php echo $dt->nama_admin; ?></td>

                                            <td><?php echo $dt->alamat; ?></td>
                                            <td><?php echo $dt->nohp; ?></td>
                                            <td><b><?php if($dt->status == '1'){echo "<font color='green'>Aktif</font>";}else{echo "<font color='red'>Tidak Aktif</font>";} ?></b></td>

                                            <td>

                                                <?php if($dt->status == '1'){?>

                                                <a href="<?php echo base_url(); ?>petugas/edit/<?php echo $dt->id_admin;?>" class="btn btn-primary"><i class="fas fa-edit"></i></a> | 
                                                <a href="<?php echo base_url(); ?>petugas/arsip/<?php echo $dt->id_admin;?>" Onclick = "return confirm('Yakin Ingin Mengarsipkan?')" class="btn btn-danger"><i class="fas fa-trash" ></i></a>

                                            <?php }else{ ?>



                                                <a href="<?php echo base_url(); ?>petugas/aktif/<?php echo $dt->id_admin;?>" class="btn btn-success" Onclick = "return confirm('Yakin Ingin Mengaktifkan?')"><i class="fas fa-check"></i></a>


                                            <?php } ?>

                                                </td>

                                        </tr>

                                        <?php  } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>