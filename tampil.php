<!-- INI BAGIAN JUDUL DAN ICON WEB -->
<title>COOLEGS</title>
<link rel="icon" type="image/png" href="gambar/cl.png" /> 

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
			<a href="kategoribrg.html">KATEGORI SEPATU</a> 		&nbsp;&nbsp;||&nbsp;&nbsp;
			<a href="index.php">BELANJA</a> 								&nbsp;&nbsp;||&nbsp;&nbsp;
			<a href="profile_toko.html">TENTANG KAMI</a> 			&nbsp;&nbsp;||&nbsp;&nbsp;
			<a href="formtesti.html">TESTIMONI</a> 			&nbsp;&nbsp;||&nbsp;&nbsp;

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

<!--KONTEN-->
<td align="center" width="900" bgcolor="white">
	<br>
<?php 
// menangkap data nama dengan method post
$nama = $_POST['nama'];
// menangkap data email dengan method post
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no = $_POST['nohp'];
$produk = $_POST['produk'];
$testi = $_POST['testi'];
$kritik = $_POST['kritik'];

// menampilkan data nama
echo "Nama = " . $nama;
echo "<br/>";
// menampilkan data email
echo "Jenis Kelamin = " . $jenkel;
echo "<br/>";
echo "Alamat = " . $alamat;
echo "<br/>";
echo "Email = " . $email;
echo "<br/>";
echo "No HP = " . $no;
echo "<br/>";
echo "Produk = " . $produk;
echo "<br/>";
echo "Testimoni Pembeli = " . $testi;
echo "<br/>";
echo "Kritik dan Saran = " . $kritik;
echo "<br/>";
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