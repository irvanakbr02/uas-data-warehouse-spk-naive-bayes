<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="icon" type="image/x-icon" href="img/nbc.png" /> -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- font awsome -->
  <link rel="stylesheet" href="css/fontawesome.css" />
  <link rel="stylesheet" href="css/brands.css" />
  <link rel="stylesheet" href="css/solid.css" />

  <link rel="stylesheet" href="css/gaya.css">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

  <title>Prediksi Peserta Didik Baru</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
            <!-- <img src="img/nbc.png" alt="" width=50 height=50> -->
          </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Prediksi<span class="sr-only">(current)</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_simulasi.php">Data</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="about.php">Informasi</a>
          </li> -->
        </ul>
      </div>
    </div>
</nav>

    <div class="container" style='margin-top:90px'>
      <div class="row">
        <div class="col-12 mt-5">
          <h2 class="tebal">Apa itu Naive Bayes ?</h2>
          <p class="desc mt-4">Naïve Bayes Classifier merupakan sebuah metoda klasifikasi yang berakar pada teorema Bayes.
          Metode pengklasifikasian dengan menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes, yaitu memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes.<br/><br/>
        
        <h2 class="tebal">Prediksi Kelulusan Peserta Didik Baru Sekolah Menegah Kejuruan Menggunakan Naive Bayes</h2>
          <p class="desc mt-4">Untuk Project ini saya menggunakan algoritma naive bayes untuk membantu memprediksi dalam proses penerimaan peserta didik sekolah menegah kejuruan baru yang nantinya dapat menampilkan hasil yang sekiranya dapat menjadi acuan, patokan dan tolak ukur saat penerimaan berlangsung.<br/><br/>
          </div>
      </div>

    <div class="row">
      <div class="col-12 mt-4">
        <h3 class="tebal">Masukan Data</h3>
      </div>

      <div class="col-6">
          <form method="POST" class="mt-3">

          <div class="form-group">
            <label for="umur">Umur :</label>
            <select name="umur" id="umur" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih umur anda--</option>
                      <?php
                      for($i=14 ; $i <= 18 ; $i++){
                        echo"<option value='$i'>$i</option>";
                      }
                      ?>
            </select>
          </div>

          <div class="form-group">
            <label for="umur">Tinggi Badan :</label>
            <select name="tinggi" id="tinggi" class="form-control selBox" required="required">
                <option value="" disabled selected>-- pilih tinggi badan--</option>
                <option value="kt">( < 140 cm - 155 cm )</option>
                <option value="ideal">( 156 cm - 165 cm )</option>
                <option value="st"> ( >165 cm )</option>
            </select>
          </div>

          <div class="form-group">
            <label for="umur">Rata - rata nilai UN :</label>
            <select name="nilai" id="nilai" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih nilai rata-rata UN --</option>
                      <option value="rendah"> ( 20 - 24 )</option>
                      <option value="baik"> ( 25 - 32 )</option>
                      <option value="sangatbaik"> ( 33 - 40 )</option>
                  </select>
          </div>

           <div class="form-group">
            <label for="umur">Status Kesehatan Mata :</label>
            <select name="kesehatanmata" id="kesehatanmata" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih status kesehatan--</option>
                      <option value="sehat">Sehat</option>
                      <option value="tidak_sehat1">Mines 0,25 - 2</option>
                      <option value="tidak_sehat2">Mines lebih dari 2</option>
                  </select>
          </div>          
         

          <div class="form-group">
            <label for="umur">Status Kesehatan Jasmani:</label>
            <select name="kesehatanjasmani" id="kesehatanjasmani" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih status kesehatan--</option>
                      <option value="sehat">Sehat</option>
                      <option value="tidak_sehat">Tidak Sehat</option>
                  </select>
          </div>

          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary mt-3" id="dor" onclick="return simulasi()"/>
          </div>

          </form>
      </div>
    </div>
        
    <div class="row">
      <div class="col-12 mt-5 mb-5">
          <div id="hasilSIM" style="margin-bottom:30px;">

          </div>
      </div>
    </div>

    </div>

<!-- Footer -->
<footer class="page-footer font-small abu1 mt-5">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-5">

        <!-- <div class="text-center">
          Dibuat dengan <i class="fa fa-heart" style="color:#dc3545"></i> di Padang
        </div> -->
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 abu2">©<?php echo date('Y'); ?> <a href="https://www.instagram.com/irvanakbr02/">IrvanAkbr02</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.js"></script>
<script src="jspopper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- validasi -->
<script>
  $(document).ready(function(){
    $('.toggle').click(function(){
      $('ul').toggleClass('active');
    });
  });
</script>

<script>
  function simulasi()
  {
    var umur = $("#umur").val();
    var tinggi = $("#tinggi").val();
    var nilaiun = $("#nilai").val();
    var kesehatanmata = $("#kesehatanmata").val();
    var kesehatanjasmani = $("#kesehatanjasmani").val();

    //validasi
    var um = document.getElementById("umur");
    var tb = document.getElementById("tinggi");
    var nil = document.getElementById("nilai");
    var km = document.getElementById("kesehatanmata");
    var kj = document.getElementById("kesehatanjasmani");

    if(um.selectedIndex == 0){
      alert("Umur Tidak Boleh Kosong");
      return false;
    }

    if(tb.selectedIndex == 0){
      alert("Tinggi Badan Tidak Boleh Kosong");
      return false;
    }

    if(nil.selectedIndex == 0){
      alert("Nilai Tidak Boleh Kosong");
      return false;
    }

    if(km.selectedIndex == 0){
      alert("Status Kesehatan Mata Tidak Boleh Kosong");
      return false;
    }

    if(kj.selectedIndex == 0){
      alert("Status Kesehatan Jasmani Tidak Boleh Kosong");
      return false;
    }

    //batas validasi

      $.ajax({
        url :'simulasi.php',
        type : 'POST',
        dataType : 'html',
        data : {umur : umur , tinggi : tinggi , nilaiun : nilaiun , kesehatanmata : kesehatanmata , kesehatanjasmani : kesehatanjasmani},
        success : function(data){
          document.getElementById("hasilSIM").innerHTML = data;
        },
      });

      return false;

  }
</script>

<script>
$(document).ready(function(){
  $('#dor').click(function(){
    $('html, body').animate({
        scrollTop: $("#hasilSIM").offset().top
    }, 500);
  });
});
</script>
</body>
</html>