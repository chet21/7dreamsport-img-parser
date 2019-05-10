<?php

include __DIR__.'/phpQuery-onefile.php';


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

$res = get_product_link('https://7dreamsport.com.ua/g36634429-zhenschiny');
$i = 0;
mkdir('result');

foreach ($res as $item) {
    $i++;
//    $x = get_img($item);
//   echo '<img src="'.$x.'">';
//    $phat = './result/'.$i.'.jpg';

    $cl = curl_init($item);
    
}

echo 'Copy complit';





