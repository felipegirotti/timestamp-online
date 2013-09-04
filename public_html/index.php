<?
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Timestamp online, converta datas para timestamp unix, e timestamp para datas facilmente.">
    <meta name="author" content="Felipe Girotti">
    <link rel="shortcut icon" href="/assets/ico/favicon.png">

    <title>Timestamp Online</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/timestamp.css" rel="stylesheet">
    <script src="assets/js/modernizr.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/assets/js/html5shiv.js"></script>
      <script src="/assets/js/respond.min.js"></script>
    <![endif]-->
       <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43765807-1', 'timestamp-on.com');
  ga('send', 'pageview');

</script>
  </head>

  <body>

    <div class="container" id="page">
      <div class="header">
        <div class="text-muted pull-right" style="width: 205px;margin-top:-6px">
            <div class="input-group ">
                
               <input type="text" class="form-control" style="width: 120px" id="current-timestamp" value="<?=time();?>" />
               <span class="input-group-addon" style="cursor: pointer" id="copy-button">
                   <span class="glyphicon glyphicon-paperclip" ></span> Copiar
                </span>
            </div>
        </div>
        <h3 class="text-muted">Timestamp Online</h3>
      </div>
      <center>
           <script type="text/javascript"><!--
                google_ad_client = "ca-pub-1007084704195773";
            /* 728x90, criado 01/01/09 */
            google_ad_slot = "4121564203";
            google_ad_width = 728;
            google_ad_height = 90;
            //-->
            </script>
            <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>

      </center>
      <div class="jumbotron">
          <h1 style="position: relative;">
              Timestamp 
              <span id="timestamp"><?=time()?></span> 
              <button id="btn-copy" class="btn btn-info"><span class="glyphicon glyphicon-paperclip" ></span> Copiar</button>
          </h1>
          
          <div class="form-horizontal col-lg-8">
             <div class="form-group ">  
                <label for="date-timestamp" class="col-lg-2 control-label">Por data:</label>
               <div class="col-lg-6" id="form-inputs">
                   <div class="input">
                       <input type="date" id="date-timestamp" class="form-control"  />
                   </div>
                   <div class="input">
                       : <input type="time" id="time-timestamp" class="form-control" />
                   </div>
                   
               </div>
               <div class="col-lg-2">
                   <button id="generation-timestamp" class="btn btn-success">Gerar</button>
               </div>
            </div>
        </div>
      </div>
        
      <div class="jumbotron">
          <h1 style="position: relative;">
              Converter               
               <span id="convert-timestamp" class="hide"></span>                
              
          </h1>
          
          <div class="form-horizontal col-lg-8">
             <div class="form-group ">  
                <label for="date-timestamp" class="col-lg-2 control-label">Timestamp:</label>
               <div class="col-lg-6" id="form-inputs">                  
                   <input type="text" id="convert-date-timestamp" class="form-control"  />                                                     
               </div>
               <div class="col-lg-2">
                   <button id="btn-convert-timestamp" class="btn btn-success">Converter</button>
               </div>
            </div>
        </div>
      </div>

        

      

    </div>
      
    <div class="footer ">
        <div class="container">
            <div class="facebook-like">
                    <iframe src="//www.facebook.com/plugins/like.php?href=<?=urlencode('https://www.facebook.com/timestamponline')?>&amp;send=false&amp;layout=standard&amp;width=363&amp;show_faces=true&amp;font&amp;colorscheme=dark&amp;action=like&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:363px; height:80px;" allowTransparency="true"></iframe>
            </div>

            <p>&copy; Timestamp Online <?=date('Y')?></p>
        </div>
   </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/mask.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.zclip.min.js"></script>
    <script type="text/javascript">
        
        window.onload = function () {
            setInterval(function(){setTimeCurrent();}, 1000);  
            $("#copy-button").zclip({
                path: "/assets/js/ZeroClipboard.swf",
                copy: function() {
                    return $('#current-timestamp').val();
                }
            });
            $('#generation-timestamp').click(function(){
                var data, tempo,timestamp, dia, mes, ano, hora = 0, minuto = 0;
                data = $('#date-timestamp').val();
                tempo = $('#time-timestamp').val();                                    
                if (tempo != "") {
                    tempo = tempo.split(':');
                    hora = tempo[0];
                    minuto = tempo[1];
                }
                if (data != "") {
                    if (!Modernizr.inputtypes.date) {
                        data = data.split('/');
                        dia = data[0];
                        mes = data[1];
                        ano = data[2];                        
                    } else {
                        data = data.split('-');                        
                        dia = data[2];
                        mes = data[1];
                        ano = data[0];
                    }
                    timestamp = new Date(ano, mes -1, dia, hora, minuto);                    
                    $('#timestamp').text(Math.round(timestamp/1000));
                    
                } else alert('Preencha a data');
                    
            });
            
            $('#btn-convert-timestamp').click(function(){
                var data,fulldata, timestamp = $('#convert-date-timestamp').val();                
                if (timestamp != '') {                    
                    data = new Date($.trim(timestamp) * 1000);                                                            
                    fulldata = data.getDate() + '/' + (parseInt(data.getMonth()) + 1) + '/' + data.getFullYear() + ' ' + data.getHours() + ':' + data.getMinutes();                   
                    $('#convert-timestamp').removeClass('hide').show().html(fulldata).attr('style', 'font-size:16px;');
                }
            });
            
            $('#btn-copy').zclip({
                path: "/assets/js/ZeroClipboard.swf",
                copy: function() {
                    return $('#timestamp').text();
                }
            });
            
            if (!Modernizr.inputtypes.date) {
                $('#date-timestamp').mask('99/99/9999');
                $('#time-timestamp').mask('99:99');
            }
                        
            

        };
        
        function timeCurrent() {
            return Math.round(new Date()/1000);
        }
        
        function setTimeCurrent() {            
            var input = document.getElementById('current-timestamp');            
            input.value  = timeCurrent();            
        }
        
    </script>
 
  </body>
</html>
