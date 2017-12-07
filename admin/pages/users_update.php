<?php

    $user_id = $_GET['id'];
    
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

				updateUser($objConnection, $name, $username, $pass, $email, $user_id);

				header("Location: index.php?page=users&updated=true");
			}
    }

    // select all records from database table
    $sql = "SELECT * FROM admins WHERE id = {$user_id} "; 
    $result = $objConnection->query($sql);

    while($row = $result->fetch_object()){ 
			$id = $row->id;
			$name = $row->name;
			$username = $row->username;
			$password = $row->password;
			$email = $row->email;
    }   

?>
<div class="wrapper">
	<h1>
			Rediger Admin
	</h1>
	<form id="form" method="post" action="">
		<?php 
			echo $errors['required'];
			echo $errors['email'];
			echo $notice; 
		?>
		<div class="form-row">
			<label for="name">Navn *</label>
			<input id="name" type="text" name="name" value="<?php echo $name; ?>" required >
		</div>
		<div class="form-row">
			<label for="username">Brugernavn *</label>
			<input id="username" type="text" name="username" value="<?php echo $username; ?>" required >
		</div>
		<div class="form-row">
			<label for="password">Password *</label>
			<input id="password" type="text" name="password" value="<?php echo $pass; ?>" required >
		</div>
		<div class="form-row">
			<label for="email">E-mail *</label>
			<input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div class="form-row">
			<input type="submit" name="submit" value="Indsend">
		</div>
	</form>
</div>