<?php
function show($stuff){
    echo '<pre>';
    print_r($stuff);
    echo '<pre>';
}
function checkError(){
    if(isset($_SESSION['error']) && $_SESSION['error'] !=""){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}
//thêm một dấu gạch chéo ngược (\) phía trước các ký tự là dấu nháy kép, dấu nháy đơn và dấu gạch chéo ngược trong chuỗi.
function esc($data){
    return addslashes($data);
}
