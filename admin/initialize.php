<?php
include 'connect.php';
# Routes
$templateFile = '../includes/layout/';
$cssFile = '../layout/css/';
$jsFile = '../layout/js/';
# important files
include '../includes/functions/functions.php';
include $templateFile . "header.php";
if(!isset($noupperbar)){ include $templateFile."upperbar.php"; }
if(!isset($nonavbar)){ include $templateFile."navbar.php"; }
if(!isset($nobreadCrumb)){ include $templateFile."breadCrumb.php"; }
