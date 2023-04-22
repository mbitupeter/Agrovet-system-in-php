<?php
include "db.php";

session_start();

// checking login credentials for successful login 
if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = md5($_POST["password"]);
	$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	//if user record is available in database then $count equals to 1
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];
		$ip_add = getenv("REMOTE_ADDR");

			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				//to decode stored json product list cookie to normal array
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					//for checking user cart item if there is already product is listed or not
					$verify_cart = "SELECT id FROM cart WHERE user_id = $_SESSION[uid] AND p_id = ".$product_list[$i];
					$result  = mysqli_query($con,$verify_cart);
					if(mysqli_num_rows($result) < 1){
						//for adding products for the first time
						$update_cart = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND user_id = -1";
						mysqli_query($con,$update_cart);
					}else{
						//if already that product exists in the database table  delete that record
						$delete_existing_product = "DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
						mysqli_query($con,$delete_existing_product);
					}
				}
				//to destroy user cookie
				setcookie("product_list","",strtotime("-1 day"),"/");
				//if user is logging in from after cart page send cart_login
				echo "cart_login";
				exit();
				
			}
			//for successful login send login_success
			echo "login_success";
			exit();
		}else{
			echo "<span style='color:red;'>Please register before login..!</span>";
			exit();
		}
	
}

?>