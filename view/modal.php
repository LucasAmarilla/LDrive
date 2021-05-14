<div class="modal" id="upload" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload de arquivos</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>
      <div class="modal-body">
        <form method="post" action="upload.php" data-ajax="false" enctype="multipart/form-data">
          <input type="file" name="arquivo" id="file">
          <br>
          <br>
          <center><button type="submit" class="btn" style="background-color: #EFC958;" name="enviar">Upload</button></center>
        </form>
      </div>
    </div>
  </div>
</div>
