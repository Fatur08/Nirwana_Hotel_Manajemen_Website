<?php
include_once 'db.php';

if (isset($_GET['room_id']) && isset($_GET['booking_id'])) {
    $room_id = $_GET['room_id'];
    $booking_id = $_GET['booking_id']; // Mengambil booking_id dari URL

    $update_status_query = "UPDATE room SET status = NULL WHERE room_id = '$room_id'";
    $update_price_query = "DELETE FROM booking WHERE booking_id = '$booking_id'";


    $result_status = mysqli_query($connection, $update_status_query);
    $result_price = mysqli_query($connection, $update_price_query);

    if ($result_status && $result_price) {
        header("Location: index.php?success=removed_status");
        exit;
    } else {
        header("Location: index.php?error=remove_error");
        exit;
    }
}
?>
