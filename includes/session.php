<?php

# Redis connection libraries (predis)
require 'Predis/Autoloader.php';
Predis\Autoloader::register();


function rand_string()
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randstring = '';
  for ($i = 0; $i < 30; $i++) {
    $randstring .= $characters[rand(0, strlen($characters)-1)];
  }
  return $randstring;
}

function set_session_action($dock_id)
{
  if ($dock_id != "")
  {
    $randstring = "act_".rand_string();

    # short-lived tokens for passing between sites and through forms
print "randstring $randstring dock id $dock_id";
    include('redis-db.php');
    $redis_client->set("{$randstring}","{$dock_id}");
    $redis_client->expireat("{$randstring}",strtotime('+20 seconds'));

    return "{$randstring}";

  }
  include "includes/head.php";
  $error_message="Action must be performed on a container";
  include "includes/fail.php";
  include "includes/foot.php";
  exit;

}

function validate_session_action($token)
{
  if ($token != "")
  {
    # Get the session_id
    include('redis-db.php');
    $dock_id="";
    $dock_id=$redis_client->get("{$token}");
    if ($dock_id != "")
    {
      # Success: return the validated user_id
      return $dock_id;
    }
  }
  include "includes/head.php";
  $error_message="Your session is not valid for this action";
  include "includes/fail.php";
  include "includes/foot.php";
  exit;
}

function set_session($user_id)
{
  # Need user_id
  if (!isset ($user_id)) { return 1;}

  $randstring = rand_string();

  # Store in database
#  require_once('redis-db.php');
    include('redis-db.php');
  $redis_client->set("{$randstring}","{$user_id}");
  $redis_client->expireat("{$randstring}",strtotime('+12 hours'));

  # Set cookie
  setcookie('c2ctoken',"{$randstring}");
  return;
}

function validate_session()
{
  # Get the current session cookie
  # Either by cookie, or by posted user_id
  $token = "";
  if (isset($_COOKIE['c2ctoken']) && $_COOKIE['c2ctoken'] != "")
  {
    $token = $_COOKIE['c2ctoken'];
  }
  elseif (isset($_POST['user_id']) && $_POST['user_id'] != "")
  {
    $token = $_POST['user_id'];
  }

  if ($token != "")
  {
    # Get the session_id
    include('redis-db.php');
    $user_id="";
    $user_id=$redis_client->get("{$token}");
    if ($user_id != "")
    {
      # Success: return the validated user_id
      return $user_id;
    }
  }
  include "includes/head.php";
  $error_message="Your session is not valid for this area of the site";
  include "includes/fail.php";
  include "includes/foot.php";
  exit;
}

function get_session_token()
{
  $token = "";
  if (isset($_COOKIE['c2ctoken']) && $_COOKIE['c2ctoken'] != "")
  {
    $token = $_COOKIE['c2ctoken'];
  }
  return $token;
}
