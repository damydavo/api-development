<?php
include("../path.php");
include(ROOT_PATH . '/app/Database.php');
include(ROOT_PATH . '/models/Post.php');

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

//instantiate a new database connection

$database = new Database();
$db = $database->join();

//instantiate a post
$post = new Post($db);

//php method to get the input datas
$data = json_decode(file_get_contents("php://input"));

//post datas to the books table
$post->name = $data->name;
$post->isbn = $data->isbn;
$post->authors = $data->authors;
$post->number_of_pages = $data->number_of_pages;
$post->publisher = $data->publisher;
$post->country = $data->country;
$post->release_date = $data->release_date;
 
if($post->createBook()) {
    echo json_encode(
        array('message' => 'Book Created Successfully')
    );
}else{
    echo json_encode(
        array('message' => 'Book Not Created')
    );
}

