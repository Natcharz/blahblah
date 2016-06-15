<?php
class Form{
	//to store html of the form
	public $sHTML;
	public $aData;

	public function __construct(){
		$this->sHTML = '';
		$this->aData = [];
	}

	//form building methods
	public function open(){
		$this->sHTML .= '<form action="" method="post">';
	}
	public function close(){
		$this->sHTML .='</form>';
	}
	public function makeTextInput($sLabel,$sInputName){
		$sData = '';

		//looking for sticky data of input
		if(isset($this->aData[$sInputName]) == true){
			$sData = $this->aData[$sInputName];
		}

		$this->sHTML .='<label for="'.$sInputName.'">'.$sLabel.'</label>
				<input type="text" id="'.$sInputName.'" name="'.$sInputName.'" value="'.$sData.'"/>';
	}

	public function makeTextArea($sLabel,$sInputName){
		$sData = '';
		//looking for sticky data of input
		if(isset($this->aData[$sInputName]) == true){
			$sData = $this->aData[$sInputName];
		}

		$this->sHTML .= '<label for="'.$sInputName.'">'.$sLabel.'</label>
				<textarea id="'.$sInputName.'" name="'.$sInputName.'">'.$sData.'</textarea>';
	}

	public function makeSubmit($sLabel,$sInputName){
		$this->sHTML .= '<input type="submit" name="'.$sInputName.'" value="'.$sLabel.'"/>';
	}
}


?>