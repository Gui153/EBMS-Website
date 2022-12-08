<?php include_once('header.php');
?>

<?php 
    if(isset($_POST["submit"])){
        $CID = $_POST["CID"];
        $SNum = $_POST["SNum"];
        $prod = $_POST["prod"];

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

                    //update appointment------- ask if the user wants to update it before
                    $stmt = 'SELECT * FROM `Order` where `ClientID` = "'.$CID.'" AND `ServiceID` = "'.$SNum.'"'; 
                    $ord = mysqli_query($conn, $stmt);
                    $order = mysqli_fetch_array($ord, MYSQLI_ASSOC);
                    
                    if($order['Products'] != NULL){

                        $prod = $order['Products'].", ".$prod;
                    }
                    $stmt = 'UPDATE `Order` SET `Products`= "'.$prod.'" WHERE `ClientID`="'.$CID.'" and `ServiceID`="'.$SNum.'"';
                    $_SESSION["stmt"] = $stmt;
                    echo '<script>
                    var result = confirm("Are you sure that you want to update the order?");
                    if(result == true){
                        window.location.assign("https://web.njit.edu/~gv8/IT202/Assignment4/uco.del.php");
                    }
                    </script>';
                    
                }
                else{
                    //the client id in appointment does not match the given client id.
                    echo '<script>alert("The service ID and Client ID does not match.");</script>';
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

    <form onsubmit="return UCO();" action = "" method = "POST">
    <h1>Update Customer Order</h1>
    <?php
    if(isset($_POST['submit'])){

        echo'<label>Customer ID:</label><input type="text" name = "CID" id = "CID"  value ="'.$CID.'" placeholder="Customer ID..."><br>
            <label>Service ID:</label><input type="text" name = "SNum" id = "SNum" value ="'.$SNum.'" placeholder="Service ID..."><br>
            <label>Products:</label><input type="text" name = "prod" id = "prod" value ="'.$prod.'" placeholder="products..."><br>';
    }
    else{
        echo'<label>Customer ID:</label><input type="text" name = "CID" id = "CID" placeholder="Customer ID..."><br>
        <label>Service ID:</label><input type="text" name = "SNum" id = "SNum" placeholder="Service ID..."><br>
        <label>Products:</label><input type="text" name = "prod" id = "prod" placeholder="products..."><br>';
    }
    ?>
            <button type = "submit" name="submit" onmouseover="changeColor(this,0)" onmouseout = "changeColor(this,1)">Submit</button>
    </form>
</section>



<?php 
    include_once('footer.php');
?>
