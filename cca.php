<?php include_once('header.php');
?>

<?php 
    if(isset($_POST["submit"])){
        $CID = $_POST["CID"];
        $SNum = $_POST["SNum"];
    
        //Makes DB connection
        global $conn;
        $servername = "sql1.njit.edu";
        $username = "gv8";
        $password = "WWP6happygoldcranes@";
        $dbname = "gv8";
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

                    //deleting the apointment from the tables
                    $stmt = 'DELETE FROM `Service` WHERE `ClientID` = "'.$CID.'" AND `ServiceID` = "'.$SNum.'" ';
                    $stmt2 = 'DELETE FROM `Order` WHERE `ClientID` = "'.$CID.'" AND `ServiceID` = "'.$SNum.'" ';
                    $_SESSION["stmt"] = $stmt;
                    $_SESSION["stmt2"] = $stmt2;
                    //script where I am having problems with
                    echo '<script>
                    var result = confirm("Are you sure that you want to cancel the appointment?");
                    if(result == true){
                        window.location.assign("https://web.njit.edu/~gv8/IT202/Assignment4/cca.del.php");
                    }
                    </script>';
                }
                else{
                    //the client id in appointment does not match the given client id.
                    echo '<script>alert("The appointment ID and Client ID does not match.");</script>';
                }
            }
            else{
                //appointment does not exist
                echo '<script>alert("The appointment is not in the database.");</script>';
            }


        }
        //user does not exist
        else{
            echo '<script>alert("The user ID is not in the database.");</script>';
        }

    }
?>

<section>
    <?php
    //website content
    ?>
    <form onsubmit="return CCA();" action = "" method = "POST">
    <h1>Cancel Customer Appointment</h1>
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