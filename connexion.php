<?php
try
{
	$db = new PDO('mysql:host=localhost; dbname=maTable; charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>