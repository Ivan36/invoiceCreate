<?php
session_start();
include("config.php");
$action = isset($_GET['action']) ? $_GET['action'] : '';

if (ISSET($_POST['register'])) {
$fname = $_POST['fName'];
$lname = $_POST['lName'];
$gender = $_POST['gender'];
$email = $_POST['emailAddress'];
$type = $_POST['type'];
$uName = $_POST['uName'];
$pass = $_POST['password'];
$cpass = $_POST['confirmPassword'];

if ($pass == $cpass) {
$sql = "INSERT INTO users (fName,lName,gender,emailAddress,type,uName,password,confirmPassword) 
	values('$fname','$lname','$gender','$email','$type','$uName','$pass','$cpass')";
} else {
?>
<script type="text/javascript">
    window.alert("confirm the right password");
    window.location.href = "index.php";
</script>
<?php
}

if (mysqli_query($conn, $sql)) {
?>
<script type="text/javascript">
    window.alert("Registration Successful");
    window.location.href = "index.php";
</script>
<?php
} else {
echo"Check the values" . mysqli_error();
}
}

//---------------------------------------------login_client_admin process-----------------------------------------------------------------------------
if (isset($_POST['signin'])) {
$uName = $_POST['uName'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE uName = '$uName' AND password = '$password'";
$queryresult = mysqli_query($conn, $query);

if($row = mysqli_fetch_array($queryresult)) {
$user = $row['uName'];
$pass = $row['password'];
$id = $row['uID'];
$type = $row['type'];

if ($uName == $user && $password == $pass){
session_start();
$_SESSION['uName'] = $user;
$_SESSION['password'] = $pass;
$_SESSION['uID'] = $id;
$_SESSION['type'] = $type;

if ($type == client) {
header("location:home.php");
} elseif ($type == manager) {
header("location:staff/manager/index.php");
}
elseif ($type == shopkeeper ) {
header("location:staff/Shopkeeper/index.php");
}
else{
	echo"wrong password or username";
header("location:index.php"); 	} 
}
else {
	echo"wrong password or username";
header("location:index.php");
}
}
else {
	echo"wrong password or username";
header("location:index.php"); }
}

//---------------------------------------------query-process-----------------------------------------------------------------------------

if (ISSET($_POST['submitInquiry'])) {
$uID = $_POST['uID'];
$date = $_POST['date'];
$checkboxes = !empty($_POST['inquiryName']) ? $_POST['inquiryName'] : array();
$categoryName = implode(',', $checkboxes);
$categoryDesc = $_POST['inquiryDesc'];
if ($categoryName != NULL) {
$sqlinquiry = "INSERT into inquriy(uID,inquiryName,inquiryDesc,date) values($uID,'$categoryName','$categoryDesc','$date')";
if (mysqli_query($conn, $sqlinquiry)) {
?>
<script type="text/javascript">
    window.alert("Your Query has been submitted.We shall give you feedback");
    window.location.href = "query.php";
</script>
<?php
} else {
    ?>
    <script type="text/javascript">
        window.alert("Failed to submit query");
        window.location.href = "query.php";
    </script>
    <?php
}
} else {
    ?>
    <script type="text/javascript">
        window.alert("Select atleast one type of a inquiry");
        window.location.href = "query.php";
    </script>

    <?php
}
}
//-----------------------------------------popup process-------------------------------------------
if (ISSET($_POST['submitOrder'])) {
    $cAdd = $_POST['custAddress'];
    $pMode = $_POST['paymentMode'];
    $uID = $_POST['userId'];
    $prodID = $_POST['pID'];
    $qnty = $_POST['quantity'];
//    $query = "INSERT into orders(customerID,productID,custAddress,paymentMode) values ({$uID},{$prodID},'$cAdd','$pMode')";

    $query = "INSERT INTO `orders` (`uID`, `pID`, `quantity`, `custAddress`, `paymentMode`) "
            . "VALUES ({$uID}, {$prodID}, '$qnty', '$cAdd', '$pMode')";

    if (mysqli_query($conn, $query)) {
        ?>
        <script type="text/javascript">
            alert('Your order has been recieved...thank you ');
            window.location = "home.php";
        </script>
        <?php
    } else {
       ?>
        <script type="text/javascript">
    
            alert('Your order has not been submited something went wrong please try again');
            window.location = "home.php";
        </script>
        <?php
    }
}
//-------------------------------------------------logout process-------------------------------------
if ($action == "logout") {
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
}

//---------------------------------------------multiple-orders-process-----------------------------------------------------------------------------

if (ISSET($_POST['submitOrders'])) {
$uID = $_POST['uID'];
$date = $_POST['date'];
$checkboxes = !empty($_POST['inquiryName']) ? $_POST['inquiryName'] : array();
$categoryName = implode(',', $checkboxes);
$categoryDesc = $_POST['inquiryDesc'];
if ($categoryName != NULL) {
$sqlinquiry = "INSERT into inquriy(uID,inquiryName,inquiryDesc,date) values($uID,'$categoryName','$categoryDesc','$date')";
if (mysqli_query($conn, $sqlinquiry)) {
?>
<script type="text/javascript">
    window.alert("Your orders have been Recieved.Thank you for Choosing Murocha Bakery!!!");
    window.location.href = "order.php";
</script>
<?php
} else {
    ?>
    <script type="text/javascript">
        window.alert("Failed to send your orders");
        window.location.href = "order.php";
    </script>
    <?php
}
} else {
    ?>
    <script type="text/javascript">
        window.alert("Select atleast one type of a product");
        window.location.href = "order.php";
    </script>

    <?php
}
}


?>

