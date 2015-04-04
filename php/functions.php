<?php
$trains = array();
    if (($handle = fopen("./data/trains.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            array_push($trains, $data);
        }
        session_start();
        $_SESSION["trains"] = $trains;
        fclose($handle);
    }
?>
