<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
	require_once('includes/page.php');
	require_once('includes/form.php');
	require_once('includes/admin_header.php');

	$oForm = new Form();

	if(isset($_POST['submit']) == true){
		// this is a POST request, create a new page
		$oPage = new Page();
		$oPage->iSubjectId = $_POST['subject_id'];
		$oPage->sPageName = $_POST['page_name'];
		$oPage->iPosition = $_POST['position'];
		$oPage->iVisible = $_POST['visible'];
		$oPage->sContent = $_POST['content'];

		$oPage->save();

		//redirect browser to the new page
		header('Location:admin_main.php?pageid='.$oPage->iId);

	}

	$oForm->open();
	$oForm->makeTextInput('Page Name','page_name');
	$oForm->makeTextInput('Subject ID', 'subject_id');
	$oForm->makeTextInput('Position', 'position');
	$oForm->makeTextInput('Visible', 'visible');
	$oForm->makeTextArea('Content','content');
	$oForm->makeSubmit('Add Page','submit');
	$oForm->close();
?>
		<div class="two-thirds column">
			<h3>New Page</h3>

			<?php echo $oForm->sHTML;?>
			<!-- <form action="" method="post">
				<label for="page_name">Page Name</label>
				<input type="text" id="page_name" name="page_name" value=""/>

				<label for="subject_id">Subject ID</label>
				<input type="text" id="subject_id" name="subject_id" value=""/>

				<label for="position">Postion</label>
				<input type="text" id="position" name="position" value=""/>

				<label for="visible">Visible</label>
				<input type="text" id="visible" name="visible" value=""/>

				<label for="content">Content</label>
				<textarea id="content" name="content"></textarea>

				<input type="submit" name="submit" value="Add page"/>
			</form> -->
		</div>

<?php

require_once('includes/footer.php');
?>