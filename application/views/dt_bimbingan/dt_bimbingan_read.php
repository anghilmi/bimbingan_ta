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
        <h3 style="margin-top:0px">Baca Dt_bimbingan</h3>
        <br>
        <table class="table">
	    <tr><td>Thn Akademik</td><td><?php echo $thn_akademik; ?></td></tr>
	    <tr><td>Nim</td><td><?php echo $nim; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Nidn</td><td><?php echo $nidn; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
	    <tr><td>Qrcode</td><td><?php echo $qrcode; ?></td></tr>
	    <tr><td>Validasi</td><td><?php echo $validasi; ?></td></tr>
	</table>
<a href="<?php echo site_url('dt_bimbingan') ?>" class="btn btn-primary">Tutup</a>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</body>
</html>