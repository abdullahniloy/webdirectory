<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Pasasword</title>
	<style>
        body{
          margin: auto;
          width: 20%;
          padding: 20px;
          }

        .make-it-center{
          margin: auto;
          width: 75%;
        }

        .error{
        	color: red;
        }

        .required:after {
          content:"*";
          color: red;
        }
    </style>
</head>
<body>

<?php
$curPassErr = $newPassErr = $retypePassErr = $userErr = "";

$currPass = $newPass = $retypePass = "";
$errCount = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    
            if ($pass_change){
                $final_data = json_encode($arrray);
                if(file_put_contents('data.json', $final_data)){
                    echo "<span style='color: green'>Password Changed Successfully!</span>";
                }
            }
    
            if (!$user_found){
                echo $userErr .= "No account found!";
            }
        }

        if (empty($_POST["current_pass"])) {
            $curPassErr = "Current password is required to change password";
            $errCount = $errCount + 1;
        } else {
            $currPass = check_input($_POST["current_pass"]);

            $newPass = check_input($_POST["new_password"]);
            $retypePass = check_input($_POST["retype_password"]);

            if (empty($newPass)) {
                $newPassErr = "New password is required to change password";
                $errCount = $errCount + 1;
            }

            if (empty($retypePass)) {
                $retypePassErr = "Confirm your new password!";
                $errCount = $errCount + 1;
            }

            if ($newPass === $currPass) {
                
                $newPassErr .= " New Password can not be same as the Current Password";
                $errCount = $errCount + 1;
            }

            if ($newPass !== $retypePass) {
               
                $retypePassErr .= " Confirm password doesn't match with new password!";
                $errCount = $errCount + 1;
            }

           
            if ($errCount <= 0) {
                if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[\d%$#@]).+$/", $newPass)) {
                    $newPassErr = "New Password must contain atleast 8 characters with a digit, a lower case, an upper case letter, atleast one of the [%$#@] and no space.";
                    $errCount = $errCount + 1;
                }
            }

        }


  function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="donor-info make-it-center">
<fieldset>
<legend><b>Change Password</b></legend>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 

  Current Password: <input type="password" name="current_pass">
  <span class="error">* <?php echo $curPassErr;?></span>
  <br>
 
  New Password: <input type="password" name="new_password">
  <span class="error">* <?php echo $newPassErr;?></span>
  <br>
  
  Retype New Password: <input type="password" name="retype_password">
  <span class="error">* <?php echo $retypePassErr;?></span>
  <br><br> <hr>

  <input type="submit" name="submit" value="Submit"> 


</form>
</fieldset>
</div>


</body>
</html>