<?php include_once('header.php');
?>

<?php 

    global $conn;
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }   

    mysqli_query($conn, $_SESSION["stmt"]);

    echo '<script>alert("Order Canceled.");
    window.location.assign("https://web.njit.edu/~gv8/IT202/Assignment4/cco.php");
    </script>';
?>
<?php 
    include_once('footer.php');
?>
