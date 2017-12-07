<?php 

	if(isset($_POST['submit'])){
		$val = new Validator($objConnection);
		
		$errors = array();
		
		$required_fields = array('name', 'username', 'password', 'email');
		if($val->checkRequired($required_fields)){
			$errors['required'] = '<p class="error">Udfyld venligst felterne: Navn, , Brugernavn, Password og E-mail!</p>';
		}
		if($val->checkEmail($_POST['email'])){
			$errors['email'] = '<p class="error">Angiv venligst en korrekt e-mail adresse!</p>';
		}
		
		if(empty($errors)){
			
			$name = $objConnection->real_escape_string($_POST['name']);
			$username = $objConnection->real_escape_string($_POST['username']);
			$email = $objConnection->real_escape_string($_POST['email']);
				
			$pass = $objConnection->real_escape_string($_POST['password']);
			$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
			
			$sql = "SELECT * FROM admins WHERE username = '{$username}'";
			$result = $objConnection->query($sql);
			if($result->num_rows == 0){
				createUser($objConnection, $name, $username, $pass, $email);

				header("Location: index.php?page=users&created=true");
			}else {
				$notice = '<p class="error">Brugernavnet findes allerede. Vælg et andet.</p>';
			}
		}
   }
?>
<div class="wrapper">
	<h1>
			Opret Bruger
	</h1>
	<form id="form" method="post" action="">
		<?php 
			echo $errors['required'];
			echo $errors['email'];
			echo $notice; 
		?>
		<div class="form-row">
			<label for="name">Navn * </label>
			<input id="name" type="text" name="name" required value="<?php echo $_POST['name']; ?>">
		</div>
		<div class="form-row">
			<label for="username">Brugernavn *</label>
			<input id="username" type="text" name="username" required value="<?php echo $_POST['username']; ?>">
		</div>
		<div class="form-row">
			<label for="password">Password *</label>
			<input id="password" type="password" name="password" required  value="<?php echo $_POST['password']; ?>">
		</div>
		<div class="form-row">
			<label for="email">E-mail *</label>
			<input type="email" id="email" name="email" required  value="<?php echo $_POST['email']; ?>">
		</div>
		<div class="form-row">
			<input type="submit" name="submit" value="Indsend">
		</div>
	</form>
</div>