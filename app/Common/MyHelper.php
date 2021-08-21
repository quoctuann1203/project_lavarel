<?php

namespace App\Common;

use Illuminate\Support\Facades\Config;

class MyHelper
{
    public static function priceFormat($value){
        return number_format($value, 0,'.',',');
    }
    public static function getConfig(){
        return Config::get('my_config');
    }

    public static function getSelect($name, $data, $value){
        $options = '';
        
        foreach($data as $key=>$item){
      
            $selected = $value.'' == $key.'' ? 'selected' : '';
            $options .= '<option '.$selected.' value="'.$key.'">'.$item.'</option>';
        }
        return '<select class="form-select" name="'.$name.'">'.$options.'</select>';
    }
}