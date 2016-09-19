<?php
/**
 * Created by PhpStorm.
 * User: BALE
 * Date: 10/09/2016
 * Time: 3:53 AM
 */
echo getLocationString(2);
function getLocationString($index){
    $string = "";
    switch ($index){
        case 1:
            $string = "<Surulere--Badagry>";
            break;
        case 2:
            $string = "<Ikeja--Berger>";
            break;
        case 3:
            $string = "<Shomolu--Ilupeju>";
            break;
        case 4:
            $string = "<Yaba--Obalende>";
            break;
        case 5:
            $string = "<Ojota--Ikorodu>";
            break;
        case 6:
            $string = "<V.I--Epe>";
            break;
        case 7:
            $string = "<Oshodi--Egbeda>";
            break;
        default:
            $string="red";
            break;

    }
    if($index == 22){
        $string = "holla";
    }
    return $string;
}
?>