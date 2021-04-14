<?php
class Upload{
    
    private $_fileName;
    private $_fileSize;
    private $_fileExtension;
    private $_fileTmp;
    private $_errors;
    private $_uploadDir;

    // Khởi tạo
    public function __construct($fileName){
        $fileInfor              = $_FILES[$fileName];
        $this->_fileName        = $fileInfor['name'];
        $this->_fileSize        = $fileInfor['size'];
        $this->_fileExtension   = $this->getFileExtension();
        $this->_fileTmp         = $fileInfor['tmp_name']; 
    }

    // lấy phần mở rộng file
    public function getFileExtension(){
        $ext = pathinfo($this->_fileName, PATHINFO_EXTENSION);
        return $ext;
    }

    // thiết lập phần mở rộng kiểu file được upload
    public function setFileExtension($arrExtension){
        if(in_array(strtolower($this->_fileExtension), $arrExtension) == false){
            $this->_errors[] = 'error';
        }
    }

    // thiết lập min, max file size
    public function setFileSize($min, $max){
        if($this->_fileSize < $min || $this->_fileSize > $max){
            $this->_errors[] = 'This size is too big';
        }
    }

    // thiết lập đường dẫn đến folder upload
    public function setUploadDir($value){
        if(file_exists($value)){
            $this->_uploadDir = $value;
        } else{
            $this->_errors[] = 'folder is empty';
        }
    }

    // check validate file
    public function isValid(){
        $flag = false;
        if(is_countable($this->_errors) > 0){
            $flag = true;
        }
        return $flag;
    }

    // upload file
    public function upload($rename = true){
        if($rename == true){
            $fileName = $this->randomString(6);
            $destination = $this->_uploadDir . $fileName;
        } else{
            $destination = $this->_uploadDir . $this->_fileName;
        }
        @move_uploaded_file($this->_fileTmp, $destination);
    }

    // Display Errors
    public function showError(){
        echo '<pre>';
        print_r($this->_errors);
        echo '<pre/>';
    }

    // Random file name
	private function randomString($length = 5){
		
		$arrCharacter = array_merge(range('A','Z'), range('a','z'), range(0,9));
		$arrCharacter = implode($arrCharacter, );
		$arrCharacter = str_shuffle($arrCharacter);
	
		$result		= substr($arrCharacter, 0, $length) . '.' . $this->_fileExtension;
		return $result;
	}
}