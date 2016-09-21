<?php
    $order = $_GET['order'];
    $database = 'mysql:dbname=workchop_main;host=localhost;';
    $user = 'workchop_admin';
    $pwd = 'workchop_12345';

    try{
        $db = new PDO($database, $user, $pwd);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($order == 1) {
            $query = $db->prepare("SELECT permanent_users.surname, permanent_users.firstname, feedbacks.subject, feedbacks.feedback, feedbacks.date_time, feedbacks.unique_id              
              FROM permanent_users INNER JOIN feedbacks ON permanent_users.user_id=feedbacks.user_id order by surname asc ");
        }
        else if($order == 2){
            $query = $db->prepare("SELECT permanent_users.surname, permanent_users.firstname, feedbacks.subject, feedbacks.feedback, feedbacks.date_time, feedbacks.unique_id
              FROM permanent_users INNER JOIN feedbacks ON permanent_users.user_id=feedbacks.user_id order by surname desc ");
        }
        else if($order == 3){
            $query = $db->prepare("SELECT permanent_users.surname, permanent_users.firstname, feedbacks.subject, feedbacks.feedback, feedbacks.date_time, feedbacks.unique_id
              FROM permanent_users INNER JOIN feedbacks ON permanent_users.user_id=feedbacks.user_id order by firstname asc ");
        }
        else if($order == 4){
            $query = $db->prepare("SELECT permanent_users.surname, permanent_users.firstname, feedbacks.subject, feedbacks.feedback, feedbacks.date_time, feedbacks.unique_id
              FROM permanent_users INNER JOIN feedbacks ON permanent_users.user_id=feedbacks.user_id order by firstname desc ");
        }
        else if($order == 5){
            $query = $db->prepare("SELECT permanent_users.surname, permanent_users.firstname, feedbacks.subject, feedbacks.feedback, feedbacks.date_time, feedbacks.unique_id
              FROM permanent_users INNER JOIN feedbacks ON permanent_users.user_id=feedbacks.user_id order by date_time asc ");
        }
        else if($order == 6){
            $query = $db->prepare("SELECT permanent_users.surname, permanent_users.firstname, feedbacks.subject, feedbacks.feedback, feedbacks.date_time, feedbacks.unique_id
              FROM permanent_users INNER JOIN feedbacks ON permanent_users.user_id=feedbacks.user_id order by date_time desc ");
        }
        $query->execute();
        $result = $query->fetchAll();

        //console.log($query->rowCount());
        $i=1;
        echo "
                    <table border=\"3px\" cellpadding=\"3px\" cellspacing=\"4px\" style=\"border-color: #2b669a; font-family: 'Century Gothic';\" >
                        <tr style=\"font-size: 15px; font-style: normal;font-weight: normal;\">
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">S/N</th>
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Surname</th>
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Firstname</th>
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Subject</th>
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Feedback</th>
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Date</th>
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Edit</th>
                            <th style=\"font-weight: normal;padding: 0px 7px 0px 7px; \">Delete</th>

                        </tr>";
        foreach($result as $value){
            $uniqueId = $value[5];
            echo "
                        <tr>
                                <td class=\"user-table-body\" >
                                    <p class=\"user-table-body\" style=\"vertical-align: middle;margin: 0px;\">". $i. "</p>
                                </td>
                                <td class=\"user-table-body\">
                                    <p style=\"vertical-align: middle;margin: 0px;\">". $value[0]."</p>
                                </td>
                                <td class=\"user-table-body\">
                                    <p style=\"vertical-align: middle;margin: 0px;\">".$value[1]."</p>
                                </td>
                                <td class=\"user-table-body\">
                                    <p style=\"vertical-align: middle;margin: 0px;\">".$value[2]."</p>
                                </td>
                                <td class=\"user-table-body\">
                                    <p style=\"vertical-align: middle;margin: 0px;\">".$value[3]."</p>
                                </td>
                                <td class=\"user-table-body\">
                                    <p style=\"vertical-align: middle;margin: 0px;\">".$value[4]."</p>
                                </td>
                                <!--
                                <td class=\"user-table-body\" style=\"text-align: center\">
                                    <img src=\"images/edit.png\" style=\"width: 20px;height:20px;cursor: pointer;\" data-id=\"". $uniqueId ."\"/>
                                </td>
                                <td class=\"user-table-body\" style=\"text-align: center\">
                                    <img src=\"images/cancel.png\" style=\"width: 20px;height:20px;cursor: pointer;\" data-id=\"". $uniqueId ."\"/>
                                </td>
                                -->
                            </tr>
                    ";
            $i++;
        }
        echo "</table>";


    }
    catch(Exception $e){

    }

?>