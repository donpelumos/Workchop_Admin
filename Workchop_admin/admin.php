<?php
/**
 * Created by PhpStorm.
 * User: BALE
 * Date: 22/09/2016
 * Time: 4:43 AM
 */
    session_start();
    $_SESSION['auth'] = "no";
?>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="admin.css">
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="dist/js/bootstrap.min.js"></script>
        <link href="font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body style="background-color:#e6e6e6; width:100%; height:100%; margin:0px; padding:0px;"  >
        <table  style="width:40%; margin-left: 30%; margin-right: 30%; height:100%; padding:0px;">
            <tr><td valign="middle" align="center">
                    <div class="div_width" align="center" style="border: 5px solid #0075d8; border-radius:5px; background-color:whitesmoke;">
                        <br>
                        <form action="main.php" method="post">
                            <font style="font-family: 'Century Gothic';font-size: 28px;">Workchop</font> <br>
                            <font style="font-family:'Century Gothic'; font-size:15px;">Admin Page</font> <br><br>
                            <input type="password" name="password" id="password" placeholder="Password" style="font-size: 15px;
                            font-family: 'Century Gothic';width:300px;" required> <br><br>
                            <button id="login-button" style="font-family: 'Century Gothic';font-size: 15px;" type="submit">Login</button>
                            <br><br>
                        </form>
                    </div>
                </td></tr>
        </table>
    </body>
</html>