<?php
require("./dbConn.php");
$db = new Database();

class Publications
{
    public $title;
    public $authors;
    public $journal;
    public $desc;

    public $conn;

    function __construct($t, $a, $j, $d, $db)
    {
        $this->title = $t;
        $this->authors = $a;
        $this->journal = $j;
        $this->desc = $d;
        $this->conn = $db->DBConn();
    }

    public function submit()
    {
        $sql = "INSERT INTO `publications` (`title`, `authors`, `journal`, `description`)
        VALUES (?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssss', $this->title, $this->authors, $this->journal, $this->desc,);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

// get authorised data
$title = $_POST["title"];
$authors = $_POST["authors"];
$journal = $_POST["journal"];
$description = $_POST["description"];

$publication = new Publications($title, $authors, $journal, $description, $db);

if ($publication->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}

$db->DBDisconnect();
