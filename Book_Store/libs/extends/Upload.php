<?php
echo SCRIPT_PATH . 'PhpThumb' . DS. 'ThumbLib.inc.php';
require_once SCRIPT_PATH . 'PhpThumb' . DS. 'ThumbLib.inc.php';
class Upload{
	public function uploadFile($fileObj, $folderUpload, $options = null){
		if($options == null){
			if($fileObj['tmp_name'] != null){
				$uploadDir = UPLOAD_PATH . $folderUpload . DS;
				$extension = '.' . pathinfo($fileObj['name'], PATHINFO_EXTENSION);
				$newFileName = $this->randomString(8);
				$fileName = $uploadDir . $newFileName .$extension;
				copy($fileObj['tmp_name'], $fileName);

				$thumbs = PhpThumbFactory :: create($fileName);
				$thumbs->resize(60,90);
				$thumbs->save($uploadDir . '60x90-' . $newFileName . $extension); 
			}
		}
	}

	private function randomString($length = 5){
		$arrCharacter = array_merge(range('A','Z'), range('a','z'), range(0,9));
		$arrCharacter = implode($arrCharacter,);
		$arrCharacter = str_shuffle($arrCharacter);

		$result = substr($arrCharacter, 0, $length);
		return $result;

	}
}