<?php
 $query="select u.max_containers, a.max_class, a.name, a.organisation from t_account a, t_user u where a.account_id=u.account_id and u.user_id={$_SESSION['user_id']}";
 $result=pg_query($dbconn,$query);
 $line = pg_fetch_assoc($result);
// $session_type=$_GET["type"];
 $console_ref=$_GET["nodekey"];
 // # Validate session
 // require_once("includes/session.php");
 // $user_id=validate_session();
 // $stoken=$_GET["stoken"];
 // print "stoken $stoken";
 // $dock_id=validate_session_action("{$stoken}");
 // print "after";

# construct iframe
$session_type = "console";
$root = "https://dev.cloud2class.com/";
if ($session_type == "console")
{
  $iframe_url=$root . "viewcons/?{$console_ref}";
}
elseif ($session_type == "desktop")
{
  $iframe_url=$root . ":6080/vnc_auto.html?token={$console_ref}";
}
elseif ($session_type == "resource")
{
   $iframe_url=$root . "viewres/?{$console_ref}";
}
?>
<!DOCTYPE html>
<html class="container" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Cloud2Class">
    <title>Cloud2Class Desktop Environment</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/the-big-picture.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tinyscrollbar.css" type="text/css" media="screen"/>
</head>

<body class="row">
    <nav class="navbar navbar-fixed-bottom navbar-inverse" style="height:54px" role="navigation" ng-app="desk">
        <div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

<div ng-controller="MainCtrl" class="collapse navbar-collapse navbar-ex1-collapse">
<div class="navbar-left col-sm-10">
<ul class="nav nav-tabs" role="tablist" style="border-bottom:0">
    <li ng-repeat="tab in tabs">
      <a href="#{{tab.name}}" role="tab" data-toggle="tab">{{tab.name}}</a>
    </li>
   <li><a href="" class="close-tabs btn btn-danger" style="display:none;"><b class="glyphicon glyphicon-remove"></b></a></li>
</ul>
<div class="tab-content" style="margin-left:-25px">
<div class="tab-pane fade in active" id="files" style="height:150px">
<div class="col-sm-3">
 <ul>
  <li ng-repeat="item in files"><a href="#">{{item.name}}</a></li>
 </ul>
</div>
</div>
<div class="tab-pane fade in active" id="worksheets" style="height:150px">
<div class="col-sm-3">
 <ul>
  <li ng-repeat="item in worksheets"><a href="#">{{item.name}}</a></li>
 </ul>
</div>
</div>


</div>
</div>
<div class="navbar-right col-sm-2" style="margin-top:-5px">
<img src="images/c2c-logo.png" class="img-responsive" style="height: 62px; float:right">
</div>
        </div>
    </nav>
<div class="main_container col-xs-12">
<div class="console-toolbar">
<div class="btn-group toolbar-options">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    New Console <span class="caret"></span>
  </button>
  <div class="dropdown-menu" role="menu">
   <img style="width:100%;" src="images/console-buttons.jpg" />
  </div>
</div>
</div>
<iframe src="<?php echo $iframe_url; ?>" allowfullscreen></iframe>
</div>
<div class="navbar navbar-inverse navbar-fixed-bottom" id="files-text" style="display: none;"></div>
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
       <script src="js/jquery.fileDownload.js"></script>
       <script src="js/angular.min.js"></script>
       <script src="js/angular-route.js"></script>
       <script src="js/controllers.js"></script>
       <script src="js/jquery-ui.min.js"></script>
           <script src="js/cloud2class.js"></script>
</body>

</html>
