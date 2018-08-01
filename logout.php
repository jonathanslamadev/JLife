<? session_start(); if (!isset($_SESSION['user_id'])) {	echo "Invalid Session. Please log again.";exit; } else $user_id = $_SESSION['user_id'];
session_destroy();
$test = "connect.inc.php"; 
include($test); 
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
if (func_number($user_id) == 0)
	{
$sql = mysql_query("DELETE FROM timestamp_user WHERE user_id='$user_id'");
echo "<meta http-equiv='refresh' content='0; url=index.php' />";
	}
?>