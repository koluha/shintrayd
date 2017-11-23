<?php

namespace app\components;

use yii\base\Component;
use yii\helpers\Html;

class MyhelperComponent extends Component {

    public function translitUrl($str) {
        $tr = array(
            "А" => "a", "Б" => "b", "В" => "v", "Г" => "g",
            "Д" => "d", "Е" => "e", "Ж" => "j", "З" => "z", "И" => "i",
            "Й" => "y", "К" => "k", "Л" => "l", "М" => "m", "Н" => "n",
            "О" => "o", "П" => "p", "Р" => "r", "С" => "s", "Т" => "t",
            "У" => "u", "Ф" => "f", "Х" => "h", "Ц" => "ts", "Ч" => "ch",
            "Ш" => "sh", "Щ" => "sch", "Ъ" => "", "Ы" => "yi", "Ь" => "",
            "Э" => "e", "Ю" => "yu", "Я" => "ya", "а" => "a", "б" => "b",
            "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ж" => "j",
            "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
            "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
            "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h",
            "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "y",
            "ы" => "yi", "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya",
            " " => "_", "." => "", "/" => "_"
        );

        if (preg_match('/[^A-Za-z0-9_\-]/', $str)) {
            $str = strtr($str, $tr);
            $str = preg_replace('/[^A-Za-z0-9_\-]/', '', $str);
        }

        return $str;
    }

//Из заголовка делаем два заголовка массива
    public function title_two($str) {
        $string = trim($str);
        $text = explode("/", $string);
        return $text;
    }

    public function obrez_text($string) {
//уберём все html
        $string = strip_tags($string);
//Теперь обрежем его на определённое количество символов:
        $string = substr($string, 0, 500);
//Затем убедимся, что текст не заканчивается восклицательным знаком, запятой, точкой или тире:
        $string = rtrim($string, "!,.-");
//Напоследок находим последний пробел, устраняем его и ставим троеточие:
        $string = substr($string, 0, strrpos($string, ' '));
        return $string . "… ";
    }

    public function tyre_profil($string) {

        if ($string == 'Полнопрофильная') {  //Из "Полнопрофильная" в  "—"
            $string = '—';
            return $string;
            exit();
        }
        if (preg_match('/^гр\./', $string)) {
            $string = preg_replace('/^гр\./', '', $string);   //Из "гр. 09.50" в  "09.50"
            return trim($string);
            exit();
        }
        return $string;
    }

//До загрузки прайса преобрразовать столбец diametr
    public function get_podbor_tyre($str) {
        $string = trim($str);
        $string = str_replace("/", " ", $string);
        $arr = explode(' ', $string);
        $value = ['shirina_tyre' => $arr[0], 'profil_tyre' => $arr[1], 'diametr_tyre' => $arr[2],];

        return $value;
    }

//До загрузки прайса преобрразовать столбец diametr
    public function get_pr_diametr($diametr) {
        $diametr = trim($diametr);
        $pos = strpos($diametr, '/');
        $diametr = substr($diametr, 0, $pos);
        return trim($diametr);
    }

//До загрузки прайса преобрразовать столбец diametr_width
    public function get_pr_diametr_width($diametr) {
        $diametr = trim($diametr);
        $pos = strpos($diametr, '/');
        $diametr_width = substr($diametr, $pos + 1);
        $diametr_width = str_ireplace("j", " ", $diametr_width);
        return trim($diametr_width);
    }

//для поля pcd только два значения, третье игнор
    static function arr_parts($str) {
        $str = str_ireplace("PCD", " ", $str);
        $string = trim($str);
        $arr = explode('x', $string);

        $value = ['pcd' => $arr[0], 'x_pcd' => $arr[1]];

        return $value;
    }

    public function get_pr_pcd($str) {
        $pcd = self::arr_parts($str);
        return trim($pcd['pcd']);
    }

    public function get_pr_x_pcd($str) {
        $x_pcd = self::arr_parts($str);
        return trim($x_pcd['x_pcd']);
    }

    public function get_pr_co($co) {
        $co = trim($co);
        $co = str_ireplace("ЦО", " ", $co);
        return trim($co);
    }

    public function get_pr_vilet($vilet) {
        $vilet = trim($vilet);
        $vilet = str_ireplace("ET", " ", $vilet);
        return trim($vilet);
    }

    public function get_pr_runflat($str) {
        $str = trim($str);
        if ((preg_match("/\bROF\b/i", $str)) or (preg_match("/\bRFT\b/i", $str)) or (preg_match("/\bRun Flat\b/i", $str)) or (preg_match("/\bRunFlat\b/i", $str))) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_pr_thorns($str) {
        $str = trim($str);
        if (preg_match("/Ш/i", $str)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_pr_disk_type($str) {
        $str = trim($str);
        if ($str == 'Литой') {
            return 'Litoj';
        } elseif ($str == 'Стальной') {
            return 'Stalnoy';
        }
    }

    //Хелпер подбор дисков 
    public function podbor_diametr_width($string) {
        //5*114,3
        //убрать запятую и разместить в массив
        $string = trim($string);
        $string = str_ireplace(",", ".", $string);

        //Стереть ЕТ
        $string = preg_replace('/\ET.*/', '', $string);   //Из "7 x 16 ET47" в  "7 x 16 E"
        $string = str_ireplace("E", " ", $string);    //Убрать Е
        $string = str_ireplace(" ", "", $string);     //убрать все пробелы

        $string = explode("x", $string);
        $data = [];
        $data['width'] = trim($string[0]);
        $data['diametr'] = trim($string[1]);

        //  $text = explode("*", $pcd);
        //  $data['pcd'] = $text[0];
        //  $data['x_pcd'] = $text[1];

        return $data;
    }

    public function podbor_point($string) {
        $string = str_ireplace("мм", " ", $string);
        $string = trim($string);
        $string = str_ireplace(",", ".", $string);
        return $string;
    }

    public function podbor_pcd($string) {
        $string = trim($string);

        $arr = explode("*", $string);

        $data['pcd'] = $arr[0];
        $data['x_pcd'] = $arr[1];

        return $data;
    }

    //В прайсе 7.0 в базе подбора 7
    public function podbor_j($string) {
        $var = strval($string);
        if (ctype_digit($var)){
            return $string.'.0';
        }  else {
            return $string;
        }
        
    }

}
