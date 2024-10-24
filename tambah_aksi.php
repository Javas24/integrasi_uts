<?php
$data = [
    'nama' => $_POST['nama'],
    'tim_id' => $_POST['tim_id'],
    'negara' => $_POST['negara']
];

$options = [
    'http' => [
        'header'  => "Content-Type: application/json",
        'method'  => 'POST',
        'content' => json_encode($data),
    ]
];
$context  = stream_context_create($options);
$result = file_get_contents('http://localhost/testugas6/pembalap', false, $context);

header('Location: tampilmysql.php');
?>
