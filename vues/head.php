<head>
    <title><?= $titre ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    <link rel="stylesheet" href="./css/main.css?v=2">
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <script type="text/javascript" src="script/script.js"></script>
    <script type="text/javascript" src="script/connexion.js"></script>
    <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js" type="module"></script>
    
    <?php
      if(isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {
    ?>
        <script type="text/javascript" src="script/dashboard.js"></script>
      <?php
        if($_SESSION['role'] == 1) { 
      ?>
          <script type="text/javascript" src="script/dashboardAdmin.js"></script>
      <?php 
      }
    }
    ?>


    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.ico"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
    <link rel="manifest" href="img/icon/site.webmanifest">
    <link rel="mask-icon" href="img/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <script src="https://kit.fontawesome.com/fa862581cb.js" type="text/javascript" crossorigin="anonymous"></script>

</head>