<!DOCTYPE html>
<html lang="ru">
<head>
     <?php
     $title = "Авторизация";
     require_once "blocks/head.php";
     ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script>
         $(document).ready(function() {
             $("#done").click(function() {
                $("#messageShow").hide();
                var login = $("#login").val();
                var password = $("#password").val();
                var fail = "";
                if (login.length < 3) fail = "Логин не меньше 3 символов";
                else if (password.length < 4)
                    fail = "Пароль не меньше 4 символов";
               if (fail != "") {
                    $("#messageShow").html(fail + "<div class='clear'><br></div>");
                    $("#messageShow").show();
                return false;
                }
                $.ajax({
                    url: '/ajax/auth.php',
                    type: 'POST',
                    cache: false,
                    data:{'login':login, 'password': password},
                    dataType: 'html',
                    success: function(data){
                        $("#messageShow").html(data + "<div class='clear'><br></div>");
                        $("#messageShow").show();
                    
                    }
                });
                });
             });
            </script>
<?php require_once "blocks/header.php"?>
<div id="wrapper">
    <div id="leftCol">
        <input type="text" placeholder="Логин" id="login" name="login" ><br/>
        <input type="password" placeholder="Пароль" id="password" name="password" ><br/>
        <div id="messageShow"></div>
        <input type="button" name="done" id="done"  value="Войти">
    </div>
    <?php  require_once "blocks/rightCol.php"?>
</div>

<?php require_once "blocks/footer.php"?>



</body>
</html>
