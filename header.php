<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style2.css" rel="stylesheet" type="text/css" />
    <script src = "script.js"></script>
    <title>LLAL</title>
</head>
<body class = "bg">
    <nav>
        <div class = "header">
                <ul class = "nav">
                    <li><a onmouseover = "changeHead(this,0)" onmouseout = "changeHead(this,1)" href="sla.php">Landscaper Record</a></li>
                    <li><a onmouseover = "changeHead(this,0)" onmouseout = "changeHead(this,1)" href="bca.php">Book Customer Appointment</a></li>
                    <li><a onmouseover = "changeHead(this,0)" onmouseout = "changeHead(this,1)" href="cca.php">Cancel Customer Appointment</a></li>
                    <li><a onmouseover = "changeHead(this,0)" onmouseout = "changeHead(this,1)" href="pco.php">Place a Custumer Order</a></li>
                    <li><a onmouseover = "changeHead(this,0)" onmouseout = "changeHead(this,1)" href="uco.php">Update Custumer Order</a></li>
                    <li><a onmouseover = "changeHead(this,0)" onmouseout = "changeHead(this,1)" href="cco.php">Cancel Customer Order</a></li>
                    <li><a onmouseover = "changeHead(this,0)" onmouseout = "changeHead(this,1)" href="cnca.php">Create New Account</a></li>
                </ul>
        </div>
    </nav>

    <div>
        <?php 
        if(!isset($_SESSION['submit'])){
            header("location:../Assignment4/login.php");
        }
        ?>

