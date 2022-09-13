<?php 
header('Content-Type: application/json; charset=utf8');
http_response_code($data['status']);
echo json_encode($data['message'], JSON_UNESCAPED_UNICODE);