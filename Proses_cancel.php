<?php

    include 'db.php';
    
    if(isset($_GET['getBookingID'])){
        $booking_id = $_GET['getBookingID'];

        // Perbarui tabel room, mengatur status, check_in_status, check_in_date, dan check_out_date menjadi NULL
        $update_room_query = "UPDATE room SET status = 0, check_in_status = 0, check_in_date = NULL, check_out_date = NULL WHERE booking_id = '$booking_id'";
        $update_room_result = mysqli_query($connection, $update_room_query);

        // Hapus data pemesanan dari tabel booking berdasarkan booking_id
        $delete_booking_query = "DELETE FROM booking WHERE booking_id = '$booking_id'";
        $delete_booking_result = mysqli_query($connection, $delete_booking_query);

        if ($update_room_result && $delete_booking_result) {
            // Jika pembatalan berhasil, arahkan kembali ke halaman utama dengan parameter "room_mangp"
            header("Location: index.php?room_mang");
            exit();
        } else {
            // Jika terjadi kesalahan saat membatalkan pemesanan, beri tahu pengguna
            echo "Terjadi kesalahan saat membatalkan pemesanan.";
        }
    }
?>
