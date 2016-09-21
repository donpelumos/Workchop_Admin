<?php
$key = $_GET['key'];
$order = $_GET['order'];
$database = 'mysql:dbname=workchop_main;host=localhost;';
$user = 'workchop_admin';
$pwd = 'workchop_12345';

try{
    $db = new PDO($database, $user, $pwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($order == 1) {
        $query = $db->prepare("select * from permanent_vendors where vendor_name like '%$key%'");
    }
    else if($order == 2){
        $query = $db->prepare("select * from permanent_vendors where email_address like '%$key%'");
    }
    else if($order == 3){
        $query = $db->prepare("select * from permanent_vendors where mobile_number like '%$key%'");
    }
    $query->execute();
    $result = $query->fetchAll();

    //console.log($query->rowCount());
    $i=1;
    echo "
            <table border=\"3pc\" cellpadding=\"3px\" cellspacing=\"4px\" style=\"border-color: #2b669a; font-family: 'Century Gothic';\">
                            <tr style=\"font-size: 15px; font-style: normal;font-weight: normal;\">
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">S/N</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Name</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Email</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Phone Number</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Location</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Type</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">User Size</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Avg. Review Score</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Date Registered</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Edit</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Delete</th>    
                            </tr>";
    foreach($result as $value){
        $vendorId = $value[3];
        $query2 = $db->prepare("select user_id from user_vendors where vendor_id like '%$vendorId%'");
        $query2->execute();
        $result2 = $query2->fetchAll();
        $noOfUsers = count(explode("==",$result2[0][0]));
        $query3 = $db->prepare("select avg(review_index) from reviews where vendor_id like '%$vendorId%'");
        $query3->execute();
        $result3 = $query3->fetchAll();
        $avgReview = $result3[0][0];
        echo "
                <tr>
                    <td class=\"vendor-table-body\" >
                        <p class=\"vendor-table-body\" style=\"vertical-align: middle;margin: 0px;\">". $i."</p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">$value[0]</p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">$value[8]</p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">".str_replace("&&","<br>",$value[1])."</p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">". getLocationString($value[2])  ."</p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">". getTypeString($value[4])  ." </p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">".$noOfUsers."</p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">" . number_format($avgReview,1,".",",") . "</p>
                    </td>
                    <td class=\"vendor-table-body\">
                        <p style=\"vertical-align: middle;margin: 0px;\">".$value[7]."</p>
                    </td>
                    <td class=\"vendor-table-body\" style=\"text-align: center\" >
                        <img src=\"images/edit.png\" style=\"width: 20px;height:20px;cursor: pointer;\" data-id=\"". $vendorId ."\"/>
                    </td>
                    <td class=\"vendor-table-body\" style=\"text-align: center\">
                        <img src=\"images/cancel.png\" style=\"width: 20px;height:20px;cursor: pointer;\" data-id=\"". $vendorId ."\"/>
                    </td>
                </tr>
            ";
        $i++;
    }
    echo "</table>";


}
catch(Exception $e){

}

function getLocationString($index){
    $string = "";
    switch ($index){
        case 1:
            $string = "Surulere--Badagry";
            break;
        case 2:
            $string = "Ikeja--Berger";
            break;
        case 3:
            $string = "Shomolu--Ilupeju";
            break;
        case 4:
            $string = "Yaba--Obalende";
            break;
        case 5:
            $string = "Ojota--Ikorodu";
            break;
        case 6:
            $string = "V.I--Epe";
            break;
        case 7:
            $string = "Oshodi--Egbeda";
            break;
        case 21:
            $string = "Abaji";
            break;
        case 22:
            $string = "Abuja Municipal";
            break;
        case 23:
            $string = "Bwari";
            break;
        case 24:
            $string = "Gwagwalada";
            break;
        case 25:
            $string = "Kuje";
            break;
        case 26:
            $string = "Kwali";
            break;
    }
    return $string;
}
function getTypeString($index){
    $string = "";
    switch ($index){
        case 1:
            $string = "Gas Supplier";
            break;
        case 2:
            $string = "Hair Stylist";
            break;
        case 3:
            $string = "Make-Up Artist";
            break;
        case 4:
            $string = "Mechanic";
            break;
        case 5:
            $string = "Tailor";
            break;
        default:
            $string = $index;
            break;
    }
    return $string;
}
?>