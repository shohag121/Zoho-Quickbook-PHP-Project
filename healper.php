<?php
/**
 * All healper function goes here
 */


 function dd($args){
    die(var_dump(
        $args
    ));
 }

 function pr($arg){
    echo '<code>';
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
    echo '</code>';
     
 }