<?php
$pagina = 'CSS/editar-usuario.css';
$title = 'Editar';
include_once 'top.php';
require_once __DIR__ . "/vendor/autoload.php";
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

    <div class="row">
        <div class="col-md-12" id="editar-usuario">
            <h1>Editar</h1>
            <form action="App/Usuarios.php" method="post">
                <?php
                $usuarios = new App\Usuarios();
                $usuario = $usuarios->display($_GET["id"])->fetch_array();
                ?>
                <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>" />
                <div class="col-md-6 form-floating mb-4">
                    <input type="email" class="form-control" name="email" value="<?php echo $usuario["email"]?>">
                    <label>Email</label>
                </div>
                <div class="col-md-6 form-floating mb-4">
                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                    <label>Senha</label>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-outline-primary" name="btn-editar-usuario">Editar</button>
                </div>
        </div>
        </form>
    </div>

<?php
include_once 'bottom.php';
?>