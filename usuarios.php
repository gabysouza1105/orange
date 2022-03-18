<?php
$pagina = 'CSS/usuarios.css';
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
            <a href="usuarios.php" role="button" class="btn btn-dark">Usuarios</a>
        </div>
    </div>
    <div class="col-md-9" id="corpo">
        <div class="row">
            <div class="col-md-7" id="usuario">
                <h1>Usuários</h1>
            </div>
            <div class="col-md-5" id="btn-add-usuario">
                <a href="adicionar-usuario.php" class="btn btn-outline-primary" role="button"
                   id="btn-adicionar-usuario">Adicionar
                    Usuário</a>
            </div>
        </div>
        <table>
            <thead>
            <tr>
                <td class="td-usuarios">Usuário</td>
                <td class="td-acoes">Ações</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $usuarios = new App\Usuarios();
            foreach ($usuarios->display() as $usuario) {
                    ?>
                    <tr>
                        <td class="td-usuarios"><?php echo $usuario['email'];
                            ?></td>
                        <td class="td-acoes">
                            <a href="editar-usuario.php?id=<?php echo $usuario["id"] ?>"
                               class="btn btn-outline-warning" role="button"
                               id="btn-edit"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeletar<?php echo $usuario["id"] ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                            <div class="modal fade" id="modalDeletar<?php echo $usuario["id"] ?>" tabindex="-1"
                                 aria-labelledby="tituloModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tituloModal">Deletar</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza que quer deletar este usuário?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="App/Usuarios.php?id=<?php echo $usuario["id"] ?>"
                                               class="btn btn-outline-danger" role="button"
                                               id="btn-deletar-usuario">Sim, quero deletar</a>
                                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Não
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once 'bottom.php';
?>
