<?php

require('connect.php');

//when delete is selected 
if($_POST['command'] == "Delete")
{
    //call delete.php
    require ('delete.php');
    header("Location: admin.php");
}

if($_POST['command'] == "Update")
{
    //when update is selected
    if ($_POST && !empty($_POST['user']) && !empty($_POST['content']) && !empty($_POST['id']))
    {
        //call Update.php
        require ('update.php');
        header("Location: admin.php");
        exit;
    }
    else
    {
        echo "User or content was empty!";
    }
}

if($_POST['command'] == "Create")
{
    //when create is selected
    if ($_POST && !empty($_POST['user']) && !empty($_POST['content']))
    {
        //call create.php
        require('create.php');
        header("Location: home.php");
        exit;
    }
    else
    {
        echo "User or content was empty!";
    }

}

?>