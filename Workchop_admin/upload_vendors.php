<?php
/**
 * Created by PhpStorm.
 * User: BALE
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

        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="dist/js/bootstrap.min.js"></script>
        <link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="upload_vendors.css" rel="stylesheet" >
        <script src="jquery-1.11.3.min.js"></script>
        <script type="text/javascript">
            var currState = 1;
            var vendorType = $('#vendor-type').val();
            var currImg=1;
            $(document).ready(function() {
                $('#states').change(function () {
                    if($('#states').val() == 1){
                        currState = 1;
                        setAreas();
                        $('#explain').show();
                    }
                    else if($('#states').val() == 2){
                        currState = 2;
                        setAreas();
                        $('#explain').hide();
                    }
                });
                changeImage();
                $('#areas').change(function () {
                    if(currState == 1){
                        if($('#areas').val() == 1){
                            $('#explain').html('Ojuelegba | Surulere | Iponri | Festac | Aguda | Bode Thomas | Apapa | Mile 2 | Badagry');
                        }
                        else if($('#areas').val() == 2){
                            $('#explain').html('Ikeja | Ogba | Opebi | Oregun | Alausa | Berger');
                        }
                        else if($('#areas').val() == 3){
                            $('#explain').html('Shomolu | Bariga | Anthony | Maryland | Onipanu | Ilupeju');
                        }
                        else if($('#areas').val() == 4){
                            $('#explain').html('Ebute Meta | Yaba | Akoka | Lagos Island | Oke Arin | Sura');
                        }
                        else if($('#areas').val() == 5){
                            $('#explain').html('Ikorodu | Ojota | Mile 12 | Ketu');
                        }
                        else if($('#areas').val() == 6){
                            $('#explain').html('Ajah | Lekki | Ikoyi | Victoria Island | Epe');
                        }
                        else if($('#areas').val() == 7){
                            $('#explain').html('Oshodi | Alimosho | Abule Egba | Ikotun | Egbeda');
                        }

                    }
                });
                $('#submit').click(function () {
                    vendorType = $('#vendor-type').val();
                    if(vendorType == 6){
                        var other = $('#other').val();
                        vendorType = 'Other : ' + other;
                    }
                    if($('#vendor-name').val().length == 0 || $('#vendor-phone-1').val().length == 0 ||
                        $('#vendor-name2').val().length == 0 ){
                        alert('Fields not completed');
                        $('#incorrect').css('visibility','visible');
                        setTimeout(function () {
                            $('#incorrect').css('visibility','hidden');
                        },2000);
                    }
                    else if($('#vendor-phone-1').val().length != 11){
                        //alert($('#vendor-phone-1').val().length);
                        $('#incorrect2').css('visibility','visible');
                        setTimeout(function () {
                            $('#incorrect2').css('visibility','hidden');
                        },2000);
                    }
                    else if($('#vendor-phone-2').val().length == 0){
                        var text = $('#vendor-name').val()+'--'+$('#states').val()+'--'+$('#areas').val()+'--'+
                                vendorType+'--'+$('#vendor-phone-1').val();
                        uploadVendors();
                        //alert (text);
                    }
                    else if($('#vendor-phone-2').val().length > 0){
                        if($('#vendor-phone-2').val().length != 11) {
                            //alert($('#vendor-phone-1').val().length);
                            $('#incorrect2').css('visibility','visible');
                            setTimeout(function () {
                                $('#incorrect2').css('visibility','hidden');
                            },2000);
                        }
                        else {
                            var text = $('#vendor-name').val() + '--' + $('#states').val() + '--' + $('#areas').val() + '--' +
                                vendorType + '--' + $('#vendor-phone-1').val() + '&&' + $('#vendor-phone-2').val();
                            //alert (text);
                            uploadVendors();
                        }

                    }
                });
                $('#vendor-type').change(function () {
                    if($('#vendor-type').val() == 6){
                        $('#other').css('visibility','visible');
                        $('#other-label').css('visibility','visible');
                    }
                    else{
                        $('#other').css('visibility','hidden');
                        $('#other-label').css('visibility','hidden');
                    }
                });
            });
            function uploadVendors(){
                var ajaxRequest;  // The variable that makes Ajax possible!
                try {
                    ajaxRequest = new XMLHttpRequest();
                }
                catch (e) {
                }
                var vendorName = $('#vendor-name').val()+' '+$('#vendor-name2').val();
                var vendorPhone = '';
                if($('#vendor-phone-2').val().length == 0){
                    vendorPhone = $('#vendor-phone-1').val();
                }
                else if($('#vendor-phone-2').val().length > 0 ){
                    vendorPhone = $('#vendor-phone-1').val()+'----'+$('#vendor-phone-2').val();
                }

                if($('#vendor-type').val() == 6){
                    var other = $('#other').val();
                    vendorType = 'Other : ' + other;
                }
                var vendorLocation = '';
                if($('#states').val() == 1){
                    vendorLocation = $('#areas').val();
                }
                else if($('#states').val() == 2){
                    vendorLocation = '2'+$('#areas').val();
                }
                ajaxRequest.open("GET", "../upload_user_vendor_web.php?vendor_name="
                    + vendorName+"&vendor_number="+vendorPhone+"&vendor_type="
                    + vendorType+"&vendor_location_category="+vendorLocation
                    + "&is_vendor_smart=0", true);
                ajaxRequest.send(null);
                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxResult = ajaxRequest.responseText;
                        if(ajaxResult == 'done--'){
                            alert('Vendor Successfully Added');
                            window.open("upload_vendors.php","_self");
                        }
                        else{
                            alert('Error Adding Vendor');
                        }

                    }
                    else{
                        //alert('Error In Connection');
                    }
                }
            }
            function setAreas(){
                var select = $('#areas');
                if(currState == 1){
                    select.empty().append('<option value="1">Surulere Axis</option><option value="2">Ikeja Axis</option>' +
                        '<option value="3">Onipanu Axis</option><option value="4">Lagos Island Axis</option>' +
                        '<option value="5">Ikorodu Axis</option><option value="6">Lekki Axis</option>' +
                        '<option value="7">Oshodi Axis</option>');
                }
                else if(currState == 2){
                    select.empty();
                    select.append('<option value="1">Abaji</option>' +
                        '<option value="2">Abuja Municipal</option><option value="3">Bwari</option>' +
                        '<option value="4">Gwagwalada</option><option value="5">Kuje</option><option value="6">Kwali</option>');
                }
            }
            function changeImage(){
                currImg++;
                if(currImg == 4){
                    currImg = 1;
                }
                if(currImg == 1){
                    $('#img1').css('opacity','1.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
                }
                else if(currImg == 2){
                    $('#img2').css('opacity','1.0');$('#img1').css('opacity','0.0');$('#img3').css('opacity','0.0');
                }
                else if(currImg == 3){
                    $('#img3').css('opacity','1.0');$('#img2').css('opacity','0.0');$('#img1').css('opacity','0.0');
                }
                setTimeout(changeImage,4500);
            }
        </script>
    </head>
    <body>
        <div style="width:100%;height:100%;position:absolute;z-index: 0;left:0px;top:0px;">
            <img id="img1" src="images/hairtools.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
            top:0px;left:0px;opacity:1.0;"/>
            <img id="img2" src="images/mechanics.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
            top:0px;left:0px;opacity:0.0;"/>
            <img id="img3" src="images/tailors.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
            top:0px;left:0px;opacity:0.0;"/>
        </div>
        <div style="width:100%;height:100%;background-color:#000000;opacity:0.5;position:fixed;top:0px;left:0px;z-index:3;"></div>
        <div style="width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:5;">
            <br><br>
            <div class="white-bg">
                <br>
                <table class="table-prop">
                    <tr>
                        <td style="text-align: center">
                            <img src="images/icon.png" class="icon-prop">
                            <img src="images/logo.png" class="logo-prop">
                        </td>
                    </tr>
                </table>

                <p class="big-font" style="padding-bottom: 0px;">
                    Be the one of the first on the world's first vendor reference platform!
                </p>
                <p class="big-font" style="margin-top: 0px;padding-top: 0px;">
                    Register below
                </p>
                <br>
                <div>
                    <font class="text">Vendor Surname : </font>
                    <input type="text" class="input-width" id="vendor-name" required/>
                    <br><br>

                    <font class="text">Vendor Firstname : </font>
                    <input type="text" class="input-width" id="vendor-name2" required/>
                    <br><br>

                    <font class="text">Vendor State : </font>
                    <select class="text" id="states" required>
                        <option value="1">Lagos</option>
                        <option value="2">F.C.T</option>
                    </select>
                    <br><br>

                    <font class="text">Location Category : </font>
                    <select class="text" id="areas" required>
                        <option value="1">Surulere Axis</option>
                        <option value="2">Ikeja Axis</option>
                        <option value="3">Onipanu Axis</option>
                        <option value="4">Lagos Island Axis</option>
                        <option value="5">Ikorodu Axis</option>
                        <option value="6">Lekki Axis</option>
                        <option value="7">Oshodi Axis</option>
                    </select>
                    <br>

            <textarea id="explain" class="text" rows="3"  style="width:90%; resize: none;margin-bottom: 20px;margin-top: 20px;
            text-align: center;"
                      readonly>Ojuelegba | Surulere | Iponri | Festac | Aguda | Bode Thomas | Apapa | Mile 2 | Badagry</textarea>
                    <br>
                    <font class="text">Vendor Type : </font>
                    <select class="text" id="vendor-type" required>
                        <option value="1">Gas Supplier</option>
                        <option value="2">Hair Stylist</option>
                        <option value="3">Make-Up Artist</option>
                        <option value="4">Mechanic</option>
                        <option value="5">Tailor</option>
                        <option value="6">Other</option>
                    </select><br>
                    <font class="text" id="other-label" style="visibility: hidden;">Specify : </font>
                    <input type="text" class="input-width" id="other" style="visibility: hidden;"/>
                    <br><br>

                    <font class="text">Phone Number 1 : </font>
                    <input type="text" class="input-width" id="vendor-phone-1" required/>
                    <br><br>

                    <font class="text">Phone Number 2(optional) : </font>
                    <input type="text" class="input-width" id="vendor-phone-2"/>
                    <br>
                    <font id="incorrect" style="color: red;font-family: 'Century Gothic'; font-size: 12px;visibility: hidden;">
                        *** Incorrect Input. Check Filled Data</font>
                    <br>
                    <font id="incorrect2" style="color: red;font-family: 'Century Gothic'; font-size: 12px;visibility: hidden;">
                        *** Incorrect Phone Number</font>
                    <br>

                    <br>
                    <button id="submit" style="font-family: 'Century Gothic';">Submit</button>
                    <br><br><br>
                </div>
            </div>
            <br><br>
        </div>
    </body>
</html>
