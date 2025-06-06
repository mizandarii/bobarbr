<?php ob_start(); 
?>
<div class="container" style="min-heigt:400px;">
    <div class="col-md-11">
    <h2>Object delete</h2>
<?php
if(isset($test)){
    if($test==true)
    {
        ?>
        <div class="alert alert-info">
    <strong>Запись удалена.</strong><a href="entitiesAdmin">Список объектов</a>
</div>
<?php
    }
    else if($test==false){
        ?>
        <div class="alert alert-warning">
    <strong>Ошибка удаления записи!</strong><a href="entitiesAdmin">Список объектов</a>
</div>
<?php
    }
}
else{
    ?>
    <form method="POST" action ="entitiesDelResult?id=<?php echo $id; ?>"enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <td>Object title</td>
            <td><input type="text" name="title" class="form-control" required readonly value=<?php 
                echo $detail['title']; ?>></td>
        </tr>
        <tr>
            <td>Object text</td>
            <td><textarea rows="5" name="text" class="form-control" required readonly><?php
            echo $detail['text']; ?></textarea></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
                <select name="idCategory" class="form-control" disabled>
                    <?php
                    foreach ($arr as $row){
                    echo '<option value="'.$row['id'].'"';
                    if($row['id']==$detail['category_id']) echo 'selected';
                    echo '>'.$row['name'].'</option>';
                }
                ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>OldPicture</td>
            <td>
                <div>
                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($detail['picture']).'"width=150/>';?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="save">
                    <span class="glyphicon glyphicon-plus"></span>удалить
                </button>
                <a href="entitiesAdmin" class="btn btn-large btn-success">
                    <i class="glyphicon glyphicon-backward"></i>&nbsp;Назад к списку
                </a>
            </td>
        </tr>
    </table>
</form>
<?php
}
?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>