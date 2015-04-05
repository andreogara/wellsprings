<?php
session_start();
$trains = array();
    try{
    if(isset($_POST['submit'])){
            $targetDir = "../data/";
            $targetFile = $targetDir . basename($_FILES['file']['name']);
            $uploadOk = 1;
            $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
            if($fileType != "csv"){
                echo "Not a CSV file";
                $uploadOk = 0;
                }
            if ($uploadOk == 0){
                echo "There was a problem uploading your CSV file";
            }
            else{
                if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)){
                    echo "Success! Click <a href='http://localhost/wellsprings/index.php'>here</a> to continue...";
                }
                else{
                    echo "Sorry your file has not been uploaded again...";
                }
            }
            if (($handle = fopen("../data/trains.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    array_push($trains, $data);
                }
                $_SESSION["trains"] = $trains;
                fclose($handle);
            }
       }
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }

?>
