<?php
/**
 * Created by PhpStorm.
 * User: Chathuranga Sandun
 * Date: 5/26/2016
 * Time: 1:38 PM
 */

//if(isset($_POST['myData'])){
    $obj = json_encode($_POST['myData']);

    $text = json_decode($obj);

        print_r($text[1]->detail);


    //print_r($text->post[0]->detail);


   /* $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
    $txt = $obj[0]->name;
    fwrite($myfile, $txt);
    fclose($myfile);*/






//}




