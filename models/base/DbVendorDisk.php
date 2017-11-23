<?php

namespace app\models\base;

use Yii;


class DbVendorDisk extends \yii\db\ActiveRecord
{
    private $db;
    
    public function init() {
        $this->db=Yii::$app->db;
    }

        public static function tableName()
    {
        return 'db_vendor_disk';
    }

    public function rules()
    {
        return [
            [['vendor'], 'required'],
            [['vendor'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_vendor' => 'Id Vendor',
            'vendor' => 'Vendor',
        ];
    }
    
    //Получить производителя
    public function getVendor_disk_id($id){
         $vendor_disk = $this->db->createCommand('SELECT vendor FROM db_vendor_disk WHERE id_vendor=:id')
                 ->bindValue(':id', $id)
                 ->queryScalar();
         return $vendor_disk;
    }
    
    //Получить всех производителей список
     public function all_vendor_disk(){
         $all_vendor_disk = $this->db->createCommand('SELECT id_vendor,vendor FROM db_vendor_disk GROUP BY id_vendor ORDER BY vendor')->queryAll();
         
         foreach ($all_vendor_disk as $key => $value) {
             $all_list[$value['id_vendor']]=$value['vendor'];
         }
         return $all_list;
    }
}
