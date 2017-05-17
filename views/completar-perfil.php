  <script>
    var examples = [];
  </script>

  <body>
  <div>
    <section id="completar_perfil">
      <div class="container">
        <div id="contact" action="" method="post">
          <h2>Completa tu perfil</h2>
      <!--el enctype debe soportar subida de archivos con multipart/form-data-->
        <form enctype="multipart/form-data" class="formulario" data-parsley-validate>

      <div class="example">
        <div class="example__left">
          <div id="userpic" class="userpic">
            <div class="js-preview userpic__preview"></div>
            <div class="btn btn-success js-fileapi-wrapper">
              <div class="js-browse">
                <span class="btn-txt">Foto de perfil</span>
                <input type="file" name="filedata" />
              </div>
              <div class="js-upload" style="display: none;">
                <div class="progress progress-success"><div class="js-progress bar"></div></div>
                <span class="btn-txt">Cargando</span>
              </div>
            </div>
          </div>
        </div>

        <script>
          examples.push(function (){
            $('#userpic').fileapi({
              url: 'http://rubaxa.org/FileAPI/server/ctrl.php',
              accept: 'image/*',
              imageSize: { minWidth: 120, minHeight: 120 },
              elements: {
                active: { show: '.js-upload', hide: '.js-browse' },
                preview: {
                  el: '.js-preview',
                  width: 120,
                  height: 120
                },
                progress: '.js-progress'
              },
              onSelect: function (evt, ui){
                var file = ui.files[0];

                if( !FileAPI.support.transform ) {
                  alert('Your browser does not support Flash :(');
                }
                else if( file ){
                  $('#popup').modal({
                    closeOnEsc: true,
                    closeOnOverlayClick: false,
                    onOpen: function (overlay){
                      $(overlay).on('click', '.js-upload', function (){
                        $.modal().close();
                        $('#userpic').fileapi('upload');
                      });

                      $('.js-img', overlay).cropper({
                        file: file,
                        bgColor: '#fff',
                        maxSize: [$(window).width()-100, $(window).height()-100],
                        minSize: [200, 200],
                        selection: '90%',
                        onSelect: function (coords){
                          $('#userpic').fileapi('crop', file, coords);
                        }
                      });
                    }
                  }).open();
                }
              }
            });
          });
        </script>
      </div>

  <div id="popup" class="popup" style="display: none;">
    <div class="popup__body"><div class="js-img"></div></div>
    <div style="margin: 0 0 5px; text-align: center;">
      <div class="js-upload btn btn_browse btn_browse_small">Finalizar</div>
    </div>
  </div>
  <div class="showImage"></div>
  <p>Sexo:</p>
  <input  type="radio" id="test1" value="Mujer" name="data[]"  checked required/>
  <label for="test1">Mujer</label>
  <input  type="radio" id="test2" value="Hombre" name="data[]"  required/>
  <label for="test2">Hombre</label>
  <i class="fa fa-phone" aria-hidden="true"></i><input id="telefono" type="number" class="validate" placeholder="Teléfono" name="data[]" required>
  <i class="fa fa-calendar-check-o" aria-hidden="true"></i><input type="date" class="datepicker" placeholder="Fecha De Nacimiento"name="data[]" required>
  <button id="to-about-section" target="_self" class="hero-btn default">Enviar</button>
  </div>
  </form>
  
  <script src="//code.jquery.com/jquery-1.8.2.min.js"></script>
  <script>!window.jQuery && document.write('<script src="/js/jquery.dev.js"><'+'/script>');</script>

  <script src="//yandex.st/highlightjs/7.2/highlight.min.js"></script>
  <script src="//yandex.st/jquery/easing/1.3/jquery.easing.min.js"></script>


  <script>
    var FileAPI = {
        debug: true
      , media: true
      , staticPath: './FileAPI/'
    };
  </script>
  <script src="views/FileAPI/FileAPI.min.js"></script>
  <script src="views/FileAPI/FileAPI.exif.js"></script>
  <script src="views/jquery.fileapi.js"></script>
  <script src="views/jcrop/jquery.Jcrop.min.js"></script>
  <script src="views/statics/jquery.modal.js"></script>
  <script>
    jQuery(function ($){
      var $blind = $('.splash__blind');

      $('.splash')
        .mouseenter(function (){
          $('.splash__blind', this)
            .animate({ top: -10 }, 'fast', 'easeInQuad')
            .animate({ top: 0 }, 'slow', 'easeOutBounce')
          ;
        })
        .click(function (){
          if( !FileAPI.support.media ){
            $blind.animate({ top: -$(this).height() }, 'slow', 'easeOutQuart');
          }
        })
      ;

      $('body').on('click', '[data-tab]', function (evt){
        evt.preventDefault();

        var el = evt.currentTarget;
        var tab = $.attr(el, 'data-tab');
        var $example = $(el).closest('.example');

        $example
          .find('[data-tab]')
            .removeClass('active')
            .filter('[data-tab="'+tab+'"]')
              .addClass('active')
              .end()
            .end()
          .find('[data-code]')
            .hide()
            .filter('[data-code="'+tab+'"]').show()
        ;
      });


      function _getCode(node, all){
        var code = FileAPI.filter($(node).prop('innerHTML').split('\n'), function (str){ return !!str; });
        if( !all ){
          code = code.slice(1, -2);
        }

        var tabSize = (code[0].match(/^\t+/) || [''])[0].length;

        return $('<div/>')
          .text($.map(code, function (line){
            return line.substr(tabSize).replace(/\t/g, '   ');
          }).join('\n'))
          .prop('innerHTML')
            .replace(/ disabled=""/g, '')
            .replace(/&amp;lt;%/g, '<%')
            .replace(/%&amp;gt;/g, '%>')
        ;
      }


      // Init examples
      FileAPI.each(examples, function (fn){
        fn();
      });
    });
  </script>

  </script>
  <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>-->
  <script src="views/lib/parsley/parsley.min.js"></script>
  <script src="views/lib/parsley/es.js"></script>

  <!--<script src="views/lib/main.js"></script>-->
    </body>
  </html>
