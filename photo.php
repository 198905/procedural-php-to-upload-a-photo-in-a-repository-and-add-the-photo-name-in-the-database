<?php
//PDO

try {
    $bdd = new PDO('mysql:host=;dbname=;charset=encoding', 'user', 'password');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $bdd->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES UTF8');
} catch(Exception $e) {
    echo 'Error : '.$e->getMessage();
}

//upload photos


$sql='INSERT INTO `table` (`column1`, `column`,`photoName`) 
        VALUES  (:correspondingValue, :correspondingValue2, :photoName)';

$variable1=addslashes(htmlspecialchars($_POST["formValueName1"])); 
$variable2=addslashes(htmlspecialchars($_POST["formValueName2"]));
$photo = 'pathFolder/pathFolder/' . pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);
$query = $bdd->prepare($sql);

$query->bindvalue(':correspondingValue', $variable1);
$query->bindvalue(':correspondingValue2', $variable2);
$query->bindvalue(':photoName', $photo);
$query->execute();

//send the image in a repository:
$folder="pathFolder/pathFolder/";
$ImageSize = $_FILES["photo"]["size"];
$target_file = $folder . basename($_FILES["photo"]["name"]);
$imageFileType = pathinfo(($_FILES["photo"]["name"]),PATHINFO_EXTENSION);
$upload;
if(isset($_POST["submit"])) {
        if (file_exists($target_file)){
            echo  "<script> alert('Already exists.'); </script>";
            $upload = false;
        } else if ($ImageSize > 5000000){
            echo  "<script> alert('More than 5Mo.'); </script>";//check php.ini to regulate it
            $upload = false;
        } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "<script> alert('.jpg, .jpeg, .png or .gif. '); </script>";
            $upload = false;  
        }
    }
    if ($upload = true) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], 'pathFolder/pathFolder/' . $_FILES['photo']['name']);
        echo  "<script> alert('add: $variable1 . '' . $variable2 . ''); </script>";
    }
