<?php
// Memasukkan file konfigurasi database
include 'config.php';
// Memasukkan file init session
include "init_session.php";
?>

<!DOCTYPE html> 
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" 
      data-theme="theme-default" data-assets-path="assets/" 
      data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>Form Layout Vertical</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css">
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css">
    <link rel="stylesheet" href="assets/css/demo.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
</head>
<body>
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include "sidemenu.php"; ?>
        <!-- Layout container -->
        <div class="layout-page">
          <?php include "navbar.php"; ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container mt-4">
