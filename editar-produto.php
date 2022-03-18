<?php
$pagina = 'CSS/editar-produto.css';
$title = 'Editar';
include_once 'top.php';
require_once __DIR__ . "/vendor/autoload.php";
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

<div class="row">
    <div class="col-md-12" id="editar-produto">
        <h1>Editar</h1>
    <form action="App/Produtos.php" method="post">
        <?php
            $produtos = new App\Produtos();
            $produto = $produtos->display($_GET["id"])->fetch_array();
        ?>
        <input type="hidden" name="id" value="<?php echo $produto["id"]; ?>" />
        <div class="col-md-6 form-floating mb-4">
            <input type="text" class="form-control" name="produto" value="<?php echo $produto["nome"]?>">
            <label>Produto</label>
        </div>
        <div class="col-md-6 form-floating mb-4">
            <textarea rows="20" id="descricao" class="form-control" name="descricao">
                <?php echo $produto["descricao"]?>
            </textarea>
            <label>Descrição</label>
        </div>
        <div class="col-md-6 form-floating mb-4">
            <input type="text" class="form-control" name="preco" value="<?php echo $produto["precoVenda"]?>">
            <label>Preço</label>
        </div>
        <div class="col-md-6">
            <button class="btn btn-outline-primary" name="btn-editar-produto">Editar</button>
        </div>
    </div>
    </form>
</div>

<?php
include_once 'bottom.php';
?>