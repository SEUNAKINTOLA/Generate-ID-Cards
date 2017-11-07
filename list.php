<?php

	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		// header("Location: index.php");
	}
	include_once 'dbconnect.php';

//$res=mysqli_query($dbc,"SELECT * FROM test_client_tab WHERE client_email ='$ses'");
//	$userRow=mysqli_fetch_array($res);

	if( isset($_POST['btn-delete']) ) {
        $email = trim($_POST['email']);    
        mysql_query("DELETE client_email  WHERE client_email ='$email'"); 
        unset($email);  
    } 

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACCF CONFERENCE</title>
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
	<div class="form-group">
		<label for="date_from" class="col-sm-1 control-label">Date From: </label>
		<div  class="col-sm-2">
			<input class="form-control" id="date_from"/>
		</div>
		<label for="date_to" class="col-sm-1 control-label">Date To: </label>
		<div  class="col-sm-2">
			<input class="form-control" id="date_to"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="button" class="btn btn-primary" id="date_filter_show" disabled>Show choosen date</button>
		</div>
	</div>

	<div class="form-group" id="div_sort">
		<label for="sel_sort" class="col-sm-1 control-label">Sort by date:</label>
		<div class="col-sm-2">
			<select class="form-control" id="sel_sort">
				<option>Choose sort method</option>
				<option value="1">From old to new</option>
				<option value="-1">From new to old</option>
			</select>
		</div>
	</div>
    <div class="container">
                    <div  class="span9 padding-mid" style="font-size:20px; border-margin:0px; border-padding:0; overflow-x: auto; cellspacing:0px;">
                        <table border="0" cellpadding="0" cellspacing="0"  id="table" class="table table-responsive  table-hover">
                            <thead>
                                <tr><th>S.No</th><th>Name</th><th>institution</th><th>fellowship</th><th>unit </th><th>phone</th><th>gender</th><th>email</th><th>date registered</th></tr>
                            </thead>
            	          <?php
                            $query=mysqli_query($dbc,"SELECT * FROM members");
                            $i= 1;
                            while ($row = mysqli_fetch_array($query)) {
                                $email[$i] =  $row['email'];                               
                                $pn[$i]= $row['phone ']; 
                                $name[$i]= $row['name'];
                                
                            $quer=mysqli_query($dbc,"SELECT * FROM members WHERE email='$email[$i]'");
                            $ron = mysqli_fetch_array($quer);
                            $institution[$i]= $ron['institution']; 
                            $fellowship[$i]= $ron['fellowship']; 
                            $unit[$i]= $ron['unit']; 
                            $phone[$i]= $ron['phone']; 
                            $gender[$i]= $ron['gender']; 
                              
                            ?>
                            <tr>
                                
                                <td><?php echo $i;?></td>
                                <td><?php echo $name[$i];?></td>
                                <td><?php echo $institution[$i];?></td>
                                <td><?php echo $fellowship[$i];?></td>  
                                <td><?php echo $unit[$i];?></td>                                
                                <td><?php echo $phone[$i];?></td>  
                                <td><?php echo $gender[$i];?></td>                                
                                <td><?php echo $email[$i];?></td>
                             
                            </tr>
            
                            <?php $i= $i+1; } ?>
                            <?php $i= 0; ?>
                            </table>	
                    </div>
                </div>
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