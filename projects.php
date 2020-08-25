<?php
require("./dbConn.php");
$db = new Database();

class Projects
{
    public $title;
    public $place;
    public $role;
    public $duration;
    public $sdate;
    public $edate;
    public $conn;

    function __construct($t, $p, $r, $d, $sd, $ed, $db)
    {
        $this->title = $t;
        $this->place = $p;
        $this->role = $r;
        $this->duration = $d;
        $this->sdate = $sd;
        $this->edate = $ed;
        $this->conn = $db->DBConn();
    }

    public function submit()
    {
        $sql = "INSERT INTO `projects` (`title`, `place`,`role`,`duration`, `date_start`, `date_end`)
        VALUES (?,?,?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssssss', $this->title, $this->place, $this->role, $this->duration, $this->sdate, $this->edate);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

// get authorised data
$title = $_POST["title"];
$place = $_POST["place"];
$role = $_POST["role"];
$duration = $_POST["duration"];
$sdate = $_POST["sdate"];
$edate = $_POST["edate"];

$project = new Projects($title, $place, $role, $duration, $sdate, $edate, $db);

if ($project->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}

$db->DBDisconnect();
