<!DOCTYPE html>
<html lang="ru">
<head>
     <?php
     $title = "Регистрация";
     require_once "blocks/head.php";
     ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script>
         $(document).ready(function() {
             $("#done").click(function() {
                $("#messageShow").hide();
                var login = $("#login").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var re_password = $("#re_password").val();
                var fail = "";
                if (login.length < 3) fail = "Логин не меньше 3 символов";
                else if(email.split('@').length - 1 == 0 || email.split(".").length - 1 == 0)
                    fail = "Вы ввели некоррертный email";
                else if (password.length < 4)
                    fail = "Пароль не меньше 4 символов";
                else if (password.length != re_password.length || password != re_password)
                    fail = "Пароли не совпадают";
                if (fail != "") {
                    $("#messageShow").html(fail + "<div class='clear'><br></div>");
                    $("#messageShow").show();
                return false;
                }
                $.ajax({
                    url: '/ajax/reg.php',
                    type: 'POST',
                    cache: false,
                    data:{'login':login, 'email': email, 'password': password},
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
        <input type="text" placeholder="Email" id="email" name="email" ><br/>
        <input type="password" placeholder="Пароль" id="password" name="password" ><br/>
        <input type="password" placeholder="Подтвердите пароль" id="re_password" name="re_password" ><br/>
        <div id="messageShow"></div>
        <input type="button" name="done" id="done"  value="Зарегистрироваться">
    </div>
    <?php  require_once "blocks/rightCol.php"?>
</div>

<?php require_once "blocks/footer.php"?>



</body>
</html>
