<?php
?>
<html>
	<head>
		<title>
			Workchop
		</title>
		<link rel="icon" href="workchopphoneicon.png">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="dist/js/bootstrap.min.js"></script>
		<link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="main.css" rel="stylesheet" >
		<script src="jquery-1.11.3.min.js"></script>
		<link rel="stylesheet" href="index.css">
		<script type="text/javascript">
			var currImg=0;
			var validEmail = 0;
			$(document).ready(function () {
				var screenHeight = $("body").innerHeight();
				var caseHeight = $('#full-case').innerHeight();
				//alert (screenHeight+'--'+caseHeight);
				var margin = (screenHeight-caseHeight)/2;
				if(screenHeight > 450) {
					$('#full-case').css('margin-top', margin);
					$('#full-case').css('margin-bottom', margin);
				}
					changeImage();
				$('#join-button').mousedown(function () {
					if(validEmail == 1){
						$(this).css('opacity','0.8');
					}
				});
				$('#join-button').mouseup(function () {
					if(validEmail == 1){
						$(this).css('opacity','1.0');
					}
				});
				$('#join-button').click(function(){
					if(validEmail == 1) {
						sendEmail();
					}
				});
				$('#email-input').keyup(function(){
					if($(this).val() == ''){
						$('.join-button').css('opacity','0.7');
						$('.join-button').css('cursor','default');
					}
					else if($(this).val().includes(',') || $(this).val().includes('#') || $(this).val().includes('/')){

					}
					else{
						if($(this).val().includes('@')){
							if($(this).val().includes('.c')){
								$('.join-button').css('opacity','1.0');
								$('.join-button').css('cursor','pointer');
								validEmail = 1;
							}
							else{
								$('.join-button').css('opacity','0.7');
								$('.join-button').css('cursor','default');
								validEmail = 0;
							}
						}
						else{
							$('.join-button').css('opacity','0.7');
							$('.join-button').css('cursor','default');
							validEmail = 0;
						}

					}
				});
			});
			function changeImage(){
				currImg++;
				if(currImg == 12){
					currImg = 1;
				}
				if(currImg == 1){
					$('#img1').css('opacity','1.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 2){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','1.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 3){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','1.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 4){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','1.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 5){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','1.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 6){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','1.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 7){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','1.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 8){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','1.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 9){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','1.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 10){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','1.0');$('#img11').css('opacity','0.0');
				}
				else if(currImg == 11){
					$('#img1').css('opacity','0.0');$('#img2').css('opacity','0.0');$('#img3').css('opacity','0.0');
					$('#img4').css('opacity','0.0');$('#img5').css('opacity','0.0');$('#img6').css('opacity','0.0');
					$('#img7').css('opacity','0.0');$('#img8').css('opacity','0.0');$('#img9').css('opacity','0.0');
					$('#img10').css('opacity','0.0');$('#img11').css('opacity','1.0');
				}
				setTimeout(changeImage,4500);
			}
			function hideSuccess(){
				$('#success-div').css('visibility','hidden');
				$('#success-alert').css('visibility','hidden');
				$('#questions-div').css('visibility','visible');
			}
			function hideFailure(){
				$('#failure-div').css('visibility','hidden');
				$('#failure-alert').css('visibility','hidden');
			}
			function sendEmail(){
				var ajaxRequest;  // The variable that makes Ajax possible!
				try {
					ajaxRequest = new XMLHttpRequest();
				}
				catch (e) {
				}

				var email = $('#email-input').val();
				ajaxRequest.open("GET", "add_to_waiting_list.php?email=" + email, true);
				ajaxRequest.send(null);
				ajaxRequest.onreadystatechange = function(){
					if(ajaxRequest.readyState == 4) {
						var ajaxResult = ajaxRequest.responseText;
						if (ajaxResult == 'done') {
							$('#success-alert').css('visibility', 'visible');
						}
						else{
							$('#failure-alert').css('visibility','visible');
						}
					}
					else{
					}
				}
			}
		</script>
	</head>
	<body class="grad">
		<div style="width:100%;height:100%;position:fixed;z-index: 0;left:0px;top:0px;">
			<img id="img1" src="images/01.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:1.0;"/>
			<img id="img2" src="images/02.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img3" src="images/03.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img4" src="images/04.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img5" src="images/05.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img6" src="images/06.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img7" src="images/07.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img8" src="images/08.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img9" src="images/09.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img10" src="images/10.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
			<img id="img11" src="images/11.jpg" style="width:100%;height:100%;transition: all 2.0s ease;z-index:1;position:fixed;
				top:0px;left:0px;opacity:0.0;"/>
		</div>
		<!--<div style="width:100%;height:100%;position:absolute;top:0px;left:0px;z-index:1;">
			<table style="width:100%;height:100%;text-align:center;display:table;" class="welcome-spin">
				<tbody style="width:100%;">
					<tr style="width:100%;">
						<td align="center" style="vertical-align:bottom;padding:0px;">
							<img id="welcome-spin-image" src="images/icon.png" class="welcome-image"/>
						</td>
					</tr>
					<tr>	
						<td align="center" style="vertical-align:top;padding:0px;">
							<img id="welcome-spin-image" src="images/logo.png" class="welcome-logo"></td>
						</td>	
					</tr>
				</tbody>
			</table>
		</div>-->
		<div style="width:100%; height:100%;background-color:#000000;opacity:0.3; position:fixed;top:0px;left:0px;z-index:1;">

		</div>
		<div style="width:100%; height:100%; position:absolute;top:0px;left:0px;z-index:2;text-align: center;">
			<div id="full-case">
				<table class="table-prop">
					<tr>
						<td style="text-align: center">
							<img src="images/icon.png" class="icon-prop">
							<img src="images/logo.png" class="logo-prop">
						</td>
					</tr>
				</table>
				<font class="no-1">The no.1 Tradesman reference platform</font>
				<br><br>
				<font class="sub-text">Find trusted and verified tradesmen to get your job done !</font><br>
				<br><br><br>
				<font class="launching-text">Launching Soon . . .</font><br>
				<div class="email-div">
					<input type="text" class="email" id="email-input" placeholder="Email Address"/>
					<button class="join-button" id="join-button">Request Invite</button>
				</div><br>
				<font class="small-text">BE ONE OF THE FIRST TO BE NOTIFIED</font><br><br><br>
			</div>
		</div>
		<div id="success-div" style="width:100%; height:100%; position:fixed;top:0px;left:0px;z-index:4;text-align: center;visibility: hidden;">
			<div id="success-alert" class="alert alert-success" role="alert" style="max-width: 450px;display: inline-block;
				margin-top: 15%;">
				<strong>Success!</strong> You will be notified once there is a stable release.
				<a class="close" data-dismiss="alert" aria-label="close" title="close" onclick="hideSuccess()"
					style="margin-left: 10px;">×</a>
			</div>
		</div>
		<div id="failure-div" style="width:100%; height:100%; position:fixed;top:0px;left:0px;z-index:5;text-align: center;visibility: hidden;">
			<div id="failure-alert" class="alert alert-danger" role="alert" style="max-width: 450px;display: inline-block;
				margin-top: 15%;">
				<strong>Failure!</strong> Unable to connect.
				<a class="close" data-dismiss="alert" aria-label="close" title="close" onclick="hideFailure()"
				   style="margin-left: 10px;">×</a>
			</div>
		</div>
		<div id="questions-div" style="width:100%; height:100%; position:fixed;top:0px;left:0px;z-index:3;text-align: center; visibility: hidden;">
			<br>
			<div style="background-color: #ffffff;display: inline-block;margin-top: 100px;">
				<div style="display: block;padding:15px;">
					<font class="question-font">Gender : </font>
					<select class="question-input">
						<option value="female">Female</option>
						<option value="male">Male</option>
					</select>
					<br><br>
					<font class="question-font">How did you hear about this platform : </font>
					<select class="question-input">
						<option value="1">Online Adverts</option>
						<option value="2">Social Media Broadcasts</option>
						<option value="3">Told by a friend or colleague</option>
					</select>
					<br><br>
					<button id="send-email-button">Ok</button>
				</div>
			</div>
		</div>
	</body>
</html>
