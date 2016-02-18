<?php 
  require_once 'index.php';
  require_once 'common.php'; 
  //error_reporting(E_ALL);
  //ini_set('display_errors','On');
   $qc = $_GET['cat']; 
   $ql = $_GET['lang']; 
   $query = new MobileLink(); 
   $my_movie = new Movie(); 
   $query->showlink($qc, $ql); 
   $pg = $query->getpage(); 
   $ctg = $query->getcat(); 
   $page = $my_movie->set_page($pg); 
   $search = $my_movie->set_categ($ctg);  
   $prev = $query->prev($lang['MSG_PREV']); 
   echo $prev;
    ?>  
<section class="content"> 
   <h2><?php echo $lang['MENU_MOVIES']; ?></h2> 
       <div class="shell"> 
<!-- main --> <div class="main"> <!-- cols --> 
	<section class="cols">
       <div class="col">
	 <?php if ($ql == 'ro') {
		  $movie_4 = load_movie($ql,'divx'); 
		  $fb = new Divx(); 
		  $movie_div = $fb->get_my_movie($my_movie,$page,$search);  

          $movie_2 = load_movie($ql,'biz');
          $biz = new Biz(); 
          $movie_biz = $biz->get_my_movie($my_movie, $page, $search); 

          $movie_1 = load_movie($ql,'onlinecc'); 
          $cc = new Onlinecc(); 
          $movie_cc = $cc->get_my_movie($my_movie, $page, $search);
        
          $movie_3 = load_movie($ql,'filme_bune');
          $fb = new FilmeBune(); 
          $movie_fb = $fb->get_my_movie($my_movie, $page, $search);
           } 
           if ($ql == 'hu') { 
          $movie_5 = load_movie($ql,'meselista'); 
          $fb = new Meselista(); 
          $movie_m = $fb->get_my_movie($my_movie, $page, $search);
           } 
           ?>
            </div>
<div class="cl">&nbsp;</div> 
  </section> 
   </div> 
   <!-- end of main --> 
   </div> 
    <script> 
		$(document).ready(function(){
			 window.scroll(0,700);
			  }); 
    </script>
  </section> 
  <?php 
   $next = $query->next($lang['MSG_NEXT']);
    echo $next;
  ?>
