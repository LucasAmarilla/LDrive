<?php
session_start();
$dir = "uploads/".$_SESSION["usuario"]."/";
$pesquisa = $_POST["name"];
$files1 = scandir($dir);

if (isset($_POST['submit'])) {
  foreach (glob("uploads/".$_SESSION['usuario']."/".$pesquisa."*.*") as $v) {
    $name = basename($v); //nome do arquivo
    $ext = strrchr($name,'.'); //pega extenção
    $filesize = filesize($v); //pega tamanho em bits
    $filesize = round($filesize / 1024 / 1024, 1);// transforma tamanho em mb
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
}


?>
<form method="post" data-ajax="false" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  NOME DO ARQUIVO: <input type="text" name="name"><br>
  <input type="submit" value="submit" name="submit">
</form>
