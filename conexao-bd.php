<?php
require_once "config.php";


$conn = new PDO ("mysql:host=$DBHOST; dbname=".$DBNAME, $DBUSER, $DBPASS);