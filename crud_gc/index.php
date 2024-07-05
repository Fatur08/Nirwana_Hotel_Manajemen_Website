<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Data Mahasiswa - Muhammad Duta Faturrahman - 120140065</title>
    <link rel="stylesheet" href="gaya.css" />
  </head>
  <body>
    <center><h1>Data Mahasiswa</h1><center>
    <center><a href="tambah_data.php">+ &nbsp; Menambahkan Mahasiswa Baru</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Program Studi</th>
          <th>Semester</th>
          <th>Indeks Prestasi</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM data_mahasiswa ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_mahasiswa']; ?></td>
          <td><?php echo $row['NIM']; ?></td>
          <td><?php echo $row['program_studi']; ?></td>
          <td><?php echo $row['semester']; ?></td>
          <td> <?php echo $row['indeks_prestasi']; ?></td>
          <td>
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>