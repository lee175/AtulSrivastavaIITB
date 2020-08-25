<?php
require("./dbConn.php");
$db = new Database();

class Conference
{
    public $title;
    public $people;
    public $date;
    public $conn;

    function __construct($t, $p, $d, $db)
    {
        $this->title = $t;
        $this->people = $p;
        $this->date = $d;
        $this->conn = $db->DBConn();
    }

    public function submit()
    {
        $sql = "INSERT INTO `conferences` (`title`, `people`, `date`)
        VALUES (?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('sss', $this->title, $this->people, $this->date);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

// get authorised data
$title = $_POST["title"];
$people = $_POST["people"];
$date = $_POST["date"];

$conference = new Conference($title, $people, $date, $db);

if ($conference->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}

$db->DBDisconnect();
