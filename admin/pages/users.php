<?php
	if($_GET['created']){
		echo '<div class="modal">Profilen er blevet oprettet</div>';
	}elseif($_GET['updated']){
		echo '<div class="modal">Profilen er blevet opdateret</div>';
	}elseif($_GET['deleted']){
		echo '<div class="modal">Profilen er blevet slettet</div>';
	}
?>
<div class="wrapper">
	<h1>
		Brugere
	</h1>
	<div class="bar">
		<h2>
			Alle brugere
		</h2>
		<p>
			<a class="link" href="index.php?page=users_create">Opret Ny Bruger</a>
		</p>
	</div>
	<?php
		$sql = "SELECT * FROM admins"; 
		$result = $objConnection->query($sql);

		$user_headlines = array('Navn', 'Brugernavn', 'E-mail', 'Rediger', 'Slet');
		echo '<table>';

			echo '<thead><tr>';
			foreach($user_headlines as $headline){
				echo '<th>' . $headline . '</th>';
			}
			echo '</tr></thead>';
			while($row = $result->fetch_object()) { 
				echo '<tr>';
				echo '<td>' . $row->name . '</td>';
				echo '<td>' . $row->username . '</td>';
				echo '<td>' . $row->email . '</td>';
				echo '<td><a href=index.php?page=users_update&id=' . $row->id . '>Rediger</a></td>';
				echo '<td><a href=index.php?page=users_delete&id=' . $row->id . '>Slet</a></td>';
				echo '</tr>'; 
			}
			echo '</table>';
	?>
</div>