<?php
    $conn = mysqli_connect("localhost","root","","inventory");
    if(!$conn)
    {
        echo('<DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf8" description="Home page of Project"/>
		<title>Inventory Management System</title>
		
        <link rel="stylesheet" href="css/bootstrap.css"></link>
	</head>

	<body>

		<center>
			<br>
			<br>
			<br>
			<h1>Inventory Management System</h1>
			<br>
			<img src="user.png" style="height:100px;width:100px;">
			<h3>Connection to Database is Lost!</h3>
			<a href="http://localhost/Project/admin.html"><h7>Administration Activities</h7></a>
			
		</center>

	</body>

</html>');
    }
    else
    {
        echo('<DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf8" description="Home page of Project"/>
		<title>Inventory Management System</title>
		
        <link rel="stylesheet" href="css/bootstrap.css"></link>
	</head>

	<body>

		<center>
			<br>
			<br>
			<br>
			<h1>Inventory Management System</h1>
			<br>
			<img src="user.png" style="height:100px;width:100px;">
			<h3>Search Results</h3>
			<a href="http://localhost/Project/admin.html"><h7>Administration Activities</h7></a>
			<br><br><br>
            <br><br><br>
		</center>

	</body>

</html>');
        $sea = $_POST["search"];
        $exec = "select * from products where pid like '%".$sea."%' or pname like '%".$sea."%' or pman like '%".$sea."%' or quan like '%".$sea."%' or price like '%".$sea."%' or rack like '%".$sea."%';";
        
        $result = mysqli_query($conn,$exec);
        
        $affect = mysqli_affected_rows($conn);
        if($affect!=0)
        {
        
        echo("<center>");
        
        echo("<table border=2>
                <th>
                    <td><h5> Product ID </h5></td>
                    <td><h5> Product Name </h5></td>
                    <td><h5> Manufacturer </h5></td>
                    <td><h5> Price ($) </h5></td>
                    <td><h5> Quantity</h5></td>
                    <td><h5> Rack Number</h5></td>
                </th>
        ");
        while($row = mysqli_fetch_assoc($result))
        {
           echo("
                <tr>
                    <td></td>
                    <td>".$row['pid']."</td>
                    <td>".$row['pname']."</td>
                    <td>".$row['pman']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['quan']."</td>
                    <td>".$row['rack']."</td>
                </tr>
           ");
        }
        echo("</table>");
        echo("</center>");
        }
        else
        {
            echo("<center><h5>No Products Found!</h5></center>");
        }
    }
?>