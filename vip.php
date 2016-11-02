<?php
session_start();
/**
 @Filename: vip.php
 @Version: 0.1
 @Author: Aihara Anwaru
 @Blog: http://rezerolab.blogspot.com 
 @E-mail: anwaru@yandex.com
**/
 //@check sudah login atau belum dan check level
 if(@$_SESSION['rzlab_level'] == "trial"){
 die("You not allowed to access this page!");
 }
 if(empty(@$_SESSION['rzlab_level'])){
 echo "<script>window.location='./login.php'</script>";
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
<h1><a href="http://rezerolab.blogspot.com">Re Zero Labs</a> Halaman VIP</h1>
<div id="success">
<?php
if(@$_GET['st'] == "sukses"){
 echo "<p>Anda Berhasil Login Sebagai VIP Dengan User ".@$_SESSION['rzlab_uname']."</p>";
}
?>
</div>
<center><p>Selamat datang, <?php echo @$_SESSION['rzlab_uname']; ?> || <a href="?do=logout">Logout</a></p></center>
<div id="footer">
<p>Copyright &copy; 2016 <a href="http://rezerolab.blogspot.com">Re Zero Labs</a></p>
</div>
<?php
$logout = @$_REQUEST['do'] == "logout";
if($logout){
     session_destroy();
     unset($_SESSION['rzlab_level']);
     unset($_SESSION['rzlab_id']);
     unset($_SESSION['rzlab_uname']);
     echo "<script>window.location='./login.php'</script>"; 
}
?>
</body>
</html>