

<?php
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
$comm = $bdd->query('SELECT * FROM commentaires WHERE id_billet=' . $_GET["billet"] .'');
$comm->execute();
  while ($donnees = $comm->fetch())
  {
    ?>
    <p>
    <?php echo $donnees['auteur'];?>: <?php echo $donnees['commentaire'];?><br/> 
    </p>
    <?php
  }
  ?>
