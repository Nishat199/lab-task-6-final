<?php
   $errName = "";
   $name = "";
   $errUname = "";
   $pass = "";
   $cpass = "";
   $errMail = "";
   $mail = "";
   $errPhone = "";
   $phone = "";
   $city= "";
 
   if (isset($_POST["register"])) {
   	  if (empty($_POST["name"])) {
        $errName = "Name required*";
   	  }
   	  else $name = htmlspecialchars($_POST["name"]);
   	  if (empty($_POST["username"])) {
   	  	$errUname = "Username required*";
   	  }
   	  else if (strlen($_POST["username"]) < 6) {
   	  	$errUname = "Username must be at least 6 characters";
   	  }
   	  if (strlen(strpos($_POST["username"], " ")) > 0) {
   	  	if (strlen($errUname) > 0) {
   	  	  $errUname .= " and space is not allowed in username";
   	  	}
   	  	else $errUname = "Space is not allowed in username";
   	  }
   	  if (empty($_POST["pass"])) {
   	  	$pass = "Password required*";
   	  }
   	  else {
   	  	$getPass = $_POST["pass"];
   	  	if (strpos($getPass, "#") == false && strpos($getPass, "?") == false && $getPass[0] !== "#" && $getPass[0] !== "?") {
   	  	  $pass = "Password must contain a special character [Hint: # / ?].<br>";
   	  	}
   	  	$num_present = false;
   	  	$upper_present = false;
   	  	$lower_present = false;
   	  	for ($i = 0; $i < strlen($getPass); $i++) {
          if ($getPass[$i] >= '0' && $getPass[$i] <= '9') {
          	$num_present = true;
          }
          if ($getPass[$i] >= 'A' && $getPass[$i] <= 'Z') {
          	$upper_present = true; 
          }
          if ($getPass[$i] >= 'a' && $getPass[$i] <= 'z') {
          	$lower_present = true;
          }
   	  	}
   	  	if ($upper_present == false || $lower_present == false) {
   	  	  $pass .= "Password must combine at lest one upper letter and one lower letter.<br>";
   	  	}
   	  	if ($num_present == false) {
   	  	  $pass .= "Password must contain at least one numeric character."; 
   	  	}
   	  }
   	  if (empty($_POST["cpass"])) {
   	  	$cpass = "Confirm password required*";
   	  }
   	  if (empty($_POST["email"])) {
   	  	$errMail = "Mail address required*";
   	  }
   	  else if (strlen(strpos($_POST["email"] , "@")) > 0 && strlen(strpos($_POST["email"], ".")) > 0) {
   	  	if (strpos($_POST["email"] , "@") > strrpos($_POST["email"], ".")) {
   	  	  $errMail = "Invalid mail format [wrong placcement]";
   	  	}
   	  	else $mail = htmlspecialchars($_POST["email"]);
   	  }
   	  else $errMail = "Invalid mail format [Missing characters]";
   	  if (empty($_POST["address"])) {
   	  	$address = "Address required*";
   	  }
   	  if (empty($_POST["phone"]) || empty($_POST["code"])) {
   	  	$errPhone = "Phone number required*";
   	  }
   	  else {
         if (is_numeric($_POST["phone"]) == false) {
         	$errPhone = "Phone number has to be numeric";
         }
         else $phone = htmlspecialchars($_POST["phone"]);
   	  }
   	 	  }
   	  
?>
<html>
	<title>
		Register page
	</title>
	<hr>
	<form action="" method="post">
		<fieldset>
			<legend>
				<h1>
					 Registration
				</h1>
			</legend>
				<table>
					<tr>
						<td align="right">
							 Full Name:
						</td>
						<td>
							<input type="text" name="name">
							<span> 
                              <?php
                                echo $errName;
                              ?>
							</span>
						</td>
					</tr>
					<tr>
						<td align="right">
							Username:
						</td>
						<td>
							<input type="text" name="username">
							<span>
								<?php
                                  echo $errUname;
								?>
							</span>
						</td>
					</tr>
					<tr>
						<td align="right">
							Password:
						</td>
						<td>
							<input type="Password" name="pass">
							<span>
								<?php
                                  echo $pass;
								?>
							</span>
						</td>
					</tr>
					<tr>
						<td align="right">
						     Confirm Password:
						</td>
						<td>
							<input type="Password" name="cpass">
							<span>
								<?php
                                  echo $cpass;
								?>
							</span>
						</td>
					</tr>
					<tr>
						<td align="right">
							Gender:
						</td>
						<td>
							<input type="radio" name="gender"> Male
							<input type="radio" name="gender"> Female
						</td>
					</tr>
					<tr>
						<td align="right">
							Email:
						</td>
						<td>
							<input type="text" name="email">
							<span>
								<?php
                                  echo $errMail;
								?>
							</span>
						</td>
					</tr>
					<tr>
						<td align="right">
							Phone:
						</td>
						<td>
							<input type="text" size="5" placeholder="Code" name="code"> - <input type="text" size="7" placeholder="Number" name = "phone">
							<span>
								<?php
                                  echo $errPhone;
								?>
							</span>
						</td>
					</tr>
					<tr>
						<td align="right">
							City:
						</td>
						<td>
							<input type="text" name="city" placeholder=" Dhaka">
							<span>
								<?php
                                  echo $city;
								?>
							</span>
						</td>
					</tr>
					<tr><td></td>
						<td>	
						   <input type="text" name="city" size="7" placeholder="City"> - <input type="text" name="state" size="5" placeholder="state">
						</td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="ok" value="ok">
						</td>
					</tr>
				</table>
		</fieldset>
	</form>
</html>