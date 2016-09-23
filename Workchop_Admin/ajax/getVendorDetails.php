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
    $query = $db->prepare("select vendor_name, vendor_type, mobile_number, email_address, location_index from 
      permanent_vendors where vendor_id='$vendorId'");
    $query->execute();
    $result = $query->fetchAll();
    echo $result[0][0]."--".$result[0][1]."--".$result[0][2]."--".$result[0][3]."--".$result[0][4]."--";
}
catch(Exception $e){

}
?>

