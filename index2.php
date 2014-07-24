<?php
# Validate session
require_once("includes/session.php");
$user_id=validate_session();
$stoken=$_GET["stoken"];
print "stoken $stoken";
$dock_id=validate_session_action("{$stoken}");
print "after";


$iframe_url="https://dev.cloud2class.com:6080/vnc_auto.html?token={$stoken}";

# construct URL

?>
<html>
<head>
<title>this</title>
</head>
<body bgcolor=white>
<div style='position: absolute;  top: 0px; bottom: 0px; width: 100%; margin-bottom: 50px;'>
<?php
print "<iframe src='{$iframe_url}' width=100% height=100% ></iframe>";
?>
</div>
<div style='position: absolute; bottom: 0px; background-color: #caca1a; height: 50px; width: 100%;'>
<?php
print "I have dock_id: $dock_id and user_id $user_id";
?>
footer
</div>

</body>
</html>

