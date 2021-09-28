<?php
$pagina = "CSS/cadastrar.css";
$title = 'Cadastrar';
include_once 'top.php';
?>

    <div class="row" id="cadastro">
        <form action="App/Cadastrar.php" method="post">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nome" id="floatingName" placeholder="Name">
                    <label for="floatingName">Nome completo *</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="telefone" id="floatingTelefone" placeholder="Telefone">
                    <label for="floatingName">Telefone *</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="endereco" id="floatingEndereco" placeholder="Endereço">
                    <label for="floatingEndereco">Endereço *</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="profissao" id="floatingProfissao" placeholder="Profissão/Ocupação">
                    <label for="floatingProfissao">Profissão/Ocupação</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="site" id="floatingSite" placeholder="Site">
                    <label for="floatingSite">Site</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="Password">
                    <label for="floatingEmail">Email *</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Senha *</label>
                </div>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary" name="btn-cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>

<?php
include_once 'bottom.php';
?>