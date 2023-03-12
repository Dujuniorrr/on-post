<?php
   $post = $data['post'];
?>
    <main class="mt-3 mb-3 ms-2 me-2 ms-md-0 me-md-0">
        <div class="container">
           <div class="card mb-3">
               <div class="card-header"><a href="<?= URL ?>/posts/index" class="text-primary text-decoration-none">Postagens</a> <span class="text-secondary"> / <?= $post->getTitle() ?> </span></div>
            </div>
            <div class="card">
                <div class="card-header bg-dark bg-gradient text-light">
                    <?= $post->getTitle() ?>
                </div>
                <div class="card-body">
                    <p class='max-char'> 
                        <?= $post->getContent()?>
                    </p>    
                </div>
                <div class="card-footer text-muted text-center">
                    Escrito por <strong> <?= $post->getUser()->getName() ?></strong> em <?= date('d/m/Y', strtotime($post->getCreated_in())) ?>
                </div>
            </div>
            <?php if($_SESSION['user_id'] == $post->getUser()->getId()):?>
                <div class="text-center">
                    <a href="<?= URL ?>/posts/update/<?= $post->getId() ?>" class="m-2 btn btn-primary"> <i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-trash" aria-hidden="true"></i> Deletar
                    </button>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Tem certeza que deletar essa postagem?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Após apertar em "Tenho certeza!" não há como recuperar os dados da postagem.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <a  href="<?= URL ?>/posts/delete/<?= $post->getId() ?>"> <button type="button" class="btn btn-danger">Tenho certeza!</button></a>
                </div>
            </div>
             </div>
        </div>

    </main>