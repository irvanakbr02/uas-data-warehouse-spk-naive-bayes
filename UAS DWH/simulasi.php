<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = $_POST['umur'];
$a2 = $_POST['tinggi'];
$a3 = $_POST['nilaiun'];
$a4 = $_POST['kesehatanmata'];
$a5 = $_POST['kesehatanjasmani'];

//TRUE
$umur = $obj->probUmur($a1,1);
$tinggi = $obj->probTinggi($a2,1);
$nilai1 = $obj->probNilai($a3,1);
$kesehatanmata = $obj->probKesehatanmata($a4,1);
$kesehatanjasmani = $obj->probKesehatanjasmani($a5,1);

//FALSE
$umur2 = $obj->probUmur($a1,0);
$tinggi2 = $obj->probTinggi($a2,0);
$nilai2 = $obj->probNilai($a3,0);
$kesehatanmata2 = $obj->probKesehatanmata($a4,0);
$kesehatanjasmani2 = $obj->probKesehatanjasmani($a5,0);

//result
$paT = $obj->hasilTrue($jumTrue,$jumData,$umur,$tinggi,$nilai1,$kesehatanmata,$kesehatanjasmani);
$paF = $obj->hasilFalse($jumFalse,$jumData,$umur2,$tinggi2,$nilai2,$kesehatanmata2,$kesehatanjasmani2);

if($a2 == "kt"){
  $a2 = "Kurang Tinggi";
}else if($a2 == "st"){
  $a2 = "Sangat Tinggi";
}else if($a4 == "tidak_sehat1"){
  $a4 = "Mines 0,25 - 2";
}else if($a4 == "tidak_sehat2"){
  $a4 = "Mines Lebih dari 2";
}else if($a3 == "sangatrendah"){
  $a3 = "Sangat Rendah";
}else if($a3 == "rendah"){
  $a3 = "Rendah";
}else if($a3 == "baik"){
  $a3 = "Baik";
}else if($a3 == "sangatbaik"){
  $a3 = "Sangat Baik";
}
echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi Peserta Didik</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi kelulusan calon peserta didik baru menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='card' style='width: 25rem;'>
  <div class='card-header' style='background-color:#336699;color:#fff'>
    <b>Informasi Calon Peserta didik</b>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>umur : &nbsp;&nbsp;<b>$a1</b></li>
    <li class='list-group-item'>tinggi : &nbsp;&nbsp;<b>$a2</b></li>
    <li class='list-group-item'>rata rata nilai UN : &nbsp;&nbsp;<b>$a3</b></li>
    <li class='list-group-item'>kesehatan mata : &nbsp;&nbsp;<b>$a4</b></li>
    <li class='list-group-item'>kesehatan jasmani : &nbsp;&nbsp;<b>$a5</b></li>
  </ul>
</div><br>
<hr>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#336699;color:#fff'>
    <th>Jumlah True</th>
    <th>Jumlah False</th>
    <th>Jumlah Total Data</th>
  </tr>
  <tr>
    <td>$jumTrue</td>
    <td>$jumFalse</td>
    <td>$jumData</td>
  </tr>
</table>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#336699;color:#fff'>
    <th></th>
    <th>True</th>
    <th>False</th>
  </tr>
  <tr>
    <td>pA</td>
    <td>$jumTrue / $jumData</td>
    <td>$jumFalse / $jumData</td>
  </tr>
  <tr>
    <td>Umur</td>
    <td>$umur / $jumTrue</td>
    <td>$umur2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Tinggi Badan</td>
    <td>$tinggi / $jumTrue</td>
    <td>$tinggi2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Nilai UN</td>
    <td>$nilai1 / $jumTrue</td>
    <td>$nilai2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Status Kesehatan Mata</td>
    <td>$kesehatanmata / $jumTrue</td>
    <td>$kesehatanmata2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Kesehatan Jasmani</td>
    <td>$kesehatanjasmani / $jumTrue</td>
    <td>$kesehatanjasmani2 / $jumFalse</td>
  </tr>
</table>
";

echo "<br>
  <table class='table table-bordered' style='font-size:18px;text-align:center;'>
    <tr style='background-color:#336699;color:#fff'>
      <th>PREDIKSI Diterima</th>
      <th>PREDIKSI Ditolak</th>
    </tr>
    <tr>
      <td>$paT</td>
      <td>$paF</td>
    </tr>
  </table>
";

$result = $obj->perbandingan($paT,$paF);

if($paT > $paF){
  echo "<br>
  <h3 class='tebal'>PREDIKSI <span class='badge badge-success' style='padding:10px'><b>DITERIMA</b></span> LEBIH BESAR DARI PADA PREDIKSI DITOLAK</h3><br>";
  echo "<h4><br>PREDIKSI diterima sebesar : <b>".round($result[1],2)." %</b> <br>PREDIKSI ditolak sebesar : <b>".round($result[2],2)." % </b></h4>";
}else if($paF > $paT){
  echo "<br>
  <h3 class='tebal'>PREDIKSI <span class='badge badge-danger' style='padding:10px'><b>DITOLAK</b></span> LEBIH BESAR DARI PADA PREDIKSI DITERIMA</h3><br>";
  echo "<h4><br>PREDIKSI ditolak sebesar : <b>".round($result[1],2)." %</b> <br>PREDIKSI diterima sebesar : <b>".round($result[2],2)." % </b></h4>";
}


if($result[0] == "DITERIMA"){
  echo "
  <div class='alert alert-success mt-5' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Selamat! berdasarkan hasil peritungan Naive Bayes, anda diprediksi akan <b>diterima!</b></p>
    <hr>
    <p class='mb-0'>- Have a nice day -</p>
  </div>";
}else{
  echo"
  <div class='alert alert-danger mt-5' role='aler'>
  <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
  <p>Maaf, berdasarkan hasil peritungan Naive Bayes, anda diprediksi akan <b>ditolak!</p>
  <hr>
  <p class='mb-0'>- Don't give up ! -</p>
  </div>";
}


 ?>
