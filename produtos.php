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
                <a href="usuarios.php" role="button" class="btn btn-dark">Usuarios</a>
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
                foreach ($produtos->display() as $produto) {
                    ?>
                    <tr>
                        <td class="td-produtos"><?php echo $produto['nome'];
                            ?></td>
                        <td class="td-descricao"><?php echo $produto['descricao'];
                            ?></td>
                        <td class="td-preco"><?php echo 'R$ ' . number_format($produto['precoVenda'], 2, ',', '.');
                            ?></td>
                        <td class="td-acoes">
                            <a href="editar-produto.php?id=<?php echo $produto["produtoId"] ?>"
                               class="btn btn-outline-warning" role="button"
                               id="btn-edit"><i class="bi bi-pencil"></i></a>

                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDeletarProduto">
                                <i class="bi bi-trash"></i>
                            </button>

                            <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modalFotos<?php echo $produto["produtoId"] ?>">
                                <i class="bi bi-camera"></i>
                            </button>
                            <div class="modal fade" id="modalFotos<?php echo $produto["produtoId"] ?>" tabindex="-1"
                                 aria-labelledby="tituloModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tituloModal">
                                                Fotos</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button class="btn btn-light"
                                                            id="addFoto<?php echo $produto['produtoId'] ?>"><i
                                                                class="bi bi-plus-circle"></i>
                                                    </button>
                                                    <form style="display: none" method="post"
                                                          id="formFoto<?php echo $produto['produtoId'] ?>"
                                                          enctype="multipart/form-data"
                                                          action="App/Fotos.php">
                                                        <input type="file" name="novaFoto[]"
                                                               id="novaFoto<?php echo $produto['produtoId'] ?>"
                                                               onchange="document.getElementById('formFoto<?php echo $produto['produtoId'] ?>').submit()"
                                                               multiple/>
                                                        <input type="text" name="id"
                                                               value="<?php echo $produto['produtoId'] ?>">
                                                    </form>
                                                    <script>
                                                        document.getElementById("addFoto<?php echo $produto['produtoId'] ?>").onclick = function () {
                                                            document.getElementById("novaFoto<?php echo $produto['produtoId'] ?>").click();
                                                        }
                                                    </script>
                                                </div>
                                                <?php
                                                $fotos = new App\Fotos();
                                                $fotos = $fotos->display($produto['produtoId']);
                                                foreach ($fotos as $foto) {
                                                    ?>
                                                    <div class="col-md-2 foto">
                                                        <img src="<?php echo($foto[2]) ?>" class="img-fluid"/>

                                                        <div class="opcoes">
                                                            <button class="btn btn-outline-dark" data-bs-toggle="modal"
                                                                    data-bs-target="#modalVisualizarFoto"
                                                                    data-foto="<?php echo $foto[2] ?>"
                                                                    data-titulo="<?php echo $produto['nome'] ?>"
                                                                    onclick="visualizarFoto(this)">
                                                                <i class="bi bi-arrows-fullscreen"></i>
                                                            </button>
                                                            <button class="btn btn-outline-dark"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalDeletarFoto" data-id="<?php echo $foto[0] ?>" onclick="deletarFoto(this)">
                                                                <i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modalDeletarProduto "
         tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal">Deletar</h5>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que quer deletar este produto?</p>
                </div>
                <div class="modal-footer">
                    <form action="App/Produtos.php?id=<?php echo $produto['produtoId'] ?>"
                          method="post">
                        <button class="btn btn-outline-danger" name="btn-deletar-produto"
                                type="submit">Sim, quero deletar
                        </button>
                        <button class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                type="button">Não
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade"
         id="modalVisualizarFoto"
         tabindex="-1" aria-labelledby="tituloModal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="tituloModalFoto"></h5>
                    <button class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="fotoVisualizar"/>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade"
         id="modalDeletarFoto"
         tabindex="-1" aria-labelledby="tituloModal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="tituloModal">Deletar</h5>
                </div>
                <div class="modal-body">
                    <p>Deletar foto?</p>
                </div>
                <div class="modal-footer">
                    <form action=""
                          method="post" id="deletarFoto">
                        <button class="btn btn-outline-danger"
                                name="btn-deletar-foto"
                                type="submit">Sim
                        </button>
                        <button class="btn btn-outline-secondary"
                                data-bs-dismiss="modal"
                                type="button">Não
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function visualizarFoto(objeto) {
            let fotoVisualizar = document.getElementById("fotoVisualizar");
            let tituloModalFoto = document.getElementById("tituloModalFoto");
            fotoVisualizar.src = objeto.dataset.foto;
            tituloModalFoto.innerText = objeto.dataset.titulo;
        }
        function deletarFoto(objeto) {
            let idFoto = objeto.dataset.id;
            let deletarFoto = document.getElementById("deletarFoto");
            deletarFoto.action = "App/Fotos.php?id="+idFoto;
        }
    </script>
<?php
include_once 'bottom.php';
?>