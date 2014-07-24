<?php
$db_host="kahlua-2";
$db_port="5433";
$db_name="kahlua-store";
$db_user="storeuser";
$db_pw="DK56NHF82N";

$dbconn = pg_connect("host=$db_host port=$db_port dbname=$db_name user=$db_user password=$db_pw") or die(pg_last_error());
