<?php
$connection = new mysqli("localhost","root","","login_db");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}