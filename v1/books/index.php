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

$result = $post->getBooks();
$num = $result->rowCount();


//check if there is book 
if($num > 0) {
    $books_arr = array();
    $books_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $books = array(
            'id' => $id,
            'name' => $name,
            'isbn' => $isbn,
            'authors' => [$authors],
            'number_of_pages' => $number_of_pages,
            'publisher' => $publisher,
            'country' => $country,
            'release_date' => $release_date
        );

        array_push($books_arr['data'], $books);
}

echo json_encode($books_arr);
} else {
echo json_encode(
    array()
);
}
