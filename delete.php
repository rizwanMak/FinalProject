<?php  
	/*
  * Used to delete a row in the database.
  */

  require('connect.php');
  
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $query = "DELETE FROM cricketblog WHERE id =" . $id;

    $statement = $db->prepare($query);

    $statement->execute();

?>