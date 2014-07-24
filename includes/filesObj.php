<?php
require_once("sdb.php");
$result = pg_query($dbconn, "SELECT name FROM t_files ORDER BY name ASC");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
$count = round(pg_num_rows($result));
echo $count;
