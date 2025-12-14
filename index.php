<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>

<?php require("components/head.php") ?>

</head>

<body class="bg-cream text-brownDark font-sans">

  <!-- HEADER -->
<?php require("components/header.php") ?>


  <!-- HERO -->
<?php require("components/hero.php") ?>


  <!-- SECTION -->
   
<?php require("components/tag-line.php") ?>


  <!-- FOOTER -->
<?php require("components/footer.php") ?>


  <script src="js/script.js"></script>

</body>
</html>
