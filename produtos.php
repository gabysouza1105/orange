<?php
$pagina = 'CSS/produtos.css';
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
                <div class="col-md-7" id="produto">
                    <h1>Produtos</h1>
                </div>
                <div class="col-md-5" id="btn-add-produto">
                    <a href="adicionar-produto.php" class="btn btn-outline-primary" role="button"
                       id="btn-adicionar-produto">Adicionar
                        Produto</a>
                </div>
            </div>
            <table>
                <thead>
                <tr>
                    <td class="td-produtos">Produto</td>
                    <td class="td-descricao">Descrição</td>
                    <td class="td-preco">Preço</td>
                    <td class="td-acoes">Ações</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $produtos = new App\Produtos;
                $produtos->produto();
                foreach ($produtos->produto() as $produto) {
                    if ($produto['ativo'] == 1) {
                        ?>
                        <tr>
                            <td class="td-produtos"><?php echo $produto['nome'];
                                ?></td>
                            <td class="td-descricao"><?php echo $produto['descricao'];
                                ?></td>
                            <td class="td-preco"><?php echo $produto['precoVenda'];
                                ?></td>
                            <td class="td-acoes">
                                <a href="editar-produto.php?id=<?php echo $produto["id"] ?>"
                                   class="btn btn-outline-warning" role="button"
                                   id="btn-edit"><i class="bi bi-pencil"></i></a>
                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeletar<?php echo $produto["id"]?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <div class="modal fade" id="modalDeletar<?php echo $produto["id"]?>" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tituloModal">Deletar</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Tem certeza que quer deletar este produto?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="App/Deletar.php?id=<?php echo $produto["id"]?>" class="btn btn-outline-danger" role="button"
                                                   id="btn-deletar-produto">Sim, quero deletar</a>
                                                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Não</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
include_once 'bottom.php';
?>