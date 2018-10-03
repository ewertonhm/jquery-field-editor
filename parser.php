<?php
require_once 'classes/DB.php';

function sanitize($dirty){
    return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}

$db = DB::get_instance();

if($_POST){
    $resp = ['success'=>false];
    $required = ['id','field'];
    foreach($required as $key){
        if(!isset($_POST{$key})){
            echo json_encode($resp);
            die();
        }
    }
}

$table = 'contacts';
$id = sanitize($_POST['id']);
$field = sanitize($_POST['field']);
$value = sanitize($_POST['value']);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

