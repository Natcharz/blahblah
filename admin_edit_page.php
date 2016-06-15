<?php 
ob_start();// fixing servers redirection problem

require_once('includes/form.php');
require_once('includes/page.php');
require_once('includes/admin_header.php');

$iCurrentPage = 1;

//Get pageid to be edited
if(isset($_GET['pageid']) == true){
	$iCurrentPage = $_GET['pageid'];
}

$oPage = new Page();
$oPage->load($iCurrentPage);


//make sticky data for form
$aStickyData = [];
$aStickyData['page_name'] = $oPage->sPageName;
$aStickyData['subject_id'] = $oPage->iSubjectId;
$aStickyData['visible'] = $oPage->iVisible;
$aStickyData['position'] = $oPage->iPosition;
$aStickyData['content'] = $oPage->sContent;


$oForm = new Form();
$oForm->aData = $aStickyData;//assign sticky data to form

if(isset($_POST['submit']) == true){
	// this is a POST request, update existing page
	$oPage->sPageName = $_POST['page_name'];
	$oPage->iSubjectId = $_POST['subject_id'];
	$oPage->iPosition = $_POST['position'];
	$oPage->iVisible = $_POST['visible'];
	$oPage->sContent = $_POST['content'];

	$oPage->save();

	//redirect after updating details
	header('Location: admin_main.php?pageid='.$oPage->iId);
}

$oForm->open();
$oForm->makeTextInput('Page Name', 'page_name');
$oForm->makeTextInput('Subject ID', 'subject_id');
$oForm->makeTextInput('Position', 'position');
$oForm->makeTextInput('Visible', 'visible');
$oForm->makeTextArea('Content','content');
$oForm->makeSubmit('Update Page','submit');
$oForm->close();

?>
		<div class="two-thirds column">
			<h3>Edit Page</h3>

			<?php echo $oForm->sHTML;?>
			<!-- <form>
				<label for="page_name">Page Name</label>
				<input type="text" id="page_name" name="page_name" value="Our goal"/>

				<label for="subject_id">Subject ID</label>
				<input type="text" id="subject_id" name="subject_id" value="1" />

				<label for="position">Postion</label>
				<input type="text" id="position" name="position" value="1" />

				<label for="visible">Visible</label>
				<input type="text" id="visible" name="visible" value="1" />

				<label for="content">Content</label>
				<textarea id="content" name="content">Although coming from different backgrounds, we are united to become web experts. Here are our stories</textarea>
				
				<input type="submit" name="submit" value="Update page"/>
			</form> -->
		</div>
<?php
require_once('includes/footer.php');
?>