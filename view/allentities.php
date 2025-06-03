<?php
require_once __DIR__ . '/../langLoader.php';

ob_start();
?>
<h1>Kõik objektid</h1>
<br>

<?php
ViewEntities::AllEntities($arr);
$content=ob_get_clean();
include_once 'view/layout.php';
?>
