<div id="header">
    <div class="logo">
      <a href="index.php">Social Tool</a>
    </div>
    <div class="menu">
      <ul>
          <li><a href="modificar.php">Modificar</a></li>
          <?php if (!$user): ?>
            <li><a href="<?php echo $loginUrl; ?>">Login with Facebook</a></li>
          <?php endif ?>
          <?php if (!isset($_SESSION['InstagramAccessToken'])): ?>
            <li><a href="index-instagram.php">Login with instagram</a></li>
          <?php endif ?>
      </ul>
    </div>
</div>