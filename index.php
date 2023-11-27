<?php
ob_start();
@session_start();
include "../inc/koneksi.php";

if(@$_SESSION['administrator'] || @$_SESSION['resepsionis']) {
if(@$_SESSION['administrator']) {
         	$user_terlogin = @$_SESSION['administrator'];
         } else if(@$_SESSION['resepsionis']) {
         	$user_terlogin = @$_SESSION['resepsionis'];
         }

         $sql_user = mysqli_query($koneksi,"select * from tb_login where kode_user = '$user_terlogin'") or die (mysqli_error());
         $data_user = mysqli_fetch_array($sql_user);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Membuat Desain Web dan Menu Dropdown Sederhana</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div id="canvas">
<div id="judul">	
  HOTEL MEWAH
</div>
<div id="menu">
   <ul>
   	<li class="utama"><a href="">Welcome, <?php echo $data_user['nama_admin']; ?></a>
    <ul>
        <li><a href="?halaman=edit_profil">Edit profil</a></li>
        <?php
    if(@$_SESSION['administrator']){
      ?>
        <li><a href="?halaman=admin">Lihat admin</a></li>
        <li><a href="?halaman=tambah_admin">Tambah admin</a></li>
        <?php
    }
    ?>
        <li><a href="logout.php">Logout</a></li>
    </ul>
   	</li>
    <?php
    if(@$_SESSION['administrator']){
      ?>
	<li class="utama"><a href="?halaman=kamar">Kamar</a></li>
	<li class="utama"><a href="?halaman=fasilitas_kamar">Fasilitas kamar</a></li>
	<li class="utama"><a href="?halaman=fasilitas_hotel">Fasilitas hotel</a></li>
  <?php
    }

    if(@$_SESSION['resepsionis']) {

      ?>

  <li class="utama"><a href="?halaman=pemesanan">Pemesanan</a></li>
<?php } ?>
    </ul>
</div>

<div id="isi">

<?php
$halaman = @$_GET['halaman'];
$action = @$_GET['action'];
////////////////kamar////////////////
if($halaman =="kamar") {
	if($action == "") {
		include "kamar/kamar.php";
	} else if($action == "tambah") {
		include "kamar/tambah_kamar.php";
	} else if($action == "edit") {
		include "kamar/edit_kamar.php";
	} else if($action == "hapus") {
		include "kamar/hapus_kamar.php";
	}  else if($action == "lihat") {
    include "kamar/lihat_kamar.php";
  }
} 
//////////////// fasilitas kamar////////////////
else if($halaman =="fasilitas_kamar") {
  if($action == "") {
    include "fasilitas kamar/fasilitas_kamar.php";
  } else if($action == "tambah") {
    include "fasilitas kamar/tambah_fasilitas_kamar.php";
  } else if($action == "edit") {
    include "fasilitas kamar/edit_fasilitas_kamar.php";
  } else if($action == "hapus") {
    include "fasilitas kamar/hapus_fasilitas_kamar.php";
  }
} 
//////////////// fasilitas hotel////////////////
else if($halaman =="fasilitas_hotel") {
  if($action == "") {
    include "fasilitas hotel/fasilitas_hotel.php";
  } else if($action == "tambah") {
    include "fasilitas hotel/tambah_fasilitas_hotel.php";
  } else if($action == "edit") {
    include "fasilitas hotel/edit_fasilitas_hotel.php";
  } else if($action == "hapus") {
    include "fasilitas hotel/hapus_fasilitas_hotel.php";
  }
} 
////////////profil//////////
 else if($halaman == "edit_profil") {
  include "profil/edit_profil.php"; 
}
///////admin//////////
else if($halaman == "admin") {
  include "profil/admin.php"; 
}  
else if($halaman == "tambah_admin") {
  include "profil/tambah_admin.php"; 
} 
else if($halaman == "edit_admin") {
  include "profil/edit_admin.php"; 
} 
else if($halaman == "hapus_admin") {
  include "profil/hapus_admin.php"; 
} 
///////pemesanan//////////
else if($halaman == "pemesanan") {
  include "pemesanan/pemesanan.php"; 
}  
else if($halaman == "cekin") {
  include "pemesanan/cekin.php"; 
}  
else if($halaman == "cekout") {
  include "pemesanan/cekout.php"; 
} 
else if($halaman == "hapus") {
  include "pemesanan/hapus_pemesanan.php"; 
} 
else if($halaman == "lihat") {
  include "pemesanan/lihat_pemesanan.php"; 
} 
else if($halaman =="") {
	echo "Selamat datang administrator";
}  else{
	echo "404! Halaman tidak di temukan";
}	
?>
</div>
<div id="footer">
  Copyright 2022 - EL RUBY, HABIB, BELIA, RIZAL
</div> 
</div>
</body>
</html>

<?php
} else {
	header("location: login.php");
}
?>