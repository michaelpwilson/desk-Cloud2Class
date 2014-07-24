<?php
require_once("sdb.php");
$assoc = $_POST['assoc'];
$result = pg_query($dbconn, "SELECT name FROM t_worksheets WHERE assoc='{$assoc}'");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
echo '<div class="row">';
  while ($row = pg_fetch_assoc($result)) {
  echo '<div class="col-md-1"><a href="#">' . $row['name'] . '</a></div>';
  }
echo '</div>';
