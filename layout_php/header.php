<?php
    include 'layout_php/configuracao.php';
    header( 'Content-type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--Desenvolvido por Antonio -->
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <?php echo "<title>$nome_pagina - $nome_site</title>"; ?>
    <link rel="canonical" href="http://viagens.com/">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/config-root.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/antonio.css">
</head>
<!-- <body oncontextmenu="return false;"> -->
<body onkeypress="return atalhos();">
<audio src="sounds/anamanaguchi_miku.wav" style="display:none;" id="ooeeoo"></audio>
<audio src="sounds/Red_Swan_YOSHIKI_HYDE.mp3" style="display:none;" id="snk"></audio>
<script>
  TogetherJSConfig_hubBase = "https://acoustic-possible-sodium.glitch.me/";
</script>
<script src="togetherjs-min.js"></script>
<div id="wrapper" class="wrapper">
    <div class="container-fluid">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-dark navbarone">
            <a href="index.php" class="navbar-brand"><?php echo $nome_site ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-site">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-site">
                <ul class="navbar-nav ml-auto">
                    <?php 
                        if (isset($_SESSION['sessao'])) {
                    ?>
                        <span class="bv-txt text-light">Bem-vindo, <?php echo $nome_usuario; ?></span>
                        <li class="nav-item dropdown">
                            <a href="#" class="btn nav-link dropdown-toggle text-light btn-outline-light" data-toggle="dropdown">Minha conta</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item text-dark">Configurações</a>
                                <a href="#" class="dropdown-item text-dark">Sair</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <a href="#" title="Assista animes com amigos!" onclick="TogetherJS(this); return false;" class="btn nav-link text-light btn-outline-light">TogetherJS</a>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="btn nav-link dropdown-toggle text-light btn-outline-light" data-toggle="dropdown">Recomendações</a>
                        <div class="dropdown-menu">
                            <a title="Recomendo!" href="index.php?anime=golden+time&ep=1" class="dropdown-item text-white">Golden Time</a>
                            <a title="Recomendo!" href="index.php?anime=shingeki+no+kyojin&ep=1" class="dropdown-item text-white">Shingeki no Kyojin</a>
                            <a title="Recomendo!" href="index.php?anime=Kimetsu+no+yaiba&ep=1" class="dropdown-item text-white">Kimetsu no Yaiba</a>
                            <a title="Recomendo!" href="index.php?anime=shigatsu+wa+kimi+no+uso&ep=1" class="dropdown-item text-white">Shigatsu wa Kimi no Uso</a>
                            <a title="Mais!" href="reco_list.php" class="dropdown-item text-white">Mais!</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="btn nav-link text-light btn-outline-light dropdown-toggle"  data-toggle="dropdown">---------- Atalhos ----------</a>
                        <div class="dropdown-menu">
                            <span href="#" class="dropdown-item text-white">(A) Ahoy!</span>
                            <span href="#" class="dropdown-item text-white">(H) EP anterior</span>
                            <span href="#" class="dropdown-item text-white">(J) Proximo EP</span>
                            <span href="#" class="dropdown-item text-white">(Q) Pular 1:30</span>
                            <span href="#" class="dropdown-item text-white">(P) Play/Pause</span>
                            <span href="#" class="dropdown-item text-white">(F) Fullscreen/Sair</span>
                            <span class="dropdown-item text-white">Without focus,</span>
			                <span class="dropdown-item text-white">try type miku or snk3</span>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>