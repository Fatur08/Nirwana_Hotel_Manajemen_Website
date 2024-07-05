<?php
include './db.php';

// Query to get the sum of total_price from the booking table where payment_status is equal to '1'
$sql = "SELECT SUM(total_price) FROM booking WHERE payment_status = '1'";
$amountsum = mysqli_query($connection, $sql) or die(mysqli_error($connection));

// Check for errors in query execution
if (!$amountsum) {
    die("Error executing the query: " . mysqli_error($connection));
}

// Fetch the result data
$row_amountsum = mysqli_fetch_assoc($amountsum);

// Check if any rows were returned
if (!$row_amountsum) {
    die("No data found.");
}

// Access the sum of total_price
$total_price_sum = $row_amountsum['SUM(total_price)'];

// Now, you can perform the same steps as before to calculate the difference
// Query to get the sum of budget from the complaint table where resolve_status is equal to '1'
$sql_complaint = "SELECT SUM(budget) FROM complaint WHERE resolve_status = '1'";
$complaint_result = mysqli_query($connection, $sql_complaint) or die(mysqli_error($connection));
$row_complaint = mysqli_fetch_assoc($complaint_result);
$sum_budget = $row_complaint['SUM(budget)'];

// Calculate the difference between the two sums
$difference = $total_price_sum - $sum_budget;

// Display the result
echo "" . $difference;
?>
