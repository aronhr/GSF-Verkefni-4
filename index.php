<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 02-Dec-17
 * Time: 9:44 PM
 */

include 'assets/config.php';
include 'assets/class/nemandi.php';

$nemandi = new nemandi();
$error = "";

########################  ADD NEW STUDENT ########################
if (!empty($_POST['addStudent'])) {
    $kt = strtolower(trim(strip_tags($_POST['addStudentKt'])));
    $name = strtolower(trim(strip_tags($_POST['addStudentName'])));
    $track = strtolower(trim(strip_tags($_POST['addStudentTrack'])));
    $semester = strtolower(trim(strip_tags($_POST['addStudentSemester'])));
    if ($kt == "") {
        $error = "Provide Kennitala!";
    }elseif ($name == ""){
        $error = "Provide Name!";
    }elseif ($track == ""){
        $error = "Provide Braut!";
    }elseif ($semester == ""){
        $error = "Provide Önn!";
    }
    else {
        try {
            $nemandi->newStudent($kt, $name, $track, $semester);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

########################  View STUDENT ########################
if (!empty($_POST['ViewStudent'])) {
    $kt = strtolower(trim(strip_tags($_POST['ViewStudentKt'])));
    if ($kt == "") {
        $error = "Provide Kennitala!";
    }
    else {
        try {
            if($studentDetails=$nemandi->viewStudent($kt)){
                echo "Kennitala:" . $studentDetails->studentID;
                echo "\r\nName:" . $studentDetails->studentName;
                echo "\r\nTrack:" . $studentDetails->trackID;
                echo "\r\nSemester:" . $studentDetails->semester_ID;
            }else{
                echo "No student with this kennitala";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

########################  DELETE STUDENT ########################
if (!empty($_POST['deleteStudent'])) {
    $kt = strtolower(trim(strip_tags($_POST['deleteStudentKt'])));
    if ($kt == "") {
        $error = "Provide Kennitala!";
    }
    else {
        try {
            $nemandi->deleteStudent($kt);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if ($error != ""){
    echo $error;
}

?>

<html>
<body>

<h1>Add New Student</h1>
<form method="post" action="" name="addStudentForm">
    <label>Add New Student</label>
    <input type="number" name="addStudentKt" autocomplete="off" placeholder="Kennitala"/>
    <input type="text" name="addStudentName" autocomplete="off" placeholder="Fullt Nafn"/>
    <input type="number" name="addStudentTrack" autocomplete="off" placeholder="Númer á braut? (1-9)"/>
    <input type="number" name="addStudentSemester" autocomplete="off" placeholder="Númer á önn? (1-14)"/>
    <input type="submit" class="button" name="addStudent" value="Add New Student">
</form>

<h1>View Student</h1>
<form method="post" action="" name="ViewStudentForm">
    <label>View Student</label>
    <input type="number" name="ViewStudentKt" autocomplete="off" placeholder="Kennitala"/>
    <input type="submit" class="button" name="ViewStudent" value="View Student">
</form>

<h1>Delete Student</h1>
<form method="post" action="" name="deleteStudentForm">
    <label>Delete Student</label>
    <input type="number" name="deleteStudentKt" autocomplete="off" placeholder="Kennitala"/>
    <input type="submit" class="button" name="deleteStudent" value="Delete Student">
</form>
</body>

</html>
