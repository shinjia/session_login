<?php
session_start();

include 'define.php';

$ss_usertype = isset($_SESSION[DEF_SESSION_USERTYPE]) ? $_SESSION[DEF_SESSION_USERTYPE] : '';
$ss_usercode = isset($_SESSION[DEF_SESSION_USERCODE]) ? $_SESSION[DEF_SESSION_USERCODE] : '';

if($ss_usertype!=DEF_LOGIN_MEMBER) {
    header('Location: login_error.php');
    exit;
}

//==============================================================================


$html = <<< HEREDOC
<h2>會員獨享</h2>
<p>這一支程式只有『會員』才能執行</p>
HEREDOC;

include 'pagemake.php';
pagemake($html);
?>