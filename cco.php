<?php include_once('header.php');
?>

<?php 
    if(isset($_POST["submit"])){
        $CID = $_POST["CID"];
        $SNum = $_POST["SNum"];

        //Makes DB connection
        global $conn;
        $servername = "";
        $username = "";
        $password = "";
        $dbname = "";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }   
        // get user data
         $stmt = 'SELECT * FROM `Client` where ClientID = "'.$CID.'"'; 
        $user = mysqli_query($conn, $stmt);
        
        $row = mysqli_fetch_array($user, MYSQLI_ASSOC);
        //check if the user exists
        if($row){
            //get appointment data
            $stmt = 'SELECT * FROM `Service` WHERE `ServiceID` = "'.$SNum.'"'; 
        
            $appointment = mysqli_query($conn, $stmt);
            $app = mysqli_fetch_array($appointment, MYSQLI_ASSOC);
            // check if the appointment exists
            if($app){
                if($app["ClientID"] == $row["ClientID"]){
                    //make user confirm that he wants to cancel the order.
                    $stmt = 'UPDATE `Order` SET `Products`= NULL WHERE `ClientID`="'.$CID.'" and `ServiceID`="'.$SNum.'"'; 
                    $_SESSION["stmt"] = $stmt;
                    echo '<script>
                    var result = confirm("Are you sure that you want to cancel the order?");
                    if(result == true){
                        window.location.assign("https://web.njit.edu/~gv8/IT202/Assignment4/cco.del.php");
                    }
                    </script>';
        
                }
                else{
                    //the client id in appointment does not match the given client id.
                    echo '<script>alert("Either Service ID or Client ID does not exist. please double check your numbers");</script>';
                }
            }
            else{
                //appointment does not exist
                 echo '<script>alert("Either Service ID or Client ID does not exist. please double check your numbers");</script>';
            }
            
        
        }
        //user does not exist
        else{
             echo '<script>alert("Either Service ID or Client ID does not exist. please double check your numbers");</script>';
        }

    }
?>

<section>

    <form onsubmit="return CCO();" action = "" method = "POST">
    <h1>Cancel Customer Order</h1>
    <?php
    if(isset($_POST['submit'])){

        echo'<label>Customer ID:</label><input type="text" name = "CID" id = "CID" value ="'.$CID.'" placeholder="Customer ID..."><br>
            <label>Service Number:</label><input type="text" name = "SNum" id = "SNum" value ="'.$SNum.'" placeholder="Service number..."><br>';
    }
    else{
        echo'<label>Customer ID:</label><input type="text" name = "CID" id = "CID"  placeholder="Customer ID..."><br>
        <label>Service Number:</label><input type="text" name = "SNum" id = "SNum" placeholder="Service number..."><br>';
    }
    ?>
            <button type = "submit" name="submit" onmouseover="changeColor(this,0)" onmouseout = "changeColor(this,1)">Submit</button>
    </form>

</section>

<?php 
    include_once('footer.php');
?>
