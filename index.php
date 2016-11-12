<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:300);

      html, body{
        height: 100%;
      }

      body{
        /*background: rgba(60,83,155, 0.6);*/
        background-image: url("http://vunature.com/wp-content/uploads/2016/10/beaches-nature-sky-beach-sunset-sea-ocean-landscape-scenery-new-picture-1920x1080.jpg");
        background-size: auto 100%;
        background-position: left top;
        background-repeat: no-repeat;
      }

      .login-page{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 26em;
        height: 18em;
        margin-top: -9em;
        margin-left: -13em;
      }

      .form {
        position: relative;
        background: #FFFFFF;
        margin: 0 auto 100px;
        padding: 45px;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }

      .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
      }

      .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        border: 0;
        background: rgba(255,150,30,0.9);
        width: 100%;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        cursor: pointer;
      }

      .form button:disabled {
        cursor: not-allowed;
        background-color: rgba(255,150,30,0.4);
      }

      .message{
        text-align: center;
        font-size: 14px;
        margin: 0 0 15px;
        font-family: "Roboto", sans-serif;
        padding: 10px;
        display: none;
      }

      .message.success{
        color: green;
        background-color: rgba(0,255,0, 0.2);
      }

      .message.failure{
        color: red;
        background-color: rgba(255,0,0, 0.2);
      }

    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
    function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
    $(function () {
      $('#email').on('click keyup', function(){
        if(validateEmail($(this).val())){
          $('button').attr('disabled', false);
        } else {
          $('button').attr('disabled', true);
        };
      })
      $('form').on('submit', function (e) {
        email = $('#email').val();
        password = $('#password').val();
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: 'http://localhost/test.php',
          data: "email="+email+"&password="+password,
          success: function (isAuthenticated) {
            if(isAuthenticated=='true'){
              $('.message').replaceWith('<div class="message success">Login Successful</div>');
            } else {
              $('.message').replaceWith('<div class="message failure">Incorrect Username/Password</div>');
            }
            $('.message').fadeIn('slow');
          },
        });
      });
    });
    </script>
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="message"></div>
        <form class="login-form">
          <input type="text" id="email" name="email" placeholder="username">
          <input type="password" id="password" name="password" placeholder="password">
          <button disabled="true">login</button>
        </form>
      </div>
    </div>
  </body>
</html>
