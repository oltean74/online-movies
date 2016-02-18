<?php  if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }
?>

<form method="post" action="<?php echo
htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <select name="lang" id ="user" style="margin-bottom:3px;" onChange="form.submit()">
 <option value="#">Select...</option> 
 <?php foreach ($diff_lang as $i => $opt):?>
 <option value="<?php echo $opt?>" 
<?php echo $opt == $lang ? 'selected' : ''?>>
<?php echo $i ?>
</option>
 <?php endforeach; ?>
 </select>
</form>
