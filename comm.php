

<?php
require('login.php');

$billets = $bdd->query('SELECT * FROM billets WHERE id=' . $_GET["billet"] .'');
$donnees = $billets->fetch()
?>
<div class="news">
  <h3><?php echo $donnees['titre'];?> <?php echo $donnees['date_creation'];?></h3>
<p>
  <?php echo $donnees['contenu'];?>
</p>
</div>


<?php
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

<form action="comm.php?billet=<?php echo $_GET['billet']; ?>" method="post">
  Pseudo<br/><input type="text" name="auteur" /><br/><br/>
  Message<br/><input type="text" name="commentaire" /><br/>
    <input type="submit" value="Valider" />
    </form>

  <a href="index.php">retour</a>

<?php
if (!empty($_POST['auteur']) AND !empty($_POST['commentaire'])) {
  $ee = $bdd->prepare("INSERT INTO commentaires(id_billet, auteur, commentaire) VALUES(:billet,:auteur,:commentaire)");
  $ee->execute(array(
    'billet' => $_GET['billet'],
    'auteur' => $_POST['auteur'],
    'commentaire' => $_POST['commentaire']
  ));
  header('location: comm.php?billet=' . $_GET["billet"] .''); 
}
  ?>
