<?php
session_start();
/**
 @Filename: login.php
 @Version: 0.1
 @Author: Aihara Anwaru
 @Blog: http://rezerolab.blogspot.com 
 @E-mail: anwaru@yandex.com
 
 @deskripsi: baca di google ajah gan
**/
 //@check sudah login atau belum
 if(@$_SESSION['level'] == "vip"){
 echo "<script>window.location='./vip.php'</script>";
 }elseif(@$_SESSION['level'] == "trial"){
 echo "<script>window.location='./trial.php'</script>";  
 }
 //@setting connection ke databse
$con = new mysqli('localhost', 'root', '', 'demo_login');
if($con->connect_errno > 0) {
	die('Could not connect: ' . connect_error());
}
?>
<html>
<head>
<title>Login Multi Level</title>
<link href='view-source:http://d2f0ora2gkri0g.cloudfront.net/bkasia47535_favicon.ico?v=1474960911' rel='icon' type='image/x-icon'/>
<link href='https://plus.google.com/110358378598572679031/posts' rel='publisher'/>
<link href='https://plus.google.com/110358378598572679031/about' rel='author'/>
<link href='https://plus.google.com/110358378598572679031' rel='me'/>
<meta content='LlbnsWclpd4kvm3UoaTcB1Wi033-vYqxDRylELAz4HQ' name='google-site-verification'/>
<meta content='9B7052F906A8B4A4D601D2C9EB2813C4' name='msvalidate.01'/>
<meta content='xxxxx' name='alexaVerifyID'/>
<meta content='Indonesia' name='geo.placename'/>
<meta content='Aihara Anwaru' name='Author'/>
<meta content='general' name='rating'/>
<meta content='id' name='geo.country'/>
<meta content='https://www.facebook.com/tinkere21' property='article:author'/>
<meta content='https://www.facebook.com/rezerolab' property='article:publisher'/>
<meta content='xxxxx' property='fb:app_id'/>
<meta content='xxxxx' property='fb:admins'/>
<meta content='en_US' property='og:locale'/>
<meta content='en_GB' property='og:locale:alternate'/>
<meta content='id_ID' property='og:locale:alternate'/>
<meta content='summary' name='twitter:card'/>
<meta expr:content='data:blog.pageTitle' name='twitter:title'/>
<meta content='xxxxx' name='twitter:site'/>
<meta content='xxxxx' name='twitter:creator'/>
<style type="text/css">
body{
  background:#000;
  color:#00ff00;
  border-style: dashed;
}
h1{
	text-align: center;
}
#login-form{
  text-align: center;
}
input{
	border: 1;
	border-color: #df0000;
	background: #000;
	color: #00ff00; 
  border-style: dashed;
}
#footer{
  text-align: center;
  color:#666699;
  text-transform: none;
  text-decoration: none;
}
a{
  color:#df0000;
  text-transform: none;
  text-decoration: none;
}
a:hover{
  color:#00ff00;
  text-transform: none;
  text-decoration: none;
}
#alert{
  text-align: center;
  color:#df0000;
}
#success{
  text-align: center;
  color:#00ff00;
}
#flag{
  text-align: center;
  color:#00f
}
</style>
</head>
<body>
<h1><a href="http://rezerolab.blogspot.com">Re Zero Labs</a> Login Multi Level</h1>
<div id="alert">
<?php
if(@$_GET['st'] == "info"){
 echo "<p>Your Username/Password Is Empty</p>";
}elseif(@$_GET['st'] == "warning"){
  echo "<p>Username/Password Not Macth! Try Again!</p>";
}
?>
</div>
<form id="login-form" action="?do=login&act=login&st=true" method="POST" /> 
<input type="text" name="user" /> : <input type="password" name="pass" /> = <input type="submit" name="go" value="Login" />
</form>
<div id="footer">
<p>Copyright &copy; 2016 <a href="http://rezerolab.blogspot.com">Re Zero Labs</a></p>
</div>
<?php
$do = @$_REQUEST['do'] == "login";
$gate =@$_REQUEST['act'] == "login";
$status =@$_REQUEST['st'] == "true";
$user = @$_POST['user'];
$pass = @$_POST['pass'];
if($do){
  if($user == '' || $pass == ''){
    echo "<script>window.location='?act=info'</script>";
  }else{
  $sqli_query = $con->query("SELECT * FROM tbl_login WHERE username='$user' and password=md5('$pass')");
  $sqli_row=$sqli_query->fetch_array();
  $sqli_count = $sqli_query->num_rows;
  if($sqli_count == "0"){
    echo "<script>window.location='?st=warning'</script>";
  }elseif($sqli_count == "1"){
    if($sqli_row['level'] == "vip"){
      @$_SESSION['rzlab_level'] = $sqli_row['level'];
      @$_SESSION['rzlab_id'] = $sqli_row['id'];
      @$_SESSION['rzlab_uname'] = $sqli_row['username'];
      echo "<script>window.location='./vip.php?st=sukses'</script>"; 
    }elseif($sqli_row['level'] == "trial"){
      @$_SESSION['rzlab_level'] = $sqli_row['level'];
      @$_SESSION['rzlab_id'] = $sqli_row['id'];
      @$_SESSION['rzlab_uname'] = $sqli_row['username'];
      echo "<script>window.location='./trial.php?st=sukses'</script>";
    }
  }
  }
}
?>
</body>
</html>