<?php

function createUser($objConnection, $name, $username, $pass, $email){
	$sql = "INSERT INTO admins (id, name, username, password, email) VALUES ('', '{$name}', '{$username}', '{$pass}', '{$email}')";
	$objConnection->query($sql);
}

function updateUser($objConnection, $name, $username, $pass, $email, $user_id){
	$sql = "UPDATE admins SET name = '{$name}', username = '{$username}', password = '{$pass}', email = '{$email}' WHERE id = {$user_id}";
	$objConnection->query($sql);
}

function deleteUser($objConnection, $user_id){
	$sql = "DELETE FROM admins WHERE id = {$user_id}";
	$objConnection->query($sql);
}