<?php 
   require_once("../app/view/header.php")
?>
    <main class="container col-lg-5 col-12 col-sm-10 col-md-6 mt-3 mb-3">
        <form name="register" method="POST" action="<?= URL ?>/user/register" class="border border-secondary p-3 rounded-2">
            <h2>
                Cadastre-se
            </h2>
            <p>
                Preencha o formulário abaixo para fazer seu cadastro.
            </p>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input required type="name" value="<?= $data['name'] ?>"  name="name" class="form-control" id="name" placeholder="Digite seu nome.">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" value="<?= $data['email'] ?>" name="email" class="form-control" id="email" placeholder="Digite seu email.">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input required type="password" value="<?= $data['password'] ?>" name="password" class="form-control" id="password" placeholder="Digite sua senha">
            </div>
            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirmação de Senha</label>
                <input required type="password" value="<?= $data['password_confirm'] ?>" name="password_confirm" class="form-control" id="password_confirm" placeholder="Confirme sua senha">
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            <div class="text-center mt-3">
                <a href="">Já tem uma conta? Faça login.</a>
            </div>
        </form>
    </main>

<?php 
   require_once("../app/view/footer.html")
?>