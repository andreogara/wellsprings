<!DOCTYPE html>
<?php require('php/functions.php'); ?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Well Springs Project</title>
</head>
<body>
<?php
    $data = json_encode($_SESSION["trains"]);
    echo "<input type='hidden' value = '$data' id='hidden'></input>";
 ?>
<div ng-app="wellSprings" class="hook" ng-controller="ListController">

    <?php include 'partials/trains.php';?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.js"></script>
<script src="js/ng.js"></script>
<script src="js/script.js"></script>
</body>
</html>