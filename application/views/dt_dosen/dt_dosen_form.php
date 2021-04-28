<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" >

    <title></title>
  </head>
  <body>
  <br>
  <div class="container-fluid">
        <h3 style="margin-top:0px"><?php echo $button ?> Dt_dosen</h3>
        <hr>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Nidn <?php echo form_error('nidn') ?></label>
            <input type="text" class="form-control" name="nidn" id="nidn" placeholder="Nidn" autocomplete="off" value="<?php echo $nidn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" autocomplete="off" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin <?php echo form_error('pin') ?></label>
            <input type="text" class="form-control" name="pin" id="pin" placeholder="Pin" autocomplete="off" value="<?php echo $pin; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dt_dosen') ?>" class="btn btn-default">Batal</a>
	</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</div>
</body>
</html>