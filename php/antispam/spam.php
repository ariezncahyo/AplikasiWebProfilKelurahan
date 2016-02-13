<?php
session_start();
include "random.php";

$random -> Set($_SESSION['kodeRandom']);
$random -> Stroke();
?>