<?php
require("./dbConn.php");
$db = new Database();

class Awards
{
    public $title;
    public $description;
    public $date;
    public $conn;

    function __construct($t, $desc, $d, $db)
    {
        $this->title = $t;
        $this->description = $desc;
        $this->date = $d;
        $this->conn = $db->DBConn();
    }

    public function submit()
    {
        $sql = "INSERT INTO `awards` (`title`, `description`, `date`)
        VALUES (?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('sss', $this->title, $this->description, $this->date);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

// get authorised data
$title = $_POST["title"];
$desc = $_POST["desc"];
$date = $_POST["date"];

$award = new Awards($title, $desc, $date, $db);

if ($award->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}

$db->DBDisconnect();
