<?php
require_once('includes/page.php');
require_once('includes/admin_header.php');

$iCurrentPageId = 1;
//check if we have pageid in querystring
if(isset($_GET['pageid']) == true){
	$iCurrentPageId = $_GET['pageid'];
}

//load page from database
$oPage = new Page();
$oPage->load($iCurrentPageId);

//render page into HTML
echo View::renderAdminPage($oPage);

require_once('includes/footer.php');
?>