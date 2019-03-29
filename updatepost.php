<?php
  require_once "pdo.php";

  if(isset($_POST['postid'])){

    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->execute(array(':id' => $_POST['postid']));

    if(isset($_POST['title']) && isset($_POST['descr']) && isset($_POST['code']) && isset($_POST['links'])){

        $stmt2 = $pdo->prepare("UPDATE posts SET title = :title, descr = :descr, code = :code, links = :links WHERE id = :id");
        $stmt2->execute(array(
          ':title' => $_POST['title'],
          ':descr' => $_POST['descr'],
          ':code' => $_POST['code'],
          ':links' => $_POST['links'],
          ':id' => $_POST['postid']
        ));

        header('Location:all.php');
        return;
    }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Asap+Condensed|Fugaz+One" rel="stylesheet">
    <title>Add Post</title>
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
              <button type="button" class="btn btn-dark">New Post</button>
              <span class="sr-only">(current)</span>
            </a>
        </nav>
    </header>
    <div class="container principal">
    <h2 class="titulo-secundario">Add Post</h2>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

    <form class="" action="updatepost.php" method="post">
      <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" value="<?php echo htmlentities($row['title']); ?>" required/>
      </div>
      <div class="form-group">
      <label for="descr">Description</label>
      <textarea name="descr" class="form-control" rows="8" cols="50" placeholder="Description of your post..." required>
        <?php echo htmlentities($row['descr']); ?>
      </textarea>
      </div>
      <div class="form-group">
      <label for="code">Code</label>
      <textarea name="code" class="form-control" rows="8" cols="50" placeholder="if ( Post.codeIsIncluded() ) {
        submitExample();
}"><?php echo htmlentities($row['code']); ?></textarea>
      </div>
      <div class="form-group">
      <label for="links">Links</label>
      <input type="text" name="links" class="form-control" value="<?php echo htmlentities($row['links']); ?>" placeholder="example: https://es.wikipedia.org/wiki/Cross-site_scripting">
      </div>
      <input type='hidden' name='postid' value="<?php echo $row['id']; ?>"/>
      <button type="submit" class="btn btn-dark">Submit</button>
      <a href="all.php"><button type="button" class="btn btn-danger">Cancel</button></a>
    </form>
<?php } ?>

    </div>
  </body>
</html>
