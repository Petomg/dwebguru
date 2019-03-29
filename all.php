<!DOCTYPE html>
<?php  require_once "pdo.php"; ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Asap+Condensed|Fugaz+One" rel="stylesheet">
    <title>Dwebguru</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand titulo-principal" href="all.php">DWEBGURU</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="#">Vulnerabilities</a>
              <a class="nav-item nav-link" href="#">Books</a>
            </div>
          </div>
          <a class="nav-item nav-link active " href="addpost.php">
            <button type="button" class="btn btn-outline-dark">New Post</button>
            <span class="sr-only">(current)</span>
          </a>
        </nav>
    </header>
    <div class="container principal">
      <h2 class="titulo-secundario">All</h2>
      <?php
      $stmt = $pdo->query("SELECT * FROM posts");
      while( $row = $stmt->fetch(PDO::FETCH_ASSOC)) {   ?>
        <div class='card'>
        <a class='titulo-post card-header'><?php echo htmlentities($row['title']); ?></a>
        <div class='card-body'>
        <p class='descripcion card-text'><?php echo htmlentities($row['descr']); ?></p>
        <form action='postView.php' method='get'>
        <input type='hidden' name='postid' value='<?php echo htmlentities($row['id']); ?>'/>
        <button type='submit' class='btn btn-outline-dark'> Details </button>
        </form>
        </div>
        </div>
        <br>
    <?php } ?>

    </div>
  </body>
</html>
