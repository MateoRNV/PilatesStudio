<?php include('headerIndex.php');
$page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
$total = count( $utentes );   
$limit = 2;
$totalPages = ceil( $total/ $limit );
$page = max($page, 1);
$page = min($page, $totalPages); 
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;

$Listutentes = array_slice( $utentes, $offset, $limit ); 
?>
<section class="pt-2 pb-1" style="background: center / cover url(img/banner_userlist.png) no-repeat">
    <div class="container">
        <div class="col-md-5 col-sm-12">
            <h1 class="pagetitle">Lista de Utentes</h1>
        </div>
    </div>
</section>

<section class="container search">
    <div class="row p-2">
        <div class="col-10 p-4">
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Pesquisar..." aria-label="Search">
            </form>
        </div>
        <div class="col-2 pt-3 text-center" >
            <a href="/amnese">
                <img src="img/user-plus-solid.png" alt="Adicionar Utente">
                <p class="page-text">Adicionar Novo</p>
            </a>
        </div>
    </div>
</section>
<section class="userlist">
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="col-1">ID</th>
                    <th scope="col" class="col-5">Nome</th>
                    <th scope="col" class="col-2">Data de Registo</th>
                    <th scope="col" class="col-2">Data de Nascimento</th>
                    <th scope="col" class="col-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Listutentes as $utente):?>
                <tr>
                    <th scope="row"><?= $utente['id'] ?></th>
                    <td><?= $utente['name'] ?></td>
                    <td><?= $utente['registrationDate'] ?></td>
                    <td><?= $utente['birthDate'] ?></td>
                    <td>
                        <a href="/view?id=<?= $utente['id'] ?>">
                            <img class="actionicon" src="img/icon_view.png" alt="View">
                        </a>
                        <a href="/edit?id=<?= $utente['id'] ?>">
                            <img class="actionicon" src="img/icon_edit.png" alt="Edit">
                        </a>
                        <a href="/delete?id=<?= $utente['id'] ?>">
                            <img class="actionicon" src="img/icon_delete.png" alt="Delete">
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <p class="page-text text-end">(1 - 10 de <?= (count($utentes)); ?> registos)</p>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <!-- <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Anterior</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Próximo</a>
                </li>
            </ul> -->
           <?php
            $link = 'index.php?page=%d';
            $pagerContainer = '<div style="width: 300px; margin: 0 auto;">';   
            $xpage = $page;
            if( $totalPages != 0 ) 
            {
              if( $page == 1 ) 
              { 
                $pagerContainer .= ''; 
              } 
              else 
              { 
                $pagerContainer .= sprintf( '<a href="' . $link . ' " style="color: #ab8bbc"> &#171;  Anterior</a>', $page - 1 ); 
              }
              $pagerContainer .= ' <span > page <strong>' . $page . '</strong> from ' . $totalPages . '</span>';
              if( $page == $totalPages ) 
              { 
                $pagerContainer .= ''; 
              }
              else 
              { 
                $pagerContainer .= sprintf( '<a href="' . $link . ' " style="color: #ab8bbc">   Próximo &#187; </a>', $page + 1 ); 
              }           
            }                   
            $pagerContainer .= '</div>';
            
            echo $pagerContainer;
            ?>
        </nav>
    </div>
</section>

<?php include('footer.php'); ?>