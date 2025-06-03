<?php
require_once __DIR__ . '/../langLoader.php';

class controllerAdminEntities{
    public static function EntitiesList(){
        $arr=modelAdminEntities::getEntitiesList();
        include_once 'viewAdmin/entitiesList.php';
    }

    public static function entitiesAddForm(){
        $arr = modelAdminCategory::getCategoryList();
        include_once('viewAdmin/entitiesAddForm.php');
    }

    public static function entitiesAddResult(){
        $test = modelAdminEntities::getEntitiesAdd();
        include_once('viewAdmin/entitiesAddForm.php');
    }

    public static function entitiesEditForm($id){
        $arr = modelAdminCategory::getCategoryList();
        $detail=modelAdminEntities::getEntitiesDetail($id);
        include_once('viewAdmin/entitiesEditForm.php');
    }

    public static function EntitiesEditResult($id){
        $test = modelAdminEntities::getEntitiesEdit($id);
        include_once('viewAdmin/entitiesEditForm.php');
    }

    public static function entitiesDeleteForm($id){
        $arr = modelAdminCategory::getCategoryList();
        $detail = modelAdminEntities::getEntitiesDetail($id);
        include_once('viewAdmin/entitiesDeleteForm.php');
    }

    public static function entitiesDeleteResult($id){
        $test=modelAdminEntities::getEntitiesDelete($id);
        include_once('viewAdmin/entitiesDeleteForm.php');
    }
}
?>