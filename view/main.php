<main>
  <div data-role="content" data-theme="a">
    <center><h3>Bem vindo ao seu LDrive <?php echo $_SESSION['usuario']; ?></h3><center>
      <?php
      include "./list.php";
      ?>
    </div>
  </main>

  <script type="text/javascript">
  $("#enviar").on('click', function(e){
    e.preventDefault();
    var formData = new FormData($("#upload-form")[0]);
    $.ajax({
      url: "enviar.php",
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      enctype: 'multipart/form-data',

      xhr: function(){
        //upload Progress
        var xhr = $.ajaxSettings.xhr();
        if (xhr.upload) {
          xhr.upload.addEventListener('progress', function(event) {
            var percent = 0;
            var position = event.loaded || event.position;
            var total = event.total;
            if (event.lengthComputable)
            {
              percent = Math.ceil(position / total * 100);
            }
            //update progressbar
            $(".progress-bar").css("width", + percent +"%");
            $(".status").text(percent +"%");
          }, true);
        }
        return xhr;
      },
      success: function (data) {
        $("#mensagens").html(data);

      },
    });
  });

  $("#enviar").on('click', function(e){
    e.preventDefault();
    var form = $('form')[0];
    var formData = new FormData(form);
    $.ajax({
      url: 'enviar.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType:false,
      success: function(data){
        $("#mensagens").html(data);
      }

    });
  });

</script>
