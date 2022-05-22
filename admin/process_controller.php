<?php
require_once 'data_controller.php';
if (isset($_POST['semId'])) {
    $semId               =           $_POST['semId'];
    $dController         =           new DataController();
    $frameworks          =           $dController->semListing($semId);
    echo json_encode($frameworks);
}
if (isset($_POST['stuId'])) {
    $stuId               =           $_POST['stuId'];
    $dController         =           new DataController();
    $frameworks          =           $dController->studentListing($stuId);
    echo json_encode($frameworks);
}
