<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Kelola Kamar</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Kelola Kamar
                    <button class="btn btn-secondary pull-right" style="border-radius:0%" data-toggle="modal" data-target="#addRoom">Tambah Kamar</button>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Delete !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Delete !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>No. Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Booking Status</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php

$room_query = "SELECT * FROM room NATURAL JOIN room_type WHERE room_id";
$rooms_result = mysqli_query($connection, $room_query);
?>

<!-- ... Bagian lain dari kode HTML ... -->

<?php
if (mysqli_num_rows($rooms_result) > 0) {
    while ($rooms = mysqli_fetch_assoc($rooms_result)) {
        $booking_id = null;

        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 0) {
            // Mendapatkan booking_id yang memenuhi kriteria
            $booking_query = "SELECT booking_id FROM booking WHERE room_id = '{$rooms['room_id']}' AND payment_status = 0";
            $booking_result = mysqli_query($connection, $booking_query);

            if (mysqli_num_rows($booking_result) > 0) {
                $booking_data = mysqli_fetch_assoc($booking_result);
                $booking_id = $booking_data['booking_id'];
            }
        }
?>
        <tr>
            <td><?php echo $rooms['room_no'] ?></td>
            <td><?php echo $rooms['room_type'] ?></td>
            <td>
                <?php if ($rooms['status'] == 0) { ?>
                    <a href="index.php?reservation&room_id=<?php echo $rooms['room_id'] ?>&room_type_id=<?php echo $rooms['room_type_id'] ?>" class="btn btn-success" style="border-radius:0%">Tersedia</a>

                <?php } else if ($rooms['status'] == 1 && $rooms['check_in_status'] == 0) { ?>
                    <?php if ($booking_id !== null) { ?>
                        <a href="remove_status.php?room_id=<?php echo $rooms['room_id'] ?>&booking_id=<?php echo $booking_id ?>" class="btn btn-danger" style="border-radius:0%">Batalkan</a>

                    <?php } else { ?>
                        <a href="#" class="btn btn-danger" style="border-radius:0%">Batalkan</a>

                    <?php } ?>
                <?php } else if ($rooms['status'] == 1 && $rooms['check_in_status'] == 1) { ?>

                    <a href="#<?php echo $rooms['room_id'] ?>" class="btn btn-danger" style="border-radius:0%">Booked</a>
                <?php } ?>


                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 0) {
                                            echo '<button class="btn btn-warning" id="checkInRoom"  data-id="' . $rooms['room_id'] . '" data-toggle="modal" style="border-radius:0%" data-target="#checkIn">Konfirmasi</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        } else {

                                            echo '<a href="#" class="btn btn-danger" style="border-radius:0%">Checked In</a>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 1) {
                                            echo '<button class="btn btn-primary" style="border-radius:0%" id="checkOutRoom" data-id="' . $rooms['room_id'] . '">Check Out</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td>

                                        <button title="Edit Kamar Information" style="border-radius:60px;" data-toggle="modal"
                                                data-target="#editRoom" data-id="<?php echo $rooms['room_id']; ?>"
                                                id="roomEdit" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                        <?php
                                        if ($rooms['status'] == 1) {
                                            echo '<button title="Customer Information" data-toggle="modal" data-target="#cutomerDetailsModal" data-id="' . $rooms['room_id'] . '" id="cutomerDetails" class="btn btn-warning" style="border-radius:60px;"><i class="fa fa-eye"></i></button>';
                                        }
                                        ?>

                                        <a href="ajax.php?delete_room=<?php echo $rooms['room_id']; ?>"
                                           class="btn btn-danger" style="border-radius:60px;" onclick="return confirm('Are you Sure?')"><i
                                                    class="fa fa-trash" alt="delete"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "No Rooms";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Tambah Kamar Modal -->
    <div id="addRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Kamar Baru</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="addRoom" data-toggle="validator" role="form">
                                <div class="response"></div>
                                <div class="form-group">
                                    <label>Tipe Kamar</label>
                                    <select class="form-control" id="room_type_id" required
                                            data-error="Pilih Tipe Kamar">
                                        <option selected disabled>Pilih Tipe Kamar</option>
                                        <?php
                                        $query = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($room_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Kamar</label>
                                    <input class="form-control" placeholder="Nomor Kamar" id="room_no"
                                           data-error="Masukkan Nomor Kamar" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button class="btn btn-success pull-right">Tambah Kamar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Edit Kamar Modal -->
    <div id="editRoom" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Kamar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="roomEditFrom" data-toggle="validator" role="form">
                                <div class="edit_response"></div>
                                <div class="form-group">
                                    <label>Tipe Kamar</label>
                                    <select class="form-control" id="edit_room_type" required
                                            data-error="Select Tipe Kamar">
                                        <option selected disabled>Pilih Tipe Kamar</option>
                                        <?php
                                        $query = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($room_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Kamar</label>
                                    <input class="form-control" placeholder="Nomor Kamar" id="edit_room_no" required
                                           data-error="Masukkan Nomor Kamar">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <input type="hidden" id="edit_room_id">
                                <button class="btn btn-success pull-right">Edit Kamar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!---customer details-->
    <div id="cutomerDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Informasi Pemesan</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <!-- <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead> -->
                                <tbody>
                                <tr>
                                    <td><b>Nama Pemesan</b></td>
                                    <td id="customer_name"></td>
                                </tr>
                                <tr>
                                    <td><b>Nomor Kontak</b></td>
                                    <td id="customer_contact_no"></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td id="customer_email"></td>
                                </tr>
                                <tr>
                                    <td><b>Tipe Kartu</b></td>
                                    <td id="customer_id_card_type"></td>
                                </tr>
                                <tr>
                                    <td><b>Nomor Kartu</b></td>
                                    <td id="customer_id_card_number"></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td id="customer_address"></td>
                                </tr>
                                <tr>
                                    <td><b>Sisa Pembayaran</b></td>
                                    <td id="remaining_price"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---customer details ends here-->

    <!-- Check In Modal -->
    <div id="checkIn" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Check In Kamar</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                
                                <tbody>
                                <tr>
                                    <td><b>Nama Pemesan</b></td>
                                    <td id="getCustomerName"></td>
                                </tr>
                                <tr>
                                    <td><b>Tipe Kamar</b></td>
                                    <td id="getRoomType"></td>
                                </tr>
                                <tr>
                                    <td><b>Nomor Kamar</b></td>
                                    <td id="getRoomNo"></td>
                                </tr>
                                <tr>
                                    <td><b>Check In</b></td>
                                    <td id="getCheckIn"></td>
                                </tr>
                                <tr>
                                    <td><b>Check Out</b></td>
                                    <td id="getCheckOut"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Harga Sewa</b></td>
                                    <td id="getTotalPrice"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="advancePayment">
                                <div class="payment-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>Uang Muka</label>
                                    <input type="number" class="form-control" id="advance_payment"
                                           placeholder="Masukkan Nominal Uang Muka">
                                </div>
                                <input type="hidden" id="getBookingID" value="">
                                <button type="submit" class="btn btn-primary pull-right">Konfirmasi & Check In</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Check Out Modal-->
    <div id="checkOut" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Check Out Kamar</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                
                                <tbody>
                                <tr>
                                    <td><b>Nama Pemesan</b></td>
                                    <td id="getCustomerName_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Tipe Kamar</b></td>
                                    <td id="getRoomType_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Nomor Kamar</b></td>
                                    <td id="getRoomNo_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Check In</b></td>
                                    <td id="getCheckIn_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Check Out</b></td>
                                    <td id="getCheckOut_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Harga Sewa</b></td>
                                    <td id="getTotalPrice_n"></td>
                                </tr>
                                <tr>
                                    <td><b>Sisa Pembayaran</b></td>
                                    <td id="getRemainingPrice_n"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="checkOutRoom_n" data-toggle="validator">
                                <div class="checkout-response"></div>
                                <div class="form-group col-lg-12">
                                    <label><b>Nominal Sisa Pembayaran</b></label>
                                    <input type="text" class="form-control" id="remaining_amount"
                                           placeholder="Masukkan Nominal Sisa Pembayaran" required
                                           data-error="Tolong Masukkan Data Yang Benar">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="getBookingId_n" value="">
                                <button type="submit" class="btn btn-primary pull-right">Konfirmasi Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>