<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\modules\admin\models\File;
use app\modules\admin\models\PriceUploaderModel;
use app\models\base\TbPrices;
use yii\helpers\Url;
use yii\base\ErrorException;

$ex_r = Url::to('@app') . '\components\excel_reader2.php';
require_once $ex_r;

class FileController extends AppAdminController {

    private $db;
    private $rq;

    public function init() {
        $this->db = Yii::$app->db;
        $this->rq = Yii::$app->request;
        //$this->enableCsrfValidation = false;
    }

    public function beforeAction($action) {
        if (Yii::$app->getModule('admin')->get('admin')->isGuest) {
            return $this->redirect('/admin/default/adminlogin');
        } else {
            return TRUE;
        }
    }

    public function actionIndex() {
        $pid = $this->rq->get('pid', 0);
        $priceModel = new TbPrices(); //Извлечение прайсов

        return $this->render('index', array('priceList' => $priceModel->getAllPrices(),
                    'price' => $priceModel->getPriceById(intval($pid)),
                    'pid' => $pid
        ));
    }

    public function actionDeleteprice() {
        $pid = $this->rq->get('pid', 0);

        $type = Yii::$app->db->createCommand('SELECT type FROM tb_prices WHERE pid=:pid')
                ->bindValue('pid', $pid)
                ->queryScalar();


        $priceModel = new TbPrices();

        if ($type == 1) {
            $db = Yii::$app->db;
            $deleteParts = $db->createCommand('DELETE FROM tb_nomenclature_tyre where  pid=:pid');
            $deleteParts->bindParam(':pid', $pid);
            $deleteParts->execute();
            $deletePrice = $db->createCommand('DELETE FROM tb_prices where  pid=:pid');
            $deletePrice->bindParam(':pid', $pid);
            $deletePrice->execute();

            return $this->redirect(['file/index']);
        } elseif ($type == 2) {
            $db = Yii::$app->db;
            $deleteParts = $db->createCommand('DELETE FROM tb_nomenclature_disk where  pid=:pid');
            $deleteParts->bindParam(':pid', $pid);
            $deleteParts->execute();
            $deletePrice = $db->createCommand('DELETE FROM tb_prices where  pid=:pid');
            $deletePrice->bindParam(':pid', $pid);
            $deletePrice->execute();

            return $this->redirect(['file/index']);
        }
    }

    public function actionCreateprice() {

        $name = $this->rq->post('name', '');
        $model = new TbPrices();
        // if ($model->checkByName($name)) {
        //     $this->error('Прайс с таким названием уже существует');
        // }
        try {
            $date = date('Y-m-d H:i:s');
            $model->name = $name;
            $model->uid = Yii::$app->user->id;
            $model->updated = $date;
            $model->created = $date;
            $model->save();
            $this->out(array(
                'error' => false,
                'msg' => 'OK',
                'pid' => $model->pid,
                'name' => $name
            ));
        } catch (Exception $exc) {
            $this->error($exc->getMessage());
        }
    }

    //Вывод json 
    private function out($response) {
        echo json_encode($response);
        Yii::$app->end();
    }

    //Ajax загрузка
    public function actionUploadprice() {

        $pid = $this->rq->post('pid', '');

        $chek = array('ch_tyre' => $this->rq->post('ch_price_tyre'),
            'ch_disk' => $this->rq->post('ch_price_disk'));


        try {
            $file = new File('price');
            $fname = Url::to('@runtime') . '\\' . uniqid('', true);
            $file->move($fname);
            //AJAX::flushReport();



            $output = array();
            if ($pid) { // $pid должно быть истенно
                $processor = new PriceUploaderModel($fname, $pid, true, $chek);
                $processor->process();
            } else {
                throw new \Exception('Неверный тип прайса');
            }


            $this->out(array(
                'error' => false,
                'msg' => 'OK',
                'mem' => memory_get_peak_usage(true) / 1024 / 1024,
                'out' => $pid,
            ));
        } catch (Exception $ex) {
            $this->error($ex->getMessage());
        }
    }

}
