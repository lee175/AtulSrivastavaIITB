<?php 

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $stmt = "SELECT title, authors, date FROM articles ORDER BY id DESC;";
  $result = $db->query($stmt);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "$row[title], $row[authors], $row[date]";
    }
  }
}

?>