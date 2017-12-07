<?php
	if(isset($_GET['id'])){
  	$user_id = $_GET['id'];
		
		$sql = "SELECT * FROM admins  WHERE id = {$user_id}"; 
		$result = $objConnection->query($sql);

		while($row = $result->fetch_object()) { 
			$name = $row->name;
		}

		if(!isset($_GET['confirm'])){
			$confirm = "Vil du slette admin " . $name . "?";
		}
		else {
			deleteUser($objConnection, $user_id);
			
			header("Location: index.php?page=users&deleted=true");
		}
  }

?>
<div class="wrapper">
	<h1>
		Slet bruger
	</h1>
	<div class="delete">
    <?php if(isset($confirm)){echo $confirm;} ?>
    <a href="index.php?page=users_delete&id=<?php echo $user_id; ?>&confirm=true">Ja</a>
    <a href="index.php?page=users_read">Nej</a>
	</div>
</div>