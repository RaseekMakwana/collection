<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class CanvasController extends Controller
{
    public function actionApp($id){
        return $this->render('_app_master_layout',[
            'id' => $id
        ]);
    }
    
    public function actionCanvas_images_save(){
        
        $data = $_POST['base64'];
        $file_name = $_POST['file_name'];
        print_r(SITE_ABS_PATH); die;
        // save data end
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        file_put_contents(SITE_ABS_PATH.'/public/uploads/share_image/'.$file_name, $data);
        
        echo json_encode($model->id);
    }
}