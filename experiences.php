<?php
require("./dbConn.php");
$db = new Database();

class Experiences
{
    public $position;
    public $desc;
    public $sdate;
    public $edate;
    public $conn;

    function __construct($p, $d, $sd, $ed, $db)
    {
        $this->position = $p;
        $this->desc = $d;
        $this->sdate = $sd;
        $this->edate = $ed;
        $this->conn = $db->DBConn();
    }

    public function submit()
    {
        $sql = "INSERT INTO `experiences` (`position`, `description`, `date_start`, `date_end`)
        VALUES (?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssss', $this->position, $this->desc, $this->sdate, $this->edate);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

// get authorised data
$position = $_POST["position"];
$desc = $_POST["desc"];
$sdate = $_POST["sdate"];
$edate = $_POST["edate"];

$experience = new Experiences($position, $desc, $sdate, $edate, $db);

if ($experience->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}

$db->DBDisconnect();
