
<?php 
    if ($btn == "EDIT") {
        
    }else{
        $val['id_kandidat'] = "";
        $val['nama_kandidat'] = "";
        $val['nohp'] = "";
        $val['alamat'] = "";
        $val['desc'] = "";
        $val['visi'] = "";
        $val['misi'] = "";
        $val['image'] = "";
    }
 ?>


<div class="card shadow mb-4">

	<div style="background-color: #47597E" class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #fff">Data Kandidat</h6>
    </div>
      

    <div class="card-body">
    	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

        <?php if($btn=='EDIT'){ ?>

    	<?php echo form_open_multipart('kandidat/edit', array('role'=>'form'));?>


        <input type="hidden" name="id_kandidat" value="<?= $val['id_kandidat']; ?>">
        <input type="hidden" name="image" value="<?= $val['image']; ?>">
        

        <?php }else{

            echo form_open_multipart('kandidat/create', array('role'=>'form'));

        } ?>
                                <img src="<?= base_url() ?>upload/<?= $val['image']; ?>" class="img-thumbnail mb-3" style="width:30%">
        
                                <div class="form-group">
                                    <label>Foto Kandidat</label>
                                    <input type="file" class="form-control" name="image" placeholder="Nama Lengkap" <?php if($btn!='EDIT'){echo "required";} ?>>
                                </div>
            
                                
                             
    		                    <div class="form-group">
                                    <label>Nama kandidat</label>
                                    <input class="form-control" name="nama_kandidat" placeholder="Nama Lengkap" required value="<?= $val['nama_kandidat']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" required><?= $val['alamat']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Kampanye</label>
                                    <textarea class="form-control" name="desc"   id='desc' required><?= $val['desc']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Visi</label>
                                    <textarea class="form-control"  id='visi' name="visi" required><?= $val['visi']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Misi</label>
                                    <textarea class="form-control" id='misi'  name="misi" required><?= $val['misi']; ?></textarea>
                                </div>
                                

                               
                                

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('kandidat','Kembali',array('class'=>'btn btn-danger btn-sm'))?>

    	</form>

    </div>
	
</div>



