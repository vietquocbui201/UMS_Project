<?php
session_start();
$_SESSION['data_search']=null;
if (isset($_POST['data_search'])) {
    $_SESSION['data_search'] = $_POST['data_search'];
}

?>