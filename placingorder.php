<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
// including the database connection file
include_once("db.php");
 //$ProductID = $_GET['ProductID'];
 //ProductID,ProductName,CustomerName,Costs
 //OrderID, CustomerName, ProductName, Units, Totalcost, Dates, Status,UserID, ProductID
/*if(isset($_POST['update']))
{   
    $CustomerName = $_POST['CustomerName'];
	$ProductName = $_POST['ProductName'];
    $Costs = $_POST['Costs'];
	
	$ProductID = $_POST['ProductID'];
    if(empty($ProductName) || empty($CustomerName) || empty($Costs)) {                
        if(empty($ProductName)) {
            echo "<font color='red'>ProductName field is empty.</font><br/>";
        }
        
        if(empty($CustomerName)) {
            echo "<font color='red'>CustomerName field is empty.</font><br/>";
        }
        
        if(empty($Costs)) {
            echo "<font color='red'>Costs field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
	else {    
        //updating the table
        $result = mysqli_query($con, "UPDATE PRODUCTS SET ProductName='$ProductName',CustomerName='$CustomerName',Costs='$Costs' WHERE ProductID=$ProductID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:Productsdetails.php");
    }
}
?>*/
if(isset($_POST['Submit'])) { 
//ProductID,ProductName,Description,Costs 
//$ProductID = $_GET['ProductID'];
 //ProductID,ProductName,CustomerName,Costs
 //OrderID, CustomerName, ProductName, Units, Totalcost, Dates, Status,UserID, ProductID 
$CustomerName= $_POST['CustomerName'];
$ProductName= $_POST['ProductName'];
$Units= $_POST['Units'];
$Costs = $_POST['Costs'];
$Totalcost= ($Units*$Costs);
$Dates= $_POST['Dates'];
$Status= "PENDING";
$UserID= $_POST['UserID'];
$ProductID= $_POST['ProductID']; 
    
    if(empty($ProductName) || empty($CustomerName) || empty($Dates)) {                
        if(empty($ProductName)) {
            echo "<font color='red'>ProductName field is empty.</font><br/>";
        }
        
        if(empty($CustomerName)) {
            echo "<font color='red'>Customer Name field is empty.</font><br/>";
        }
        
        if(empty($Dates)) {
            echo "<font color='red'>Dates field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {//ProductID,ProductName,Description,Costs
	$query = "SELECT * FROM `ORDERS` WHERE ProductName='$ProductName' AND CustomerName='$CustomerName' AND Dates='$Dates'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result); 
        // if all the fields are filled (not empty)             
        //insert data to database
        //**$result = mysqli_query($mysqli, "INSERT INTO users(ProductName,Description,Costs,Status,User_Type,Usernames,Passwords) VALUES('$ProductName','$Description','$Costs','$Status','$User_Type','$Usernames','$Passwords')");
        
        //display success message
        //**echo "<font color='green'>system user added successfully.";
        //echo "<br/><a href='index.php'>View Result</a>";
		
		if($rows>0)
 {
  //echo "Registration Details Are Already Submitted with same unique id";
 echo '<script language="javascript">';
echo 'alert(" ORDER  Already Submitted with same details check and resubmit!!!.")';
echo '</script>';
 }
 else
 {
 echo '<script type="text/javascript">alert("Placed order submitted succesfully!!!!");</script>';
  //**mysql_query("insert into patients(Names,PatientID,Costs,Description,Diagnosis) values('$Names','$PatientID','$Costs','$Description','$Diagnosis')");
  
  //header("refresh:2;url=Location :login.php"); // really should be a fully qualified URI
  $result = mysqli_query($con, "INSERT INTO ORDERS(CustomerName,ProductName,Units,Totalcost,Dates,Status,UserID,ProductID) VALUES('$CustomerName','$ProductName','$Units','$Totalcost','$Dates','$Status',$UserID,$ProductID)");
header("Location: placeorder.php");
 
 }	
    }
}
?>


<?php
//getting id from url
$ProductID = $_GET['ProductID'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM PRODUCTS WHERE ProductID=$ProductID");
 
while($res = mysqli_fetch_array($result))
{
/*ProductName,CustomerName,Costs,Status, User_Type,Usernames,Passwords*/
    $ProductName = $res['ProductName'];
    //$CustomerName = $res['CustomerName'];
    $Costs = $res['Costs'];
	 
}
?>



<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet">
<style>
body
{
background-color:#FFFFCC;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}
</style>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body style="background-image:url(5.JPG);background-size:cover; background-repeat:no-repeat;background-position: center center;">
<p align="left">Welcome <?php echo $_SESSION['Usernames']; ?>!||USER ID:<?php echo $_SESSION['UserID']; ?> ||Full Name:<?php echo $_SESSION['FullName']; ?></p>
<ul>
  <li><a href="Placeorder.php">HOME</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div>




<h1 align="center">RESTAURANT MANAGEMENT SYSTEM</h1>
<h2 align="center">PLACE YOUR ORDER BELOW</h2>
<div id="form" style="padding-left:350px">
<form action="placingorder.php" method="post" name="form1">
        <table width="117%" border="0" align="left">
		
            <tr> 
                <td width="12%">Customer Name:</td>
                <td width="14%"><input type="text" name="CustomerName" value="<?php echo $_SESSION['FullName'];?>" required/></td>
			  <td width="12%"><input type="hidden" name="UserID" value=<?php echo $_SESSION['UserID'];?>></td>
              
				                
            </tr>
            <tr>
			<td>Product Name:</td>
                <td><input type="text" name="ProductName" value="<?php echo $ProductName;?>" required></td>
			  <td><input type="hidden" name="ProductID" value=<?php echo $_GET['ProductID'];?>></td>
                
            </tr>
            <tr> 
                <td>Costs:</td>
                <td><input type="text" name="Costs" value="<?php echo $Costs;?>" required/></td>
				<td>&nbsp;</td>
                		
            </tr>
			
			<tr> 
              <td>Units:</td>
              <td><input type="text" name="Units"  required/></td> 
				
				<td>&nbsp;</td>
				  
			</tr>
			<tr> 
              <td>Dates:</td>
              <td><input type="date" name="Dates"  required/></td> 
				
				<td><input type="submit" name="Submit" width="60%" value="PLACE ORDER NOW"></td>
                   
			</tr>
    </table>
  </form>
  </div>

</div>
</body>
</html>