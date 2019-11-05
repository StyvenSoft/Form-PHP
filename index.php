<?php 
//echo"Php fisrt";
include('form_process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <title>Formulario PHP 01</title>
</head>
<body>
<div class="form-container">
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" id="form" novalidate="novalidate">
    <h2>Contact form</h2>
    <div class="form-group">
      <label for="name">Name:</label>
      <input class="form-control" type="text" name="name" minlength="2" value="<?= $name?>" placeholder="Nombre Completo">
      <span class="error"><?= $name_error ?></span>
    </div>
    <div class="form-group">
      <label for="age">Email:</label>
      <input class="form-control" type="text" name="email" minlength="2" value="<?= $email?>" placeholder="Email">
      <span class="error"><?= $email_error ?></span>
    </div>
    <div class="form-group">
      <label for="telephone">Telephone:</label>
      <input class="form-control" type="text" name="phone" id="phone" value="<?= $phone?>" placeholder="Telefono">
      <span class="error"><?= $phone_error ?></span>
    </div>
    <div class="form-group">
      <label for="email">URL:</label>
      <input class="form-control" type="text" name="url" value="<?= $url?>" placeholder="Tu website http://..">
        <span class="error"><?= $url_error ?></span>
    </div>    
    <div class="form-group">
      <label for="email">Message:</label>
      <textarea class="form-control" name="message" id="message" cols="30" rows="10" value="<?= $message?>" placeholder="Mensaje.."></textarea>
    </div>     
    <div class="form-group">
      <p class="accept">Accept our policy:</p>
       <div class="checkbox">         
		      <input type="checkbox" id="agree" name="agree" required>
		      <label for="agree" class="checkbox-switch"></label>
	    </div>
    </div>
    <div class="form-group">
       <button class="submit form-control" name="submit" type="submit" id="contact_submit" data-submit="..Enviando">Enviar</button>
    <div class="success"><?= $success; ?></div>
    </div>
  </form>
</div>    
</body>
</html>