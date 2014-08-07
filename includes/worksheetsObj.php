<?php
require_once("sdb.php");
$result = pg_query($dbconn, "SELECT * FROM t_worksheets ORDER BY name ASC");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
$count = round(pg_num_rows($result));
header('Content-Type: application/json');
$new = array();
 while($row = pg_fetch_assoc($result)){
   $new[] = $row;
 }
//$new = pg_fetch_assoc($result);
echo json_encode($new);
