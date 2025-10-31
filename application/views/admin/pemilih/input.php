
<?php 
    if ($btn == "EDIT") {
        
    }else{
        $val['id_pemilih'] = "";
        $val['nama_pemilih'] = "";
        $val['no_ktp'] = "";
        $val['nohp'] = "";
        $val['alamat'] = "";
    }
 ?>


<div class="card shadow mb-4">

	<div style="background-color: #47597E" class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #fff">Data Pemilih</h6>
    </div>
      

    <div class="card-body">
    	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

        <?php if($btn=='EDIT'){ ?>

    	<?php echo form_open_multipart('pemilih/edit', array('role'=>'form'));?>


        <input type="hidden" name="id_pemilih" value="<?= $val['id_pemilih']; ?>">

        <?php }else{

            echo form_open_multipart('pemilih/create', array('role'=>'form'));

        } ?>

        

                                <div class="row" >
                                    <div class="form-group col-6">
                                        <label>Nomor KTP</label>
                                        <input class="form-control" name="no_ktp" placeholder="Nomor KTP" required value="<?= $val['no_ktp']; ?>">
                                    </div>
                                 
        		                    <div class="form-group col-6">
                                        <label>Nama pemilih</label>
                                        <input class="form-control" name="nama_pemilih" placeholder="Nama Lengkap" required value="<?= $val['nama_pemilih']; ?>">
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" value="<?= $val['nohp']; ?>" class="form-control" name="nohp" placeholder="No Telepon" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" required><?= $val['alamat']; ?></textarea>
                                </div>

                               
                                

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('pemilih','Kembali',array('class'=>'btn btn-danger btn-sm'))?>

    	</form>

    </div>
	
</div>

