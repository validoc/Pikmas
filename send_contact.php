<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title>Pikmas videojuegos : consolas : accesorios  - Coming Soon</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        if($("#email").val()!=''){
          $('label[for=email]').hide();
        }
        $('#email').focus(function(){
          $('label[for=email]').animate({opacity:'.25'}, 100);
          $("#btnSubscribe").removeClass('error loading success');
        });
        $('#email').blur(function(){
          if($("#email").val()==''){
            $('label[for=email]').css('display', 'block');
            $('label[for=email]').animate({opacity:'1'}, 100);
          }
        });
        $('#email').keyup(function(event){
          //if the key pressed isn't the tab key.
          if(event.keyCode != 9 ){
            $('label[for=email]').animate({opacity:'0'}, 100, function(){
              $(this).css('display', 'none');
            });
          }

        });
        //TODO this is in no way DRY, but for the time being it'll have to do
        if($("#login").val()!=''){
          $('label[for=login]').hide();
        }
        $('#login').focus(function(){
          $('label[for=login]').animate({opacity:'.25'}, 100);
          $("#btnSubscribe").removeClass('error loading success');
        });
        $('#login').blur(function(){
          if($("#login").val()==''){
            $('label[for=login]').css('display', 'block');
            $('label[for=login]').animate({opacity:'1'}, 100);
          }
        });
        $('#login').keyup(function(event){
          //if the key pressed isn't the tab key.
          if(event.keyCode != 9 ){
            $('label[for=login]').animate({opacity:'0'}, 100, function(){
              $(this).css('display', 'none');
            });
          }

        });

        $("#loginTab").toggle(
        function(){$("#loginLayer").stop().animate({top:"0"},200);},
        function(){$("#loginLayer").stop().animate({top:"-73px"},200);}
      );

        $("#newsletter").submit(function(){
          $("#btnSubscribe").addClass('loading');
          $.ajax({
            url: 'newsletter/Subscriber.Add.php',
            type: 'POST',
            dataType: 'html',
            data: $("#newsletter").serialize(),
            success: function(msg) {
              if(msg=="Success"){
                $("#btnSubscribe").removeClass('error loading');
                $("#btnSubscribe").addClass('success');
                $("#email").val('').blur();
                $('label[for=email]').show().animate({opacity:'1'}, 100);
              } else{
                $("#btnSubscribe").addClass('error');
                alert(msg);
              }

            },
            error: function() {
              $("#btnSubscribe").addClass('error');
            }
          });
          return false;
        });
        function positionLogin(){
          if($(window).width()<660){
            var newRight = $(window).width()-630;
            $("#loginLayer").css('right', newRight+'px');
            $("#arrow").css('right', newRight+'px');
          } else{
            $("#loginLayer").css('right', '30px');
            $("#arrow").css('right', '30px');
          }
        }
        positionLogin();
        $(window).resize(positionLogin);
      });
    </script>
    <style>
      body{
        background:#35004f url(bg.png) top center no-repeat;
        color:#fff;
        -webkit-text-stroke:1px transparent;
        font:12px Helvetica, arial, sans-serif;
      }
      #container{
        width:610px;
        margin:0 auto;
      }
      h1{
        width:600px;
        height:180px;
        background:url(logo.png);
        text-indent:-9999px;
        margin:30px auto;
      }
      h2{
        font:bold 20px/20px Helvetica, Arial, sans-serif;
        text-shadow:-1px -1px 0 rgba(0,0,0,.5);
        margin:0;
        padding:0 10px;
      }
      p{
        margin:0;
        padding:5px 20px 10px 10px;
        text-shadow:-1px -1px 0 rgba(0,0,0,.3);
      }
      #newsletter{
        width:572px;
        height:49px;
        padding:14px;
        margin:0 auto;
        background:url(BGInputBox.png);
        font:bold 26px/26px Helvetica, Arial, sans-serif;
        position:relative;
      }
      #newsletter label{
        position:absolute;
        color:#999;
        top:28px;
        left:25px;
      }
      #email{
        background:url(input.png);
        width:416px;
        height:27px;
        border:none;
        font:bold 26px Helvetica, Arial, sans-serif;
        color:#222;
        padding:14px 145px 10px 10px;
      }
      #email:focus{
        outline:none;
        background-position:100% 0;
      }
      #btnSubscribe{
        border:none;
        background:url(btnSubscribe.gif) no-repeat;
        width:135px;
        height:42px;
        padding-top:42px;
        font-size:0;
        overflow:hidden;
        position:absolute;
        right:20px;
        top:18px;
        cursor:pointer;
      }
      #btnSubscribe:hover{
        background-position:-135px 0;
      }
      #btnSubscribe:active{
        background-position:-270px 0;
      }
      #btnSubscribe.loading{
        background-position:-405px 0;
      }
      #btnSubscribe.success{
        background-position:-540px 0;
      }
      #btnSubscribe.error{
        background-position:-675px 0;
      }
      ul{
        text-align:center;
        font-size:11px;
      }
      ul li{
        display:inline;
        font-weight:bold;
        padding:0 15px 0 0;
      }
      a{
        color:#fff;
        text-decoration:none;
        padding-right:15px;
      }
      a:hover{
        text-decoration:underline;
      }
      #arrow{
        position:absolute;
        top:50px;
        background:url(images/arrow.png) 0 0 no-repeat;
        width:173px;
        height:165px;
        text-indent:-9999px;
        overflow:hidden;
        margin-right:25px;
        z-index:1;
      }
      #loginLayer{
        position:absolute;
        top:-73px;
        right:20px;
        width:422px;
        z-index:2;
      }
      #loginTab{
        position:absolute;
        bottom:-25px;
        right:0;
        height:25px;
        font:bold 14px/25px Helvetica, Arial, sans-serif;
        -webkit-border-bottom-right-radius:5px;
        -webkit-border-bottom-left-radius:5px;
        -moz-border-radius-bottomLeft:5px;
        -moz-border-radius-bottomRight:5px;
        background:#000;
        background:rgba(0,0,0,.8);
        padding:0 20px;
        -webkit-box-shadow:0 0 4px rgba(0,0,0,.3);
        cursor:pointer;
      }
      #loginForm{
        position:relative;
        width:392px;
        font:bold 14px Helvetica, Arial, sans-serif;
        -webkit-border-bottom-left-radius:5px;
        -moz-border-radius-bottomLeft:5px;
        -moz-border-radius-bottomLeft:5px;
        background:#000;
        background:rgba(0,0,0,.8);
        -webkit-box-shadow:0 0 4px rgba(0,0,0,.3);
        padding:15px;
      }
      #login{
        background:url(images/loginInput.png);
        border:none;
        width:299px;
        height:22px;
        font:bold 19px/19px Helvetica, Arial, sans-serif;
        padding:13px 87px 8px 8px;
      }
      #login:focus{
        outline:none;
      }
      #loginForm label{
        position:absolute;
        top:27px;
        left:23px;
        font:bold 19px/19px Helvetica, Arial, sans-serif;
        color:#999;
      }
      #btnEnter{
        border:none;
        background:url(images/btnEnter.png) no-repeat;
        width:76px;
        height:32px;
        padding-top:32px;
        font-size:0;
        overflow:hidden;
        position:absolute;
        right:19px;
        top:20px;
        cursor:pointer;
      }
      #btnEnter:hover{
        background-position:-76px 0;
      }
      #btnEnter:active{
        background-position:-152px 0;
      }
    </style>

    <!--[if IE 7]>
    <style>
		#loginTab{
		bottom:-5px;
		}
		#loginLayer{
		margin-top:-2px
		}
	</style>
	<![endif]-->

  </head>
  <body>
    <div id="container">
      <h1>Hello Rent - Goodbye Searching</h1>
      <h2>GRACIAS POR SUSCRIBIRTE!</h2>
      <p>
        <?php
// Contact subject

        $email_to = $_POST['email'];

        include_once('class.phpmailer.php');

        $mail             = new PHPMailer();

//$mail->IsSendmail(); // telling the class to use SendMail transport

        $mail->From       = "newsletter@pikmas.com";
        $mail->FromName   = "Newsletter";

        $mail->Subject    = "[Pikmas] Nueva suscripcion desde el correo electronico $email_to";

        $mail->Body    = "Acaba de suscribirse a newsletter el siguiente usuario, \n

Correo electronico: $email_to \n

www.pikmas.com";

        $mail->AddAddress("alex@pikmas.com", "Alex");
        $mail->AddAddress("israel@pikmas.com", "Israel");

        if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
          echo "<center>Invalid email</center>";
        }else {
          if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
          } else {
            echo "Hemos recibido la informaci&oacute;n de contacto.";
          }
        }
        
        ?>
      </p>

      <p>
        <a href="tienda/" style="font-weight: bold;">Ir a la tienda</a>
      </p>

      <!--<ul>

			<li><a href="http://twitter.com/hellorent">Twitter</a>&bull;</li>
			<li><a href="http://thewojogroup.com">The Wojo Group</a>&bull;</li>
			<li><a href="http://feeds.feedburner.com/Hellorent">RSS Feed</a>&bull;</li>
			<li><a href="mailto:invites@hellorent.com">Request Invite</a></li>
		</ul>-->
      <div id="arrow">Login (invite only)</div>

      <div id="loginLayer">
        <!--<form id="loginForm" action="/" method="post">
				<label for="login">Enter Your Email Address</label>
            <input type="text" name="login" id="login"/>
				<button type="submit" id="btnEnter">Enter</button>
			</form>-->
        <div id="loginTab">
				Login
        </div>

      </div>
    </div>

  </body>
</html>