<?php

	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-register']) ) {
		
		// clean user inputs to prevent sql injections
       
        
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
        
		$institution = trim($_POST['institution']);
		$institution = strip_tags($institution);
		$institution = htmlspecialchars($institution);
        
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
        
        $gender = trim($_POST['gender']);
		$gender = strip_tags($gender);
		$gender = htmlspecialchars($gender);

		$fellowship = trim($_POST['fellowship']);
		$fellowship = strip_tags($fellowship);
		$fellowship = htmlspecialchars($fellowship);
        
        
		$unit = trim($_POST['unit']);
		$unit = strip_tags($unit);
		$unit = htmlspecialchars($unit);
        
		$phone = trim($_POST['phone']);
		$phone = strip_tags($phone);
		$phone = htmlspecialchars($phone);
		        

		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		 if (empty($institution)) {
			$error = true;
			$institutionError = "Please enter your Institution or 'N/A'.";
		}
        
		 if (empty($fellowship)) {
			$error = true;
			$fellowshipError = "Please enter member's fellowship or 'N/A'.";
		} 
		 if (empty($unit)) {
			$error = true;
			$unitError = "Please enter unit or 'N/A'";
		}  
        else {

		 if (empty($gender)) {
			$error = true;
			$genderError = "Please enter member's gender.";
		} 
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT email FROM `members` WHERE email='$email'";
			$result = mysqli_query($dbc,$query);
            $row=mysqli_fetch_array($result);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
        
        
		//basic phone validation
		if (empty($phone) ) {
			$error = true;
			$phoneError = "Please enter valid phone number.";
		} else {
			// check email exist or not
			$query = "SELECT email FROM `members` WHERE phone='$phone'";
			$result = mysqli_query($dbc,$query);
            $row=mysqli_fetch_array($result);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$phoneError = "Provided Phone is already in use.";
			}
		}
		
		
		// if there's no error, continue to signup
		if( !$error ) {
$rand = rand(0,9999);
$now = time();
$added=date("Y-m-d h:i:s");
$u_code = crypt($now,$rand);
$unique_id = $u_code;
            
$query = "INSERT INTO `members`(u_id,name,institution,fellowship,gender,unit,email,phone) VALUES('$unique_id','$name','$institution','$fellowship','$gender','$unit','$email','$phone')";
			$res = mysqli_query($dbc,$query);
		    
			if ($res) {
			 
             
             
             if(!empty($name) || !empty($institution) || !empty($fellowship) || !empty($unit) || !empty($phone) || !empty($gender)){

        $cvsData = $name . "," . $institution . "," . $fellowship  ."," . $unit  ."," . $phone . "," . $gender  . "\n"; // Add newline

        $fp = fopen("reg.csv","a"); // $fp is now the file pointer to file $filename

    if($fp)
    {
        fwrite($fp,$cvsData); // Write information to the file
        fclose($fp); // Close the file
    }
}
                
            
				$errTyp = "success";
				$errMSG = "New member successfully added";
				unset($name);
                unset($institution);
				unset($fellowship);
				unset($unit);
				unset($phone);				
                unset($email);			
                unset($gender);
			

$data = array('status'=>1,'details'=>"Member added, $error_details");

            
            
            } else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ACCF CONFERENCE</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />

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
    
  
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php">Home</a>
             <a href="list.php">View ALL Members</a>
             <a href="print.php">Print Out</a>
        </div>


<div id="main" style="padding-left:40px; max-width: 70px;">
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>
  
<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h1 class="">ACCF 2017 REGISTRATION PLATFORM</h1>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
             
        
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter  Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
            
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Member's email" maxlength="50" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>         
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="phone" class="form-control" placeholder="Enter Member's phone" maxlength="50" value="<?php echo $phone ?>" />
                </div>
                <span class="text-danger"><?php echo $phoneError; ?></span>
            </div>         
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="institution" class="form-control" placeholder="Enter Member's Institution" maxlength="50" value="<?php echo $institution ?>" />
                </div>
                <span class="text-danger"><?php echo $institutionError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="fellowship" class="form-control" placeholder="Enter fellowship" maxlength="40" value="<?php echo $fellowship ?>" />
                </div>
                <span class="text-danger"><?php echo $fellowshipError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="unit" class="form-control" placeholder="Enter member's unit" maxlength="50" value="<?php echo $unit ?>" />
                </div>
                <span class="text-danger"><?php echo $unitError; ?></span>
            </div>    
                      
          
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <select type="text" name="gender" class="form-control" maxlength="50" >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                
                </div>
                <span class="text-danger"><?php echo $genderError; ?></span>
            </div>  
            
             
            <div class="form-group">
            	<hr />
            </div>
            
            <div style="width:10%;text-align:center;" class="form-group">
                
            	<button type="submit" class="btn btn-block btn-primary" name="btn-register">Register</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
        
        </div>
   
    </form>
    </div>	

</div>
</div>

</body>
</html>
<?php ob_end_flush(); ?>