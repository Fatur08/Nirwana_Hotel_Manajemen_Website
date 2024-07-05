    <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Pemasukan_Pengeluaran.xls");
	?>
	<h3>Data Pemasukan</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>No</th>
    <th>Tanggal</th>
    <th>Jumlah</th>     
	</tr>  
	<?php  
	// Load file koneksi.php  
	include "db.php";    
	// Buat query untuk menampilkan semua data siswa 
	$no = 1;
	$query = mysqli_query($connection, "SELECT * FROM booking WHERE payment_status = 1");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($row = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$no++."</td>";   
	echo "<td>".$row['check_out']."</td>";    
	echo "<td>".$row['total_price']."</td>";          
	echo "</tr>";        
	}  ?></table>
	<br>
	<br>
		<h3>Data Pengeluaran</h3>    
	<table border="1" cellpadding="5"> 
	<tr>    
	<th>No</th>
    <th>Tanggal</th>
    <th>Jumlah</th>     
	</tr>  
	<?php     
	// Buat query untuk menampilkan semua data siswa 
	$no = 1;
	$query = mysqli_query($connection, "SELECT * FROM complaint WHERE resolve_status = 1");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($row = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$no++."</td>";   
	echo "<td>".$row['resolve_date']."</td>";    
	echo "<td>".$row['budget']."</td>";          
	echo "</tr>";        
	}  ?></table>