<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=userLogin", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>