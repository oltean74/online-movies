<?php  if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }
?>

<!DOCTYPE html>
<html lang=<?php echo $http_lang; ?>>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
   <title><?php echo $lang['PAGE_TITLE']; ?></title>
   <link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
   <meta name="description" content="Urmareste cele mai bune film online pe smartphone sau tableta." />
 <meta name="keywords" content="filme online,filme 2015,film online 2015,filme online pe telefon,filme HTML5" />
 <meta property="og:type" content="blog" />
 <meta property="og:title" content="Filme online 2015 hd " />
 <meta property="og:description" content="filme online pe mobil" />
 <meta property="og:url" content="http://www.mobilemovies.eu/" />
 <meta property="og:site_name" content="Filme online 2015 pe mobil" />
<?php
  includeCss('style');
  includeHostCss('http://fonts.googleapis.com/css?family=Coda');
  includeHostCss('http://fonts.googleapis.com/css?family=Jura:400,500,600,300');
 includeJs('jquery-1.8.0.min');
 includeJs('jquery.touchwipe.1.1.1');
includeJs('jquery.carouFredSel-5.5.0-packed');
?>
   <!--[if lt IE 9]>
<?php 
 includeJs('modernizr.custom');

?>
   <![endif]-->

<?php 
 includeJs('functions');

?>
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45795316-2', 'auto');
  ga('send', 'pageview');

   </script>


 </head>
<body>
   <!-- wrapper -->
   <div class="wrapper">
      <!-- header -->
      <header class="header">
<?php 
if (!isset($_GET['lang'])) {
    echo $lang['LANG_MSG'];
    include BASE_PATH.'application/views/languages/language.tpl.php';
}
?>

        <div class="shell">
             <div class="header-top">
                   <nav id="navigation">
                   <a href="#" class="nav-btn"><?php echo $lang['MENU_CTG']; ?><span></span></a>
                  <ul>
                     <li class="active home"><a href="http://mobilemovies.eu"><?php echo $lang['MENU_HOME']; ?></a></li>
  <?php
foreach ($category as $key => $cat) {
    $link = 'mobileonline.php?cat=1,'.urlencode($key);
    echo '
 <li><a href=" '.$link.'&lang='.$http_lang.' ">'.$cat.'</a></li>
    ';
}
?>
            </nav>
               <div class="cl">&nbsp;</div>
            </div>

       <div class="slider">
          <div id="bg"></div>
              <div id="carousel">
<div>
<?php echo '<h5>'.$lang['SLOGAN'].'</h5>'; ?>
<?php
 $image = new Posters();
$images = $image->return_images();
?>
 <form method="post" action="search.php" id="searchform">
 <input type="search" name="search"  placeholder="Search movie..." />
<input type="submit" name="submit" value="Search">
</form>

</div>

 </div>



</div> 





</div>
       </header>
      <div id="footer">
<div class="shell">
   <p class="contact"><a href="disclaimer.php">Disclaimer</a><span>|</span>www.mobilemovies.eu<span>|</span><a href="https://www.facebook.com/mobilemovies.eu"><img src="css/images/facebook-logo.jpg" width="12px" height="12px"/></a></p>
      </div>
     </div>

   </div>
   <!-- end of wrapper -->

</body>
</html>
