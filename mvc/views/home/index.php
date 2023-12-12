<?php 
require_once dirname(__DIR__)."/partials/header.php";
?>
<?php 
foreach ($result as $value) : 
echo $value['name'];
echo "</br>";
  
endforeach;




require_once dirname(__DIR__)."/partials/footer.php";
?>