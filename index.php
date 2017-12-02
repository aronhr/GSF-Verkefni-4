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

?>

<html>
<body>
<h1>Delete Student</h1>
<form method="post" action="" name="deleteStudentForm">
    <label>Delete Student</label>
    <input type="number" name="deleteStudentKt" autocomplete="off" placeholder="Kennitala"/>
    <input type="submit" class="button" name="deleteStudent" value="Signup">
</form>
</body>

</html>
