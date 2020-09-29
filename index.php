
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<style>
body
{
background-color:#FFFFCC;
}
.mySlides {display:none;}
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
h1,h2,h3,p
{
color:#000000;
}
</style>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body style="background-image:url(5.JPG);background-size:cover; background-repeat:no-repeat;background-position: center center;">
<ul>
  <li><a href="login.php">Login</a></li>
</ul>
<div >
<h1 align="center">RESTAURANT MANAGEMENT SYSTEM</h1>
<div class="w3-content w3-section" style="max-width:500px; max-height:200PX; padding-left:500PX">
  <img class="mySlides w3-animate-fading" src="1.jpg" style="width:400PX; height:220px">
  <img class="mySlides w3-animate-fading" src="2.jpg" style="width:400PX; height:220px">
  <img class="mySlides w3-animate-fading" src="3.jpg" style="width:400PX; height:220px">
</div>
<h1 align="center">About us</h1>
<p align="center">we are a world class restaurant base in USA New york city and we offer various services to our clients including accomodation,breakfast,lunch and dinner meals at an affordable prices. </p>
<h2 align="center">Opening hours</h2>
<p align="center">Our opening hours:</p>
<p align="center">Monday-Friday: 6Am-11Pm </p>
<p align="center">Saturday-sunday:7Am- 10Pm </p>

</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>