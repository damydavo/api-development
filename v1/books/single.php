<?php
include("../../path.php");
include(ROOT_PATH . '/app/database/Database.php');
include(ROOT_PATH . '/models/Post.php');

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

//instantiate database
$database = new Database();
$db = $database->join();
//instantiate post

$post = new Post($db);

//get the id
if(isset($_GET['id'])){
    $post->id = $_GET['id'];
} else{
    die();
}

$post->singleBook();

$post_arr = array(
    'id' => $post->id,
    'name' => $post->name,
    'isbn' => $post->isbn,
    'authors' => [$post->authors],
    'number_of_pages' => $post->number_of_pages,
    'publisher' => $post->publisher,
    'country' => $post->country,
    'release_date' => $post->release_date
);



//json
echo(json_encode($post_arr));
