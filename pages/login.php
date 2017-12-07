<div class="wrapper login">
	<h1>
		Login
  </h1>
  <form method="post" action="code/doLogin.php">
	<?php
		
  	if(isset($_GET['status'])){
    	switch ($_GET['status']){
      	case 'err1':
        	echo '<p class="error">Du skal udfylde login formen korrekt!</p>';
          break;
        case 'err2':
          echo '<p class="error">Du mangler brugernavn eller password!</p>';
          break;
        case 'err3':
          echo '<p class="error">Forkert brugernavn eller password!</p>';
          break;
       	case 'err4':
          echo '<p class="error">Du SKAL logge ind for at se denne side!</p>';
          break;
    	}
  	}
  ?>
		<div class="form-row">
    	<label for="username">Brugernavn</label>
      <input type="text" id="username" name="username" required>
    </div>
		<div class="form-row">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
		</div>
		<div class="form-row">
      <input type="submit" name="submit" value="Insend">
		</div>
  </form>
</div>