<?php
include_once "db.php";
session_start();
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
    $result = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
}else{
    header('Location:login.php');
}
include_once "header.php";
include_once "sidebar.php";


if (isset($_GET['kamar'])){
    include_once "kamar.php";
}
elseif (isset($_GET['home'])){
    include_once "home.php";
}
elseif (isset($_GET['reservasi'])){
    include_once "reservasi.php";
}
elseif (isset($_GET['karyawan'])){
    include_once "karyawan.php";
}
elseif (isset($_GET['add_emp'])){
    include_once "add_emp.php";
}
elseif (isset($_GET['keluhan'])){
    include_once "keluhan.php";
}
elseif (isset($_GET['laporan'])){
    include_once "laporan.php";
}
elseif (isset($_GET['statistics'])){
    include_once "statistics.php";
}
elseif (isset($_GET['emp_history'])){
    include_once "emp_history.php";
}
elseif (isset($_GET['add_data'])){
    include_once "tambah_data.php";
}
elseif (isset($_GET['proses_tambah'])){
    include_once "crud_gc/proses_tambah.php";
}
elseif (isset($_GET['proses_hapus'])){
    include_once "crud_gc/proses_hapus.php";
}
else{
    include_once "room_mang.php";
}

include_once "footer.php";