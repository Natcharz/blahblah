<?php
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';
require_once('includes/view.php');
require_once('includes/page.php');
require_once('includes/header.php');

$iCurrentPageId = 1;
//check if we have pageid in querystring
if(isset($_GET['pageid']) == true){
	$iCurrentPageId = $_GET['pageid'];
}

$oPage = new Page();
$oPage->load($iCurrentPageId);

echo View::renderPage($oPage);

require_once('includes/footer.php');
?>