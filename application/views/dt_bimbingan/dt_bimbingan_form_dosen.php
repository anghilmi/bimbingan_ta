<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../assets/datepicker/css/bootstrap-datepicker.min.css">

    <title>Validasi Data Bimbingan</title>
    <style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
</style>
  </head>
  <body>
  <br>
  <div class="container-fluid">
        <h4 style="margin-top:0px">Validasi Data Bimbingan</h4>
        <hr>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    
	    <div class="form-group">
            <label for="varchar">NIM <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM Anda" autocomplete="on" value="<?php echo $nim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggal Bimbingan <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tanggal" placeholder="Tanggal bimbingan" autocomplete="off" value="<?php echo $tgl; ?>" />
           
        </div>
	    <div class="form-group">
            <label for="varchar">NIDN Dosen <?php echo form_error('nidn') ?></label>
            <input type="text" class="form-control" name="nidn" id="nidn" placeholder="NIDN Dosbing" autocomplete="off" value="<?php echo $nidn; ?>" />

        </div>
	    <div class="form-group">
            <label for="catatan">Catatan Bimbingan<?php echo form_error('catatan') ?></label>
            <textarea class="form-control" rows="6" name="catatan" id="catatan" placeholder="Catatan Hasil Bimbingan"><?php echo $catatan; ?></textarea>
        </div>

        <!-- persen progres dan pin -->
        <!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_rangeslider -->

        <div class="slidecontainer">
        <p>Progres TA/Skripsi: <span id="demo"></span> %</p>
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange" name="persen_progres">
  
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
	    
	    <input type="hidden" name="id_record" value="<?php echo $id_record; ?>" /> 
        <br>
	    <button type="submit" class="btn btn-primary">Data OK, Validasi</button> 

        


	    
	</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="../assets/datepicker/js/bootstrap-datepicker.min.js"></script>
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