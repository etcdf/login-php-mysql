<?php
require_once '../Models/UserDAO.php';
require_once '../Models/UserDTO.php';
$usuarioDAO  = new UsuarioDAO;
$pesquisa = $usuarioDAO->selecionaTds();
//var_dump($pesquisa);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head class="d-flex align-items-center py-4 bg-body-tertiary">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuários</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- // Bootstrap -->
  <link rel="stylesheet" href="../../public/css/main.css">
  <!-- Bootstrap CSS -->
  <link href="https://unpkg.com/@webpixels/css/dist/index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://webpixels.io/vendor/icons/css/all.css">


</head>

<body>

  <!-- Icone do Modo Escuro  -->
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>
  <!-- // Icone do Modo Escuro  -->
  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <!-- Botão do modo escuro -->
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Escolher Tema</span>
    </button>
    <!-- // Botão do modo escuro -->
    <!-- Lista com as opçoes de tema  -->
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <!-- Tema Claro -->
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Claro
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <!-- // Tema Claro -->
      <!-- Tema escuro -->
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Escuro
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <!-- // Tema escuro -->
      <!-- Tema automatico -->
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <!-- // Tema automatico -->
    </ul> <!-- // Lista com as opçoes de tema  -->
  </div>
  <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
      <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
          <div class="mb-npx">
            <div class="row align-items-center">
              <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                <h1 class="h2 mb-0 ls-tight">Usuários</h1>
              </div>
              <div class="col-sm-6 col-12 text-sm-end">
                <div class="mx-n1">
                  <a href="#" class="btn d-inline-flex btn-sm btn-neutral mx-1">
                    <span class=" pe-2">
                      <i class="bi bi-pencil"></i>
                    </span>
                    <span>Editar</span>
                  </a>
                  <a href="cadastro.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                    <span class=" pe-2">
                      <i class="bi bi-plus"></i>
                    </span>
                    <span>Criar</span>
                  </a>
                </div>
              </div>
            </div>
            <ul class="nav nav-tabs mt-4 overflow-x border-0">
              <li class="nav-item ">
                <a href="#" class="nav-link active">Todos os usuários</a>
              </li>
            </ul>
          </div>
        </div>
      </header>
      <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
          <div class="card mb-7">
            <div class="card-header">
              <h5 class="mb-0">Usuários</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-nowrap">
                <thead class="table-light">
                  <tr>
                    <th scope="col">Nome do usuário</th>
                    <th scope="col">ID do usuário</th>
                    <th scope="col">E-mail do usuário</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // echo '<tbody>';

                  foreach ($pesquisa as $p) {
                    echo '<tr>';

                    //echo"{$p["idUsuario"]}{$p["nome"]}{$p["email"]}{$p["login"]}{$p["idPerfil"]}AletarApagar";

                    echo " <td scope='row'><a class='text-heading font-semibold' href='#'>  {$p["nome"]} </a></td>";
                    echo "<td>  {$p["idusuario"]} </td>";
                    echo "<td> {$p["email"]} </td>";
                    echo "<td class='text-end'><a href='#' class='btn btn-sm btn-neutral'>Alterar </a><button type='button' title='Apagar' class='btn btn-sm btn-square btn-neutral text-danger-hover'><i class='bi bi-trash'></i></button></td>";
                    echo '</tr>';
                  }
                  // echo '</tbody>';
                  ?>

                </tbody>
              </table>
            </div>
            <div class="card-footer border-0 py-5">
              <span class="text-muted text-sm">Vencemo!</span>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- // Bootstrap -->
</body>

</html>
