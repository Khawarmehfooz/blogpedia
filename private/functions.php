<?php 

function url_for($script_path){
    if($script_path[0]!="/"){
        $script_path="/".$script_path;
    }
    return WWW_ROOT . $script_path;
}
function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "<p class='error-heading'>Please fix the following errors:</p>";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . $error . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function redirect_to($location){
  header("Location: " . $location);
  exit;
}

function get_and_clear_session_message(){
  if(isset($_SESSION['message']) && $_SESSION['message']!=""){
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}
function display_session_message(){
  $msg = get_and_clear_session_message();
  if($msg!=""){
    return "<p class='message'>" . htmlspecialchars($msg) . "</p>";
  }
}