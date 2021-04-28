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

        <h2 style="margin-top:0px">Daftar Dt_bimbingan</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dt_bimbingan/create'),'Tambah Data', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dt_bimbingan/index'); ?>" class="form-inline" method="get">
                <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <div class="input-group-append">
            
                
                    <?php 
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('dt_bimbingan'); ?>" class="btn btn-outline-secondary">X</a>
                            <?php
                        }
                    ?>
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </div>
                </form>
            </div>
        </div>
        <div class="table-responsive-sm">

        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Thn Akademik</th>
		<th>Nim</th>
		<th>Tgl</th>
		<th>Nidn</th>
		<th>Catatan</th>
		<th>Qrcode</th>
		<th>Validasi</th>
		<th>Aksi</th>
            </tr><?php
            foreach ($dt_bimbingan_data as $dt_bimbingan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dt_bimbingan->thn_akademik ?></td>
			<td><?php echo $dt_bimbingan->nim ?></td>
			<td><?php echo $dt_bimbingan->tgl ?></td>
			<td><?php echo $dt_bimbingan->nidn ?></td>
			<td><?php echo $dt_bimbingan->catatan ?></td>
			<td><?php echo $dt_bimbingan->qrcode ?></td>
			<td><?php echo $dt_bimbingan->validasi ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dt_bimbingan/read/'.$dt_bimbingan->id_record),'Baca'); 
				echo ' | '; 
				echo anchor(site_url('dt_bimbingan/update/'.$dt_bimbingan->id_record),'Ubah'); 
				echo ' | '; 
				?>
        
        <!-- Button trigger modal -->
<a href="" data-toggle="modal" data-target="#hapus">
  Hapus
</a>

<!-- Modal -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusLabel">Hapus Data?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <?php echo anchor(site_url('dt_bimbingan/delete/'.$dt_bimbingan->id_record),'Hapus','class="btn btn-danger"')?>
      </div>
    </div>
  </div>
</div>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('dt_bimbingan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
      </div>
        </body>
    </html>