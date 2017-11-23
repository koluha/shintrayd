<?php

namespace app\models\base;

use Yii;

class TbNomenclature extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'tb_nomenclature';
    }

    public function rules() {
        return [
            [['pid'], 'integer'],
            [['in'], 'string'],
            [['b2b_price', 'petail_price', 'min_price'], 'string'],
            [['nomenclature'], 'string', 'max' => 250],
            [['product_code'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'pid' => 'Прайс',
            'in' => 'База',
            'nomenclature' => 'Наименование продукта',
            'product_code' => 'Код продукта',
            'b2b_price' => 'Цена B2B руб.',
            'petail_price' => 'Розничная цена руб.',
            'min_price' => 'Мин цена интернет руб.',
        ];
    }

    //Получить производителя
    public function getprice_id($id) {
        $vendor_disk = $this->db->createCommand('SELECT name FROM tb_prices WHERE pid=:id')
                ->bindValue(':id', $id)
                ->queryScalar();
        return $vendor_disk;
    }

    //Получить всех производителей список
    public function all_price() {
        $all_vendor_disk = $this->db->createCommand('SELECT pid,name FROM tb_prices GROUP BY pid ORDER BY name')->queryAll();

        foreach ($all_vendor_disk as $key => $value) {
            $all_list[$value['pid']] = $value['name'];
        }
        return $all_list;
    }

    //Получаем из код из номенклатуры, ищем с бд
    //Если найдено значит в бд указана это номенклатура
    public function in_base($code, $id_nomenclature, $in) {
        if ($in) {
            if ($code) {
                $text = '';
                $b_disk = $this->db->createCommand("SELECT id FROM db_specif_disk WHERE  code_product='$code'")->queryOne();
                if ($b_disk) {
                    $this->db->createCommand("UPDATE tb_nomenclature SET tb_nomenclature.in='БД диски' WHERE id = $id_nomenclature")->execute();
                    $text.='БД диски';
                }
                $b_tire = $this->db->createCommand("SELECT id FROM db_specif_tire WHERE  code_product='$code'")->queryOne();
                if ($b_tire) {
                    $this->db->createCommand("UPDATE tb_nomenclature SET tb_nomenclature.in = 'БД шины' WHERE id = $id_nomenclature")->execute();
                    $text.='БД шины';
                }

                return $text;
            }
        }
    }

}
