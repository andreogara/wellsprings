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
<form class="form-inline" role="form" action="php/functions.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="file">Select CSV File to Upload:</label>
    <input type="file" class="form-control" name="file" required/>
  </div>
  <button type="submit" class="btn btn-default" name="submit">Upload</button>
</form>
<?php
if (isset($_SESSION["trains"])){
    $data = json_encode($_SESSION["trains"]);
    echo "<input type='hidden' value = '$data' id='hidden'></input>";
    }
 ?>
<div ng-app="wellSprings" class="hook" ng-controller="ListController" ng-show="checked">
    <?php include 'partials/trains.php';?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.js"></script>
<script src="js/xeditable.js"></script>
<script src="js/ng.js"></script>
<script src="js/script.js"></script>
</body>
</html>