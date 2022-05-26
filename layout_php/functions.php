<?php

function cadastrar($nome, $email, $senha) {

    include 'configuracao.php';

    $senha = md5($senha);

    $sql = ("SELECT cd_usuarios FROM usuarios WHERE ds_email = '$email'");
    $query = mysqli_query($conectar, $sql);
    $row = mysqli_num_rows($query);
                

    if ($row > 0) {
        echo "usuário já cadastrado";
        return false;
    } else {
        $sql = ("INSERT INTO usuarios (nm_pessoa, ds_email, cd_senha) VALUES ('$nome','$email', '$senha')");

        if (mysqli_query($conectar, $sql)) {
            return true;
        } else {
            return false;
        }
            
    }
}


function logar($email, $senha) {

    include 'configuracao.php';

    $senha = md5($senha);
    
    $sql = ("SELECT cd_usuarios FROM usuarios WHERE ds_email = '$email' AND cd_senha = '$senha'");
    $query = mysqli_query($conectar, $sql);
    $row = mysqli_num_rows($query);
                
    if ($row > 0) {
        $row = mysqli_fetch_array($query);
        $_SESSION['sessao'] =  $row['cd_usuarios'];
        return true;
    } else {
        return false;
    }
}

function requeridLogin() {
    if (empty($_SESSION['sessao']))
        echo "<div class='buttonlug verde' onclick='login();'>Você precisa estar conectado para continuar</div>";
    else
        echo "<input type='submit' class='buttonlug' value='Continuar ->'>";
}

function requiredAuth() {
    if (!isset($_SESSION['sessao'])) {
        header("location: login.php");
        exit;
    }
}


if (isset($_POST['plano'])) {
    $plano = $_POST['plano'];
    if ($plano == 1) {
        header("location: ../reservar.php?plano=1");
    } elseif ($plano == 2) {
        header("location: ../reservar.php?plano=2");
    } elseif ($plano == 3) {
        header("location: ../reservar.php?plano=3");
    } elseif ($plano == 4) {
        header("location: ../reservar.php?plano=4");
    } elseif ($plano == 5) {
        header("location: ../reservar.php?plano=5");
    } elseif ($plano == 6) {
        header("location: ../reservar.php?plano=6");
    } elseif ($plano == 7) {
        header("location: ../reservar.php?plano=7");
    } elseif ($plano == 8) {
        header("location: ../reservar.php?plano=8");
    } elseif ($plano == 9) {
        header("location: ../reservar.php?plano=9");
    }
}


if (isset($_POST['btn-editar'])) {
	$id = mysqli_escape_string($conectar, $_POST['id']);
	$nome = mysqli_escape_string($conectar, $_POST['nome']);
	$email = mysqli_escape_string($conectar, $_POST['email']);
    $senha = mysqli_escape_string($conectar, $_POST['senha']);
    

    $sql = ("SELECT ds_email FROM usuarios WHERE ds_email = '$email' AND NOT cd_usuarios = '$id'");
    $query = mysqli_query($conectar, $sql);
    $row = mysqli_num_rows($query);

    $rowArray = mysqli_fetch_array($query);
    $rowEmail = $rowArray['ds_email'];
                

    if ($row > 0) {
        echo "<div class=notify>";
        echo "<form class=notify-form action='' method=POST>";
        echo "<p class=confirmp>O email ".$rowEmail."</p>";
        echo "<p class=confirmp>já foi cadastrado</p>";
        echo "<input class=canceleok type=button onclick=location.href=''; value=ok>";
        echo "</form>";
        echo "</div>";
    } else {
        if ($senha != "") {
            $senha = md5($senha);				
            $sql = "UPDATE usuarios SET nm_pessoa = '$nome', ds_email = '$email', cd_senha = '$senha' WHERE cd_usuarios = '$id'";	
        } else {
            $sql = "UPDATE usuarios SET nm_pessoa = '$nome', ds_email = '$email' WHERE cd_usuarios = '$id'";
        }
   
        if (mysqli_query($conectar, $sql)) {
            header('Location: perfil.php?data=updated');
        }
    }
}


if (isset($_POST['delete-confirm'])) {
    if (isset($_SESSION['sessao'])) {
        $self_id = $_SESSION['sessao'];
	    $id = $_POST['id'];
        echo "<META http-equiv=refresh content=0;URL=sair.php?data=deleted&id=$id&auth=$self_id>";
    } else {
        echo "baka";
    }
}


function tentativa_nao_autoriazada($id) {
    echo "tentativa do id $id enviada ao email paradisehighway@email.com";
}


?>


<?php 
    //$teste = $_COOKIE[""]; 
?> 