<?php 
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
function getlang($language)
{
    if (isset($language)) {
        $http_lang = explode(',', $language);
        $http_lang = strtolower(substr(chop($http_lang[0]), 0, 2));
    } else {
        $http_lang = 'en';
    }

    return $http_lang;
}
$http_lang = getlang($language);
$new_lang = $_POST['topic'];
if (empty($new_lang)) {
    $http_lang = getlang($language);
} else {
    $http_lang = $_POST['topic'];
}
// $http_lang = 'ro'; 
 if ($http_lang == 'ro') {
     $lang_file = 'ro.php';
     $new_lang = array('en' => Engleza, 'hu' => Maghiara);
 } elseif ($http_lang == 'en') {
     $lang_file = 'en.php';
 } elseif ($http_lang == 'hu') {
     $lang_file = 'hu.php';
 } else {
     $lang_file = 'en.php';
 }
 include 'languages/'.$lang_file;
?>   

<!DOCTYPE html>
<html lang=<?php echo $http_lang; ?>>
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
   <title><?php echo $lang['PAGE_TITLE']; ?></title>
   <link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
   <link href='http://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css' />
   <link href='http://fonts.googleapis.com/css?family=Jura:400,500,600,300' rel='stylesheet' type='text/css' />
<style>
body {
    background-color: #333333;
    font-size: 12px;
    color: white;

}
a {
    font-size: 18px;
    color: #3b5998;
}

</style>
<script type="text/javascript"> 
     $(document).ready(function(){         $("#model").change(function(){
var postData = {'value' : $(this).value};
             $.ajax({type: 'POST',
                      data : postData,
                      dataType: 'json',
                      success: function(data) {
                    //                 },
                 error: function(e) {                    console.log(e.message);
                 }
             });
         })
     })
 </script>

</head>
<body>
      <header class="header">
<?php echo $lang['LANG_MSG']; ?>
 <form method="post" action="">
  <select name="topic" id ="model" style="margin-bottom:3px;" onChange="form.submit()">
 <?php foreach ($lang['LANG_LANG'] as $i => $opt):?>
 <option value="<?php echo $i?>" 
<?php echo $i == $topic ? 'selected' : ''?>>
<?php echo $opt ?>
</option>
 <?php endforeach; ?>
 </select>
</form>
</div>
<?php echo $lang['DISCLAIMER']; ?>
<p><a href="index.php"><?php echo $lang['MENU_HOME']; ?></a></p>
</body>
</html>