<?php

chmod ("/var/www/WebbyLab/IMAGES/", 0777);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT','..'.DS);

require ROOT.DS.'LIB'.DS.'DB.php';
require ROOT.DS.'DEVELOP'.DS.'dev_func.php';

if($_FILES['imgfile']['error'] == 0) {

    if ($_FILES["imgfile"]["size"] > 350*350) {
        die('Size of the file is exceeded');
    } else {
        $path = ROOT.'IMAGES'.DS.$_FILES["imgfile"]["name"];
    }
}

if (is_uploaded_file($_FILES["imgfile"]["tmp_name"])) {
    $stateUpload = move_uploaded_file($_FILES["imgfile"]["tmp_name"],$path);
}

if ($stateUpload == true){

    $contentFile = fopen($path, 'r');
    $toConnect = new DB();
    $connection = $toConnect->getConnect();

    static $i=0;
    $recordsFile = array();

    while($getContentFile = fgetss($contentFile)){

        if ($getContentFile=="\n"){
            $j=0;
            $i++;
            continue;
        } else {
            static $j=0;
            $recordsFile[$i][$j] = trim($getContentFile);
            $j++;
        }
    }

    for($key=0;$key<count($recordsFile);$key++) {

            $title = preg_replace('(Title: )','',$recordsFile[$key][0]);
            $date = preg_replace('(Release Year: )', '',$recordsFile[$key][1]);
            $format = preg_replace('(Format: )', '',$recordsFile[$key][2]);
            $starsAll = preg_replace('(Stars: )', '',$recordsFile[$key][3]);

            $arrayActors = filterAndGetActors($recordsFile[$key][3]);

            //Save new actors
            for ($i=0; $i<count($arrayActors['arrayStars']); $i++){
                $star = trim($arrayActors['arrayStars'][$i]);
                $a = $connection->query("INSERT INTO Actors (`Name`) VALUES ('$star')");
            }

            //Save new films
            $getQuery = $connection->query("INSERT INTO Films (title,date_release,format,stars) VALUES ('$title','$date','$format','$starsAll')");
        }

        $i=0;
        $stateUpload = false;
        header('location:'.'films.php');
    }