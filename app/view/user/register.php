    <main class="container col-lg-5 col-12 col-sm-10 col-md-6 mt-3 mb-3">
        <form name="register" method="POST" action="<?= URL ?>/users/register" class="border border-secondary rounded-2">
            <div class="bg-dark text-light p-3 pb-1">
                <h2>
                    Cadastre-se
                </h2>
                <p class="text-secondary">
                    Preencha o formulário abaixo para fazer seu cadastro.
                </p>
            </div>
            <div class="p-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="name" value="<?= $data['name'] ?>"  name="name" class="form-control <?php if(isset($data['name_error'])): ?> is-invalid <?php endif; ?>" id="name" placeholder="Digite seu nome.">
                    <div class="invalid-feedback">
                        <?= $data['name_error']; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" value="<?= $data['email'] ?>" name="email" class="form-control  <?php if(isset($data['email_error'])): ?> is-invalid <?php endif; ?>" id="email" placeholder="Digite seu email.">
                    <div class="invalid-feedback">
                        <?= $data['email_error']; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" value="<?= $data['password'] ?>" name="password" class="form-control  <?php if(isset($data['password_error'])): ?> is-invalid <?php endif; ?>" id="password" placeholder="Digite sua senha">
                    <div class="invalid-feedback">
                        <?= $data['password_error']; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Confirmação de Senha</label>
                    <input type="password" value="<?= $data['password_confirm'] ?>" name="password_confirm" class="form-control  <?php if(isset($data['password_confirm_error'])): ?> is-invalid <?php endif; ?>" id="password_confirm" placeholder="Confirme sua senha">
                    <div class="invalid-feedback">
                        <?= $data['password_confirm_error']; ?>
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </main>
