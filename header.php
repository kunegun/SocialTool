<div id="header">
    <div class="logo">
      <a href="index.php">Social Tool</a>
    </div>
    <div class="menu">
      <ul>
          <li><a href="nuevo.php">Nuevo</a></li>
          <li><a href="modificar.php">Modificar</a></li>
        <?php if (!$user): ?>
          <li><a class="connect-fb" href="<?php echo $loginUrl; ?>">Login with Facebook</a></li>
        <?php else: ?>
         <li><a class="connect-fb logged" href="#">Logged with Facebook</a></li>
        <?php endif ?>
        <?php if (!isset($_SESSION['InstagramAccessToken'])): ?>
          <li><a class="connect-instag" href="index-instagram.php">Login with instagram</a></li>
        <?php else: ?>
          <li><a class="connect-instag logged" href="#">Logged with instagram</a></li>
        <?php endif ?>
      </ul>
    </div>
</div>