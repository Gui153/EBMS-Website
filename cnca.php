<?php include_once('header.php');
?>

<?php 
    if(isset($_POST["submit"])){
        $CFname = $_POST["CFname"];
        $CLname = $_POST["CLname"];
        $CID = $_POST["CID"];

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

        $stmt = 'SELECT * FROM `Client` where ClientID = "'.$CID.'"'; 
        $user = mysqli_query($conn, $stmt);

        $row = mysqli_fetch_array($user, MYSQLI_ASSOC);
        if($row){
            echo('<script>alert("There is a client with that id");</script>');
        }
        else{
            $stmt = 'INSERT INTO `Client`(`ClientID`, `FirstName`, `LastName`) VALUES ("'.$CID.'","'.$CFname.'","'.$CLname.'")';
            $user = mysqli_query($conn, $stmt);
            echo('<script>alert("Account created successfully");</script>');
        }
    }
?>


<section>

    <form onsubmit="return CNCA();" action = "" method = "POST">
    <h1>Create New Customer Account</h1>
    <?php
    if(isset($_POST['submit'])){

        echo'<label>Customer First Name:</label><input type="text" name = "CFname" id = "CFname" value ="'.$CFname.'" placeholder="First Name..."><br>
             <label>Customer Last Name:</label><input type="text" name = "CLname" id = "CLname" value ="'.$CLname.'" placeholder="Last Name..."><br>
             <label>Customer ID:</label><input type="text" name = "CID" id = "CID"  value ="'.$CID.'" placeholder="LLAL Phone Number..."><br>';
    }
    else{
        echo'<label>Customer First Name:</label><input type="text" name = "CFname" id = "CFname" placeholder="First Name..."><br>
             <label>Customer Last Name:</label><input type="text" name = "CLname" id = "CLname" placeholder="Last Name..."><br>
             <label>Customer ID:</label><input type="text" name = "CID" id = "CID"  placeholder="LLAL Phone Number..."><br>';
    }
    ?>
            <button type = "submit" name="submit" onmouseover="changeColor(this,0)" onmouseout = "changeColor(this,1)">Submit</button>
    </form>

</section>


<?php 
    include_once('footer.php');
?>
