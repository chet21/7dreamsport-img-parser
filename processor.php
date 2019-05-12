<?php

include __DIR__.'/phpQuery-onefile.php';
include __DIR__.'/function.php';

if(!empty($_POST['link'])){

    $res = get_product_link($_POST['link']);

    if(!is_dir('result')){
        mkdir('result');
    }

    if(!is_dir('zip_result')){
        mkdir('zip_result');
    }

    $i = 0;
    foreach ($res as $item) {
        $i++;
        $x = get_img($item);
        copy($x, __DIR__.'/result/'.$i.'.jpg');
    }

    $zip = new ZipArchive();
    $zip->open('zip_result/result.zip', ZipArchive::CREATE);

    if ($handle = opendir('result')) {

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $zip->addFile('result/'.$entry, 'zip_result/'.$entry);
            }
        }
        closedir($handle);
    }

    $zip->close();

    unset($_POST['link']);

    echo 'Copy complit'.PHP_EOL;
    echo '<a href="/">start again -></a>'.PHP_EOL;
    echo '<a href="zip_result/result.zip">Download result archive</a>'.PHP_EOL;

}else{
    header('location: /');
}