<?php include_once('header.php');
?>

<?php 
    if(isset($_POST["submit"])){
        $CFname = $_POST["CFname"];
        $CLname = $_POST["CLname"];
        $CID = $_POST["CID"];
        $SNum = $_POST["SNum"];
        $prod = $_POST["prod"];

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
            //check if the names are correct
            if($row['FirstName'] == $CFname && $row['LastName'] ==$CLname){
                //get appointment data
                $stmt = 'SELECT * FROM `Service` WHERE `ServiceID` = "'.$SNum.'"'; 

                $appointment = mysqli_query($conn, $stmt);
                $app = mysqli_fetch_array($appointment, MYSQLI_ASSOC);
                // check if the appointment exists
                if($app){
                    if($app["ClientID"] == $row["ClientID"]){
                        
                        $stmt = 'UPDATE `Order` SET`Products`="'.$prod.'" WHERE `ClientID`="'.$CID.'" and `ServiceID`="'.$SNum.'"'; 

                        $upd = mysqli_query($conn, $stmt);
                        echo '<script>alert("Order Placed.");</script>';

                    }
                    else{
                        //the client id in appointment does not match the given client id. ------ make it a confirm
                        echo '<script>
                        var result = confirm("Before placing an order, an appointment must be placed. Did you place an appointment?");
                        if(result == false){
                            window.location.assign("https://web.njit.edu/~gv8/IT202/Assignment4/bca.php");
                        }
                        else{
                        alert("Data not found.");
                        }
                        </script>';
                    }
                }
                else{
                    //appointment does not exist------- make it a confirm
                    echo '<script>
                    var result = confirm("Before placing an order, an appointment must be placed. Did you place an appointment?");
                    if(result == false){
                        window.location.assign("https://web.njit.edu/~gv8/IT202/Assignment4/bca.php");
                    }
                    else{
                        alert("Data not found.");
                    }
                    </script>';
                }
            }
            else{
                echo '<script>alert("Customer name is not in the database.");</script>';
            }

        }
        //user does not exist
        else{
            echo '<script>alert("The user ID does not exist.");</script>';
        }
    }
?>


<section>

    <form onsubmit="return PCO();" action = "" method = "POST">
    <h1>Place Customer Order</h1>
    <?php
    if(isset($_POST['submit'])){

        echo'<label>Customer First Name:</label><input type="text" name = "CFname" id = "CFname" value ="'.$CFname.'" placeholder="Customer First Name..."><br>
            <label>Customer Last Name:</label><input type="text" name = "CLname" id = "CLname" value ="'.$CLname.'" placeholder="Customer Last Name..."><br>
            <label>Customer ID:</label><input type="text" name = "CID" id = "CID"  value ="'.$CID.'" placeholder="Customer ID..."><br>
            <label>Service ID:</label><input type="text" name = "SNum" id = "SNum" value ="'.$SNum.'" placeholder="Service ID..."><br>
            <label>Products:</label><input type="text" name = "prod" id = "prod" value ="'.$prod.'" placeholder="products..."><br>';
    }
    else{
        echo'<label>Customer First Name:</label><input type="text" name = "CFname" id = "CFname" placeholder="Customer First Name..."><br>
        <label>Customer Last Name:</label><input type="text" name = "CLname" id = "CLname" placeholder="Customer Last Name..."><br>
        <label>Customer ID:</label><input type="text" name = "CID" id = "CID" placeholder="Customer ID..."><br>
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