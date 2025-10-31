
<?php 
    if ($btn == "EDIT") {
        
    }else{
        $val['id_admin'] = "";
        $val['nama_admin'] = "";
        $val['nohp'] = "";
        $val['alamat'] = "";
        $val['username'] = "";
        $val['password'] = "";
    }
 ?>


<div class="card shadow mb-4">

	<div style="background-color: #47597E" class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #fff">Data Petugas</h6>
    </div>
      

    <div class="card-body">
    	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

        <?php if($btn=='EDIT'){ ?>

    	<?php echo form_open_multipart('petugas/edit', array('role'=>'form'));?>


        <input type="hidden" name="id_admin" value="<?= $val['id_admin']; ?>">

        <?php }else{

            echo form_open_multipart('petugas/create', array('role'=>'form'));

        } ?>

        

            
                                
                             
    		                    <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input class="form-control" name="nama_admin" placeholder="Nama Lengkap" required value="<?= $val['nama_admin']; ?>">
                                </div>

                                

                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" value="<?= $val['nohp']; ?>" class="form-control" name="nohp" placeholder="No Telepon" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" required><?= $val['alamat']; ?></textarea>
                                </div>



                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" placeholder="Username" required value="<?= $val['username']; ?>">
                                </div>

                                
                            <?php if($btn!="EDIT"){ ?>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control"  type="password" name="password" placeholder="Password" value="<?= $val['password']; ?>" required value="">
                                </div>
                                <div class="form-group">
                                    <label>Retype Password</label>
                                    <input class="form-control" type="password" name="repass" placeholder="Retype Password" required value="">
                                </div>

                            <?php } ?>

                               
                                

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('petugas','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                |
                                <a href="<?= base_url() ?>petugas/reset/<?= $val['id_admin'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Yakin Ingin mereset?')">Reset password</a>

    	</form>

    </div>
	
</div>

