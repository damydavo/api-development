<?php
include("../../path.php");
include(ROOT_PATH . '/app/database/Database.php');
include(ROOT_PATH . '/models/Post.php');

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type');


$database = new Database();
$db = $database->join();

$post = new Post($db);


$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;

$post->name = $data->name;
$post->isbn = $data->isbn;
$post->authors = $data->authors;
$post->number_of_pages = $data->number_of_pages;
$post->publisher = $data->publisher;
$post->country = $data->country;
$post->release_date = $data->release_date;
 
if($post->updateBook()) {
    echo json_encode(
        array('message' => 'the book was updated successfully ')
    );
}else{
    echo json_encode(
        array('message' => 'Post Not Created')
    );
}

