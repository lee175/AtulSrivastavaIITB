<?php
require("./dbConn.php");
$db = new Database();

class Article
{
    public $title;
    public $author;
    public $date;
    public $conn;

    function __construct($t, $a, $d, $db)
    {
        $this->title = $t;
        $this->author = $a;
        $this->date = $d;
        $this->conn = $db->DBConn();
    }

    public function submit()
    {
        $sql = "INSERT INTO `articles` (`title`, `authors`, `date`)
        VALUES (?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('sss', $this->title, $this->author, $this->date);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

// get authorised data
$title = $_POST["title"];
$author = $_POST["author"];
$date = $_POST["date"];

$article = new Article($title, $author, $date, $db);

if ($article->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}

$db->DBDisconnect();
