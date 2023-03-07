<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid p-3 ps-5 pe-5">
    <a class="navbar-brand text-light fs-2" href="<?= URL ?>">On-Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item pe-2 ps-2 ">
          <a class="nav-link active text-secondary pe-2 ps-2 fs-3" aria-current="page" href="<?= URL ?>">Home</a>
        </li>
        <li class="nav-item pe-2 ps-2 ">
          <a class="nav-link text-secondary pe-2 ps-2 fs-3" href="<?= URL ?>/page/about/">Sobre</a>
        </li>
      </ul>
     <div class="d-flex">
        <a class="m-2 col-12 col-sm-auto"><button class="btn btn-primary fs-5">Entrar</button></a>
     </div>
     <div class="d-flex">
         <a href="<?= URL ?>/user/register/" class="m-2 col-12 col-sm-auto"><button class="btn btn-primary fs-5">Cadastrar</button></a>
     </div>
    </div>
  </div>
</nav>