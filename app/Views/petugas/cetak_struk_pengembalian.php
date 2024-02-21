<!DOCTYPE html>
<html lang="en" >
 
<head>
 
  <meta charset="UTF-8">
 <title>struk</title>
  <style>
  @page {
  size: 60mm; /* Ganti dengan lebar dan tinggi struk sesuai kebutuhan Anda */
  margin: 0;
}
  body { margin: 0; font-size:10px;font-family: monospace;}

  #invoice-POS {
    box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
    padding: 2mm;
    margin: 0 auto;
    width: 44mm;
    background: #FFF;
  }
  #invoice-POS ::selection {
    background: #f31544;
    color: #FFF;
  }
  #invoice-POS ::moz-selection {
    background: #f31544;
    color: #FFF;
  }
  #invoice-POS h1 {
    font-size: 1.5em;
    color: #222;
  }
  #invoice-POS h2 {
    font-size: .9em;
  }
  #invoice-POS h3 {
    font-size: 1.2em;
    font-weight: 300;
    line-height: 2em;
  }
  #invoice-POS p {
    font-size: .7em;
    color: #666;
    line-height: 1.2em;
  }
  #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
    /* Targets all id with 'col-' */
    border-bottom: 1px solid #EEE;
  }
  #invoice-POS #mid {
    min-height: 10px;
  }
  #invoice-POS #bot {
    min-height: 5px;
  }

  #invoice-POS .info {
    display: block;
    margin-left: 0;
  }
  #invoice-POS .title {
    float: right;
  }
  #invoice-POS .title p {
    text-align: right;
  }
  #invoice-POS table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
  }
  #invoice-POS .tabletitle {
    font-size: .5em;
    background: #EEE;
  }
  #invoice-POS .service {
    border-bottom: 1px solid #EEE;
  }
  #invoice-POS .item {
    width: 24mm;
  }
  #invoice-POS .itemtext {
    font-size: .5em;
  }
  #invoice-POS #legalcopy {
    margin-top: 5mm;
  }
  </style>
</head>
 
<body  class="A4 landscape">
 
 
  <div id="invoice-POS">
    <center id="top">
      <div class="info"> 
        <h2>Eternal Library</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    <div id="mid">
      <div class="info">
        <p>
            Detail Member <br>
            Nama Peminjam         : <?= $nama_lengkap ?></br>
            Email                 : <?= $email ?></br>
        </p>
        <p> 
            Tanggal Pengembalian  : <?= $tanggal_pengembalian ?></br>
            Total Keterlambatan     :<?= $hari_keterlambatan ?> Hari</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    <div id="bot">
      <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Judul Buku</h2></td>
                    <td class="Hours"><h2>Jumlah</h2></td>
                    <td class="Rate"><h2>Denda</h2></td>
                </tr>

                <tr class="service">
                    <td class="tableitem"><p class="itemtext"><?= $judul_buku ?></p></td>
                    <td class="tableitem"><p class="itemtext"><?= $total_pengembalian ?></p></td>
                    <td class="tableitem"><p class="itemtext"><?= $total_denda ?></p></td>
                </tr>
                <tr class="tabletitle">
                    <!-- <td></td> -->
                    <td class="Rate"><h2>Total Dibayarkan</h2></td>
                    <td class="payment"><h2>Rp. <?= $uang_dibayarkan ?></h2></td>
                </tr>
                <tr class="tabletitle">
                    <!-- <td></td> -->
                    <td class="Rate"><h2>Uang Kembalian</h2></td>
                    <td class="payment"><h2>Rp. <?= $uang_kembalian ?></h2></td>
                </tr>

            </table>
        </div><!--End Table-->

        <div id="legalcopy">
            <p class="legal"><strong>Terimakasih Telah Meminjam Buku!</strong> Jangan lupa berkunjung kembali
            </p>
        </div>

    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
 

  <script>
		window.print();
	</script>
</body>
 
</html>