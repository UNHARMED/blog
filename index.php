
<!DOCTYPE html>
<html>
<head>
</head>
<body>


  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');

  $billets = $bdd->query('SELECT * FROM billets');
  while ($donnees = $billets->fetch())
  {
  ?>
  <p>
    <?php echo $donnees['titre'];?> <?php echo $donnees['date_creation'];?> <br/>
    <?php echo $donnees['contenu'];?> <br/>

    <a href="comm.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a>
  </p>
  <?php
  }
  ?>


</body>




</html>
