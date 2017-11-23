<?php

namespace app\models\base;

use Yii;
use yii\base\Model;

class TbPrices extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'tb_prices';
    }

    public function rules() {
        return [
            [['uid'], 'integer'],
            [['created', 'updated', 'pid', 'name', 'type'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    public function attributeLabels() {
        return [
            'pid' => 'Pid',
            'uid' => 'Uid',
            'name' => 'Name',
            'type' => 'Type',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    //tb_nomenclature_tyre
    public function getAllPrices() {
        $db = Yii::$app->db;
        $listCmd = $db->createCommand("
	   SELECT pr.pid, pr.type, pr.name, pr.created, pr.updated,
            (SELECT COUNT(p.id) FROM tb_nomenclature_tyre AS p WHERE p.pid=pr.pid) AS parts_count
                FROM tb_prices AS pr
            ORDER BY pr.updated DESC
	");
        return $listCmd->queryAll();
    }

    static function getAllPrices_count($type,$pid) {
        if ($type == 1) {
            $db = Yii::$app->db;
            $listCmd_1 = $db->createCommand("
	   SELECT pr.pid, pr.type, pr.name, pr.created, pr.updated,
            (SELECT COUNT(p.id) FROM tb_nomenclature_tyre AS p WHERE p.pid=pr.pid) AS parts_count
                FROM tb_prices AS pr WHERE pid=:pid
            ORDER BY pr.updated DESC
	");
            $r_1=$listCmd_1->bindValue(':pid', $pid)->queryOne();
            return  $r_1;
        } elseif ($type == 2) {
            $db = Yii::$app->db;
            $listCmd_2 = $db->createCommand("
	   SELECT pr.pid, pr.type, pr.name, pr.created, pr.updated,
            (SELECT COUNT(p.id) FROM tb_nomenclature_disk AS p WHERE p.pid=pr.pid) AS parts_count
                FROM tb_prices AS pr WHERE pid=:pid
            ORDER BY pr.updated DESC
	");
               $r_2=$listCmd_2->bindValue(':pid', $pid)->queryOne();
            return  $r_2;
        }
    }

//tb_nomenclature_tyre
    public function getPriceById($pid) {
        $db = Yii::$app->db;
        $listCmd = $db->createCommand("
	     SELECT pr.pid, pr.type, pr.name, pr.created, pr.updated,
            (SELECT COUNT(p.id) FROM tb_nomenclature_tyre AS p WHERE p.pid=pr.pid) AS parts_count
                FROM tb_prices AS pr
	    WHERE pr.pid=:pid")->bindValue(':pid', $pid);
        return $listCmd->queryOne();
    }

    static function namePrice($id) {
        $db = Yii::$app->db;
        $namePrice = $db->createCommand("SELECT name FROM tb_prices  WHERE pid='$id'")->bindValue(':pid', $id);
        ;
        $nameP = $namePrice->queryScalar();
        return $nameP;
    }

    static function gettypename($key) {
        $ck = array('1' => 'Шины',
            '2' => 'Диски');
        return $ck[$key];
    }

}
