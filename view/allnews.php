<<<<<<< HEAD
<?php
ob_start();
?>
<h1>Kõik uudised</h1>
<br>

<?php
ViewNews::AllNews($arr);
$content=ob_get_clean();
include_once 'view/layout.php';
?>
=======
<?php
ob_start();
?>
<h1>Kõik uudised</h1>
<br>

<?php
ViewNews::AllNews($arr);
$content=ob_get_clean();
include_once 'view/layout.php';
?>
>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
