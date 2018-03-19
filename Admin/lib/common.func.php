<?php
/**
 * Created by PhpStorm.
 * User: tete
 * Date: 2017/2/9
 * Time: 22:16
 */
header("content-type:text/html;charset=utf-8");
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}