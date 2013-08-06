<?php
class Upload {
    private  $fileAllowed;
    private  $uploadDir;
    private  $fileSizeAllowed;
    private  $fileSize;
    private  $fileName;
    private  $fileTmp;
    private  $fileType;
    public   $errors;

    /**
     * @return int
     */
    public function getFileSizeAllowed()
    {
        return $this->fileSizeAllowed;
    }

    /**
     * @return string
     */
    public function getUploadDir()
    {
        return $this->uploadDir;
    }

    /**
     * @return array
     */
    public function getFileAllowed()
    {
        return $this->fileAllowed;
    }

    public function __construct(){
        $this->fileAllowed = array('gif', 'png', 'jpg');
        $this->uploadDir = SITE_PATH."publics/upload/images/";
        $this->fileSizeAllowed = 1048576;
    }

    public static function setInfoUpload($name){
        $file = $_FILES[$name];
        $this->fileName = $file['name'];
        $this->fileType = $this->getFileExtension();
        $this->fileTmp = $file['tmp_name'];
        $this->fileSize = $file['size'];
    }

    private function getFileExtension(){
        return end(explode(".", $this->fileName));
    }

    public function setFileExtension($value){
        $this->fileAllowed = $value;
    }

    public function setUploadDir($value = ""){
        if(file_exists($value)){
            $this->uploadDir = $value;
        }else{
            $this->errors[] = "dir";
        }
    }

    public function setSizeAllowed($value){
        $this->fileSizeAllowed = $value * 1024;
    }

    public function isValid(){
        if($this->fileSize > $this->fileSizeAllowed){
            $this->errors[] = "Kích thước tập tin quá lớn";
        }
        if(!in_array($this->fileType, $this->fileAllowed)){
            $this->errors[] = "Tập tin mở rộng không hợp lệ";
        }

        if(count($this->errors) == 0){
            return true;
        }else{
            return false;
        }
    }

    function upload($rename = true){
        $name =  ($rename == true) ?  uniqid(rand(), true). '.'. $this->fileType : $this->fileName;
        $nameUpload = $this->uploadDir . $name;
        if(@copy($this->fileTmp, $nameUpload)){
            return true;
        }else{
            return false;
        }
    }
}