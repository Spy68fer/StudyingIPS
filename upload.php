<?php
    require_once('include/common.inc.php');
    
    $vars = array
    (
        'title' => "Форма загрузки изображений"
    );
    $imagesDir = 'upload';
    
    echo getView('upload_header.tpl', $vars);
    
    $errorCode = ERR_OK;
    if (isset($_POST['uploadFileButton']))
    {
        $filename = 'filename';
        uploadFile($filename, $imagesDir, $errorCode);
        if ($errorCode === ERR_OK) 
        {
            echo '<p>Success. File uploaded.</p>';
        }
        else
        {
            printUploadError($errorCode);
        }
    }
    
    if (loadImages($imagesDir) != false)
    {
        echo '<h2>Список загруженных изображений</h2>';
        showImages($imagesDir);
    }
    
    echo getView('upload_footer.tpl', $vars);