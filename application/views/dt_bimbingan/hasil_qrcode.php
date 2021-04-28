<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css" >
 <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <title>Hasil</title>
    <style>
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: visible;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
  </head>
  <body>
  <br>
  <div class="container-fluid">

        <p style="margin-top:0px">Tunjukkan QR code berikut pada dosen, atau copy dan share URL ke dosen untuk validasi.</p>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-12">
            <img style="width: 200px;" src="<?php echo base_url().'assets/images/'.$hasil.".png";?>">

            </div>

        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
             URL : <input type="text" value="<?php echo base_url('validasi')."/".$hasil; ?>" id="myInput">
           </div>
             

             
</div>
<br>
<div class="col-md-3">

<button class="btn btn-primary" onclick="myFunction()" onmouseout="outFunc()">
  <span class="tooltiptext" id="myTooltip"></span>
  Copy URL
  </button>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "copy ok! " ;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "";
}
</script>

            </div>
           
        </div>
        
       
        
      </div>
        </body>
    </html>