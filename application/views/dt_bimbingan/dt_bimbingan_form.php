<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="assets/datepicker/css/bootstrap-datepicker.min.css">

    <title>Buat Data Bimbingan</title>
  </head>
  <body>
  <br>
  <div class="container-fluid">
        <h3 style="margin-top:0px">Buat Data Bimbingan</h3>
        <hr>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    
	    <div class="form-group">
            <label for="varchar">NIM <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM Anda" autocomplete="on" value="<?php echo $nim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggal  <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tanggal" placeholder="Tanggal bimbingan" autocomplete="off" value="<?php echo $tgl; ?>" />
           
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Dosen <?php echo form_error('nidn') ?></label>
            <?php
                $dd_dosen_attribute = 'class="form-control select2"';
                echo form_dropdown('nidn', $dd_dosen, $dosen_selected, $dd_dosen_attribute);
                ?>
        </div>
	    <div class="form-group">
            <label for="catatan">Catatan <?php echo form_error('catatan') ?></label>
            <textarea class="form-control" rows="6" name="catatan" id="catatan" placeholder="Catatan Hasil Bimbingan"><?php echo $catatan; ?></textarea>
        </div>
	    
	    <input type="hidden" name="id_record" value="<?php echo $id_record; ?>" /> 
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    
	</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
</div>
<script>
$('#tanggal').datepicker({
		format: 'dd-mm-yyyy',
		daysOfWeekDisabled: "0",
    autoclose:true,
    todayBtn: true,
    todayHighlight: true
    });
</script>
</body>
</html>