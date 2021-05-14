<?php
session_start();
include ('db/conn.php');

?>
<link rel="stylesheet" href="CSS/main.css">
<link rel="stylesheet" href="CSS/jquery.mobile-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src= "JS/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src= "JS/jquery.mobile-1.4.5.min.js" /></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<main class="table-responsive">

  <table class="table" data-role="table"  id="my-table" >
    <thead>
      <tr>
        <th class="th-sm">Nome</th>
        <th class="th-sm">Tipo</th>
        <th class="th-sm">Tamanho</th>
        <th class="th-sm">Baixar</th>
        <th class="th-sm">Apagar</th>
      </tr>
    </thead>
    <tbody>

      <?php
      foreach (glob("uploads/".$_SESSION['usuario']."/*.*") as $v) {
        $name = basename($v); //nome do arquivo
        $ext = strrchr($name,'.'); //pega extenção
        $filesize = filesize($v); //pega tamanho em bits
        $filesize = round($filesize / 1024 / 1024, 1);// transforma tamanho em mb

        // Pega o icone
        switch ($ext) {
          case '.png':
          case '.PNG':
          $icon = '<ion-icon name="image-outline" size="small"></ion-icon>';
          break;

          case '.mp3':
          $icon = '<ion-icon name="musical-notes-outline" size="small"></ion-icon>';
          break;

          case '.mp4':
          $icon = '<ion-icon name="videocam-outline" size="small"></ion-icon>';
          break;

          case '.pdf':
          $icon = '<ion-icon name="document-text-outline" size="small"></ion-icon>';
          break;

          default:
          $icon = '<ion-icon name="document-outline" size="small"></ion-icon>';
          break;
        }

        //começa tabela
        echo '
        <tr>
        <td>'.$name.'</td>
        <td>'.$icon." ".$ext.'</td>
        <td>'.$filesize.' Mb</td>
        <td><button type="button" class="btn btn-warning btn-sm"><a download style="margin-left:-4%" data-ajax="false" href="baixar.php?file='.$name.'"><ion-icon name="download-sharp" size="large"></ion-icon></a><br><br></button></td>
        <td><button type="button"><center><a style="margin-left:-4%" data-ajax="false" href="apagar.php?file='.$name.'"><ion-icon name="trash-sharp" size="large"></ion-icon></a><br><br></center></button></td>
        ';

        switch ($ext) {
          case '.pdf':
          case '.PDF':
          echo '<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#doc"><h3>
          Ver arquivo
          </h3></button></td>';
          echo '<th></th>';
          echo '<div class="modal" id="doc" tabindex="-1" role="dialog">
          <div class="modal-dialog" data-role="document">
          <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title">Preview de arquivos PDF</h5>
          </div>
          <div class="modal-body">
          <embed src="uploads/'.$_SESSION['usuario'].'/'.$name.'" frameborder="0" width="100%" height="400px">
          </div>
          <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-outline-warning btn-rounded btn-md ml-4" data-dismiss="modal">Fechar</button>
          </div>
          </div>
          </div>
          </div>';
          break;

          case '.mp4':
          case '.MP4':
          echo '<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#video"><h3>
          Assitir video
          </h3></button></td>';
          echo '<th></th>';
          echo '<div class="modal" id="video" tabindex="-1" role="dialog">
          <div class="modal-dialog" data-role="document">
          <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title">Preview de video</h5>
          </div>
          <div class="modal-body">
          <video width="320" height="240" controls>
          <source src="uploads/'.$_SESSION['usuario'].'/'.$name.'" type="video/mp4">
          Your browser does not support the video tag.
          </video>
          </div>
          <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-outline-warning btn-rounded btn-md ml-4" data-dismiss="modal">Fechar</button>
          </div>
          </div>
          </div>
          </div>';
          break;

          case '.png':
          case '.jpg':
            echo '<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#img"><h3>
            Ver imagem
            </h3></button></td>';
            echo '<th></th>';
            echo '<div class="modal" id="img" tabindex="-1" role="dialog">
            <div class="modal-dialog" data-role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Preview de Imagem</h5>
            </div>
            <div class="modal-body">
            <img src="uploads/'.$_SESSION['usuario'].'/'.$name.'" width="320" height="auto">
            </div>
            <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-outline-warning btn-rounded btn-md ml-4" data-dismiss="modal">Fechar</button>
            </div>
            </div>
            </div>
            </div>';
            break;

            case '.wav':
            case '.ogg':
            case '.mp3':
            echo '<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#audio"><h3>
            Ouvir audio
            </h3></button></td>';
            echo '<th></th>';
            echo '<div class="modal" id="audio" tabindex="-1" role="dialog">
            <div class="modal-dialog" data-role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Preview de Audio</h5>
            </div>
            <div class="modal-body">
            <audio controls>
            <source src="uploads/'.$_SESSION['usuario'].'/'.$name.'">
            Your browser does not support the audio element.
            </audio>
            </div>
            <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-outline-warning btn-rounded btn-md ml-4" data-dismiss="modal">Fechar</button>
            </div>
            </div>
            </div>
            </div>';
            break;

            case '.gif':
              echo '<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#img"><h3>
              Ver gif
              </h3></button></td>';
              echo '<th></th>';
              echo '<div class="modal" id="img" tabindex="-1" role="dialog">
              <div class="modal-dialog" data-role="document">
              <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Preview de Imagem</h5>
              </div>
              <div class="modal-body">
              <img src="uploads/'.$_SESSION['usuario'].'/'.$name.'" width="320" height="auto">
              </div>
              <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-outline-warning btn-rounded btn-md ml-4" data-dismiss="modal">Fechar</button>
              </div>
              </div>
              </div>
              </div>';
              break;

            default:
            echo '<th></th>';
            break;
          }

        }
        ?>
        <th scope="col"><button style="background-color: #EFC958;" data-toggle="modal" data-target="#upload" class="button button5"><ion-icon name="add-outline" size="small"></ion-icon></button></th>
        <!-- <th scope="col"><button style="background-color: #EFC958;" data-toggle="modal" data-target="#pesquisa" class="button button5">busca</button></th> -->


      </tbody>
    </table>
  </main>
