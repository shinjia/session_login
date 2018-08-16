<?php
session_start();

$ss_usertype = isset($_POST["usertype"]) ? $_POST["usertype"] : "";
$ss_usercode = isset($_POST["usercode"]) ? $_POST["usercode"] : "";
$ss_password = isset($_POST["password"]) ? $_POST["password"] : "";


// 假設用戶資料 (資料存於文字檔)
// 可自行定義存檔的格式
$file_password = "user_password.txt";   // 存帳號及密碼的文字檔
$a_chk_list = file($file_password);


// session變數『usertype』 記錄使用者身分，其值可能為
//   (1)ADMIN  管理者
//   (2)MEMBER 會員
//   (3)未定義為一般訪客


// 會員檢查，注意格式
$chk_string  = "!" . $ss_usercode . "#" . md5($ss_password) . "@" . $ss_usertype;
$chk_string .= "\r\n";   // 用file讀入的資料後面會多出兩個符號 \r\n


$valid = false; 
if(in_array($chk_string, $a_chk_list))
{
   $valid = true;
   $_SESSION["usertype"] = $ss_usertype;
   $_SESSION["usercode"] = $ss_usercode;
}
else
{
   $_SESSION["usertype"] = "";
   $_SESSION["usercode"] = "";
}


if($valid)
{
   $msg = $ss_usercode . ' 你好，歡迎光臨！ ';
}
else
{
   $msg = '登入錯誤';
}


$html = <<< HEREDOC

$html = <<< HEREDOC
<html><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<p>{$msg}</p>
<br>
<p>{$msg}</p>
<br><br>
<br>
</body>
</html>
HEREDOC;


echo $html;
?>