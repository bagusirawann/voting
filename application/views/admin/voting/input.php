
<?php 
    if ($btn == "EDIT" || $btn == "cek") {
        
    }else{
        $val['id_voting'] = "";
        $val['nama_voting'] = "";
        $val['date_start'] = "";
        $val['date_end'] = "";
        $val['status'] ='';
    }
 ?>


<div class="card shadow mb-4">

	<div style="background-color: #47597E" class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #fff">Tambah Voting</h6>
    </div>
      

    <div class="card-body">
    	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

        <?php if($btn=='EDIT'){ ?>

    	<?php echo form_open_multipart('voting/edit', array('role'=>'form'));?>


        <input type="hidden" name="id_voting" value="<?= $val['id_voting']; ?>">

        <?php }else{

            echo form_open_multipart('voting/create', array('role'=>'form'));

        } ?>

        

        		                    <div class="form-group col-12">
                                        <label>Nama voting</label>
                                        <input class="form-control" name="nama_voting" placeholder="Nama Voting" required value="<?= $val['nama_voting']; ?>" <?php if($val['status'] == '1' || $btn == "cek"){echo "readonly=''";} ?>>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Tanggal Mulai</label>
                                        <input class="form-control" type="date" name="date_start" placeholder="Tanggal Mulai" required value="<?= $val['date_start']; ?>" <?php if($val['status'] == '1' || $btn == "cek"){echo "readonly=''";} ?>>
                                    </div>

                                

                               
                                <?php if($val['status'] != '1' && $btn == "EDIT" || $btn == "Input"){ ?>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                

                                <?php } ?>

                                <?php echo anchor('voting','Kembali',array('class'=>'btn btn-danger btn-sm'))?>

    	</form>




    </div>
	
</div>


<?php if($btn == "cek" || ($btn == "EDIT" && $val['status'] != '1')){ ?>


<div class="card shadow mb-4">

    <div style="background-color: #47597E" class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #fff">Data Kandidat</h6>
    </div>

     <div class="card-body">
        <div id="notifications"><?php echo $this->session->flashdata('msg2'); ?></div>

        <form method="POST" action="<?php echo base_url(); ?>voting/tambah_kandidat" enctype="multipart/form-data">
             <input type="hidden" name="id_voting" value="<?= $val['id_voting']; ?>">
             <input type="hidden" name="btn" value="<?= $btn; ?>">
                                <div class="form-group">
                                    <label>Kandidat</label>
                                    <select name="id_kandidat" class="selectpicker form-control"  data-live-search="true" required="">
                                      <option value="">Silahkan Pilih</option>
                                      <?php foreach ($kandidat as $c) { ?>
                                        <option value="<?php echo $c->id_kandidat; ?>" >Nama Kandidat : <?php echo $c->nama_kandidat; ?></option>
                                      <?php } ?>
                                          
                                    </select>
                                    
                                </div>

                               

                                <button type="submit" name="submit" class="btn btn-primary" >Tambah</button>
                               
                               

        </form>

    </div>
    
</div>

 <?php } ?>
 <?php if($btn == "cek" || $btn == "EDIT" ){ ?>
<div class="card shadow mb-4">

    <div style="background-color: #47597E" class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color: #fff">Kandidat</h6>
    </div>

     <div class="card-body">

        <div class="row">
        <?php foreach ($list_kandidat as $kandidat) { ?>
            <div class="card ml-5 mr-5" style="width: 18rem;">
              <img class="card-img-top" src="<?= base_url().'upload/'.$kandidat->image ?>" alt="Card image cap">
              <div class="card-body">
                <center><h3 class="card-text">
                    <?= ucfirst($kandidat->nama_kandidat) ?>
                </h3>
                <?php if($val['status']!='2'){ ?>
                <a href="<?= base_url().'voting/hapus/'.$kandidat->id_detail_voting.'/'.$btn.'/'.$val['id_voting'] ?>" class="btn btn-danger" onclick = "return confirm('Yakin ingin menghapus?')">X</a>
            <?php } ?>
                <hr>
                <br>
                <h3><b>Total Suara : <?= number_format($kandidat->poin) ?></b></h3>
                </center>
              </div>
            </div>
        <?php } ?>
        </div>
        <?php if($btn == "cek" || ($btn == "EDIT" && $val['status'] != '1')){ ?>
        <a href="<?= base_url().'voting/simpan/'.$val['id_voting'] ?>" class="btn btn-primary mt-5" onclick = "return confirm('Yakin ingin menyimpan?')" >Simpan</a> 
        <a href="<?= base_url().'voting/end/'.$val['id_voting'] ?>" class="btn btn-danger mt-5" onclick = "return confirm('Yakin ingin Mengakhiri Voting?')" >Akhiri Voting</a>
         <?php }else{?> 

            <a href="<?= base_url().'voting/print/'.$val['id_voting'] ?>" class="btn btn-danger mt-5" ><i class="fas fa-print"></i> Cetak Laporan</a> 
        <?php } ?> 
     </div>

 </div>

 <?php } ?>