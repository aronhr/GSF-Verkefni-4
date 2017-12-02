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

$nemandi->nyrNemandi($kt);

?>

<html>
<body>
<h1>nýr nemandi</h1>
<form action="">
    <input type="text">
    <input type="submit">
</form>
</body>

</html>
