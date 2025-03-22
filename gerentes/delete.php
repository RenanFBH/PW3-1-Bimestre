<?php 
    include('functions.php'); 
    session_start();

    // Verifica se o ID foi enviado e é válido antes de verificar o login
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        $_SESSION["message"] = "ID inválido ou não fornecido!";
        $_SESSION["type"] = "danger";
        header("Location: " . BASEURL . "index.php");
        exit;
    }

    // Verifica se o usuário está logado
    if (!isset($_SESSION["user"])) {
        $_SESSION["message"] = "Você deve estar logado para acessar esse recurso!";
        $_SESSION["type"] = "danger";
        header("Location: " . BASEURL . "index.php");
        exit;
    }

    try {
        // Busca o gerente no banco de dados
        $gerente = find("gerentes", $_GET['id']);

        if ($gerente) { 
            $caminho_arquivo = "fotos/" . $gerente['foto'];

            // Exclui o gerente do banco de dados
            delete($_GET['id']);

            // Verifica se a foto é diferente de "semimagem.jpg" e se o arquivo existe antes de excluir
            if (file_exists($caminho_arquivo) && $caminho_arquivo != "fotos/semimagem.jpg") {
                unlink($caminho_arquivo);
            }
        } else {
            $_SESSION["message"] = "Gerente não encontrado!";
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
