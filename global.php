<?php

function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}

$folderUploaded = $_SERVER['DOCUMENT_ROOT'] . "/DuAnMau/content/images/";

function uploadFile($file, $folderUpload)
{
    $pathStorage = $folderUpload . time() . $file['name'];
    $currentStorage = '/DuAnMau/content/images/' . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $currentStorage;
    }

    return null;
}
