
<!DOCTYPE html> 
<html>
 <head> 
<!--Import Google Icon Font--> 
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 <!--Import materialize.css--> 
<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection"/>

 <!--Let browser know website is optimized for mobile--> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head>

 <body> 

<nav class="blue lighten-4 fixed">
  <ul id="slide-out" class="side-nav">
    <li><div class="userView">
      <img class="background" src="images/office.jpg">
      <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
      <a href="#!name"><span class="white-text name">John Doe</span></a>
      <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        </nav>





<div class="container">
<div class="card">
<table class="bordered striped">
 <thead class="blue lighten-3"> 
<tr> 
  <th data-field="id">Name</th>
  <th data-field="alamat">Address</th>
  <th data-field="sekolah">School</th>
 </tr>
 </thead> <tbody>
<?php
require 'config.php';
$conn = new Lib();
$result = $conn->showData();
while ($data = $result->fetch(PDO::FETCH_OBJ)){
echo "

<tr> 
<td>$data->nama</td>
<td>$data->alamat</td>
<td>$data->sekolah</td>
</tr>";
}
?>
</tbody> 
</table>
</div></div>

<div class="row container">
<div class="col s8">
<form id="formkirim" action="" method="POST">
<div class="input-field">
<input type="text" name="nama" id="nama" class="nama validate">
<label for="nama">Nama lengkap</label>
</div>
<div class="input-field">
<input type="text" name="alamat" id="alamat" class="alamat validate">
<label for="alamat">Alamat</label>
</div>
<div class="input-field">
<input type="text" name="sekolah" id="sekolah" class="sekolah validate">
<label for="sekolah">Sekolah</label>
</div>
<button name="kirim" class="btn btn-primary" id="kirim">tambah</button>
</div>
</div>

<?php
if(isset($_POST['kirim'])){
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$sekolah = $_POST['sekolah'];

$conn->inputData($nama,$alamat,$sekolah);
}
?>

<script type="text/javascript">
$(document).ready(function(){
   $(".button-collapse").SideNav();
  setInterval(1000);
  $("#formkirim").submit(function(){
     var nama    = $(".nama").val();
     var alamat  = $(".alamat").val();
     var sekolah = $(".sekolah").val();
   $ajax({
     type : 'POST',
     url  : 'index.php',
     data : 'act=nama'+nama+'&alamat='+alamat+'&sekolah='+sekolah',
     success : function(hasil){
       alert('berhasil');
};
});
});

});
</script>
<!--Import jQuery before materialize.js-->
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> <script type="text/javascript" src="materialize/js/materialize.min.js"></script> 
</body> 
</html> 

