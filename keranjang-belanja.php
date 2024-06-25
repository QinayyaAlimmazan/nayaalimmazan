<?php
if (isset($_GET['kode_produk']) && isset($_GET['jumlah'])) {
    $kode_produk = $_GET['kode_produk'];
    $jumlah = $_GET['jumlah'];
    include 'database.php';

    $sql = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
    $query = mysqli_query($kon, $sql);
    $data = mysqli_fetch_array($query);

    $kode_produk = $data['kode_produk'];
    $nama_produk = $data['nama'];
    $harga = $data['harga'];
    $stok = $data['stok'];
} else {
    $kode_produk = "";
    $jumlah = 0;
}

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
} else {
    $aksi = "";
}

switch ($aksi) {
    case "tambah_produk":
        $itemArray = array($kode_produk => array('kode_produk' => $kode_produk, 'nama_produk' => $nama_produk, 'jumlah' => $jumlah, 'harga' => $harga, 'stok' => $stok));
        if (!empty($_SESSION["keranjang_belanja"])) {
            if (in_array($data['kode_produk'], array_keys($_SESSION["keranjang_belanja"]))) {
                foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                    if ($data['kode_produk'] == $k) {
                        $_SESSION["keranjang_belanja"][$k]['jumlah'] += $jumlah;
                    }
                }
            } else {
                $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"], $itemArray);
            }
        } else {
            $_SESSION["keranjang_belanja"] = $itemArray;
        }
        break;

    case "hapus":
        if (!empty($_SESSION["keranjang_belanja"])) {
            foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                if ($_GET["kode_produk"] == $k) {
                    unset($_SESSION["keranjang_belanja"][$k]);
                }
                if (empty($_SESSION["keranjang_belanja"])) {
                    unset($_SESSION["keranjang_belanja"]);
                }
            }
        }
        break;

    case "update":
        $itemArray = array($kode_produk => array('kode_produk' => $kode_produk, 'nama_produk' => $nama_produk, 'jumlah' => $jumlah, 'harga' => $harga));
        if (!empty($_SESSION["keranjang_belanja"])) {
            foreach ($_SESSION["keranjang_belanja"] as $k => $v) {
                if ($_GET["kode_produk"] == $k) {
                    $_SESSION["keranjang_belanja"][$k]['jumlah'] = $jumlah;
                }
            }
        }
        break;

        case "cetak_pdf":
            require_once('tcpdf/tcpdf.php');
            ob_clean(); // tambahkan ini untuk membersihkan output sebelum mencetak PDF
    
            // Buat instance TCPDF
            $pdf = new TCPDF();
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Your Name');
            $pdf->SetTitle('Keranjang Belanja');
            $pdf->SetSubject('Keranjang Belanja PDF');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    
            // Set header dan footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
    
            // Tambah halaman
            $pdf->AddPage();
    
            // Set font
            $pdf->SetFont('helvetica', '', 12);
    
            // Buat HTML untuk konten PDF
// Tambahkan gambar di atas garis
$pdf->Image('lginv.jpg', 20, 10, 50, 25); // x, y, width, height

// Tambahkan garis di atas teks "INVOICE"
$pdf->Line(15, 40, 195, 40); // x1, y1, x2, y2 (koordinat untuk garis)

// Buat HTML untuk konten PDF
$html = '<div style="text-align: center; margin-top: 5px">';
$html .= '<P>COOLEGS <br><b>Qinayya Alimmazan <b><br>Jl. Tembalang No.05, Kota Semarang</p>';
$html .= '</div>';
$html .= '<h1>INVOICE</h1>';
            $html .= '<table border="1" cellpadding="4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>';
    
            $no = 0;
            $total = 0;
            if (!empty($_SESSION["keranjang_belanja"])) {
                foreach ($_SESSION["keranjang_belanja"] as $item) {
                    $no++;
                    $sub_total = $item["jumlah"] * $item['harga'];
                    $total += $sub_total;
                    $html .= '<tr>
                                <td>' . $no . '</td>
                                <td>' . $item["kode_produk"] . '</td>
                                <td>' . $item["nama_produk"] . '</td>
                                <td>Rp. ' . number_format($item["harga"], 0, ',', '.') . '</td>
                                <td>' . $item["jumlah"] . '</td>
                                <td>Rp. ' . number_format($sub_total, 0, ',', '.') . '</td>
                              </tr>';
                }
            }
            $html .= '<tr>
                        <td colspan="5" align="right"><strong>Total</strong></td>
                        <td><strong>Rp. ' . number_format($total, 0, ',', '.') . '</strong></td>
                      </tr>';
                      
            $html .= '</tbody></table>';

            // Tambahkan gambar setelah tabel
            $html .='<br>';
            $html .= '<p>Pembayaran dapat dilakukan melalui :</p>';
            $html .='<div style="text-align: center; margin-top: 5px;">';
            $html .='<img src="gambar/byr1.jpg" alt="logo" style="width: 125px; height: auto;">';
            $html .='</div>';
            $html .='<div style="text-align: center; margin-top: 5px;">';
            $html .='<img src="gambar/byr2.jpg" alt="logo" style="width: 125px; height: auto;">';
            $html .='</div>';
                
            // Tulis HTML ke PDF
            $pdf->writeHTML($html, true, false, true, false, '');
    
            // Tutup dan keluarkan PDF
            $pdf->Output('keranjang_belanja.pdf', 'I');
            ob_end_flush();
            exit;

        break;
}
?>
<html>
<head>
<!-- INI BAGIAN JUDUL DAN ICON WEB -->
<title>COOLEGS</title>
<link rel="icon" type="image/png" href="gambar/cl.png" /> 
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
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="formtesti.html">Ulasan </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="lokasi.html">Lokasi </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="index.php">Buku Tamu </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="index.php">Seller </a><br/><br/>
	<li><img src="gambar/panah.png" alt="Image" height="15" width="15" /> <a href="profile_toko.html">Profile </a><br/><br/>
	</ul>
<br>	
	<hr><hr>
	<img src="gambar/lgjenis.png" alt="Image" height="160" width="260"  />
	<ol type="1">
	<li><img src="gambar/cl - 2.png" alt="Image" height="15" width="15" /> <a href="kategoribrg.html">Men</a><br/><br/>
	<li><img src="gambar/cl - 2.png" alt="Image" height="15" width="15" /> <a href="kategoribrg.html">Women</a><br/><br/>
	<li><img src="gambar/cl - 2.png" alt="Image" height="15" width="15" /> <a href="kategoribrg.html">Kids</a><br/>
	</ol>
<br>
	<hr><hr>
	<a href="formtesti.html">
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
	<br><b><font face="Rockwell" color="navy" size="80">WELCOME TO COOLAGE</font></b>
	<h2 align="center">Authetic Products at Affordable Prices</h2>
	<br>
<nav class="navbar navbar-default" style="width: 1000px; height: 50px;">
<style>

.thumbnail {
    height: 480px;
}

.thumbnail img {
    height: 200px;
    width: 100%;
    object-fit: cover;
    object-position: center;
}


</style>
<div >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
</div>
<div class="collapse navbar-collapse" id="myNavbar">

<ul class="nav navbar-nav">
          <li><a href="index1.php?halaman=produk"><strong><span class="glyphicon glyphicon-th-large"></span> Produk</strong></a></li>
          <li><a href="index1.php?halaman=keranjang-belanja"><strong><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja</strong> </a></li>
        
        </ul>

      </div>
    </div>
  </div>
</nav>

<div class="row; align-self-center" >
<div class="col-md-30 offset-md-1 align-self-center">
    <h2  style="margin-bottom:30px;">Keranjang Belanja</h2>
    <table class="table table-striped table-bordered" style="text-align: left;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th width="40%">Nama</th>
                <th>Harga</th>
                <th width="10%">QTY</th>
                <th>Sub Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sub_total = 0;
            $total = 0;
            if (!empty($_SESSION["keranjang_belanja"])) :
                foreach ($_SESSION["keranjang_belanja"] as $item) :
                    $no++;
                    $sub_total = $item["jumlah"] * $item['harga'];
                    $total += $sub_total;
            ?>
                    <input type="hidden" name="kode_produk[]" class="kode_produk" value="<?php echo $item["kode_produk"]; ?>" />
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item["kode_produk"]; ?></td>
                        <td><?php echo $item["nama_produk"]; ?></td>
                        <td>Rp. <?php echo number_format($item["harga"], 0, ',', '.'); ?> </td>
                        <td>
                            <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]">
                            <script>
                                $("#jumlah<?php echo $no; ?>").on('change', function() {
                                    var jumlah = $("#jumlah<?php echo $no; ?>").val();
                                    $("#jumlaha<?php echo $no; ?>").val(jumlah);
                                });
                                $("#jumlah<?php echo $no; ?>").keydown(function(event) {
                                    return false;
                                });
                            </script>
                        </td>
                        <td>Rp. <?php echo number_format($sub_total, 0, ',', '.'); ?> </td>
                        <td>
                            <form method="get">
                                <input type="hidden" name="kode_produk" value="<?php echo $item['kode_produk']; ?>" class="form-control">
                                <input type="hidden" name="aksi" value="update" class="form-control">
                                <input type="hidden" name="halaman" value="keranjang-belanja" class="form-control">
                                <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" class="form-control">
                                <input type="submit" class="btn btn-warning btn-xs" value="Update">
                            </form>
                            <a href="index1.php?halaman=keranjang-belanja&kode_produk=<?php echo $item['kode_produk']; ?>&aksi=hapus" class="btn btn-danger btn-xs" role="button">Delete</a>
                        </td>
                    </tr>
            <?php endforeach; endif; ?>
        </tbody>
	 <tr>
            <td colspan="5" align="right">Total</td>
            <td>Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
            <td></td>
        </tr>
    </table>
    <?php if (!empty($_SESSION["keranjang_belanja"])) { ?>
                <a href="index1.php?halaman=keranjang-belanja&aksi=cetak_pdf" class="btn btn-primary">Cetak PDF</a>

            <?php } ?>

</div>
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
</table>
</body>
</html>