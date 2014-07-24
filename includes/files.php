<?php
require_once("sdb.php");
$assoc = $_POST['assoc'];
$result = pg_query($dbconn, "SELECT name FROM t_files WHERE assoc='{$assoc}' ORDER BY name ASC");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
$count = round(pg_num_rows($result) / 3);
echo '<div class="tab-pane fade in active" id="u-files">';
echo '<div class="col-sm-3"><ul>';
for ($i = 1; $i <= $count; $i++) {
  $row = pg_fetch_assoc($result);
  echo '<li><a href="' . $row['name'] . '" id="name">' . $row['name'] . '</a><a class="file-option btn btn-danger" id="delete"><i class="glyphicon glyphicon-remove"></i></a><a class="file-option btn btn-success" id="download"><i class="glyphicon glyphicon-cloud-download"></i></a></li>';
}
  echo '</ul></div>';

echo '<div class="col-sm-3"><ul>';
for ($i = 1; $i <= $count; $i++) {
  $row = pg_fetch_assoc($result);
  echo '<li><a href="' . $row['name'] . '" id="name">' . $row['name'] . '</a><a class="file-option btn btn-danger" id="delete"><i class="glyphicon glyphicon-remove"></i></a><a class="file-option btn btn-success" id="download"><i class="glyphicon glyphicon-cloud-download"></i></a></li>';
}
  echo '</ul></div>';

echo '<div class="col-sm-3"><ul>';
  while($row = pg_fetch_assoc($result)){
  echo '<li><a href="#" id="name">' . $row['name'] . '</a><a class="file-option btn btn-danger" id="delete"><i class="glyphicon glyphicon-remove"></i></a><a class="file-option btn btn-success" id="download" href="#"><i class="glyphicon glyphicon-cloud-download"></i></a></li>';
}
echo '</ul></div>';

echo '<div class="col-sm-3 navbar-controls"><ul style="list-style:none" class="text-center">';
  echo '<li><a href="#" class="btn btn-lg btn-info">upload</a></li>';
  echo '<li><a href="#" class="btn btn-lg btn-warning">submit</a></li>';
echo '</ul></div>';
echo '</div>';
// start of lesson files
echo '<div class="tab-pane fade" id="l-files"></div>';

