
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>


  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');

  $billets = $bdd->query('SELECT * FROM billets');
  while ($donnees = $billets->fetch())
  {
  ?>
  <div class="news">
    <h3><?php echo $donnees['titre'];?> <?php echo $donnees['date_creation'];?></h3>
<p>
    <?php echo $donnees['contenu'];?>
</p>
    <a href="comm.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a>
</div>
  <?php
  }
  ?>


</body>




</html>
