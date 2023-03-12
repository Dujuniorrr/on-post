<?php
    $posts = $data['posts'];
?>
    <main class="mt-3 mb-3">
        <div class="container border border-2 p-0 rounded-3">
            <div class="bg-dark bg-gradient d-flex justify-content-between p-3 border-bottom border-1 border-dark rounded-top">
                <div>
                    <h3 class="text-light">Postagens</h3>
                </div>
                <div>
                    <a href="<?= URL ?>/posts/create"><button class="btn btn-primary">Escrever Post</button></a>
                </div>
            </div>
            <div>
                <?php if(empty($posts)):?>
                    <div class="alert alert-danger fs-3 m-4 text-center mt-4 mb-4">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Ainda não foi adicionada nenhuma postagem.
                    </div>
                <?php else: ?>
                    <?php foreach($posts as $post): ?>
                        <div class="card m-4">
                            <div class="card-header">
                                <?= $post->getTitle() ?>
                            </div>
                            <div class="card-body">
                                <p class='max-char'> 
                                    <?= strlen( $post->getContent()) > 500 ? substr( $post->getContent(), 0,500) . "..." :  $post->getContent()?>
                                </p>    
                                <a href="<?= URL ?>/posts/read/<?= $post->getId() ?>" class="btn btn-primary">Ler mais</a>
                            </div>
                            <div class="card-footer text-muted text-center">
                                Escrito por <?= $post->getUser()->getName() ?> em <?= date('d/m/Y', strtotime($post->getCreated_in())) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>