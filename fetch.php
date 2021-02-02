<?php

//fetch.php;

$data = array();

if(isset($_GET["query"]))
{
 
  require_once('connectr.php');

 
 $query = "
 SELECT medicine_name FROM medicine_tbl 
 WHERE medicine_name LIKE '%".$_GET["query"]."%' 
 ORDER BY medicine_name ASC 
 LIMIT 15
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row["medicine_name"];
 }
}

echo json_encode($data);

?>
