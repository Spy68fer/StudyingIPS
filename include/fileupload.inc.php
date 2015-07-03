<?php
    
    define('ERR_NO_UPLOADED_FILE', 1);
    define('ERR_NOT_IMAGE', 2);
    define('ERR_TOO_BIG_IMAGE', 3);
    define('ERR_NOT_UPLOADED', 4);
    
    
    function uploadFile($filename, $imagesDir, &$errorCode)
    {        
        $file = getUploadedFile($filename, $errorCode);
        if ($errorCode === ERR_OK)
        {
            checkImageSize($file, $errorCode);
        }
        
        if ($errorCode === ERR_OK)
        {
            checkImageType($file, $errorCode); //Допустимые типы файлов - PNG и JPEG
        }
        
        if ($errorCode === ERR_OK)
        {
            $destination = $imagesDir . '/' . $file[name];
            if (!move_uploaded_file($file[tmp_name], $destination))
            {
                $errorCode = ERR_NOT_UPLOADED;
            }
        }
        
        return $errorCode;
    }
    
    function getUploadedFile($filename, &$errorCode)
    {
        $file = $_FILES[$filename];
        if (empty($file[name]))
        {
            $errorCode = ERR_NO_UPLOADED_FILE;
        }
        return ($errorCode === ERR_OK) ? $file : false;
    }
    
    function checkImageType($file, &$errorCode)
    {
        if (($file[type] != 'image/jpeg') AND ($file[type] != 'image/png'))
        {
            $errorCode = ERR_NOT_IMAGE;
        }
    }
    
    function checkImageSize($file, &$errorCode)
    {
        if (($file[error] == 1) OR ($file[error] == 2))
        {
            $errorCode = ERR_TOO_BIG_IMAGE;
        }
    }
    
    function loadImages($dir)
    {
        $imagesList = scandir($dir);
        return (!empty($imagesList[2])) ? $imagesList : false;
    }
    
    function showImages($imagesDir)
    {
        $imagesList = loadImages($imagesDir);
        foreach ($imagesList as $key => $value)
        {
            $fileInfo = @getimagesize($imagesDir . '/' . $value);
            if (in_array($fileInfo[2], array(2, 3)))
            {
                echo '<img class="gallery_image" src="' . $imagesDir . '/' . $value . '">';
            }
        }
    }
    
    function printUploadError($errorCode)
    {
        $uploadError = array
        (
            ERR_NO_UPLOADED_FILE => 'No choose file. <br>',
            ERR_NOT_IMAGE => 'File is not picture. <br>',
            ERR_TOO_BIG_IMAGE => 'The size of file is large too. <br>',
            ERR_NOT_UPLOADED => 'File is not upload. <br>'
        );

        echo '<p class="error_message">' . $uploadError[$errorCode] . '</p>';
    }