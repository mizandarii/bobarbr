<?php
ob_start();
require_once __DIR__ . '/../langLoader.php';

?>

<br>

<?php
ViewEntities::ReadEntities($n);

echo "<br>";
Controller::Comments($_GET['id']);

echo "<br>";
ViewComments::CommentsForm();

$content = ob_get_clean();
include_once 'view/layout.php';

?>