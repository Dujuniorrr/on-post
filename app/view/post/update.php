    <main class="mt-3 mb-3 ms-2 me-2 ms-md-0 me-md-0">
        <div class="container">
           <div class="card mb-3">
           <div class="card-header"><a href="<?= URL ?>/posts/index" class="text-primary text-decoration-none">Postagens</a> <span class="text-secondary"> / </span> <a class="text-primary text-decoration-none" href="<?= URL ?>/posts/read/<?= $data['id'] ?>"><?= $data['title'] ?></a> <span class="text-secondary"> / Editar </span> </div>
           </div>
        </div>
        <div class="container border border-2 p-0 rounded-3">
            <form name="write" method="POST" action="<?= URL ?>/posts/update/<?= $data['id'] ?>" class="border border-secondary rounded-2">
                <div class="bg-dark text-light p-3 pb-1">
                    <h4>
                    Escrever Postagem
                    </h4>
                </div>
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="p-3">
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" value="<?= $data['title'] ?>" name="title" class="form-control <?= empty($data['title_error']) ? '' : 'is-invalid' ?>" id="title" placeholder="Digite o título do post.">
                        <div class="invalid-feedback">
                            <?= $data['title_error'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Texto</label>
                        <textarea name="content" id="content" class="form-control <?= empty($data['content_error']) ? '' : 'is-invalid' ?>" rows="10" placeholder="Escreva o conteúdo da sua postagem."><?= $data['content'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $data['content_error'] ?>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary col-10 col-md-6 col-lg-4" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>