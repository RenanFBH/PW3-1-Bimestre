<?php 
    include('functions.php'); 
    session_start();

    // Verifica se o ID foi enviado e é válido antes de qualquer outra verificação
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        $_SESSION["message"] = "ID inválido ou não fornecido!";
        $_SESSION["type"] = "danger";
        header("Location: " . BASEURL . "index.php");
        exit;
    }

    // Verifica se o usuário é administrador
    if ($_SESSION["user"] != "admin") {
        $_SESSION["message"] = "Você precisa ser administrador para acessar esse recurso!";
        $_SESSION["type"] = "danger";
        header("Location: " . BASEURL . "index.php");
        exit;
    }

    // Processa a exclusão do registro
    try {
        $gerente = find("usuarios", $_GET['id']);

        if ($gerente) { 
            $caminho_arquivo = "fotos/" . $gerente['foto'];

            // Exclui o gerente do banco de dados
            delete($_GET['id']);

            // Verifica se a foto é diferente de "semimagem.jpg" e se o arquivo existe antes de excluir
            if (file_exists($caminho_arquivo) && $caminho_arquivo != "fotos/semimagem.jpg") {
                unlink($caminho_arquivo);
            }
        } else {
            $_SESSION["message"] = "Usuário não encontrado!";
            $_SESSION["type"] = "warning";
            header("Location: " . BASEURL . "index.php");
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Não foi possível realizar a operação: " . $e->getMessage();
        $_SESSION['type'] = "danger";
        header("Location: " . BASEURL . "index.php");
        exit;
    }
?>
