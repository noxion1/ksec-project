<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>regristartie Bedrijven</title>
  <link rel="stylesheet" href="Style.css">
</head>
<body>
  <div class="header">
  	<h2>Regristratie voor bedrijven</h2>
  </div>

  <!-- Naam bedrijf -->

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Naam Bedrijf</label>
  	  <input type="text" name="bedrijf-naam" value="<?php echo $naamBedrijf; ?>">
  	</div>

    <!-- Naam bedrijfs baas -->

    <div class="input-group">
  	  <label>Naam Baas van Bedrijf</label>
  	  <input type="text" name="bedrijf-naam-baas" value="<?php echo $naamBaas; ?>">
  	</div>

    <!-- Email bedrijf -->

  	<div class="input-group">
  	  <label>Email Bedrijf</label>
  	  <input type="email" name="bedrijf-email" value="<?php echo $email; ?>">
  	</div>



    <!-- Email baas -->

    <div class="input-group">
  	  <label>Email Baas</label>
  	  <input type="email" name="bedrijf-email-baas_1" value="<?php echo $email; ?>">
  	</div>

    <div class="input-group">
  	  <label>Herhaal Email Baas</label>
  	  <input type="email" name="bedrijf-email-baas_2">
  	</div>

    <!-- Wachtwoord bedrijf -->

  	<div class="input-group">
  	  <label>Wachtwoord</label>
  	  <input type="password" name="password_1">
  	</div>

  	<div class="input-group">
  	  <label>Herhaal wachtwoord</label>
  	  <input type="password" name="password_2">
  	</div>


  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  	Heeft u al een account? <a href="login.php">Log in</a>
  	</p>
  </form>
</body>
</html>
