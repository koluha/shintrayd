<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Page;
use app\modules\admin\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PageController extends AppAdminController {

    public function beforeAction($action) {
        if (Yii::$app->getModule('admin')->get('admin')->isGuest) {
            return $this->redirect('/admin/default/adminlogin');
        } else {
            return TRUE;
        }
    }



    public function actionTest() {
        $page = Page::find()->where(['url' => 'privet'])->scalar();
        if (!$page) {
            echo '';
        }
    }

    public function actionIndex() {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {
        $model = new Page();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {


            $model->attributes = [
                'title' => $model->title,
                'content' => $model->content,
                'url' => Yii::$app->myhelper->translitUrl($model->url),
                'meta_title' => $model->meta_title,
                'meta_keyword' => $model->meta_keyword,
                'meta_description' => $model->meta_description
            ];

            $model->save();


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {

            $model->attributes = [
                'title' => $model->title,
                'content' => $model->content,
                'url' => Yii::$app->myhelper->translitUrl($model->url),
                'meta_title' => $model->meta_title,
                'meta_keyword' => $model->meta_keyword,
                'meta_description' => $model->meta_description
            ]; 

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest2() {
        $r = Page::find()->where(['url' => 'bmw'])->andWhere(['!=', 'id', 14])->count();
        if ($r > 0) {
            echo 'такая запись уже присутствует с таким url';
        }

        // $r = Yii::$app->db->createCommand("SELECT COUNT(*) FROM tb_page WHERE id!=:id AND url=:url")
        //         ->bindValue(':id', 14)
        //         ->bindValue(':url', 'bmw')
        //         ->queryScalar();

        echo '<pre>';
        print_r($r);
        echo '</pre>';
    }

}
