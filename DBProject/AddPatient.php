<?php


$server = 'localhost';
$database = 'blood_donation' ;
$user =  'webuser';
$password = '123456';

if(isset($_POST['Add'])){  
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $bloodgroup = $_POST['bloodgroup'];
  $disease = $_POST['disease'];
  $amount = $_POST['amount'];
  $phonenumber = $_POST['phonenumber'];
  $date = $_POST['date'];  
  

    $conn = mysqli_connect($server, $user, $password, $database);   // connect to the database  

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }


    $query = "INSERT INTO Patient(firstname,lastname,gender,bloodgroup,disease,amount,phonenumber,date) VALUES (?,?,?,?,?,?,?,?)";
    $result = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($result,'ssssssis',$firstname,$lastname,$gender,$bloodgroup,$disease,$amount,$phonenumber,$date);

    mysqli_stmt_execute($result);
    print(mysqli_stmt_error($result) . "\n");

    mysqli_stmt_close($result);

    $query2 = "INSERT INTO bloodrequests(firstname,lastname,gender,bloodgroup,disease,amount,phonenumber,date) VALUES (?,?,?,?,?,?,?,?)";
    $result2 = mysqli_prepare($conn,$query2);
    mysqli_stmt_bind_param($result2,'ssssssis',$firstname,$lastname,$gender,$bloodgroup,$disease,$amount,$phonenumber,$date);

    mysqli_stmt_execute($result2);
    print(mysqli_stmt_error($result2) . "\n");

    mysqli_stmt_close($result2);


    mysqli_close($conn);

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Add New Patient</title>

        <style type="text/css">
            #a{
                position: relative;
                top: 50px;
                left: 400px;
            }
            /* Dropdown Button */
.dropbtn {
    background-color: #dddddd;
  color: black;
  padding: 10px;
  font-size: 12px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 140px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 14px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
#nav{
background-color:#D50000;
}

#nav ul{
	list-style-type: none;
	overflow: hidden;
}
#nav li{
	float: left;
	margin: .3rem;
}
#nav ul li{
	font-size: 18px;
}
#nav li a{
	display: inline-block;
	color: white;
	text-align: center;
	padding: 16px 18px;
	text-decoration: none;
	transition: backgorund-color 0.2s linear;
}
#nav li a:hover{
	background-color: #95B9C7;
}

            </style>
</head>
<body>

 <div id="nav">
        <ul>
            <li><a href="patient.php"><i class="fas fa-backward"></i></a></li>
            <li><a href="AddPatient.php"> Add New Patient </a></li>
        </ul>
    </div>

<div id="a" class="w-50 p-3" style="background-color: #eee;">

<form action="AddPatient.php" method="post">
<div class="mb-3">
    <label for="d_id" class="form-label"> <b> First Name </b></label>
    <input type="text" class="form-control" id="d_id" name="firstname">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label"><b> Last Name </b></label>
    <input type="text" class="form-control" id="lname" name="lastname">
  </div>

  <b> Gender: </b>

<select name="gender" >
    <option>Female</option>
    <option>Male</option>
    </select>
<br> <br>

<b>Blood Group: </b>
    <select name="bloodgroup"  >
    <option>A+</option>
    <option>A-</option>
    <option>B+</option>
        <option>B-</option>
        <option>AB+</option>
        <option>AB-</option>
        <option>0+</option>
        <option>0-</option>
    </select>
    <br><br>

    <div class="mb-3">
    <label for="disease" class="form-label"><b> Disease </b></label>
    <input type="text" class="form-control" id="disease" name="disease">
  </div>

  <div class="mb-3">
    <label for="amount" class="form-label"><b> Amount </b></label>
    <input type="text" class="form-control" id="amount" name="amount">
  </div>

    <div class="mb-3">
    <label for="phone" class="form-label"><b> Phone Number </b></label>
    <input type="phone" class="form-control" id="phone" name="phonenumber">
  </div>


  <div class="mb-3">
    <label for="date" class="form-label"><b> Date </b></label>
    <input type="date" class="form-control" id="date" name="date">
  </div>



  <button type="submit" class="btn btn-primary" name="Add">Add</button>

</form>

</div>

</body>
</html>