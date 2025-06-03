<?php ob_start();
require_once __DIR__ . '/../langLoader.php';

 ?>

<div class="container" style="min-height:400px;">
    <div class="col-md">
        <h2>Object Edit</h2>
        <?php
        if (isset($test)) {
            if ($test == true) {
                ?>
                <div class="alert alert-info">
                    <strong>Запись изменена.</strong><a href="entitiesAdmin">Список объектов</a>
                </div>
                <?php
            } else if ($test == false) {
                ?>
                <div class="alert alert-warning">
                    <strong>Ошибка изменения записи!</strong><a href="entitiesAdmin">Список объектов</a>
                </div>
                <?php
            }
        } else {
            ?>
            <form method="POST" action="entitiesEditResults?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <td>Object title</td>
                        <td><input type="text" name="title" class="form-control" required 
                                   value="<?php echo $detail['title']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Object text</td>
                        <td><textarea rows="5" name="text" class="form-control" required><?php echo $detail['text']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="idCategory" class="form-control">
                                <?php
                                foreach ($arr as $row) {
                                    echo '<option value="' . $row['id'] . '"';
                                    if ($row['id'] == $detail['category_id']) echo 'selected';
                                    echo '>' . $row['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Old Picture</td>
                        <td>
                            <div>
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($detail['picture']) . '" width="150"/>'; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Picture</td>
                        <td>
                            <div>
                                <input type="file" name="picture" style="color:black; width: 300px">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" class="form-control" required 
                                   value="<?php echo $detail['address']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Country</td>
                        <td><input type="text" name="country" class="form-control" required 
                                   value="<?php echo $detail['country']; ?>"></td>
                    </tr>

                    <tr>
                        <td>City</td>
                        <td><input type="text" name="city" class="form-control" required 
                                   value="<?php echo $detail['city']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Size</td>
                        <td><input type="text" name="size" class="form-control" required 
                                   value="<?php echo $detail['size']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" class="form-control" required 
                                   value="<?php echo $detail['price']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Floor</td>
                        <td><input type="text" name="floor" class="form-control" required 
                                   value="<?php echo $detail['floor']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="save">
                                <span class="glyphicon glyphicon-plus"></span> изменить
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
