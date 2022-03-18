<?php
$pagina = 'CSS/editar-categoria.css';
$title = 'Editar';
include_once 'top.php';
require_once __DIR__ . "/vendor/autoload.php";
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

<div class="row">
    <div class="col-md-12" id="editar-categoria">
        <h1>Editar</h1>
        <form action="App/Categorias.php" method="post">
            <?php
            $categorias = new App\Categorias();
            $categoria = $categorias->display($_GET["id"])->fetch_array();
            ?>
            <input type="hidden" name="id" value="<?php echo $categoria["id"]; ?>"/>
            <div class="col-md-6 form-floating mb-4">
                <input type="text" class="form-control" name="categoria" value="<?php echo $categoria["nome"] ?>">
                <label>Categoria</label>
            </div>
            <div class="col-md-6">
                <button class="btn btn-outline-primary" name="btn-editar-categoria">Editar</button>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'bottom.php';
?>