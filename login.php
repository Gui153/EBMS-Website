<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>LLAL</title>
</head>

<body class = "bg">

    <script src = "script.js"></script>

    <?php
    $Login = false;
    //Makes DB connection
    global $con;
    $servername = "sql1.njit.edu";
    $username = "gv8";
    $password = "WWP6happygoldcranes@";
    $dbname = "gv8";
    $con = mysqli_connect($servername,$username,$password,$dbname);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    ?>

    <?php



    if(isset($_POST["submit"])){
        $Fname = $_POST["Fname"];
        $Lname = $_POST["Lname"];
        $pwd = $_POST["pwd"];
        $LID = $_POST["LID"];
        $PN = $_POST["PN"];
        $Transf = $_POST["options"];
        echo($Transf);
        if(isset($_POST["isEmail"])){
            $Email = $_POST["email"];
        }

        $problems="";

        $Login = true;

        $stmt = 'SELECT * FROM `Landscaper` WHERE `ID` = "'.$LID.'"';
        
        $landlist = mysqli_query($con, $stmt);
            
        $row = mysqli_fetch_array($landlist, MYSQLI_ASSOC);

        $PN = str_replace(" ", "-", $PN);

        if($row){
            if(($row['FirstName'] != $Fname || $row['LastName'] != $Lname)){
                $problems=$problems."The given name does not match the name in the database. ";
                $Login = false;
            }
            if($row['Pass'] != $pwd){
                $problems=$problems."The given password does not match the password in the database. ";
                $Login = false;
            }
            if($row['PN'] != $PN){
                $problems=$problems."The given phone number does not match the phone number in the database.";
                $Login = false;
            }
            if(isset($_POST["isEmail"])){
                if($row['Email'] != $Email){
                $problems=$problems."The given email does not match the Email in the database. ";
                    $Login = false;
                }
            }
            else{
                $Email = $row["Email"];
            }
        }
        else{
            $Login=false;
            $problems=$problems."No such ID in database. ";
        }
    }


    ?>

    <section>
        <h1>Login</h1>
        <form onsubmit="return sub();" action = "" method="POST">
        <?php

            if(isset($_POST['submit'])){
            echo'<label>First name:</label><input type="text" name = "Fname" id = "Fname" value ="'.$Fname.'" placeholder="First Name..."><br>
                <label>Last name:</label><input type="text" name = "Lname" id = "Lname" value ="'.$Lname.'" placeholder="Last Name..."><br>
                <label>Phone number:</label><input type="text" name = "PN" id = "PN"  value ="'.$PN.'" placeholder="LLAL Phone Number..."><br>
                <label>Landscapper ID:</label><input type="text" name = "LID" id = "LID" value ="'.$LID.'" placeholder="LLAL ID..."><br>
                <label>Password:</label><input type="password" name = "pwd" id = "pwd" value ="'.$pwd.'" placeholder="LLAL Password..."><br>
                <label>Include email?</label><input type="checkbox" name = "isEmail" id = "isEmail" onclick="putEmail(this);"><br>';

            }
            else{
            echo' <label>First name:</label><input type="text" name = "Fname" id = "Fname" placeholder="First Name..."><br>
            <label>Last name:</label><input type="text" name = "Lname" id = "Lname"  placeholder="Last Name..."><br>
            <label>Phone number:</label><input type="text" name = "PN" id = "PN"  placeholder="LLAL Phone Number..."><br>
            <label>Landscapper ID:</label><input type="text" name = "LID" id = "LID" placeholder="LLAL ID..."><br>
            <label>Password:</label><input type="password" name = "pwd" id = "pwd"   placeholder="LLAL Password..."><br>
            <label>Include email?</label><input type="checkbox" name = "isEmail" id = "isEmail" onclick="putEmail(this);"><br>';
            }
        ?>
        <label id = "test"></label>
        <label><select id = "options" name = "options">
        <option value = "SLA">Search a Landscaper's Account</option>
        <option value = "BCA">Book a Customer's Appointment</option>
        <option value = "CCA">Cancel a Customer's Appointment</option>
        <option value = "PCO">Place a Customer's Order</option>
        <option value = "UCO">Update a Customer's Order</option>
        <option value = "CCO">Cancel a Customer's Order</option>
        <option value = "CNCA">Create a New Customer Account</option>
        </select></label><br>
        
        <button type = "submit" name="submit" onmouseover = "changeColor(this,0)" onmouseout = "changeColor(this,1)">Login</button>
        </form>
        <button type = "reset" name = "reset" id="reset" onclick="location.href ='https://web.njit.edu/~gv8/IT202/Assignment4/login.php';" onmouseover = "changeColor(this,0)" onmouseout = "changeColor(this,1)">RESET</button>
        <?php 
        if(isset($_POST['submit'])){
            if(!$Login){
                echo('<script>alert("'.$problems.'");</script>');
            }
            else{
                session_start();
                $_SESSION["Fname"] = $Fname;
                $_SESSION["Lname"] = $Lname;
                $_SESSION["PN"] = $PN;
                $_SESSION["pwd"] = $pwd;
                $_SESSION["email"] = $Email;
                $_SESSION["LID"] = $LID;
                $_SESSION["submit"] = $_POST['submit'];

                header("location:../Assignment4/". mb_strtolower($Transf) .".php");

            }
        }
        ?>
    </section>



<?php 
    include_once('footer.php');
?>