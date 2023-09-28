<?php
	session_start();
	$session=session_id();
	$time=time();
	$time_check=$time-300;
	
	include 'dbcon/DBConn.inc.php';
	//get the contID from URL
	 if(isset($_GET['contID'])){
		$contID = mysqli_real_escape_string($dbcon,$_GET['contID']);
		}else{
  			$contID = 1;
		}
			$sql  = "SELECT * FROM contents WHERE contID='$contID' AND contentstatus='1'";
			//echo $query; exit;
			$result = mysqli_query($dbcon,$sql);
			$numRows = mysqli_num_rows($result);
		//echo $numRows; exit;
			if($numRows==0){
					echo "Sorry, no data. ! <br>"; exit;
			}else{
			while($rows = mysqli_fetch_array($result))
			{ 
				$contID 		= $rows['contID'];
				$catID 			= $rows['catID'];
				$contentTitleLA = $rows['contentTitleLA'];
				$detailLA		= $rows['detailLA'];
				//$createdDate	= $rows['createdDate'];
				//$createdBy	= $rows['createdBy'];
				//$updatedDate	= $rows['updatedDate'];
				//$updatedBy	= $rows['updatedBy'];
			}
			mysqli_free_result($result);
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ກົມອາຫານ ແລະ ຢາ :: ກະຊວງສາທາລະນະສຸກ, ສປປລາວ ::</title>
<link href="css/bootstrap510/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="css/styles_la.css" rel="stylesheet" type="text/css" />
<script src="css/bootstrap510/js/bootstrap.js" type="text/javascript"></script>
<link href="js/amazingslider-1.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/initslider-1.js" type="text/javascript"></script>
<script src="js/amazingslider.js" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid bg-white" align="center"> <!-- Web banner-->
<div><img src="images/new_template/banner_2021.png"></div> <!-- banner-->
<div><!-- catalog menu-->
<table width="1200" height="47" border="0" cellpadding="0" cellspacing="0" background="images/new_template/menu_tab.jpg">
  <tr align="center" class="menu_top">
  	<td width="20"><img src="images/new_template/menu_tab.jpg" width="26" height="47" /></td>
    <td>
	<?php
		include('dbcon/DBConn.inc.php');
      	$cat_sql = "SELECT * FROM catalogs ORDER BY catID";
      	$query = mysqli_query($dbcon,$cat_sql);
      	$row_data = mysqli_num_rows($query);
      
        for($i=1; $i<=$row_data; $i++)
          {
            $data 			= mysqli_fetch_array($query);
            $catTitleLA 	= $data['catTitleLA'];
            $caturlLA		= $data['caturlLA'];
            $mycaturl 		= "<td nowrap='nowrap' align='center' class='menu_top_LA'> <a href='$data[caturlLA]'>".$catTitleLA."</a></td><td width='10'><img src='../images/new_template/menu_tab_medle.jpg' width='20' height='47' /></td>";
            echo $mycaturl;
          }
      ?>
    </td>
    <td nowrap="nowrap" width="200" align="right" valign="middle">
    <form class="d-flex" id="form1" name="form1" method="post" action="search.php">
      <input type="search" name="keyWord" id="keyWord" class="form-control me-2" placeholder="Search" aria-label="Search" />
      <button class="btn btn-light" type="submit">Search</button>
    </form>
    </td>
    <td width="10">&nbsp;</td>
    <td width="26"><img src="images/new_template/menu_tab.jpg" width="26" height="47" /></td>
  </tr>
</table>
</div><!-- End catalog-->
<div><!-- text slogan-->
<table width="1200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="24">&nbsp;</td>
   <td><B class="Cat_Title_LA"><font color="#FF0000"><marquee onmouseout="this.start()" onmouseover="this.stop()">
   <?php
      	$marquee_sql = "SELECT * FROM slogan ORDER BY id";
      	$query = mysqli_query($dbcon,$marquee_sql);
      	$row_data = mysqli_num_rows($query);
      
        for($i=1; $i<=$row_data; $i++)
          {
            $data = mysqli_fetch_array($query);
            $lao_msg = $data['lao_msg'];
            echo $lao_msg;
          }
      ?>
   </marquee></font></B></td>
    <td width="30">
	<?php
		$str= basename($_SERVER['REQUEST_URI']);
			if(preg_match("/_[a-z]{1,3}.php/",$str))
				{
					$strEN=	preg_replace('/_[a-z]{1,3}.php/', '_en.php', $str);
					$strLA=	preg_replace('/_[a-z]{1,3}.php/', '.php', $str);
				}else{
					$strEN = preg_replace('/.php/', '_en.php', $str);
					$strLA = preg_replace('/.php/', '.php', $str);
				}
	?>
    </td>
    <td width="100" align="right" class="lang_LA"><a href="<?php echo $strLA;?>">LAO</a>&nbsp;</span><a href="<?php echo $strEN;?>">ENG</a></span></td>
    <td width="24">&nbsp;</td>
  </tr>
</table>
</div> <!-- End tex slogan-->
<div> <!-- contents more-->
<table width="1200" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<div class="row"><!-- Slider news-->
	<div class="col-2" align="left"><!-- InstanceBeginEditable name="subcat" -->
<?php
	include 'dbcon/DBConn.inc.php';
	$sql="SELECT catalogs.catID, subcatalogs.subCatID, catalogs.catTitleLA, catalogs.caturlLA, subcatalogs.subCatTitleLA,subcatalogs.subCaturlLA FROM subcatalogs  INNER JOIN catalogs ON catalogs.catID=subcatalogs.catID WHERE catalogs.catID = '$catID' ORDER BY subcatalogs.catID ASC";
	$result = mysqli_query($dbcon,$sql);
	if($result){
		while($data = mysqli_fetch_array($result)){
?>
	<table width="250" cellpadding="1" cellspacing="1" border="0">
		<tr>
			<td width="10" bgcolor="#005CFF">&nbsp;</td>
			<td height="30" class="menu_left_LA" bgcolor="#005CFF"><a href="<?php echo $data['subCaturlLA']?>"><?php echo $data['subCatTitleLA'];?></a></td>
	</tr>
	</table>
<?php
		}
	}
?>
<BR>
<?php //include'visitor.php';?>
<!-- InstanceEndEditable --></div>
    <div class="col-8" align="left"><!-- InstanceBeginEditable name="slider" -->
<?php
	include 'dbcon/DBConn.inc.php';
	if(isset($_GET['newsID'])){
	$newsID = mysqli_real_escape_string($dbcon,$_GET['newsID']);
	}else{
  		$newsID = 1;
	}
	$sql = "SELECT * FROM news WHERE newsTypeID in (1,6) AND status='1' AND showIndex = 'Yes' ORDER BY createdDate DESC LIMIT 0,6";
	$result = mysqli_query($dbcon,$sql);
	$numRows = mysqli_num_rows($result);
	?>
    	<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:600px;padding-left:0px; padding-right:0px;margin:0px auto 0px;">
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">
    <?php
	$thumbs='';
	while($row = mysqli_fetch_assoc($result))
	{
		$newsID 		= $row['newsID'];
		$newsTitleLA	= $row['newsTitleLA'];
		$newsSummaryLA	= $row['newsSummaryLA'];
		$fileName		= $row['fileName'];
		$createdDate 	= $row['createdDate'];
		$createdBy 		= $row['createdBy'];
		$action 		= "<span><a href='fullnews.php?newsID=".$newsID."'>ອ່ານຕໍ່</a></span>";
	?>
        <li>
        	<a href="fullnews.php?newsID=<?php echo $newsID?>">
        <img src="images/news_images/<?php echo $fileName?>" alt="<?php echo $newsTitleLA?>"  title="<?php echo$newsTitleLA?>" data-description="" data-texteffect="Underneath left" /></a>
<a href="fullnews.php?newsID=<?php echo $newsID?>" target="_self">ອ່ານຕໍ່ &raquo;</a>
        </li>
		<?php
		$thumbs.="<li><img src='images/news_images/$fileName' class='img-thumbnail' alt='$newsTitleLA' title='$newsTitleLA'></li>";
	}
	?>
    </ul>
    <ul class="amazingslider-thumbnails" style="display:none;"><?php echo $thumbs?></ul>
			</div>
    	</div>
	<!-- InstanceEndEditable --></div>
</div><!-- end slider news-->
<div><!-- content-->
	<!-- InstanceBeginEditable name="content_details" -->
 <div> <!-- read all news-->
 <table width="1200" border="0">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><a href="allnews.php" class="btn btn-primary">ກົດບ່ອນນີ້ ອ່ານຂ່າວການເຄື່ອນໄຫວທັງໝົດ &raquo;</a></td>
  </tr>
</table>
</div><!-- end read all news-->
<p>&nbsp;</p>
<?php
	$noticeTypes = mysqli_query($dbcon,"SELECT typeID,typeNameLA FROM documenttypes WHERE typeID in (1,3,10)") or die('e1');
		if(mysqli_num_rows($noticeTypes)>0)
			{
				while($types = mysqli_fetch_assoc($noticeTypes))
				{
					$sql = "SELECT * FROM documents WHERE typeID=$types[typeID] ORDER BY uploadedDate DESC LIMIT 0,5";
					$result = mysqli_query($dbcon,$sql);
					if(mysqli_num_rows($result)>0)
					{
						?>
						<table border="0" width="100%" class="table">
							<tr>
                            	<th background="images/new_template/menu_tab.jpg">&nbsp;</th>
                            	<th background="images/new_template/menu_tab.jpg" valign="middle"><h5 class="Title_LA"><?php echo $types['typeNameLA']?></h5></th>
                            </tr>
						<?php
							while($data = mysqli_fetch_assoc($result)){
							?>
                            <tr>
								<td width="100" class="date_news"><a href="../download/documents/<?php echo $data['fileName']?>" target='blank'><?php echo date('d/m/Y', strtotime($data['uploadedDate']));?></a></td>
								<td class="link_LA"><a href="../download/documents/<?php echo $data['fileName']?>" target='blank'><?php echo $data['fileTitleLA']?></a></td>
							</tr>
							<?php
						}
						?>
						<tr>
                        	<td>&nbsp;</td>
                        	<td align="right"><a href="documenttype.php?typeID=<?php echo $types['typeID']?>" class="btn btn-primary">ເພີ່ມເຕີມ &raquo;</a></td>
                        </tr>
                        </table>
						<?php
					}
				}
			}
	?>

<p>&nbsp;</p>
<?php
	$noticeTypes = mysqli_query($dbcon,"SELECT typeID,typeNameLA FROM documenttypes WHERE typeID in (11,12,13)") or die('e1');
		if(mysqli_num_rows($noticeTypes)>0)
			{
				while($types = mysqli_fetch_assoc($noticeTypes))
				{
					$sql = "SELECT * FROM documents WHERE typeID=$types[typeID] ORDER BY uploadedDate DESC LIMIT 0,5";
					$result = mysqli_query($dbcon,$sql);
					if(mysqli_num_rows($result)>0)
					{
						?>
						<table border="0" width="100%" class="table">
							<tr>
                            	<th background="images/new_template/menu_tab.jpg">&nbsp;</th>
                            	<th background="images/new_template/menu_tab.jpg" valign="middle"><h5 class="Title_LA"><?php echo $types['typeNameLA']?></h5></th>
                            </tr>
						<?php
							while($data = mysqli_fetch_assoc($result)){
							?>
                            <tr>
								<td width="100" class="date_news"><a href="../download/documents/<?php echo $data['fileName']?>" target='blank'><?php echo date('d/m/Y', strtotime($data['uploadedDate']));?></a></td>
								<td class="link_LA"><a href="../download/documents/<?php echo $data['fileName']?>" target='blank'><?php echo $data['fileTitleLA']?></a></td>
							</tr>
							<?php
						}
						?>
						<tr>
                        	<td>&nbsp;</td>
                        	<td align="right"><a href="documenttype.php?typeID=<?php echo $types['typeID']?>" class="btn btn-primary">ເພີ່ມເຕີມ &raquo;</a></td>
                        </tr>
                        </table>
						<?php
					}
				}
			}
?>
<p>&nbsp;</p>
<?php
	$noticeTypes = mysqli_query($dbcon,"SELECT typeID,typeNameLA FROM documenttypes WHERE typeID in (7,8,9)") or die('e1');
		if(mysqli_num_rows($noticeTypes)>0)
			{
				while($types = mysqli_fetch_assoc($noticeTypes))
				{
					$sql = "SELECT * FROM documents WHERE typeID=$types[typeID] ORDER BY uploadedDate DESC LIMIT 0,5";
					$result = mysqli_query($dbcon,$sql);
					if(mysqli_num_rows($result)>0)
					{
						?>
						<table border="0" width="100%" class="table">
							<tr>
                            	<th background="images/new_template/menu_tab.jpg">&nbsp;</th>
                            	<th background="images/new_template/menu_tab.jpg" valign="middle"><h5 class="Title_LA"><?php echo $types['typeNameLA']?></h5></th>
                            </tr>
						<?php
							while($data = mysqli_fetch_assoc($result)){
							?>
                            <tr>
								<td width="100" class="date_news"><a href="../download/documents/<?php echo $data['fileName']?>" target='blank'><?php echo date('d/m/Y', strtotime($data['uploadedDate']));?></a></td>
								<td class="link_LA"><a href="../download/documents/<?php echo $data['fileName']?>" target='blank'><?php echo $data['fileTitleLA']?></a></td>
							</tr>
							<?php
						}
						?>
						<tr>
                        	<td>&nbsp;</td>
                        	<td align="right"><a href="documenttype.php?typeID=<?php echo $types['typeID']?>" class="btn btn-primary">ເພີ່ມເຕີມ &raquo;</a></td>
                        </tr>
                        </table>
						<?php
					}
				}
			}
?>
<?php include 'dbcon/DBClose.inc.php';?>
 <!-- InstanceEndEditable -->
</div><!-- end content-->
</td>
</tr>
</table>
</div><!-- End contens more-->
<BR>
<div><!-- tab-->
<table width="1200" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="20">&nbsp;</td>
<td>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
  	<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span class="fs-6 fw-bold">ບົດຄວາມຮູ້ດ້ານຢາ ແລະ ພະລິດຕະພັນການແພດ</span></button>
  </li>
    <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><span class="fs-6 fw-bold">ບົດຄວາມຮູ້ດ້ານອາຫານປອດໄພ</span></button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="otherknowledge-tab" data-bs-toggle="tab" data-bs-target="#otherknowledge" type="button" role="tab" aria-controls="otherknowledge" aria-selected="false"><span class="fs-6 fw-bold">ບົດຄວາມທົ່ວໄປ</span></button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php include "DMPKnowledge.php";?></div>
   <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php include "FSKnowledge.php";?></div>
  <div class="tab-pane fade" id="otherknowledge" role="tabpanel" aria-labelledby="otherknowledge-tab"><?php include "Otherknowledge.php";?></div>
</div>
</td>
<td width="20">&nbsp;</td></tr>
<tr>
</table>
</div><!-- end tab-->
<div><!-- footer marquee slogan-->
<BR>
<table width="1200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1200"><marquee onmouseout="this.start()" onmouseover="this.stop()" scrolldelay="100"><a href="https://www.adb.org/"><img  src="images/logo/ADB.png" width="142" height="80" alt="ASIAN DEVELOPMENT BANK" longdesc="https://www.adb.org/" /></a>
    <a href="http://asean.org/"><img  src="images/logo/ASEAN.png" width="82" height="80" alt="Association of Southeast Asian Nations - ASEAN" longdesc="http://asean.org/" /></a>
    <a href="https://www.covid19.gov.la/index.php/"><img  src="images/logo/LAOS-COVID-19.png" width="120" height="80" alt="ຄະນະສະເພາະກິດ COVID-19 ສປປ ລາວ." longdesc="https://www.covid19.gov.la/index.php" /></a>
    <a href="https://www.jica.go.jp/english/"><img  src="images/logo/JICA_01.jpg" width="82" height="80" alt="Japan International Cooperation Agency - JICA" longdesc="https://www.jica.go.jp/english/" /></a>
    <a href="http://www.koica.go.kr/english/"><img  src="images/logo/KOICA_02.jpg" width="133" height="80" alt="Korea International Cooperation Agency (KOICA)" longdesc="http://www.koica.go.kr/english/" /></a>
    <a href="https://www.theglobalfund.org/en/"><img  src="images/logo/The_Global_Fund.jpg" width="116" height="80" alt="The Global Fund to Fight AIDS, Tuberculosis and Malaria" longdesc="https://www.theglobalfund.org/en/" /></a>
    <a href="http://www1.wfp.org/"><img  src="images/logo/WFO_Logo2.jpg" width="116" height="80" alt="World Food Programme" longdesc="http://www1.wfp.org/" /></a>
    <a href="http://www.uhs.edu.la/"><img  src="images/logo/UHSEDULAO.png" width="80" height="80" alt="World Food Programme" longdesc="http://www.uhs.edu.la/" /></a>    
    <a href="http://www.worldbank.org/"><img  src="images/logo/world-bank.jpg" width="93" height="80" alt="The World Bank" longdesc="http://www.worldbank.org/" /></a>
    &nbsp;<a href="http://moh.gov.la/"><img  src="images/logo/MOH_LAOS.jpg" alt="Ministry of Health Lao PDR." width="82" height="80" longdesc="http://www.moh.gov.la/" /></a>
    &nbsp;<a href="http://www.unodc.org/"><img  src="images/logo/UNODC.png" alt="United Nations Office on Drugs and Crime" width="76" height="80" longdesc="http://www.unodc.org/" /></a>
    <a href="http://www.who.int/en/"><img  src="images/logo/WHO.png" alt="World Health Organization: WHO" width="80" height="80" longdesc="http://www.who.int/en/" /></a>
    &nbsp;<a href="http://www.sida.se/English/"><img  src="images/logo/SIDA.jpg" alt="Swedish International Development Cooperation Agency: SIDA" width="160" height="80" longdesc="http://www.sida.se/English/" /></a>
    </marquee></td>
  </tr>
</table>
</div><!-- end footer marquee slogan-->
<div><!-- footer-->
<BR>
<table width="1200" border="0" cellpadding="0" cellspacing="0" bgcolor="#005CFF">
  <tr height="100">
  	<td>&nbsp;</td>
    <td class="footer_LA"><a href="http://www.fdd.gov.la" target="_blank">&copy; 2021 ສະຫງວນລິຂະສິດໂດຍ ກົມອາຫານ ແລະ ຢາ, </a><a href="http://www.moh.gov.la" target="_blank">ກະຊວງສາທາລະນະສຸກ, ສປປລາວ.</a></td>
    <td class="footer_LA"><a href="contactUs.php">ຕິດຕໍ່ ກອຢ</a></td>
    <td class="footer_LA"><a href="http://mail.fdd.gov.la:2095/" target="_blank">ອີເມວ</a></td>
    <td class="footer_LA"><a href="admin/index.php" target="_blank">ເຂົ້າລະບົບ</a></td>
  </tr>
</table>
</div><!-- end footer-->
</div><!-- end container-->
</body>
<a href="https://www.diyarbakirescort.com/" title="diyarbakır escort" style="position:absolute;left:-19999px">diyarbakır escort</a> <a href="http://www.sincanescort.net/" title="sincan escort" style="display: none">sincan escort</a>

<!-- InstanceEnd --></html>

