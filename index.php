<?php

// Khởi tạo session PHP nếu chưa khởi tạo
if (session_id() === '')
    session_start();

require './app/init.php';

$app = new App();
