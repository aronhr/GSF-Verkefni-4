<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 08-Dec-17
 * Time: 3:50 PM
 */

include '../assets/config.php';
include '../assets/class/skoli.php';

$skoli = new skoli();

########################  ADD NEW SCHOOL ########################
if (!empty($_POST['addSchool'])) {
    $name = trim(strip_tags($_POST['addSchoolName']));
    if ($name == ""){
        $error = "Provide Name!";
    }
    else {
        try {
            $skoli->newSchool($name);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

########################  View SCHOOL ########################
if (!empty($_POST['ViewSchoolName'])) {
    $name = trim(strip_tags($_POST['ViewSchoolName']));
    if ($name == "") {
        $error = "Provide Name!";
    }
    else {
        try {
            if($schoolDetails=$skoli->viewSchool($name)){
                echo "Id:" . $schoolDetails->schoolID;
                echo "\r\nName:" . $schoolDetails->schoolName;
            }else{
                echo "No school with this name";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>

<html>
<head>

</head>
<body>
<h1>Add New School</h1>
<form method="post" action="" name="addSchoolForm">
    <label>Add New School</label>
    <input type="text" name="addSchoolName" autocomplete="off" placeholder="Nafn á Skóla"/>
    <input type="submit" class="button" name="addSchool" value="Add New School">
</form>

<h1>View School</h1>
<form method="post" action="" name="ViewSchoolForm">
    <label>View School</label>
    <input type="text" name="ViewSchoolName" autocomplete="off" placeholder="Nafn á Skóla"/>
    <input type="submit" class="button" name="ViewSchool" value="View School">
</form>


</body>
</html>