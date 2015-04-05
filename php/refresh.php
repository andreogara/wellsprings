<?php
if (isset($_POST['Reset'])){
session_destroy();
header("Location: http://localhost/wellsprings/index.php");
}
?>