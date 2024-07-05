<?php 
    include './db.php';
    $sql = "SELECT * FROM room WHERE room_id ";
    $query = $connection->query($sql);

    echo $query->num_rows;
?>