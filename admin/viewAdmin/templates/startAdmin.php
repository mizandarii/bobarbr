<<<<<<< HEAD
<?php ob_start() ?>
<article>
    <div id="main" class="container">
        <h3>Админ панель</h3>
        <div class = "row">
        <p>Админ панель</p>
        </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>
=======
<?php ob_start() ?>
<article>
    <div id="main" class="container">
        <h3>Админ панель</h3>
        <div class = "row">
        <p>Админ панель</p>
        </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>
>>>>>>> 2668641d4a3fcce24fb699128d4709ca82e17a9e
<?php include "viewAdmin/templates/layout.php";