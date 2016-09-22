<?php
    $order = $_GET['order'];
    $database = 'mysql:dbname=workchop_main;host=localhost;';
    $user = 'workchop_admin';
    $pwd = 'workchop_12345';

    try{
        $db = new PDO($database, $user, $pwd);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($order == 1) {
            $query = $db->prepare("SELECT permanent_vendors.vendor_name, feedbacks_vendor.subject, feedbacks_vendor.feedback, feedbacks_vendor.date_time, feedbacks_vendor.unique_id
                  FROM permanent_vendors INNER JOIN feedbacks_vendor ON permanent_vendors.vendor_id=feedbacks_vendor.vendor_id order by vendor_name asc ");
        }
        else if($order == 2){
            $query = $db->prepare("SELECT permanent_vendors.vendor_name, feedbacks_vendor.subject, feedbacks_vendor.feedback, feedbacks_vendor.date_time, feedbacks_vendor.unique_id
                  FROM permanent_vendors INNER JOIN feedbacks_vendor ON permanent_vendors.vendor_id=feedbacks_vendor.vendor_id order by vendor_name desc ");
        }
        else if($order == 3){
            $query = $db->prepare("SELECT permanent_vendors.vendor_name, feedbacks_vendor.subject, feedbacks_vendor.feedback, feedbacks_vendor.date_time, feedbacks_vendor.unique_id
                  FROM permanent_vendors INNER JOIN feedbacks_vendor ON permanent_vendors.vendor_id=feedbacks_vendor.vendor_id order by date_time asc ");
        }
        else if($order == 4){
            $query = $db->prepare("SELECT permanent_vendors.vendor_name, feedbacks_vendor.subject, feedbacks_vendor.feedback, feedbacks_vendor.date_time, feedbacks_vendor.unique_id
                  FROM permanent_vendors INNER JOIN feedbacks_vendor ON permanent_vendors.vendor_id=feedbacks_vendor.vendor_id order by date_time desc ");
        }
        $query->execute();
        $result = $query->fetchAll();

        //console.log($query->rowCount());
        $i=1;
        echo "
                        <table border=\"3px\" cellpadding=\"3px\" cellspacing=\"4px\" style=\"border-color: #2b669a; font-family: 'Century Gothic';\" >
                            <tr style=\"font-size: 15px; font-style: normal;font-weight: normal;\">
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">S/N</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Vendor Nname</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Subject</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Feedback</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Date</th>
                                <!--
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Edit</th>
                                <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Delete</th>-->
    
                            </tr>";
        foreach($result as $value){
            $uniqueId = $value[4];
            echo "
                            <tr>
                                    <td class=\"vendor-table-body\" >
                                        <p class=\"vendor-table-body\" style=\"vertical-align: middle;margin: 0px;\">". $i. "</p>
                                    </td>
                                    <td class=\"vendor-table-body\">
                                        <p style=\"vertical-align: middle;margin: 0px;\">". $value[0]."</p>
                                    </td>
                                    <td class=\"vendor-table-body\">
                                        <p style=\"vertical-align: middle;margin: 0px;\">".$value[1]."</p>
                                    </td>
                                    <td class=\"vendor-table-body\">
                                        <p style=\"vertical-align: middle;margin: 0px;\">".$value[2]."</p>
                                    </td>
                                    <td class=\"vendor-table-body\">
                                        <p style=\"vertical-align: middle;margin: 0px;\">".$value[3]."</p>
                                    </td>
                                    <!--
                                    <td class=\"vendor-table-body\" style=\"text-align: center\">
                                        <img src=\"images/edit.png\" style=\"width: 20px;height:20px;cursor: pointer;\" data-id=\"". $uniqueId ."\"/>
                                    </td>
                                    <td class=\"vendor-table-body\" style=\"text-align: center\">
                                        <img src=\"images/cancel.png\" style=\"width: 20px;height:20px;cursor: pointer;\" data-id=\"". $uniqueId ."\"/>
                                    </td>-->
                                </tr>
                        ";
            $i++;
        }
        echo "</table>";


    }
    catch(Exception $e){

    }

?>