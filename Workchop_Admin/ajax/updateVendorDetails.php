<?php
/**
 * Created by PhpStorm.
 * User: BALE
 * Date: 19/09/2016
 * Time: 10:45 PM
 */
$database = 'mysql:dbname=workchop_main;host=localhost;';
$user = 'workchop_admin';
$pwd = 'workchop_12345';

try{
    $db = new PDO($database, $user, $pwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $vendorId = $_GET['vendor_id'];
    $surname = $_GET['vendor_name'];
    $type = $_GET['vendor_type'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    if(strpos($_GET['phone'],"----")>0){
        $phone = explode("----",$_GET['phone'])[0] . "&&" . explode("----",$_GET['phone'])[1];
    }
    $location = $_GET['location'];
    $query = $db->prepare("update permanent_vendors set vendor_name='$surname', vendor_type='$type', mobile_number='$phone',
        email_address='$email', location_index='$location' where vendor_id='$vendorId'");
    $query->execute();

    $query = $db->prepare("update user_vendors set vendor_name='$surname', vendor_type='$type', vendor_number='$phone',
        vendor_location_category='$location' where vendor_id='$vendorId'");
    $query->execute();

    echo "done";
}
catch(Exception $e){

}
?>

