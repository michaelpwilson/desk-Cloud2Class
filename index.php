<?php
 $query="select u.max_containers, a.max_class, a.name, a.organisation from t_account a, t_user u where a.account_id=u.account_id and u.user_id={$_SESSION['user_id']}";
 $result=pg_query($dbconn,$query);
 $line = pg_fetch_assoc($result);
 print $line['name'];
 // # Validate session
 // require_once("includes/session.php");
 // $user_id=validate_session();
 // $stoken=$_GET["stoken"];
 // print "stoken $stoken";
 // $dock_id=validate_session_action("{$stoken}");
 // print "after";

# Validate the action via an stoken

# Are we console or desktop: database query

$session_type="console";
$console_ref="dummy";
# construct iframe
if ($session_type == "console")
{
  $iframe_url="https://dev.cloud2class.com/shell/?{$console_ref}";
}
elseif ($session_type == "desktop")
{
  $iframe_url="https://dev.cloud2class.com:6080/vnc_auto.html?token={$stoken}";
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
    <nav class="navbar navbar-fixed-bottom navbar-inverse" style="height:54px" role="navigation" ng-app="myApp">
        <div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

<div ng-controller="PhoneListCtrl" class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav nav-tabs" role="tablist">
    <li ng-repeat="phone in phones">
      <a href="#{{phone.name}}" role="tab" data-toggle="tab">{{phone.name}}</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade" ng-repeat="content in contents" id="{{content.tab}}">
      <h2>{{content.name}}</h2>
      <p>{{content.snippet}}</p>
    </div>
</div>

        </div>
    </nav>
        <iframe src="<?php echo $iframe_url; ?>" class="col-xs-12" allowfullscreen></iframe>
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
