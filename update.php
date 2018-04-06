<?php  
 /*
  * Used to update a row in the database.
  */

  require('connect.php');

//filter  and sanitize user input before user updates the blog 
	$user   = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        	$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        	$query = "UPDATE cricketblog SET user = :user, content = :content WHERE id = :id";
        	$statement = $db->prepare($query);
        	$statement->bindValue(':user', $user);        
        	$statement->bindValue(':content', $content);
        	$statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        	$statement->execute();

?>