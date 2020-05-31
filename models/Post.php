<?php
class Post {
    private $conn;
    private $table = "books";

    public $id;
    public $name;
    public $isbn;
    public $authors;
    public $number_of_pages;
    public $publisher;
    public $country;
    public $release_date;
    
    public function __construct($db){
    $this->conn = $db;
}

//Read the properties of books
public function getBooks() {
    $query = "SELECT * FROM $this->table ORDER BY id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
}

//get a single book
public function singleBook() {
    $query = " SELECT * FROM $this->table WHERE id = ? LIMIT 0,1 ";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->name = $row['name'];
    $this->name = $row['isbn'];
    $this->authors = $row['authors'];
    $this->number_of_pages = $row['number_of_pages'];
    $this->publisher = $row['publisher'];
    $this->country = $row['country'];
    $this->release_date = $row['release_date'];
}
//Create a book
public function createBook() {
    $query = " INSERT INTO "  . $this->table . ' SET 
    name = :name,
    isbn = :isbn,
    authors = :authors,
    number_of_pages = :number_of_pages,
    publisher = :publisher,
    country = :country,
    release_date = :release_date';
    
    $stmt = $this->conn->prepare($query);

    //prevent malicious data entry
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->isbn = htmlspecialchars(strip_tags($this->isbn));
    $this->authors = htmlspecialchars(strip_tags($this->authors));
    $this->number_of_pages = htmlspecialchars(strip_tags($this->number_of_pages));
    $this->publisher = htmlspecialchars(strip_tags($this->publisher));
    $this->country = htmlspecialchars(strip_tags($this->country));
    $this->release_date = htmlspecialchars(strip_tags($this->release_date));

    //bind parameters
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':isbn', $this->isbn);
    $stmt->bindParam(':authors', $this->authors);
    $stmt->bindParam(':number_of_pages', $this->number_of_pages);
    $stmt->bindParam(':publisher', $this->publisher);
    $stmt->bindParam(':country', $this->country);
    $stmt->bindParam(':release_date', $this->release_date);

    
    if($stmt->execute()) {
        return true;
    } else{
        print_r($stmt->error);
}
}

//update a book
public function updateBook() {
    $query = " UPDATE "  . $this->table . ' SET  
    name = :name,
    isbn = :isbn,
    authors = :authors,
    number_of_pages = :number_of_pages,
    publisher = :publisher,
    country = :country,
    release_date = :release_date
    WHERE id = :id';
    
    $stmt = $this->conn->prepare($query);

    //prevent malicious data entry
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->isbn = htmlspecialchars(strip_tags($this->isbn));
    $this->authors = htmlspecialchars(strip_tags($this->authors));
    $this->number_of_pages = htmlspecialchars(strip_tags($this->number_of_pages));
    $this->publisher = htmlspecialchars(strip_tags($this->publisher));
    $this->country = htmlspecialchars(strip_tags($this->country));
    $this->release_date = htmlspecialchars(strip_tags($this->release_date));
    $this->id = htmlspecialchars(strip_tags($this->id));


    //bind parameters
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':isbn', $this->isbn);
    $stmt->bindParam(':authors', $this->authors);
    $stmt->bindParam(':number_of_pages', $this->number_of_pages);
    $stmt->bindParam(':publisher', $this->publisher);
    $stmt->bindParam(':country', $this->country);
    $stmt->bindParam(':release_date', $this->release_date);
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()) {
        return true;
    } else{
        print_r($stmt->error);
}
}


//delete book
public function destroyBook() {
    //query to delete book
    $query = " DELETE FROM  $this->table WHERE id = :id ";
    $stmt = $this->conn->prepare($query);
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()) {
        return true;
    } else{
        print_r($stmt->error);
}
}
}

?>