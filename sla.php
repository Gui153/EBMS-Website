<?php include_once('header.php');
?>

    <?php

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

    ?>


    <section class = "tab">
        <h1>Landscaper Record</h1>
    <?php 
        //$stmt = 'SELECT * FROM `Landscaper`';
        $stmt = 'SELECT `Landscaper`.`FirstName`, `Landscaper`.`LastName`, `Landscaper`.`ID`, `Landscaper`.`PN`, `Landscaper`.`Email`, `Client`.`FirstName`, `Client`.`LastName`, `Client`.`ClientID`,`Order`.`Address`,`Service`.`Service`,`Service`.`date`,`Service`.`ServiceID`,`Order`.`Products`,`Order`.`OrderNum` 
        FROM `Order` join `Landscaper` on `Order`.`LandID`= `Landscaper`.`ID`
        join `Client` on `Order`.`ClientID` = `Client`.`ClientID`
        join `Service` on `Order`.`ServiceID`= `Service`.`ServiceID`
        ORDER by `ClientID`'; 
        $landlist = mysqli_query($conn, $stmt);
        

            
        echo("<table> ");
        echo("<tr> 
        <th>Land First Name</th> 
        <th>Land Last Name</th> 
        <th>Land ID</th> 
        <th>Land Phone Number</th> 
        <th>Landscaper Email</th> 
        <th>Client First Name</th> 
        <th>Client Last Name</th> 
        <th>Client ID</th> 
        <th>Client Address</th> 
        <th>Service</th>
        <th>Date</th> 
        <th>Service ID</th>
        <th>Products</th>
        <th>Order ID</th>
        </tr>");
            
        while($row = mysqli_fetch_array($landlist, MYSQLI_NUM)) {
            if($_SESSION['LID'] == $row[2]){
            echo ("<tr>");
            echo("<td> {$row[0]} </td>"); 
            echo("<td> {$row[1]}</td>");
            echo("<td> {$row[2]}</td>");
            echo("<td> {$row[3]} </td>");
            echo("<td> {$row[4]}</td>");
            echo("<td> {$row[5]} </td>");
            echo("<td> {$row[6]} </td>");
            echo("<td> {$row[7]} </td>");
            echo("<td> {$row[8]} </td>");
            echo("<td> {$row[9]} </td>");
            echo("<td> {$row[10]} </td>");
            echo("<td> {$row[11]} </td>");
            echo("<td> {$row[12]} </td>");
            echo("<td> {$row[13]} </td>");
            echo("</tr>");
            }
        }
        echo("</table>");
    ?>   
            
    </section>



<?php include_once('footer.php');
?>
