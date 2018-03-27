<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use app\components\MyhelperComponent;


class PriceUploaderModel extends Model {

    private $reader = null;
    private $fileName = null;
    private $lineCount = 0;
    private $pid = 0;
    private $chec = 0;
    private $isNew = true;

    public function __construct($fname, $pid, $isNew = true, $chec) {
        if (!file_exists($fname) || !is_readable($fname)) {
            throw new \Exception('Invalid file name');
        }
        $this->fileName = $fname;

        $this->reader = new \Spreadsheet_Excel_Reader($fname, true, 'UTF-8');
        $this->lineCount = $this->reader->rowcount();
        $this->isNew = $isNew;
        $this->pid = $pid;
        $this->chec = $chec;
        // if ($this->isNew && ($this->reader->colcount() != 6)) {
        //     throw new \Exception('Неверное количество колонок. В прайсе с новыйми деталями должно быть 6 колонок.');
        // } 
    }

    public function process() {
        $c = 0;
        if ($this->chec['ch_tyre']) {
            $c = 1;
        } elseif ($this->chec['ch_disk']) {
            $c = 2;
        }

        if ($this->chec['ch_tyre']) {  //Если это прайс шин
            $db = Yii::$app->db;
            $insert = $db->createCommand("INSERT INTO tb_nomenclature_tyre (pid, season, code77, article, name, brand, model, diametr, shirina, profil, k_speed, k_load, markdown, price_b2b, price_roz, price_web, total, link_brand, link_model, runflat, spikes)
               VALUES(:pid, :season, :code77, :article, :name, :brand, :model, :diametr, :shirina, :profil, :k_speed, :k_load, :markdown, :price_b2b, :price_roz, :price_web, :total, :link_brand, :link_model , :runflat, :spikes)");


            $transaction = $db->beginTransaction();
            $rowCounter = 6;
            $skipped = 0;
            $funcName = 'getRowNew';
            try {
                for ($rowCounter; $rowCounter <= $this->lineCount; $rowCounter++) {


                    $row = $this->$funcName($rowCounter);
                    if ($row['price_b2b'] == 0) {  //Если цена ноль пропускаем
                        $skipped++;
                        continue;
                    }

                    $insert->bindValues([
                        'pid' => intval($this->pid),
                        'season' => $row['season'],
                        'code77' => $row['code77'],
                        'article' => $row['article'],
                        'name' => $row['name'],
                        'brand' => $row['brand'],
                        'model' => $row['model'],
                        'diametr' => $row['diametr'],
                        'shirina' => $row['shirina'],
                        'profil' => $row['profil'],
                        'k_speed' => $row['k_speed'],
                        'k_load' => $row['k_load'],
                        'markdown' => $row['markdown'],
                        'price_b2b' => $row['price_b2b'],
                        'price_roz' => $row['price_roz'],
                        'price_web' => $row['price_web'],
                        'total' => $row['total'],
                        'link_brand' => $row['link_brand'],
                        'link_model' => $row['link_model'],
                        'runflat' => $row['runflat'],
                        'spikes' => $row['spikes']
                    ])->execute();


                    //Проверка на одинаковое URL продукта
                    //   $last_id = $db->lastInsertID;
                    //   $urw = $row['t_url'];
                    //   $on_url = $db->createCommand("SELECT id,t_url FROM tb_product WHERE t_url='$urw' AND id!=$last_id")->queryRow();
                    //  if (!empty($on_url['id']) && !empty($row['t_url'])) {
                    //     $url_out = $on_url['t_url'];
                    //     throw new \Exception("Уже есть такой URL поля t_url,замените дублированный t_url с названием=$url_out");
                    // }
                    //    if (empty($row['t_url'])) {
                    //           throw new \Exception("URL поле пустое");
                    //   }
                }

                $db->createCommand("UPDATE tb_prices SET updated=CURRENT_TIMESTAMP,type=:type WHERE pid=:pid")
                        ->bindValues([':pid' => $this->pid, ':type' => $c])
                        ->execute();
                $transaction->commit();
            } catch (Exception $e) {
                if ($transaction->getActive()) {
                    $transaction->rollback();
                }
                throw $e;
            }
        } elseif ($this->chec['ch_disk']) {
            $db = Yii::$app->db;
            $insert = $db->createCommand("INSERT INTO tb_nomenclature_disk (pid, code77, article, name, manufacturer, model, diametr,diametr_width, pcd, x_pcd, co, vilet, type, color, markdown, price_b2b, price_roz, price_web, total, link_manufacturer, link_model)
               VALUES(:pid, :code77, :article, :name, :manufacturer, :model, :diametr,:diametr_width, :pcd, :x_pcd, :co, :vilet, :type, :color, :markdown, :price_b2b, :price_roz, :price_web, :total, :link_manufacturer, :link_model)");


            $transaction = $db->beginTransaction();
            $rowCounter = 6;
            $skipped = 0;
            $funcName = 'getRowNewDisk';
            try {
                for ($rowCounter; $rowCounter <= $this->lineCount; $rowCounter++) {
                    $row = $this->$funcName($rowCounter);
                    if ($row['price_b2b'] == 0) {  //Если цена ноль пропускаем
                        $skipped++;
                        continue;
                    }

                    $insert->bindValues([
                        'pid' => intval($this->pid),
                        'code77' => $row['code77'],
                        'article' => $row['article'],
                        'name' => $row['name'],
                        'manufacturer' => $row['manufacturer'],
                        'model' => $row['model'],
                        'diametr' => $row['diametr'],
                        'diametr_width' => $row['diametr_width'],
                        'pcd' => $row['pcd'],
                        'x_pcd' => $row['x_pcd'],
                        'co' => $row['co'],
                        'vilet' => $row['vilet'],
                        'type' => $row['type'],
                        'color' => $row['color'],
                        'markdown' => $row['markdown'],
                        'price_b2b' => $row['price_b2b'],
                        'price_roz' => $row['price_roz'],
                        'price_web' => $row['price_web'],
                        'total' => $row['total'],
                        'link_manufacturer' => $row['link_manufacturer'],
                        'link_model' => $row['link_model']
                    ])->execute();
                }

                $db->createCommand("UPDATE tb_prices SET updated=CURRENT_TIMESTAMP,type=:type WHERE pid=:pid")
                        ->bindValues([':pid' => $this->pid, ':type' => $c])
                        ->execute();
                $transaction->commit();
            } catch (Exception $e) {
                if ($transaction->getActive()) {
                    $transaction->rollback();
                }
                throw $e;
            }
        }
    }

    //шины
    private function getRowNew($row) {
        $price_b2b = $this->reader->val($row, 'P') ? preg_replace("/[^x\d|*\.]/", "", $this->reader->val($row, 'O')) : '0';
        $price_roz = $this->reader->val($row, 'P') ? preg_replace("/[^x\d|*\.]/", "", $this->reader->val($row, 'P')) : '0';
        $price_web = $this->reader->val($row, 'Q') ? preg_replace("/[^x\d|*\.]/", "", $this->reader->val($row, 'Q')) : '0';

        $out = array(
            'season' => $this->reader->val($row, 'A'),
            'code77' => $this->reader->val($row, 'B'),
            'article' => $this->reader->val($row, 'D'),
            'name' => $this->reader->val($row, 'E'),
            'brand' => $this->reader->val($row, 'G'),
            'model' => $this->reader->val($row, 'H'),
            'diametr' => $this->reader->val($row, 'I'),
            'shirina' => $this->reader->val($row, 'J'),
            'profil' => Yii::$app->myhelper->tyre_profil($this->reader->val($row, 'K')),
            'k_speed' => $this->reader->val($row, 'L'),
            'k_load' => str_replace("/", "_", $this->reader->val($row, 'M')),
            'markdown' => $this->reader->val($row, 'N'),
            'price_b2b' => $price_b2b,
            'price_roz' => $price_roz,
            'price_web' => ($price_web == 0) ? $price_roz : $price_web, //Если нет price_web то присвоить рознечную цену
            'total' => $this->reader->val($row, 'R'),
            'link_brand' => Yii::$app->myhelper->translitUrl($this->reader->val($row, 'G')),
            'link_model' => Yii::$app->myhelper->translitUrl($this->reader->val($row, 'H')),
            'runflat' => Yii::$app->myhelper->get_pr_runflat($this->reader->val($row, 'E')),
            'spikes' => Yii::$app->myhelper->get_pr_thorns($this->reader->val($row, 'E')),
        );
        return $out;
    }

    //диск
    private function getRowNewDisk($row) {

        $price_b2b = $this->reader->val($row, 'O') ? preg_replace("/[^x\d|*\.]/", "", $this->reader->val($row, 'O')) : '0';
        $price_roz = $this->reader->val($row, 'P') ? preg_replace("/[^x\d|*\.]/", "", $this->reader->val($row, 'P')) : '0';
        $price_web = $this->reader->val($row, 'Q') ? preg_replace("/[^x\d|*\.]/", "", $this->reader->val($row, 'Q')) : '0';

        $out = array(
            'code77' => $this->reader->val($row, 'A'),
            'article' => $this->reader->val($row, 'C'),
            'name' => $this->reader->val($row, 'D'),
            'manufacturer' => $this->reader->val($row, 'F'),
            'model' => $this->reader->val($row, 'G'),
            'diametr' =>Yii::$app->myhelper->get_pr_diametr($this->reader->val($row, 'H')),
            'diametr_width' => Yii::$app->myhelper->get_pr_diametr_width($this->reader->val($row, 'H')),
            'pcd' => Yii::$app->myhelper->get_pr_pcd($this->reader->val($row, 'I')),
            'x_pcd' => Yii::$app->myhelper->get_pr_x_pcd($this->reader->val($row, 'I')),
            'co' => Yii::$app->myhelper->get_pr_co($this->reader->val($row, 'J')),
            'vilet' => Yii::$app->myhelper->get_pr_vilet($this->reader->val($row, 'K')),
            'type' => Yii::$app->myhelper->get_pr_disk_type($this->reader->val($row, 'L')),
            'color' => $this->reader->val($row, 'M'),
            'markdown' => $this->reader->val($row, 'N'),
            'price_b2b' => $price_b2b,
            'price_roz' => $price_roz,
            'price_web' => ($price_web == 0) ? $price_roz : $price_web, //Если нет price_web то присвоить рознечную цену
            'total' => $this->reader->val($row, 'R'),
            'link_manufacturer' => Yii::$app->myhelper->translitUrl($this->reader->val($row, 'F')),
            'link_model' => Yii::$app->myhelper->translitUrl($this->reader->val($row, 'G')),
        );
        return $out;
    }

    public function __destruct() {
        @unlink($this->fileName);
    }

}
