<<<<<<< HEAD
<?php
ob_start();
?>

<br>

<?php
ViewNews::ReadNews($n);

echo "<br>";
Controller::Comments($_GET['id']);

echo "<br>";
ViewComments::CommentsForm();

$content = ob_get_clean();
include_once 'view/layout.php';

=======
<?php
ob_start();
?>

<br>

<?php
ViewNews::ReadNews($n);

echo "<br>";
Controller::Comments($_GET['id']);

echo "<br>";
ViewComments::CommentsForm();

$content = ob_get_clean();
include_once 'view/layout.php';

>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
?>