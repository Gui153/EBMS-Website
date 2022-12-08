<?php include_once('header.php');
    echo $_SESSION["submit"];
?>


<?php 
    if(isset($_POST["submit"])){
        $CFname = $_POST["CFname"];
        $CLname = $_POST["CLname"];
        $CID = $_POST["CID"];
        $Address = $_POST["address"];
        $Service = $_POST["service"];
        $date = $_POST["date"];
        $LID = $_SESSION["LID"];

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

        $stmt = 'SELECT * FROM `Client` where `ClientID` = "'.$CID.'"'; 
        $user = mysqli_query($conn, $stmt);

        $row = mysqli_fetch_array($user, MYSQLI_ASSOC);

        if($row){
            if($row["FirstName"] != $CFname||$row["LastName"] != $CLname){
                echo '<script>alert("The customer name does not match the name in the database, please try again or create a new account.");</script>';
            }
            else{
                $available = false;
                while($available == false){
                    $apoint =rand(0,999999);
                    $stmt = 'SELECT * FROM `Service` WHERE `ServiceID` = "'.$apoint.'"';
                    $list = mysqli_query($conn, $stmt);
                    $row = mysqli_fetch_array($list, MYSQLI_ASSOC);

                    if(!$row){
                        $available = true;
                    }
                }

                echo '<script>alert("Client Apointment Placed. The appointment ID is: '.$apoint.'");</script>';
                $stmt = 'INSERT INTO `Service`(`ServiceID`, `Service`, `date`, `LandID`, `ClientID`) VALUES ("'.$apoint.'","'.$Service.'","'.$date.'","'.$LID.'","'.$CID.'")';
                mysqli_query($conn, $stmt);
                $stmt = 'INSERT INTO `Order`(`OrderNum`, `Address`, `LandID`, `ClientID`, `ServiceID`) VALUES ("'.$apoint.'","'.$Address.'","'.$LID.'","'.$CID.'","'.$apoint.'")';
                mysqli_query($conn, $stmt);
            }


        }
        else{
            echo '<script>alert("No such ID in database.");</script>';
        }
    }
?>


<section>

    <form onsubmit="return BCA();" action = "" method = "POST">
        <h1>Book Customer Appointment</h1>
        <div class = "container">
        <?php
        if(isset($_POST['submit'])){

            echo'<label>Customer First Name:</label><input type="text" name = "CFname" id = "CFname" value ="'.$CFname.'" placeholder="First Name..."><br>
                <label>Customer Last Name:</label><input type="text" name = "CLname" id = "CLname" value ="'.$CLname.'" placeholder="Last Name..."><br>
                <label>Customer ID:</label><input type="text" name = "CID" id = "CID"  value ="'.$CID.'" placeholder="LLAL Phone Number..."><br>
                <label>Customer Address:</label><input type="text" name = "address" id = "address" value ="'.$Address.'" placeholder="LLAL ID..."><br>
                <label>Type of Service:</label><input type="text" name = "service" id = "service" value ="'.$Service.'" placeholder="LLAL Password..."><br>
                <label>Date:</label><input type="date" name = "date" id = "date" value ="'.$date.'" placeholder="LLAL Password..."><br>';
        }
        else{
            echo'<label>Customer First Name:</label><input type="text" name = "CFname" id = "CFname" placeholder="First Name..."><br>
                <label>Customer Last Name:</label><input type="text" name = "CLname" id = "CLname" placeholder="Last Name..."><br>
                <label>Customer ID:</label><input type="text" name = "CID" id = "CID" placeholder="LLAL Phone Number..."><br>
                <label>Customer Address:</label><input type="text" name = "address" id = "address" placeholder="LLAL ID..."><br>
                <label>Type of Service:</label><input type="text" name = "service" id = "service" placeholder="LLAL Password..."><br>
                <label>Date:</label><input type="date" name = "date" id = "date" placeholder="LLAL Password..."><br>';
        }
        ?>
            <button type = "submit" name="submit" onmouseover="changeColor(this,0)" onmouseout = "changeColor(this,1)">Submit</button>
            </div>
    </form>

</section>

<?php 
    include_once('footer.php');
?>