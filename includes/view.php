<?php
class View{

	//no attributes

	static public function renderNav($aSubjects){
		$sHTML = '<ul>';

		//making subjects
		for($i=0; $i<count($aSubjects);$i++){

			$oSubject = $aSubjects[$i];
			$aPages = $oSubject->aPages;

			$sHTML .= '<li><h3>'.$oSubject->sSubjectName.'</h3>
							<ul>';
			//making pages
			for($j=0; $j<count($aPages) ;$j++){

				$oPage = $aPages[$j];

				$sHTML .= '<li><a href="main.php?pageid='.$oPage->iId.'">'.$oPage->sPageName.'</a></li>';
			}
						
			$sHTML .= '		</ul>
						</li>';
		}

		$sHTML .= '</ul>';

		return $sHTML;
	}

	static public function renderPage($oPage){

		$sHTML = '<div class="two-thirds column">
			<h3>'.$oPage->sPageName.'</h3>
			<p>'.$oPage->sContent.'</p>
		</div>';

		return $sHTML;
	}

	static public function renderAdminNav($aSubjects){
		$sHTML = '<ul>';

		for($i=0;$i<count($aSubjects);$i++){

			$oSubject = $aSubjects[$i];
			$aPages = $oSubject->aPages;

			$sHTML .= '<li><h3>'.$oSubject->sSubjectName.'</h3>
					<ul>';

			for($j=0;$j<count($aPages);$j++){
				$oPage = $aPages[$j];
				$sHTML .='<li><a href="admin_main.php?pageid='.$oPage->iId.'">'.$oPage->sPageName.'</a></li>';
			}
			
						
			$sHTML .='</ul>
				</li>';
		}
		
				
		$sHTML .= '</ul>
			<a href="admin_new_page.php">+ New page</a>';

		return $sHTML;
	}

	static public function renderAdminPage($oPage){
		$sHTML = '
		<div class="two-thirds column">
			<h3>'.$oPage->sPageName.'</h3>
			<p>'.$oPage->sContent.'</p>
			<a href="admin_edit_page.php?pageid='.$oPage->iId.'">+ Edit this page</a>
		</div>';

		return $sHTML;

	}

}
?>