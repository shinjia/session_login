<?php
session_start();

$ss_usertype = isset($_SESSION["usertype"]) ? $_SESSION["usertype"] : "";
$ss_usercode = isset($_SESSION["usercode"]) ? $_SESSION["usercode"] : "";

if($ss_usertype!="ADMIN")
{
   header("Location: error.php");
   exit;
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<h1>系統管理者</h1>
<p>這一支程式只有『系統管理員』才能執行</p>
</body>
</html>
HEREDOC;

echo $html;
?>