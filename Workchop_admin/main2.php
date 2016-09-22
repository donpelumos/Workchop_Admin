<?php
/**
 * Created by PhpStorm.
 * Vendor: BALE
 * Date: 09/09/2016
 * Time: 7:11 AM
 */

?>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main2.css">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="dist/js/bootstrap.min.js"></script>
    <link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var deleteId = '';
            $('#tab1').click(function () {
                window.open("main.php","_self");
            });
            $('#search-button').click(function () {
                searchVendors();
            });
            $('#selector-ratings-order').change(function () {
                appRating();
            });
            $('#selector-feedback-order').change(function () {
                vendorFeedback();
            });
            $('#selector-issue-order').change(function () {
                vendorIssue();
            });
            $('#done-1').click(function () {
                updateVendorDetails();
            });
            $('#sure-no').click(function () {
                hide1();
            });
            $('#sure-yes').click(function () {
                deleteVendorDetails(deleteId);
            });
            vendorsCount();
            appAvgRating();
            appRating();
            vendorFeedback();
            vendorIssue();
            function show1(object){
                $('#edit-divId').css('visibility','visible');
                $('#curtainId').css('visibility','visible');
                getVendorDetails(object.dataset.id);
                //alert(object.dataset.id);
            }
            function show2(object){
                $('#delete-divId').css('visibility','visible');
                $('#curtainId').css('visibility','visible');
                deleteId = object.dataset.id;
            }
            function hide1() {
                $('#edit-divId').css('visibility','hidden');
                $('#curtainId').css('visibility','hidden');
                hide2();
            }
            function hide2() {
                $('#delete-divId').css('visibility','hidden');
                $('#curtainId').css('visibility','hidden');
            }
            function searchVendors(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                var order = $('#selector-vendor-search').val();
                var queryString = $('#textbox-vendor-search').val();
                console.log(queryString+"--"+order);
                ajaxRequest.open("GET", "ajax/vendorSearch.php?key=" + queryString+"&order="+order, true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay = document.getElementById('vendor-search-result-div');
                        var ajaxResult = ajaxRequest.responseText;
                        ajaxDisplay.innerHTML = ajaxResult;

                    }
                }
            }
            function vendorsCount(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }

                ajaxRequest.open("GET", "ajax/totalVendorCount.php", true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay = document.getElementById('vendorCount');
                        var ajaxResult = ajaxRequest.responseText;
                        ajaxDisplay.innerHTML = ajaxResult;

                    }
                }
            }
            function appAvgRating(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }

                ajaxRequest.open("GET", "ajax/vendorAvgAppRating.php", true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay = document.getElementById('appAvgRating');
                        var ajaxResult = ajaxRequest.responseText;
                        var rating = ajaxResult.split('--')[1];
                        var count = ajaxResult.split('--')[0];
                        ajaxDisplay.innerHTML = rating + " from "+ count;

                    }
                }
            }
            function appRating(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                var order = $('#selector-ratings-order').val();
                ajaxRequest.open("GET", "ajax/vendorAppRatings.php?order="+order, true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay = document.getElementById('vendor-ratings-div');
                        var ajaxResult = ajaxRequest.responseText;
                        ajaxDisplay.innerHTML = ajaxResult;

                    }
                }
            }
            function vendorFeedback(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                var order = $('#selector-feedback-order').val();
                ajaxRequest.open("GET", "ajax/vendorFeedback.php?order="+order, true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay = document.getElementById('feedback-div');
                        var ajaxResult = ajaxRequest.responseText;
                        ajaxDisplay.innerHTML = ajaxResult;

                    }
                }
            }
            function vendorIssue(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                var order = $('#selector-issue-order').val();
                ajaxRequest.open("GET", "ajax/vendorIssue.php?order="+order, true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay = document.getElementById('issue-div');
                        var ajaxResult = ajaxRequest.responseText;
                        ajaxDisplay.innerHTML = ajaxResult;

                    }
                }
            }
            function getVendorDetails(id){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                ajaxRequest.open("GET", "ajax/getVendorDetails.php?user_id=" + id, true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay0 = document.getElementById('vendorName');
                        var ajaxDisplay1 = document.getElementById('vendorType');
                        var ajaxDisplay3 = document.getElementById('vendorEmail');
                        var ajaxDisplay2 = document.getElementById('vendorPhone');
                        var ajaxDisplay2b = document.getElementById('vendorPhone2');
                        var ajaxDisplay4 = document.getElementById('vendorLocation');
                        var ajaxDisplay5 = document.getElementById('vendorId');
                        var ajaxResult = ajaxRequest.responseText;
                        ajaxDisplay0.value = ajaxResult.split('--')[0];
                        ajaxDisplay1.value = ajaxResult.split('--')[1];
                        var fullPhone = ajaxResult.split('--')[2];
                        if(fullPhone.contains("&&")){
                            ajaxDisplay2.value = fullPhone.split('&&')[0];
                            ajaxDisplay2b.value = fullPhone.split('&&')[1];
                        }
                        else{
                            ajaxDisplay2.value = fullPhone;
                        }
                        ajaxDisplay3.value = ajaxResult.split('--')[3];
                        ajaxDisplay4.value = ajaxResult.split('--')[4];
                        ajaxDisplay5.value = id;
                    }
                }
            }
            function updateVendorDetails(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                var ajaxDisplay0 = document.getElementById('vendorName');
                var ajaxDisplay1 = document.getElementById('vendorType');
                var ajaxDisplay2 = document.getElementById('vendorEmail');
                var ajaxDisplay3 = document.getElementById('vendorPhone');
                var ajaxDisplay3b = document.getElementById('vendorPhone2');
                var ajaxDisplay4 = document.getElementById('vendorLocation');
                var ajaxDisplay5 = document.getElementById('vendorId');
                ajaxRequest.open("GET", "ajax/updateUserDetails.php?user_id=" + ajaxDisplay5.value+"&surname="+ajaxDisplay0.value+"&firstname="+
                    ajaxDisplay1.value+"&email="+ajaxDisplay2.value+"&phone="+ajaxDisplay3.value+"&location="+ajaxDisplay4.value, true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxResult = ajaxRequest.responseText;
                        //alert('-'+ajaxResult.trim()+'-');
                        /*
                         "ajax/updateUserDetails.php?user_id=" + ajaxDisplay5.value+"&surname="+ajaxDisplay0.value+"&firstname="+
                         ajaxDisplay1.value+"&email="+ajaxDisplay2.value+"&phone="+ajaxDisplay3.value+"&location="+ajaxDisplay4.value);*/
                        if(ajaxResult.trim() == 'done'){
                            ajaxDisplay0.value = "";
                            ajaxDisplay1.value = "";
                            ajaxDisplay2.value = "";
                            ajaxDisplay3.value = "";
                            ajaxDisplay4.value = "";
                            hide1();
                            searchUsers();
                        }
                    }
                }
            }
            function deleteVendorDetails(id){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                ajaxRequest.open("GET", "ajax/deleteUserDetails.php?user_id=" + id, true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        searchUsers();
                        hide1();
                    }
                }
            }
        });

    </script>
    </head>
    <body>
        <div style="width:100%;height:100%;padding:4px;">
            <div style="width:50%;background:#c7d0c6;text-align: center;display: inline-block;float: left;
                    cursor: pointer;vertical-align: middle;" id="tab1">
                <p style="font-family: 'Century Gothic';font-size: 20px;color:#222222;padding: 10px;margin:0px;">Users</p>
            </div>
            <div style="width:50%;background:#959e94;text-align: center;display: inline-block;float: left;
                    cursor: pointer; vertical-align: middle;" id="tab2">
                <p style="font-family: 'Century Gothic';font-size: 20px;color:#222222;padding: 10px;margin:0px;">Vendors</p>
            </div>
            <div style="width:50%;height:3px;text-align: center;display: inline-block;float: left;">
            </div>
            <div style="width:50%;height:3px;background:#0075d8;text-align: center;display: inline-block;float: left;">
            </div>
            <div style="clear: both;padding:10px;">
                <table>
                    <tr>
                        <td>
                            <p style="font-family: 'Century Gothic';font-size: 18px;float: left;display: inline-block;
                            color: #0f0f0f">Total vendor count - </p>
                        </td>
                        <td>
                            <p style="font-family: 'Century Gothic';font-size: 28px;color: #2b669a;float: left;display: inline-block;
                            margin-left: 10px;" id="vendorCount"></p>
                        </td>
                        <td>
                            <p style="font-family: 'Century Gothic';font-size: 28px;color: #03070a;float: left;display: inline-block;
                            margin-left: 10px;"> &nbsp; </p>
                        </td>
                        <td>
                            <p style="font-family: 'Century Gothic';font-size: 18px;float: left;display: inline-block;
                            color: #0f0f0f">Average App Rating - </p>
                        </td>
                        <td>
                            <p style="font-family: 'Century Gothic';font-size: 28px;color: #2b669a;float: left;display: inline-block;
                            margin-left: 10px;" id="appAvgRating"> </p>
                        </td>
                    </tr>
                </table>

                <div style="">
                    <font>Search with : </font>
                    <select id="selector-vendor-search">
                        <option value="1">Vendor Name</option>
                        <option value="2">Email Address</option>
                        <option value="3">Phone Number</option>
                    </select>
                    <input id="textbox-vendor-search" style="margin-left: 5px;width:300px;" type="text"/>
                    <button id="search-button" type="button">search</button>
                    <br><br>
                </div>

                <div style="overflow-y: scroll; min-height:70px; max-height:300px; width: 100%; 
                padding:10px;" id="vendor-search-result-div">
                    <!--<table border="3px" cellpadding="3px" cellspacing="4px" style="border-color: #2b669a; font-family: 'Century Gothic';
                    ">
                        <tr style="font-size: 15px; font-style: normal;font-weight: normal;">
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">S/N</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Surname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Firstname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Email</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Phone Number</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Location</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Contacts Size</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">No. of Vendors</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Work Points</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Date Registered</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Edit</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Delete</th>

                        </tr>
                        <tr>
                            <td class="vendor-table-body" >
                                <p class="vendor-table-body" style="vertical-align: middle;margin: 0px;">1.</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Ayomide</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Abayomi</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">aabayomi@yahoo.com</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">08080502406</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Location 1</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">3,459</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">78</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">274</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">2016-09-08 14:34:23</p>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/edit.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/cancel.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                        </tr>
                        <?php
                    for($i=2; $i<3; $i++){
                        echo "
                                    <tr>
                                        <td class=\"vendor-table-body\" >
                                            <p class=\"vendor-table-body\" style=\"vertical-align: middle;margin: 0px;\">" . $i . "</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">Ayomide</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">Abayomi</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">aabayomi@yahoo.com</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">08080502406</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">Location 1</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">3,459</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">78</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">274</p>
                                        </td>
                                        <td class=\"vendor-table-body\">
                                            <p style=\"vertical-align: middle;margin: 0px;\">2016-09-08 14:34:23</p>
                                        </td>
                                        <td class=\"vendor-table-body\" style=\"text-align: center\">
                                            <img src=\"images/edit.png\" style=\"width: 20px;height:20px;cursor: pointer;\"/>
                                        </td>
                                        <td class=\"vendor-table-body\" style=\"text-align: center\">
                                            <img src=\"images/cancel.png\" style=\"width: 20px;height:20px;cursor: pointer;\"/>
                                        </td>
                                    </tr>
                                ";
                    }
                    ?>
                    </table>-->
                </div>
                <br><br>


                <div style="font-family: 'Century Gothic';font-size: 18px;float: left;display: inline-block;">
                    <font>App Ratings</font>
                </div>
                <br style="clear: both">
                <font >Order by : </font>
                <select id="selector-ratings-order">
                    <option value="1">Vendor Name (Asc)</option>
                    <option value="2">Vendor Name (Desc)</option>
                    <option value="3">Rating (Asc)</option>
                    <option value="4">Rating (Desc)</option>
                    <option value="5">Date (Asc)</option>
                    <option value="6">Date (Desc)</option>
                </select>
                <br><br>

                <div style="overflow-y: scroll; min-height:70px; max-height:300px; width: 100%; 
                padding:10px;" id="vendor-ratings-div">
                    <!--<table border="3px" cellpadding="3px" cellspacing="4px" style="border-color: #2b669a; font-family: 'Century Gothic';" >
                        <tr style="font-size: 15px; font-style: normal;font-weight: normal;">
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">S/N</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Surname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Firstname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Rating</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Date</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Edit</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Delete</th>

                        </tr>
                        <tr>
                            <td class="vendor-table-body" >
                                <p class="vendor-table-body" style="vertical-align: middle;margin: 0px;">1.</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Ayomide</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Abayomi</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">5</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">2016-09-08 14:34:23</p>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/edit.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/cancel.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                        </tr>
                    </table>-->

                </div>



                <br><br>
                <div style="font-family: 'Century Gothic';font-size: 18px;float: left;display: inline-block;">
                    <font>Feedback</font>
                </div>
                <br style="clear: both">
                <font >Order by : </font>
                <select id="selector-feedback-order">
                    <option value="1">Vendor Name (Asc)</option>
                    <option value="2">Vendor Name (Desc)</option>
                    <option value="3">Date (Asc)</option>
                    <option value="4">Date (Desc)</option>
                </select>
                <br><br>

                <div style="overflow-y: scroll; min-height:70px; max-height:300px; width: 100%; 
                padding:10px;"  id="feedback-div">
                    <!--<table border="3px" cellpadding="3px" cellspacing="4px" style="border-color: #2b669a; font-family: 'Century Gothic';">
                        <tr style="font-size: 15px; font-style: normal;font-weight: normal;">
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">S/N</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Surname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Firstname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Subject</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Subject</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Feedback</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Date</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Edit</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Delete</th>

                        </tr>
                        <tr>
                            <td class="vendor-table-body" >
                                <p class="vendor-table-body" style="vertical-align: middle;margin: 0px;">1.</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Ayomide</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Abayomi</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">for Account</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">The loading for account takes quite a while.</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">2016-09-08 14:34:23</p>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/edit.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/cancel.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                        </tr>
                    </table>-->

                </div>




                <br><br>
                <div style="font-family: 'Century Gothic';font-size: 18px;float: left;display: inline-block;">
                    <font>Issues</font>
                </div>
                <br style="clear: both">
                <font >Order by : </font>
                <select id="selector-issue-order">
                    <option value="1">Vendor Name (Asc)</option>
                    <option value="2">Vendor Name (Desc)</option>
                    <option value="3">Date (Asc)</option>
                    <option value="4">Date (Desc)</option>
                </select>
                <br><br>

                <div style="overflow-y: scroll; min-height:70px; max-height:300px; width: 100%; 
                padding:10px;" id="issue-div">
                    <!--
                    <table border="3px" cellpadding="3px" cellspacing="4px" style="border-color: #2b669a; font-family: 'Century Gothic';">
                        <tr style="font-size: 15px; font-style: normal;font-weight: normal;">
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">S/N</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Surname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Firstname</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Subject</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Issue</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Date</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Edit</th>
                            <th style="font-weight: normal;padding: 0px 7px 0px 7px; ">Delete</th>

                        </tr>
                        <tr>
                            <td class="vendor-table-body" >
                                <p class="vendor-table-body" style="vertical-align: middle;margin: 0px;">1.</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Ayomide</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Abayomi</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">Loading for Account</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">The loading for account takes quite a while.</p>
                            </td>
                            <td class="vendor-table-body">
                                <p style="vertical-align: middle;margin: 0px;">2016-09-08 14:34:23</p>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/edit.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                            <td class="vendor-table-body" style="text-align: center">
                                <img src="images/cancel.png" style="width: 20px;height:20px;cursor: pointer;"/>
                            </td>
                        </tr>
                    </table>-->

                </div>
            </div>

            <div id="curtainId" class="curtain" onclick="hide1()">

            </div>
            <div id="edit-divId" class="edit-div">
                <table style="display: table;">
                    <tr style="width: 100%;">
                        <td style="text-align: center;width:100%;">
                            <div style="width:100%;height: 200px;background-color: #e1e1e1;
                           text-align: center;padding: 5px;font-family: 'Century Gothic'">
                                <font style="font-family: 'Century Gothic'; font-size: 17px; color: #212121;">Edit User Details</font>
                                <br>
                                <input id="vendorId" value="" style="visibility: hidden;"/>
                                <input id="vendorName" type="text" value="" class="user-details-font" placeholder="Vendor Name"/>
                                <select id="vendorType">
                                    <option value="1">Gas Supplier</option>
                                    <option value="2">Hair Stylist</option>
                                    <option value="3">Make-Up Artist</option>
                                    <option value="4">Mechanic</option>
                                    <option value="5">Tailor</option>
                                    <option value="6">Other</option>
                                </select>
                                <input id="vendorEmail" type="text" value="" placeholder="Email Address"/>
                                <input id="vendorPhone" type="text" value="Phone No."/>
                                <input id="vendorPhone2" type="text" value="(Other) Phone No."/>
                                <select id="vendorLocation">
                                    <option value="1">Surulere--Badagry</option>
                                    <option value="2">Ikeja--Berger</option>
                                    <option value="3">Shomolu--Ilupeju</option>
                                    <option value="4">Yaba--Obalende</option>
                                    <option value="5">Ojota--Ikorodu</option>
                                    <option value="6">V.I--Epe</option>
                                    <option value="7">Oshodi--Egbeda</option>
                                </select>
                                <br><br>
                                <button id="done-1">Done</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="delete-divId" class="edit-div">
                <table style="display: table;">
                    <tr style="width: 100%;">
                        <td style="text-align: center;width:100%;">
                            <div style="width:100%;height: 200px;background-color: #e1e1e1;
                           text-align: center;padding: 5px;font-family: 'Century Gothic'">
                                <font style="font-family: 'Century Gothic'; font-size: 17px; color: #ee4545;">Are you Sure</font>
                                <br>
                                <font style="font-family: 'Century Gothic'; font-size: 12px; color: #ee4545;">
                                    You are deleting the user's account and every information associated with it. </font>
                                <br><br>
                                <button id="sure-yes">Yes</button>
                                <button id="sure-no">Cancel</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

        </div>    
    </body>
</html>
