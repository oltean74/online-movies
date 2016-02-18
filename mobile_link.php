<html>
   <body>
    <section>

<?php 
include_once 'index.php';

if (file_exists('application/views/content/mobilelink.php')) {
    include_once 'application/views/content/mobilelink.php';
} else {
    echo '<span style="color: red;" /><strong>Fatal Error: it seems a required file is missing.</strong>';
}
?>


<script>
$(document).ready(function(){ window.scroll(0,700); });
</script>

      </section>
   </body>
</html>