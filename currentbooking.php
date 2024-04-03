<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Bookings</title>
</head>
<body>
    <div>
       <h2>Logged in as <?php echo $_SESSION['name']; ?></h2>
        <h2>Current bookings</h2>
        <h2>Edit a booking</h2>
        <a href="makebooking.php">[Return to the main page]</a>
        <table>
          <thead>
            <tr>
              <th>Booking (room, dates)</th>
              <th>Customer</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
        <?php
         require('config.php'); 
         $sql1 = "SELECT * FROM `bookings`";
         $result1 = $conn->query($sql1);
          if($result1->num_rows > 0) 
          {
            while($row1 = $result1->fetch_assoc()) 
            {
             
              ?>
            <tr>
              <td><?= $row1["room"]; ?>, <?= $row1["checkindate"]; ?>, <?= $row1["checkoutdate"]; ?></td>
              <td><?= $row1["customer"]; ?></td>
              <td>
                <a href="bookingdetails.php?id=<?= $row1["booking_id"]; ?>">[view]</a>
                <a href="editbooking.php?id=<?= $row1["booking_id"]; ?>">[edit]</a>
                <a href="addroomreview.php?id=<?= $row1["booking_id"]; ?>">[manage reviews]</a>
                <a href="bookingpreview.php?id=<?= $row1["booking_id"]; ?>">[delete]</a>
              </td>
            </tr>
            <?php
           }
          } else {
            echo "0 results";
          }
          $conn->close();
          ?>
            <!--  -->
          </tbody>
        </table>
      </div>
</body>
</html>
