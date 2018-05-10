<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT','..'.DS);

require ROOT.DS.'LIB'.DS.'DB.php';
require ROOT.DS.'DEVELOP'.DS.'dev_func.php';

if ( isset($_POST['title'], $_POST['date_release'], $_POST['format'], $_POST['actors']) ){

    if ( !empty($_POST['title']) ){
        $title = !preg_match('\<|>|@|[0-9]+', $_POST['title']) ? $_POST['title'] : null;

        if ( !empty($_POST['date_release']) && $title!=null ){
            $date = !preg_match('\<|>|@|[0-9]+', $_POST['date_release']) ? $_POST['date_release'] : null;

            if ( !empty($_POST['format']) && $date!=null ){
                $format = !preg_match('\<|>|@|[0-9]+', $_POST['format']) ? $_POST['format'] : null;

                if ( !empty($_POST['actors']) && $format!=null) {
                    $getActors = !preg_match('\<|>|@|[0-9]+', $_POST['actors']) ? $_POST['actors'] : null;

                    if ($getActors!=null){

                        $actors = filterAndGetActors($getActors);

                        $toConnect = new DB();
                        $connection = $toConnect->getConnect();

                        for ($i=0; $i<count($actors['arrayStars']); $i++){
                            $star = trim($actors['arrayStars'][$i]);
                            $res = $connection->query("INSERT INTO Actors (Name) VALUES ($star)");
                        }

                        $starsAll = $actors['textStars'];
                        $getQuery = $connection->query("INSERT INTO Films (title,date_release,format,stars) VALUES ('$title','$date','$format','$starsAll')");

                    } else {
                        echo 'Please, write correct data';
                    }

                }

            } else {
                echo 'Please, fill the date';
            }

        } else {
            echo 'Please, fill the format';
        }

    } else {
        echo 'Please, fill the title';
    }
}
