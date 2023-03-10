<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid p-3 ps-md-5 pe-md-5 pt-0 pb-0">
    <a class="navbar-brand text-light fs-3" href="<?= URL ?>">On-Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item pe-2 ps-2 ">
          <a class="nav-link active text-secondary pe-2 ps-2 fs-4" aria-current="page" href="<?= URL ?>">Home</a>
        </li>
        <li class="nav-item pe-2 ps-2 ">
          <a class="nav-link text-secondary pe-2 ps-2 fs-4" href="<?= URL ?>/pages/about/">Sobre</a>
        </li>
      </ul>
     <div class="d-flex">
        <a class="m-2 col-12 col-sm-auto" href="<?= URL ?>/users/login/"><button class="btn btn-primary">Entrar</button></a>
     </div>
     <div class="d-flex">
         <a href="<?= URL ?>/users/register/" class="m-2 col-12 col-sm-auto"><button class="btn btn-primary ">Cadastrar</button></a>
     </div>
    </div>
  </div>
</nav>
<?php 
      if($_SESSION['message']): 
        $message = $_SESSION;
        $_SESSION['message'] = false;
?>
        <div class="alert <?= $message['message-type'] ?> col-11 col-sm-8 col-md-4 mt-2 mb-2 text-center m-auto" role="alert">
            <?= $message['message'] ?>
        </div>
<?php
      endif;
    
?>