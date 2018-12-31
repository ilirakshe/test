<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 31.12.2018
 * Time: 3:50
 */

define ('ROOT', dirname(__FILE__) );

function binarySearchByKey($file, $index){
    $handle = fopen($file, "r");
    while(!feof($handle)){
        $string = fgets($handle, 4000);
        mb_convert_encoding($string, 'cp1251');
        $explodedstring = explode('\x0A', $string);

        array_pop($explodedstring);
        foreach ($explodedstring as $key => $value) {
            $arr[] = explode('\t', $value);

            $starting = 0;
            $finish = count($arr) -1;

            while($starting <= $finish) {
               $get_middle = floor(($starting + $finish) / 2);
               $strnatcmp = strnatcmp($arr[$get_middle][0], $index);

               if ($strnatcmp > 0) {
                   $finish = $get_middle - 1;
               } elseif ($strnatcmp < 0){
                   $starting = $get_middle + 1;

               } else {
                   return $arr[$get_middle][1];
               }


            }


        }




    }
return 'undef';

}

