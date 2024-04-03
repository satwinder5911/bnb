<?php
require('config.php'); 


$checkinDate=$_POST['checkinDate'];
$checkoutDate=$_POST['checkoutDate'];
$sql = "SELECT * FROM `rooms` Where room_name NOT IN (SELECT room FROM `bookings` WHERE checkinDate>='$checkinDate' AND checkoutDate<='$checkoutDate')";
$result = $conn->query($sql);

if($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
     echo $row['room_name'].' is available<br>';

  }

}
