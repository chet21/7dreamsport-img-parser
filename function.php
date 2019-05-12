<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.05.2019
 * Time: 17:52
 */

function get_img($product_link){

    $html = file_get_contents($product_link);
    $pq = \phpQuery::newDocument($html);
    $img = $pq->find('.cs-pictures__img');
    $img_link = pq($img)->attr('src');
    $res = ($img_link) ?: null;
    return $res;
}


function get_product_link($category_link){

    $html = file_get_contents($category_link);
    $pq = phpQuery::newDocument($html);
    $list = $pq->find('.cs-page__content-wrap a');
    $arr_list = [];

    foreach ($list as $item){
        $link = pq($item)->attr('href');
        if(preg_match('/^http/', $link)){
            $arr_list[] = $link;
        }
    }
    $arr_list = array_unique($arr_list);
    return $arr_list;
}

function clear_dir($dir){

    if ($handle = opendir($dir)) {

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                unlink($dir.'/'.$entry);
            }
        }
        closedir($handle);
    }
}

function check_dir($dir){

    $result = [];

    if ($handle = opendir($dir)) {

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $result[] = $entry;
            }
        }
        closedir($handle);
    }

    return $result;
}