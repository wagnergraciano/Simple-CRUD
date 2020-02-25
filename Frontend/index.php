<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="./assets/style.scss">
<link rel="stylesheet" type="text/css" href="./assets/layout.scss">
<link rel="stylesheet" type="text/css" href="./assests/css/all.min.css>
<script defer src="./assests/js/all.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<title>CRUD simples</title>
</head>
<body>
<div class="container-fluid">
  <div class="row mt-2">
    <div class="col-0 col-md-2"></div>

    <div class="col-12 col-md-8">
            <div class="row font-weight-bold text-white rounded-top p-2" style="background-color: #465777;">
              <!-- Header/ cadastro -->

                  <div class="col-6 pr-6 pt-2">
                      <span>CRUD Simples</span>
                  </div>
                  <div class="col-6">
                      <!-- Button trigger modal -->
                      <form class="float-right">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Cadastrar <i class="fa fa-user-plus"></i>
                      </button>
                      </form>
                  </div>

              <!-- Modal -->
              <div class="modal fade text-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cadastrar pessoa</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                            <form class="px-4 py-3" action="../Backend/cadastrar.php" method="get">
                              <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Nome</label>
                                <input type="name" required class="form-control" id="nome" name="c_nome" placeholder="José da Silva">
                              </div>
                              <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Data de nascimento</label>
                                <input type="date" required class="form-control" id="data nascimento" name="c_dataNasc">
                              </div>
                              <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>


            
            <div class="row justify-content-center p-2" style="background-color: rgb(234,234,234);">
            <!-- Saída de informações -->
                  <form  class="input-group mb-2 mx-3">
                    <input type="text" required class="form-control" placeholder="Clientes cadastrados">
                    <button type="submit" class="btn btn-primary">Pesquisar <i class="fa fa-search"></i></button>
                  </form>

                  <!-- Cards -->
                  <?php
                  include_once("../Backend/dao/pessoaDAO.class.php");
                  include_once("../Backend/classes/pessoa.class.php");
                  $pessoaDAO = new PessoaDAO();
                  $arrayTodos = $pessoaDAO->retornarTodos();
                  foreach($arrayTodos as $linha){
                  $pessoa = new Pessoa($linha['NOME'],$linha['DATA_NASC'],$linha['DATA_GRAV'])
?>
                    <div class="card mx-2 mb-2" style="min-width: 17rem;">
                    <div class="card-body">
                    <form action="../Backend/deletar.php" id="deleteForm" method="get">
                      <input type="hidden" id="c_id" name="c_id" value="<?php echo $linha['ID']  ?>">
                      <h5><button type="submit" style="display:none;"><i class="fa fa-trash float-right text-danger"></i></button></h5>
                    </form>
                      <h5 class="card-title"><?php echo $linha['ID'] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo $pessoa->getNome() ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo $pessoa->getIdade()." anos" ?></h6>
                      <p class="card-text">Data/Hora cadastro:<br/> <?php echo $pessoa->getDataGrav() ?></p>

                      <form>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Alterar <i class="fa fa-pencil"></i>
                      </button>
                      </form>

                      <!-- Modal -->
                      <div class="modal fade text-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<?php
                  }
?>
                  
                  
                  </div>
            </div>
    </div>
    <div class="col-0 col-md-2"></div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>                                		                            