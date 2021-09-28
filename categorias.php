<?php
$pagina = 'CSS/categorias.css';
$title = 'Pagina inicial';
include_once 'top.php';
require_once __DIR__ . "/vendor/autoload.php";
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

<div class="row">
    <div class="col-md-3" id="menu">
        <div>
            <h1>Orange</h1>
        </div>
        <div class="d-grid gap-2">
            <a href="home.php" role="button" class="btn btn-dark">Home</a>
            <a href="produtos.php" role="button" class="btn btn-dark">Produtos</a>
            <a href="categorias.php" role="button" class="btn btn-dark">Categorias</a>
        </div>
    </div>
    <div class="col-md-9" id="corpo">
        <div class="row">
            <div class="col-md-7" id="categorias">
                <h1>Categorias</h1>
            </div>
            <div class="col-md-5" id="btn-add-categoria">
                <a href="adicionar-categoria.php" class="btn btn-outline-primary" role="button" id="btn-adicionar-categoria">Adicionar
                    Categoria</a>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <td class="td-categoria">Categoria</td>
                <td class="td-acoes">Ações</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $categorias = new App\Categorias();
            $categorias->categoria();
            foreach ($categorias->categoria() as $categoria) {
                //if ($categoria['ativo'] == 1) {
                    ?>
                    <tr>
                        <td class="td-categoria"><?php echo $categoria['nome'];
                            ?></td>
                        <td class="td-acoes">
                            <a href="editar-categoria.php?id=<?php echo $categoria["id"]?>" class="btn btn-outline-warning" role="button"
                               id="btn-edit"><i class="bi bi-pencil"></i></a>
                            <a href="App/Deletar.php?id=<?php echo $categoria["id"]?>" class="btn btn-outline-danger" role="button" id="btn-deletar-categoria"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php //}
            } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once 'bottom.php';
?>

