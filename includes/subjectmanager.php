<?php
require_once('connection.php');
require_once('subject.php');

class SubjectManager{
	//no data - a shell class

	static public function getSubjects(){

		$aSubjects = [];

		$oConnection = new Connection();
		//query subject ids
		$sSQL = 'SELECT id FROM subjects';

		$oResultSet = $oConnection->query($sSQL);

		//load each subject for each id
		while($aRow = $oConnection->fetch($oResultSet)){
			$iSubjectId = $aRow['id'];
			$oSubject = new Subject();
			$oSubject->load($iSubjectId);
			$aSubjects[] = $oSubject; // add subject to list
		}
		return $aSubjects;
	}
}

//test...

// echo '<pre>';
// print_r(SubjectManager::getSubjects());
// echo '</pre>';

?>