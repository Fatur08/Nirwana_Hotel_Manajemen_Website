<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <em class="fa fa-home"></em>
                    <li class="active">Kelola Laporan</li>
                </a>
            </li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Laporan:
                    <a href="export.php"> <button class="btn btn-secondary pull-right" style="border-radius:0%" data-toggle="modal" data-target="#tambah_data">Export</button></a>
                </div>
                <div class="panel-body">
                    <!DOCTYPE html>
                    <html>
                        <body>
                            <center><h1>Data Laporan</h1></center>
                            <br>
                            <left><h4>Pemasukan</h4></left>
                            <!-- <center><a href="index.php?add_data">+ &nbsp; Tambah Data</a><center> -->
                                <form method="post" action="">
                                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                                <th><center>Aksi<center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM booking WHERE payment_status = 1 ORDER BY check_out DESC";
                                            $result = mysqli_query($connection, $query);
                                            if (!$result) {
                                                die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection)); }
                                                $no = 1; // Variabel untuk nomor urut
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "
                                                    <tr>
                                                        <td align='center'>$no</td>
                                                        <td>$row[check_out]</td>
                                                        <td>$row[total_price]</td>
                                                        <td align='center'>
                                                            <input type='checkbox' name='id[]' value='$row[booking_id]'>
                                                        </td>
                                                    </tr>";
                                                    $no++;
                                                }  ?>
                                                <tr>
                                                    <td colspan="4">
                                                        <button type="submit" name="proses" class="btn btn-secondary pull-right" style="border-radius:0%">
                                                            Hapus Data Yang Dipilih
                                                        </button>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <?php
                                if (isset($_POST['proses'])) {
                                    $ids = $_POST['id'];
                                    $jum = count($ids);
                                    for ($i = 0; $i < $jum; $i++) {
                                        // Perbaikan di bagian query DELETE dengan menggunakan prepared statement
                                        $query_delete = "DELETE FROM booking WHERE booking_id = ?";
                                        $stmt = mysqli_prepare($connection, $query_delete);
                                        mysqli_stmt_bind_param($stmt, "i", $ids[$i]);
                                        mysqli_stmt_execute($stmt);
                                        mysqli_stmt_close($stmt);
                                    }
                                    echo "<script>alert('Data berhasil dihapus'); document.location='index.php?report_manage'</script>";
                                }
                                ?>          
                        </body>
                    </html>

                    <left><h4>Pengeluaran</h4></left>
                    <!-- <center><a href="index.php?add_data">+ &nbsp; Tambah Data</a><center> -->
                    <form method="post" action="">
                        <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th><center>Aksi<center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM complaint WHERE resolve_status = 1 ORDER BY resolve_date DESC";
                                $result = mysqli_query($connection, $query);
                                if (!$result) {
                                    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));           
                                }
                                $no = 1; // Variabel untuk nomor urut
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                    <tr>
                                        <td align='center'>$no</td>
                                        <td>$row[resolve_date]</td>
                                        <td>$row[budget]</td>
                                        <td align='center'>
                                            <input type='checkbox' name='id[]' value='$row[id]'>
                                        </td>
                                    </tr>";
                                    $no++;
                                }
                                ?>
                                <tr>
                                    <td colspan="4">
                                        <button type="submit" name="proses" class="btn btn-secondary pull-right" style="border-radius:0%">
                                            Hapus Data Yang Dipilih
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>

                    <?php
                    if (isset($_POST['proses'])) {

                        $ids = $_POST['id'];
                        $jum = count($ids);

                        for ($i = 0; $i < $jum; $i++) {
                            // Perbaikan di bagian query DELETE dengan menggunakan prepared statement
                            $query_delete = "DELETE FROM complaint WHERE id = ?";
                            $stmt = mysqli_prepare($connection, $query_delete);
                            mysqli_stmt_bind_param($stmt, "i", $ids[$i]);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                        }

                        echo "<script>alert('Data berhasil dihapus');
                              document.location='index.php?report_manage'</script>";
                    }
                    ?>          
                </body>
            </html>
            </div>
        </div>
    </div>
</div>