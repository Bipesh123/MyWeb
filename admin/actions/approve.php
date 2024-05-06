<?php 
include_once"../../config.php";
include_once "../../db.php";
if(isset($_GET['aid'])){
	$id=$_GET['aid'];
	$q=$_GET['q'];
	$cid=$_GET['id'];
	$sql=$conn->query("select * from products where id='$id' limit 1");
	$obj=mysqli_fetch_object($sql);
	$o=$obj->stock_quantity;
	echo $o;
	if ($o<=0){
		echo 'out of stock';
		$sqlc=("Update cart set status='2' where id='$cid'");
		if(mysqli_query($conn,$sqlc)){

		}
		else{
			echo mysqli_error($conn);
		}
	}
	else{
	$a=$o-$q;
	$sqlc=("Update cart set status='1' where id='$cid' ");
	if(mysqli_query($conn,$sqlc)){
		$sqlp=("Update products set stock_quantity='$a' where id='$id' ");
		if(mysqli_query($conn,$sqlp)){
          header("Location:" . _ADMIN_URL . "/pages/orders.php");
		}
		else{
			echo mysqli_error($conn);
		}
	}
	else{
		echo mysqli_error($conn);
	}
}
$sql=$conn->query("select * from cart where id='$cid' limit 1");
$sql=mysqli_fetch_object($sql);
$sql1=$sql->session_id;
$check=$conn->query("select * from cart where session_id='$sql1' and status='0' ");
if(mysqli_num_rows($check)==0){
	$sql="update checkout set order_status='1' where session_id='$sql1' ";
	if(mysqli_query($conn,$sql)){
         echo "done";
		}
}
}
?>