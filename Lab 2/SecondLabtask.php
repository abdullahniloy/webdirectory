<?php
	$name="";
	$err_name="";
    $email="";
    $err_email="";
    $birthdate="";
    $err_birthdate="";
	$gender="";
	$err_gender="";
    $degree="";
	$err_degree="";
	
	$hasError=false;
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
        
		if(empty($_POST["name"])){
			$hasError=true;
			$err_name="Name Required";
		}
		elseif (strlen($_POST["name"]) <=6){
			$hasError = true;
			$err_name = "Name must be greater than 6 characters";
		}
		else
		{
			$name = $_POST["name"];
		}

        
        
       
        if(empty($_POST["email"])){
			$hasError=true;
			$err_email="Email is Required";
		}
		else
		{
			$email = $_POST["email"];
		}

        

        
		if(!isset($_POST["gender"])){
			$hasError = true;
			$err_gender = "Gender Required";
		}
		else{
			$gender = $_POST["gender"];
		}
		if(!isset($_POST["degree"])){
			$hasError = true;
			$err_gender = "Degree Required";
		}
		else{
			$gender = $_POST["degree"];
		}
		
		
		if(!$hasError){
			echo $_POST["name"]."<br>";
            echo $_POST["email"]."<br>";
            echo $_POST["birthdate"]."<br>";
			echo $_POST["gender"]."<br>";
            echo $_POST["degree"]."<br>";
		
			foreach($arr as $e){
				echo "$e<br>";
			}
		}
		
	}
	
?>
<html>
	<body>
		<form action="" method="post">
		<table>
		<tr>
			<td align="right">Name</td>
			<td>:<input name="name" value="<?php echo $name;?>" type="text"><br>
			<span><?php echo $err_name;?></span></td>
			</tr>


              <tr>
			<td align="right">Email</td>
				<td>:<input name="email" value="<?php echo $email;?>" type="text"><br>
				<span><?php echo $err_email;?></span></td>
			</tr>


                <tr>
					<td align="right">Birth Date</td>
					<td>
                    <select id="birthdate" name="day" >
                    <option value="day">1</option>
                    <option value="day">2</option>
                    <option value="day">3</option>
                    <option value="day">4</option>
                    <option value="day">5</option>
                    </select>
                    <select id="birthdate" name="month" >
                    <option value="month">January</option>
                    <option value="month">February</option>
                    <option value="month">March</option>
                    <option value="month">April</option>
                    <option value="month">May</option>
                    <option value="month">June</option>
                    <option value="month">July</option>
                    <option value="month">August</option>
                    <option value="month">September</option>
                    <option value="month">October</option>
                    <option value="month">November</option>
                    <option value="month">December</option>
                    </select>
                    <select id="birthdate" name="year" >
                    <option value="year">1995</option>
                    <option value="year">1996</option>
                    <option value="year">1997</option>
                    <option value="year">1998</option>
                    <option value="year">1999</option>
                    <option value="year">2000</option>
                    <option value="year">2001</option>
                    </select>
                    </td>
					<td><span></span></td>
				</tr>

                <tr>
					<td align="right">Gender</td>
					<td>:<input type="radio" value="Male" <?php if($gender == "Male") echo "checked";?> name="gender"> Male <input type="radio" <?php if($gender == "Female") echo "checked";?> value="Female" name="gender"> Female
                    <input type="radio" value="Other" <?php if($gender == "Other") echo "checked";?> name="gender"> Other <br>
					<span><?php echo $err_gender;?></span></td>
				</tr>

                <tr>
					<td align="right">Degree</td>
					<td>:<input type="radio" value="SSC" <?php if($gender == "SSC") echo "checked";?> name="gender"> SSC <input type="radio" <?php if($gender == "HSC") echo "checked";?> value="HSC" name="gender"> HSC
                    <input type="radio" value="BSC" <?php if($gender == "BSC") echo "checked";?> name="gender"> BSC <br>
					<span><?php echo $err_degree;?></span></td>
				</tr>
			
				<tr>
					<td><input type="submit" value="Register"></td>
				</tr>
			</table>
            </fieldset>
		</form>
	</body>
</html>