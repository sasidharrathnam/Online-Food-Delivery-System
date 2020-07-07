<?php
require 'conn.php';
$c_id=15;
$query3="SELECT orders.order_id, orders.del_id, orders.location, orders.price, ordered.name FROM `orders` INNER JOIN `ordered` ON orders.user_id= ordered.u_id where orders.user_id='16'";
echo "</br></br></br></br>";
echo "<h2 align='center'>Order Details</h2>";
if($run=mysqli_query($conn,$query3))
{
	$query_row=mysqli_fetch_assoc($run);
	echo $query_row['order_id'];
	//echo $query_row['del_id'];
	//echo $query_row['price'];
	
}
else
{
	echo "hi";
}
?>