<?php
include("../../path.php");
include(ROOT_PATH . '/app/database/Database.php');
include(ROOT_PATH . '/models/Post.php');

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type');


$database = new Database();
$db = $database->join();

$post = new Post($db);


$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
 
if($post->destroyBook()) {
    echo json_encode(
        array('message' => 'the book was Delete successfully ')
    );
}else{
    echo json_encode(
        array('message' => 'Book Not Deleted')
    );
}

