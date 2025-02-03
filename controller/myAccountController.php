<?php
session_start();

function displayUser() {
    if(!isset($_SESSION['user'])){
        header('location:index.php');
        exit();
    }
}

$user = $_SESSION['user'];
include 'vue/viewMyAccount.php';

displayUser();