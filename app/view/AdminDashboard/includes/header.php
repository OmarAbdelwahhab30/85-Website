<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>85:45 - <?= isset($pageTitle)? $pageTitle : 'hello' ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=URLROOT?>AdminAssets/img/main%20logo%203.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URLROOT?>AdminAssets/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/bootstrap-rtl.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/feathericon.min.css">

    <link rel="stylesheet" href="<?=URLROOT?>AdminAssets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?=URLROOT?>AdminAssets/css/style.css">


</head>
<body>
<?php    
if($_SESSION['image'] == ''){
	$image = STATIC_IMAGE;
} else {
	$image = $_SESSION['image'];
}
?>