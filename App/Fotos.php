<?php

namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Fotos
{
    public function upload($produtoId)
    {
        $formatosPermitidos = ["png", "jpeg", "jpg"];
        $foto = $_FILES['novaFoto'];
        $quantidadeArquivos = count($foto['name']);

        $contador = 0;
        $pastaWeb = "arquivos/";
        $pasta = __DIR__ . "/../$pastaWeb";
        while ($contador < $quantidadeArquivos) {
            $extensao = pathinfo($foto['name'][$contador], PATHINFO_EXTENSION);

            if (in_array($extensao, $formatosPermitidos)) {
                $temporario = $foto['tmp_name'][$contador];
                $novoNome = uniqid() . ".$extensao";

                if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                    chmod($pasta . $novoNome, 0777);
                    $sql = "INSERT INTO fotosProdutos (produtoId, caminhofoto, ativo) VALUES ('$produtoId', '$pastaWeb$novoNome', '1')";
                    mysqli_query(Conexao::conn(), $sql);
                    header('Location: /Orange/produtos.php');
                } else {
                    echo "Erro ao enviar o arquivo $temporario";
                }
            } else {
                echo "$extensao não é permitida";
            }
            $contador++;
        }
    }

    public
    function display($produtoId)
    {
        $sql = "SELECT * FROM fotosProdutos WHERE produtoId = '$produtoId' and ativo = '1'";
        $resultado = mysqli_query(\App\Conexao::conn(), $sql);

        if (!empty($resultado)) {
            $fotos = mysqli_fetch_all($resultado);
            return $fotos;
        }
    }

    public
    function deletar($fotoId)
    {
            $sql = "UPDATE fotosProdutos SET ativo = '0' WHERE fotoId = '$fotoId'";
            mysqli_query(Conexao::conn(), $sql);
            header('Location: /Orange/produtos.php');
    }
}
$foto = new Fotos();
if (isset($_FILES['novaFoto'])) {
    $foto->upload($_POST['id']);
}

if (isset($_POST['btn-deletar-foto'])){
    $foto->deletar($_GET['id']);
}