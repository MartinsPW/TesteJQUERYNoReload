<?php

  require("php/pdo.php");
  SESSION_START();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--[if IE]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.2.0/es5-shim.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
  <![endif]-->

  <!-- Import all css, javascript, etc.. -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-deep_orange.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./mycss.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <!-- End - import. -->


  <title>Document</title>
</head>
    <body>
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
          <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Title</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
            </nav>
          </div>
        </header>
        <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Title</span>
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
          </nav>
        </div>
        <main class="mdl-layout__content" ><center>
          <div class="page-content" align="center">
            <div class="mdl-grid" >
                <div class="mdl-cell mdl-cell--6-col">
                      <div id="tabela"></div>
                </div>
                <div class="mdl-cell mdl-cell--4-col">
                  <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                      <div class="mdl-card__title mdl-color--indigo-400 mdl-color-text--indigo-50">
                        <h2 class="mdl-card__title-text">Welcome</h2>
                      </div>
                      <div class="mdl-card__supporting-text">
                        <form onsubmit="returm false;" method="POST" id="addForm">
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="user" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Utilizador</label>
                          </div>
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="password" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Password</label>
                          </div>
                          <div class="mdl-card__actions mdl-card--border">
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" id="addUser">
                                <i class="material-icons">add</i>
                            </button>
                          </div>
                        </form>
                      </div>
                      <div class="mdl-card__menu">
                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                          <i class="material-icons">insert_comment</i>
                        </button>
                      </div>
                  </div>
                </div>
            </div>
          </div></center>
        </main>
          <footer class="mdl-mini-footer">
              <div class="mdl-mini-footer__left-section">
                  <div class="mdl-logo">Title</div>
                  <ul class="mdl-mini-footer__link-list">
                      <li><a href="#">Help</a></li>
                      <li><a href="#">Privacy & Terms</a></li>
                  </ul>
              </div>
            </footer>
      </div>
    </body>
</html>

<script type="text/javascript">

  function listUser(e){
    $.ajax({
      url:"php/listUser.php",
      method: 'POST',
      dataType: 'text',
      data:{pag:e},
      success:function(data) {
        $('#tabela').html(data).delay(360).hide().show("slow");
      }
    });
  }

  $(document).ready(function() {
    listUser(1);
  });

  $("#addUser").on('click',function() {
    var user = $('#addForm').find('input[name="user"]').val();
    var password = $('#addForm').find('input[name="password"]').val();

    $.ajax({
      url:"php/addUser.php",
      method: 'POST',
      dataType: 'text',
      data: {user:user, password:password},
      success:function(data) {
        alert(data);
        $('#addForm').find('input[name="password"]').val("");
        $('#addForm').find('input[name="user"]').val("");
        listUser();
      }

    });
    return false;
  });
  function ApagaRegisto(e){
    $.ajax({
      url:"php/removeUser.php",
      method: 'POST',
      dataType: 'text',
      data: {e:e},
      success:function(data) {
        alert("Registo apagado com sucesso!");
        listUser();
      }
    });
  }


  $('body').on('click', 'button#pagination', function() {
    var code = $(this).data("value");
    listUser(code);
  });


    $('body').on('click', 'button#remove', function() {
      var code = $(this).data("code");
      ApagaRegisto(code);
    });

</script>
