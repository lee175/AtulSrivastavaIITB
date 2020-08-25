<?php
require("./dbConn.php");
$db = new Database();

class Students
{
    public $title;
    public $name;
    public $rollNumber;
    public $degree;
    public $date;
    public $avatar;

    public $conn;

    function __construct($t, $n, $r, $deg, $d, $a, $db)
    {
        $this->title = $t;
        $this->name = $n;
        $this->rollNumber = $r;
        $this->degree = $deg;
        $this->date = $d;
        $this->avatar = $a;
        $this->conn = $db->DBConn();
    }

    public function submit()
    {
        $sql = "INSERT INTO `students` (`name`, `rollnumber`,`degree`,`title`,`date`,`avatar`)
        VALUES (?,?,?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssssss', $this->name, $this->rollNumber, $this->degree, $this->title, $this->date, $this->avatar,);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


class Avatar
{
    public $file;
    public $target_file;
    public $location;
    public $allowed_size;
    public $type;

    function __construct($f)
    {
        // array of "name", "size, "type", "error"
        $this->file = $f;

        $this->type = "others";
        $this->location = "images/";
        $this->allowed_size = 12000;
        $this->target_file = $this->location . basename($this->file["name"]);
    }

    public function type()
    {
        $this->type = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));
        if ($this->type === "jpg" || $this->type === "png" || $this->type === "jpeg") {
            return true;
        } else {
            return false;
        }
    }

    public function duplicate()
    {
        if (file_exists($this->target_file)) {
            return true;
        } else {
            return false;
        }
    }

    public function upload()
    {
        if (move_uploaded_file($this->file["tmp_name"], $this->target_file)) {
            return $this->target_file;
        } else {
            return false;
        }
    }
}

// // get authorised data
$file = $_FILES["avatarlocation"];
$title = $_POST["title"];
$name = $_POST["name"];
$rollnumber = $_POST["rollnumber"];
$degree = $_POST["degree"];
$date = $_POST["date"];


$avatar = new Avatar($file);
// Check for consitions if file already exists and then
$uploaded = $avatar->upload();
if ($uploaded != false) {

    $student = new Students($title, $name, $rollnumber, $degree, $date, $uploaded, $db);

    if ($student->submit() === TRUE) {
        echo "New recordasdasd created successfully";
    } else {
        echo "Error: ";
    }
} else {
    echo ("not uploaded");
}







// Check file size
// if ($_FILES["avatarlocation"]["size"] > 500000) {
//     echo "Sorry, your file is too large.<br>";
//     $uploadOk = 0;
// } else {
//     echo "image size is okay.<br>";
// }

// // Allow certain file formats
// if (
//     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     && $imageFileType != "gif"
// ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
//     // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }


$db->DBDisconnect();
