<?php
ob_start();
require_once __DIR__ . '/../langLoader.php';

?>
<h1>TOP 3 RENTALS</h1>
<br>
<?php
ViewEntities::EntitiesByCategory($arr);


$content = ob_get_clean();

include_once 'view/layout.php';

?>