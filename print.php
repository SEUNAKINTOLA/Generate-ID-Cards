<?php

/**
 * @author Akintola Oluwaseun
 * @copyright 2017
 */


	include("lib/func.php");

	if ( isset($_POST['begin']) ) {
	   $begin = $_POST['begin'];
	}else{
	   $begin =0;
	}
	if ( isset($_POST['end']) ) {
	    $end = $_POST['end'];
	}else{
	   $end = 0;
	}
	$data = getData();
    $num_card = count($data);
      if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['generate']))
    {
     
	generateCard( "frame.png", 10, 10,10,10, $data,$begin,$end );


	echo "Successfully generated! Please check the '/accf_idcards' folder";
    }   
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACCF CONFERENCE </title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="assets/css/bootstrap-responsive.css" type="text/css"  />   
    <link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" type="text/css"  />
    
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon">

<!-- Google Fonts -->
<link href="css/css_003.css" rel="stylesheet" type="text/css">
<link href="css/css_004.css" rel="stylesheet" type="text/css">
<link href="css/css_002.css" rel="stylesheet" type="text/css">
        <!-- base css -->
        <link rel="stylesheet" href="css/base.css" />
</head>
<body>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php">Home</a>
             <a href="list.php">View ALL Members</a>
             <a href="print.php">Print Out</a>
        </div>
   


<div id="main" style="padding-left:40px;">
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>
     

    <br/>
    <br/>
        
        <h1> ACCF Conference 2017 ID Card Generator</h1>
<form action="print.php" method="post" >
     <h2> Input these fields if selection is needed, else leave empty</h2>
  	<input type="text" name="begin" class="form-control" placeholder="Enter number to start from" maxlength="50" />
  	<input type="text" name="end" class="form-control" placeholder="Enter number to end" maxlength="50" />
                 
  
  <input type="submit" name="generate" value="Generate ID Cards" >
</form>
    </div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
    
  

</html>
<?php ob_end_flush(); ?>