<!-- Panggil file koneksi, karena kita membutuhkan nya -->
<?php
  include "koneksi.php"
?>

<!-- INI BAGIAN JUDUL DAN ICON WEB -->
<title>COOLEGS</title>
<link rel="icon" type="image/png" href="gambar/cl.png" /> 

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<!-- INI BAGIAN BACKGROUND WEB -->
<body body background="gambar/bg.jpg" ><br>

<!-- MULAI MEMBUAT FRAME / LAYOUT DESAIN WEB -->
<table width="1024" border="0" align="center" bgcolor="white">

<!-- INI BAGIAN HEADER -->
<tr>
<td colspan="2"> <img src="gambar/header.png" alt="Image" height="280" width="1300"  /></td>
</tr>

<!-- INI BAGIAN MENU -->

<tr>
<td align="center" colspan="2" height="50px" width="50px" bgcolor="#E8D8C4">
	<nav>
	<font color="#124076">
		||&nbsp; 	
			<a href="index.html">HOME</a> 							&nbsp;&nbsp;||&nbsp;&nbsp;
			<a href="kategoribrg.html">KATEGORI BARANG</a> 		&nbsp;&nbsp;||&nbsp;&nbsp;
			<a href="index.php">BELANJA</a> 								&nbsp;&nbsp;||&nbsp;&nbsp;
			<a href="profile_toko.html">TENTANG KAMI</a> 			&nbsp;&nbsp;||&nbsp;&nbsp;
			<a href="formtesti.html">TESTIONI</a> 			&nbsp;&nbsp;||&nbsp;&nbsp;

	</font>
	</nav>
</td>
</tr>


<!-- INI BAGIAN SIDEBAR MENU -->

<tr valign="top">
<td align="left" width="125" bgcolor="#B0C7DD">
	<hr>
	<input type="search" id="site-search" name="q"
			aria-label="Search through site content">
			<button>Cari Barang</button>
<br>
	<hr><hr>
	<a href="belajarphp.php">
	<img src="gambar/logo.png" alt="Image" height="150" width="260"  />
	</ul>
<br>	
	<hr><hr>
	<img src="gambar/lgprofil.png" alt="Image" height="140" width="240"  />
	<ul TYPE="SQUARE">
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="profile_toko.html">Penjual </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="lokasi.html">Lokasi </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="form/buku_tamu.php">Buku Tamu </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="form_input.html">Seller </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="profile_toko.html">Input Profile </a><br/><br/>
	</ul>
<br>	
	<hr><hr>
	<img src="gambar/lgjenis.png" alt="Image" height="160" width="260"  />
	<ol type="1">
	<li><img src="gambar/cl - 2.png" alt="Image" height="15" width="15" /> <a href="Men.html">Men</a><br/><br/>
	<li><img src="gambar/cl - 2.png" alt="Image" height="15" width="15" /> <a href="Women.html">Women</a><br/><br/>
	<li><img src="gambar/cl - 2.png" alt="Image" height="15" width="15" /> <a href="Kids.html">Kids</a><br/>
	</ol>
<br>
	<hr><hr>
	<a href="formtesti.html"></a>
	<img src="gambar/lgtestimoni.png" alt="Image" height="160" width="260"  />
<br>
	<hr><hr>
	<a href="payment.html">
	<img src="gambar/bca.png" alt="Image" height="77" width="150"  /></a><br>
	<img src="gambar/bni.png" alt="Image" height="70" width="150"  /><br>
	<img src="gambar/mandiri.png" alt="Image" height="90" width="150"  /><br>
	<br><a><b>Lokasi Kami :</b></a><br><br>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63355.03512784766!2d110.4235278085408!3d-7.045704061146906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c2fca675267%3A0x6cf025f6beb40590!2sKec.%20Tembalang%2C%20Kota%20Semarang%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1711632654352!5m2!1sid!2sid" width="260" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<br>	
	<hr><hr>
	<a><b>Social Media :</b></a><br>
	<a href="https://www.facebook.com/groups/255311694901659/?locale=id_ID">	<!-- berikan url profil FB anda-->
	<img src="gambar/fb.png" alt="Image" height="50" width="50" /></a> &nbsp;
	<a href="https://www.instagram.com/nayyazl/"> <!-- berikan url profil IG anda-->
	<img src="gambar/ig.png" alt="Image" height="50" width="50" /></a> &nbsp;
	<a href="https://twitter.com/jualbelisepatu"> <!-- berikan url profil twitter anda-->
	<img src="gambar/tw.png" alt="Image" height="50" width="50" /></a> &nbsp;
	<a href="https://api.whatsapp.com/send?phone=62895359829884"> <!-- 628xxxxxxxxxx ganti dengan nomor hp anda-->
	<img src="gambar/wa.png" alt="Image" height="50" width="50" /></a> &nbsp;
</td>


<!-- INI BAGIAN HALAMAN KONTEN -->
<td align="center" width="900" bgcolor="white">
	<br>

	<?php

// Ambil data dari patameter url browser
$kode = (int) $_GET['kode'];

// Query ambil data dari param jika ada.
$query = "SELECT * FROM tb_sepatu WHERE kode = $kode";
// Hasil Query
$result = mysqli_query($koneksi, $query);
foreach($result as $data) {
?>

<section class="row">
<div class="col-md-6 offset-md-3 align-self-center"> 
  <h1 class="text-center mt-4">Update Sepatu</h1>
  <form method="POST">
	<!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
	<input type="hidden" value="<?= $data['kode'] ?>" name="kode">
	<div class="mb-3">
	  <label for="inputKode" class="form-label">Kode</label>
	  <input type="number" class="form-control" id="inputKode" value="<?= $data['kode'] ?>" name="kode" placeholder="Masukan Nis Siswa">
	</div>
	<div class="mb-3">
	  <label for="inputMerk" class="form-label">Merk</label>
	  <input type="text" class="form-control" id="inputMerk" value="<?= $data['merk'] ?>" name="merk" placeholder="Masukan Merk Sepatu">
	</div>
	<div class="mb-3">
	  <label for="inputHarga" class="form-label">Harga</label>
	  <input type="text" class="form-control" id="inputHarga" value="<?= $data['harga'] ?>" name="harga" placeholder="Masukan harga Sepatu">
	</div>
	<div class="mb-3">
	  <label for="inputKategori" class="form-label">Kategori</label>
	  <input type="text" class="form-control" id="inputKategori" value="<?= $data['kategori'] ?>" name="kategori" placeholder="Masukan Kategori Sepatu">
	</div>
	<div class="mb-3">
	  <label for="inputUkuran" class="form-label">Ukuran</label>
	  <input type="text" class="form-control" id="inputUkuran" value="<?= $data['ukuran'] ?>" name="ukuran" placeholder="Masukan Ukuran Sepatu">
	</div>
	<div class="mb-3">
	  <label for="inputWarna" class="form-label">Warna</label>
	  <input type="text" class="form-control" id="inputWarna" value="<?= $data['warna'] ?>" name="warna" placeholder="Masukan Warna Sepatu">
	</div>
	<input name="daftar" type="submit" class="btn btn-primary" value="Update">
	<a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
  </form>
</div>
</section>

<?php } ?>

<?php

// Buat kondisi jika tombol data di klik
if(isset($_POST['daftar'])){
  // Membuat variable setiap field inputan agar kodingan lebih rapi.
  $kode = $_POST['kode'];
  $merk = $_POST['merk'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $ukuran = $_POST['ukuran'];
  $warna = $_POST['warna'];


  // Membuat Query
  $query = "UPDATE tb_sepatu SET merk = '$merk', harga = '$harga', kategori = '$kategori', ukuran = '$ukuran', warna = '$warna' WHERE kode = '$kode'";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
	// Redirect to index.php using JavaScript
	echo "<script>window.location.href = 'index.php';</script>";
} else {
	// Handle the error
	echo "Error occurred.";
}
}


?>

    
</td>

<!-- INI BAGIAN FOOTER -->
<tr>
<td colspan="2" bgcolor="#E8D8C4"><center>
<img src="gambar/cl - 2.png" alt="Image" height="40" width="40" /> 
<b><font color="brown">Copyright &copy; 2024 &nbsp; ||&nbsp; (NIM : B12.2024.04715)&nbsp; ||&nbsp;(NAMA : QINAYYA ALIMMAZAN)&nbsp; ||&nbsp;(COOLEGS)</font></b>
<img src="gambar/cl - 2.png" alt="Image" height="40" width="40" /> 
</center>
</td>
</tr>

</tr>
</table>
</body>
</html>