<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\imagine\Image;
use app\models\base\DbSpecifDisk;
use app\models\base\DbVendorDisk;
use app\modules\admin\models\SpecifDisk;
use yii\filters\VerbFilter;
use app\models\base\DFileHelper;

class SpecifdiskController extends AppAdminController {

    private $db;

    public function init() {
        $this->db = Yii::$app->db;
    }

    public function beforeAction($action) {
        if (Yii::$app->getModule('admin')->get('admin')->isGuest) {
            return $this->redirect('/admin/default/adminlogin');
        } else {
            return TRUE;
        }
    }

//Функция изменяет наименование строк
    public function actionSys1() {
// ini_set('max_execution_time', '2000');
        $data = $this->db->createCommand('SELECT id,img FROM db_specif_disk')->queryAll();

        foreach ($data as $value) {
            $id = $value['id'];
            $img = $value['img'] . '.jpg';
            $this->db->createCommand("UPDATE db_specif_disk SET img='$img' WHERE id='$id'")->execute();
            ;
        }
    }

    public function actionIndex() {
        $searchModel = new SpecifDisk();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {
        $model = new DbSpecifDisk();

        if ($model->load(Yii::$app->request->post())) {
//Работа с основной картинкой
            $picture = UploadedFile::getInstance($model, 'picture');
            if ($picture && $picture->tempName) {

                $model->picture = $picture;
                if ($model->validate(['picture'])) {

                    $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                    $pictureName = '_' . $model->picture->baseName . '.' . $model->picture->extension;  //имя_файла.расширение
                    $dbpictureName = '_' . $model->picture->baseName;  //имя_файла без расширение
                    $model->picture->saveAs($dir . $pictureName);
                    $model->picture = $pictureName; // без этого ошибка
                    $model->img = $dbpictureName;
                }
            } elseif (!$picture && $model->list_img_val) {  //Если картинка не загружена, а выбранна из списка
                if ($model->validate(['list_img_val'])) {
                    $model->img = $model->list_img_val;  //Из списка в поле img
                }
            }
//END Работа с основной картинкой
//Работа с дополнительной картинкой_1
            $picture_1 = UploadedFile::getInstance($model, 'picture_1');
            if ($picture_1 && $picture_1->tempName) {

                $model->picture_1 = $picture_1;
                if ($model->validate(['picture_1'])) {

                    $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                    $picture_1Name = '_' . $model->picture_1->baseName . '.' . $model->picture_1->extension;  //имя_файла.расширение
                    $dbpicture_1Name = '_' . $model->picture_1->baseName;  //имя_файла без расширение
                    $model->picture_1->saveAs($dir . $picture_1Name);
                    $model->picture_1 = $picture_1Name; // без этого ошибка
                    $imgs_slim[] = $dbpicture_1Name;
                }
            } elseif (!$picture_1 && $model->list_imgs_1_val) {  //Если картинка не загружена, а выбранна из списка
                if ($model->validate(['list_imgs_1_val'])) {
                    $imgs_slim[] = $model->list_imgs_1_val;  //Из списка в поле img
                }
            }
//END Работа с дополнительной картинкой_1
//Работа с дополнительной картинкой_2
            $picture_2 = UploadedFile::getInstance($model, 'picture_2');
            if ($picture_2 && $picture_2->tempName) {

                $model->picture_2 = $picture_2;
                if ($model->validate(['picture_2'])) {

                    $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                    $picture_2Name = '_' . $model->picture_2->baseName . '.' . $model->picture_2->extension;  //имя_файла.расширение
                    $dbpicture_2Name = '_' . $model->picture_2->baseName;  //имя_файла без расширение
                    $model->picture_2->saveAs($dir . $picture_2Name);
                    $model->picture_2 = $picture_2Name; // без этого ошибка
                    $imgs_slim[] = $dbpicture_2Name;
                }
            } elseif (!$picture_2 && $model->list_imgs_2_val) {  //Если картинка не загружена, а выбранна из списка
                if ($model->validate(['list_imgs_2_val'])) {
                    $imgs_slim[] = $model->list_imgs_2_val;  //Из списка в поле img
                }
            }
//END Работа с дополнительной картинкой_2
//
            //Работа с дополнительной картинкой_3
            $picture_3 = UploadedFile::getInstance($model, 'picture_3');
            if ($picture_3 && $picture_3->tempName) {

                $model->picture_3 = $picture_3;
                if ($model->validate(['picture_3'])) {

                    $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                    $picture_3Name = '_' . $model->picture_3->baseName . '.' . $model->picture_3->extension;  //имя_файла.расширение
                    $dbpicture_3Name = '_' . $model->picture_3->baseName;  //имя_файла без расширение
                    $model->picture_3->saveAs($dir . $picture_3Name);
                    $model->picture_3 = $picture_3Name; // без этого ошибка
                    $imgs_slim[] = $dbpicture_3Name;
                }
            } elseif (!$picture_3 && $model->list_imgs_3_val) {  //Если картинка не загружена, а выбранна из списка
                if ($model->validate(['list_imgs_3_val'])) {
                    $imgs_slim[] = $model->list_imgs_3_val;  //Из списка в поле img
                }
            }
//END Работа с дополнительной картинкой_3
            if ($imgs_slim) {
                $model->imgs = $model->str_arr_imgs($imgs_slim);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
//Если картинку на удаление то
            if ($model->del_img) {
                $model->img = '';
            } else {  //если не помечено на удаление выполняем
                $picture = UploadedFile::getInstance($model, 'picture');
                if ($picture && $picture->tempName) {

                    $model->picture = $picture;
                    if ($model->validate(['picture'])) {

                        $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                        $pictureName = '_' . $model->picture->baseName . '.' . $model->picture->extension;  //имя_файла.расширение
                        $dbpictureName = '_' . $model->picture->baseName;  //имя_файла без расширение
                        $model->picture->saveAs($dir . $pictureName);
                        $model->picture = $pictureName; // без этого ошибка
                        $model->img = $dbpictureName;
                    }
                } elseif (!$picture && $model->list_img_val) {  //Если картинка не загружена, а выбранна из списка
                    if ($model->validate(['list_img_val'])) {
                        $model->img = $model->list_img_val;  //Из списка в поле img
                    }
                }
            }



            if ($model->del_img_1) {
                $imgs_slim[0] = 'del';
            } else {  //если не помечено на удаление выполняем
                $picture_1 = UploadedFile::getInstance($model, 'picture_1');
                if ($picture_1 && $picture_1->tempName) {

                    $model->picture_1 = $picture_1;
                    if ($model->validate(['picture_1'])) {

                        $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                        $picture_1Name = '_' . $model->picture_1->baseName . '.' . $model->picture_1->extension;  //имя_файла.расширение
                        $dbpicture_1Name = '_' . $model->picture_1->baseName;  //имя_файла без расширение
                        $model->picture_1->saveAs($dir . $picture_1Name);
                        $model->picture_1 = $picture_1Name; // без этого ошибка
                        $imgs_slim[0] = $dbpicture_1Name;
                    }
                } elseif (!$picture_1 && $model->list_imgs_1_val) {  //Если картинка не загружена, а выбранна из списка
                    if ($model->validate(['list_imgs_1_val'])) {
                        $imgs_slim[0] = $model->list_imgs_1_val;  //Из списка в поле img
                    }
                }
            }



            if ($model->del_img_2) {
                $imgs_slim[1] = 'del';
            } else {  //если не помечено на удаление выполняем
                $picture_2 = UploadedFile::getInstance($model, 'picture_2');
                if ($picture_2 && $picture_2->tempName) {

                    $model->picture_2 = $picture_2;
                    if ($model->validate(['picture_2'])) {

                        $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                        $picture_2Name = '_' . $model->picture_2->baseName . '.' . $model->picture_2->extension;  //имя_файла.расширение
                        $dbpicture_2Name = '_' . $model->picture_2->baseName;  //имя_файла без расширение
                        $model->picture_2->saveAs($dir . $picture_2Name);
                        $model->picture_2 = $picture_2Name; // без этого ошибка
                        $imgs_slim[1] = $dbpicture_2Name;
                    }
                } elseif (!$picture_2 && $model->list_imgs_2_val) {  //Если картинка не загружена, а выбранна из списка
                    if ($model->validate(['list_imgs_2_val'])) {
                        $imgs_slim[1] = $model->list_imgs_2_val;  //Из списка в поле img
                    }
                }
            }





            if ($model->del_img_3) {
                $imgs_slim[2] = 'del';
            } else {  //если не помечено на удаление выполняем
                $picture_3 = UploadedFile::getInstance($model, 'picture_3');
                if ($picture_3 && $picture_3->tempName) {

                    $model->picture_3 = $picture_3;
                    if ($model->validate(['picture_3'])) {

                        $dir = Yii::getAlias($model->get_to_path_folder());
// $pictureName = DFileHelper::getRandomFileName($model->picture->baseName,$model->picture->extension);

                        $picture_3Name = '_' . $model->picture_3->baseName . '.' . $model->picture_3->extension;  //имя_файла.расширение
                        $dbpicture_3Name = '_' . $model->picture_3->baseName;  //имя_файла без расширение
                        $model->picture_3->saveAs($dir . $picture_3Name);
                        $model->picture_3 = $picture_3Name; // без этого ошибка
                        $imgs_slim[2] = $dbpicture_3Name;
                    }
                } elseif (!$picture_3 && $model->list_imgs_3_val) {  //Если картинка не загружена, а выбранна из списка
                    if ($model->validate(['list_imgs_3_val'])) {
                        $imgs_slim[2] = $model->list_imgs_3_val;  //Из списка в поле img
                    }
                }
            }


            $ob_imgs = DbSpecifDisk::arr_imgs($model->imgs);

            if (($imgs_slim[0]) && ($imgs_slim[0] != 'del')) {
                $ob_imgs[0] = $imgs_slim[0];
            } elseif ($imgs_slim[0] == 'del') {
                unset($ob_imgs[0]);
            }

            if (($imgs_slim[1]) && ($imgs_slim[1] != 'del')) {
                $ob_imgs[1] = $imgs_slim[1];
            } elseif ($imgs_slim[1] == 'del') {
                unset($ob_imgs[1]);
            }

            if (($imgs_slim[2]) && ($imgs_slim[2] != 'del')) {
                $ob_imgs[2] = $imgs_slim[2];
            } elseif ($imgs_slim[2] == 'del') {
                unset($ob_imgs[2]);
            }



            if ($imgs_slim) {
                $model->imgs = $model->str_arr_imgs($ob_imgs);
            }


            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = DbSpecifDisk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
