<DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf8" description="Add Products"/>
		<title>Inventory Management System</title>
		
		<style>
			body
			{
				color:black;
				font:sans-serif;
				background: white;
			}
			input[type="text"],input[type="password"],input[type="email"],input[type="date"]
			{
				text-align:center;
				border-radius:20px;
				height:30px;
				width:200px;
				border-color:#451963;
				background:none;
				transition:250ms;
			}
			input[type="submit"]
			{
				text-align:center;
				border-radius:20px;
				height:30px;
				width:100px;
				border-color:#451963;
				transition:250ms;
			}
			input[type="text"]:focus,input[type="password"]:focus
			{
				width:250px;
				height:35px;
			}
			input[type="submit"]:hover
			{
				width:110px;
				border-color:#1D1DC2;
				color:white;
				background-color:blueviolet;
			}
		</style>
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
			<h3>Order Status Confirm</h3>
            <br><br>
			<?php
                $conn = mysqli_connect("localhost","root","","inventory");
                $result = mysqli_query($conn,"select * from cart;");
                $affected = mysqli_affected_rows($conn);
                if($affected==0)
                {
                    echo("<h5>No Items in Cart!</h5>");
                }
            else{
                
                echo("<table border=1>
                    <th>
                    <td><h5>Product ID</h5></td>
                    <td><h5>Product Name</h5></td>
                    <td><h5>Quantity</h5></td>
                    <td><h5>Unit Price</h5><td>
                    <td><h5>Total</h5></td>
                    </th>
                ");
                while($row= mysqli_fetch_assoc($result))
                {
                    $rows = mysqli_fetch_assoc(mysqli_query($conn,"select pname,price from products where pid = '".$row["pid"]."';"));
                    echo("<tr>
                        <td></td>");
                    echo("<td><center>".$row["pid"]."</center></td>");
                    echo("<td><center>".$rows["pname"]."</center></td>");
                    echo("<td><center>".$row["quan"]."</center></td>");
                    echo("<td><center>".$rows["price"]."</center></td>");
                    $tot = $rows["price"]*$row["quan"];
                    echo("<td><center>$</center></td>");
                    echo("<td><center>".$tot."</center></td>");
                    echo("</tr>");
                }
                echo("</table>");
            echo("<br><br>");
                echo('<form action="pays.php" method="POST">
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Address" name="address" required>
                <input type="submit" value="Confirm" name="confirm">
            </form>');
                echo('<form action="customer.html" method="POST">
                <input type="submit" value="Change Items!" name="change">
            </form>');
                
            }
            ?>
            
			<h7>Change Operations? <a href="http://localhost/Project/customer.html">Customer Activities</a></h7>
		</center>

	</body>

</html>