<?php

namespace app\models\base;

use Yii;

class Podbor extends \yii\db\ActiveRecord {

    private $db;

    public function init() {
        $this->db = Yii::$app->db;
    }

    public function Vendors() {
        $r[''] = 'Выберите производителя';
        $vendors = $this->db->createCommand('SELECT DISTINCT vendor FROM podbor_shini_i_diski ORDER BY vendor ASC')->queryAll();
        foreach ($vendors as $key => $vendor) {
            $r[$vendor['vendor']] = $vendor['vendor'];
        }
        return $r;
    }

    // Получить список марок
    public function Mark($vendor_id = null) {
        if ($vendor_id) {
            $params = [':vendor' => $vendor_id];
            $marks = $this->db->createCommand('SELECT DISTINCT car FROM podbor_shini_i_diski WHERE vendor=:vendor ORDER BY car ASC')
                    ->bindValues($params)
                    ->queryAll();

            $response[] = 'Выберете марку';
            foreach ($marks as $mark) {
                $response[$mark['car']] = $mark['car'];
            }
            return $response;
        } else {
            return [];
        }
    }

    // Получить список Года
    public function Year($vendor_id = null, $mark_id = null) {
        if ($vendor_id && $mark_id) {
            $params = [
                ':vendor' => $vendor_id,
                ':car' => $mark_id
            ];
            $years = $this->db->createCommand('SELECT DISTINCT year FROM podbor_shini_i_diski WHERE vendor=:vendor AND car=:car ORDER BY year ASC')
                    ->bindValues($params)
                    ->queryAll();

            $response[] = 'Выберете год выпуска';
            foreach ($years as $year) {
                $response[$year['year']] = $year['year'];
            }
            return $response;
        } else {
            return [];
        }
    }

    public function Modification($vendor_id = null, $mark_id = null, $year_id = null) {
        if ($vendor_id && $mark_id && $year_id) {
            $params = [
                ':vendor' => $vendor_id,
                ':car' => $mark_id,
                ':year' => $year_id
            ];
            $modifications = $this->db->createCommand('SELECT DISTINCT modification FROM podbor_shini_i_diski WHERE vendor=:vendor AND car=:car AND year=:year   ORDER BY modification ASC')
                    ->bindValues($params)
                    ->queryAll();
            $response[] = 'Выберете модификацию';
            foreach ($modifications as $modification) {
                $response[$modification['modification']] = $modification['modification'];
            }
            return $response;
        } else {
            return [];
        }
    }

    public function LastPodbor($data) {

        if ($data['vendor'] && $data['mark'] && $data['year'] && $data['modification']) {

            $size = Yii::$app->db->createCommand('SELECT DISTINCT  * FROM podbor_shini_i_diski WHERE vendor=:vendor AND car=:mark AND year=:year AND modification=:modification')
                    ->bindValue(':vendor', $data['vendor'])
                    ->bindValue(':mark', $data['mark'])
                    ->bindValue(':year', $data['year'])
                    ->bindValue(':modification', $data['modification'])
                    ->queryAll();
            return $size;
        } else {
            throw new Exception('Ошибка в получении данных');
        }
    }

}
