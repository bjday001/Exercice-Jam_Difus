<?php

//Get Heroku Clear//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


//ligne 13 à 21 : code pour connecter bdd en local ( ça fonctionne )
// Connect to DB
//$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db); comme je n'utilises pas cette connexion je peux supprimer cette ligne
 

// $dsn = 'mysql:host= eu-cdbr-west-02.cleardb.net; dbname=heroku_96815065b325b14; charest=utf8'; 
// $username = 'root'; 
// $password = ''; 

// $db = new PDO($dsn, $username, $password);

// Code proposé par Greg pour connecter ma bdd via le serveur distant (heroku)
$dsn = "mysql:dbname=" . $cleardb_db . ";host=" . $cleardb_server; // je recrée le dsn à partir des infos de cleardb
$db = new PDO($dsn, $cleardb_username, $cleardb_password); // j'utilise les infos de cleardb pour configurer la connexion


// try {

//   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

// Ajouter article à la liste de courses
if (isset($_POST['send'])) {
  $nom = $_POST['nom'];
  $poids = $_POST['poids'];
  $qte = $_POST['qte'];

  $addData = $db->prepare("INSERT INTO listedecourse (nom, poids, quantité)
VALUES('$nom', '$poids', '$qte')");
  $addData->execute();
}

// Afficher la liste de courses
$selectData = $db->prepare("SELECT * FROM listedecourse");
$selectData->execute();

// Filtrer par ordre décroissant
// if (isset($_POST ['desc'])); {
//   $orderData = $db->prepare("SELECT * FROM `listedecourse` ORDER BY qte DESC;");
// }


//Supprimer un élément de la liste
if (isset($_POST['supprimer'])) {
  $removeList = $db->prepare("DELETE FROM listedecourse WHERE Id= :id ");
  $getId = $_POST['supprimer'];
  $removeList->bindParam("id", $getId);

  if ($removeList->execute()) {
    echo '<div class=" alert alert-warning alert-dismissible fade show" role="alert"><strong>Supprimer!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" 
    aria-label="Close"></button></div>';
    header("location:liste-courses.php");
  } else {
    echo '<div class="alert alert-warning" role="alert"> NON Supprimer </div';
  }
}

//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

// Ajouter un Rendez-vous

if (isset($_POST['envoyer'])) {
  $nom = $_POST['nom'];
  $date = $_POST['date'];
  $heure = $_POST['heure'];
  global $db;

  $addRdv = $db->prepare("INSERT INTO rdv (nom, date, heure)
  VALUES('$nom', '$date', '$heure')");
  $addRdvExec = $addRdv->execute();
  
  // if ($addRdv->execute()==true) {
  //   echo"votre rendez-vous à bien été ajouté";
  // }
  // else {
  //   echo"votre rdv n'a pas été enregistré";
  // }

}


// Afficher les prochains Rendez-vous
$selectRdv = $db->prepare("SELECT * FROM rdv");
$selectRdv->execute();


//Supprimer un Rendez-vous
if (isset($_POST['delete'])) {
  $removeList = $db->prepare("DELETE FROM rdv WHERE Id= :id ");
  $getId = $_POST['delete'];
  $removeList->bindParam("id", $getId);

  if ($removeList->execute()==true) {
    echo '<div class=" alert alert-warning alert-dismissible fade show" role="alert"><strong>Supprimer!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" 
      aria-label="Close"></button></div>';
    header("location:rdv.php");
  } else {
    echo '<div class="alert alert-warning" role="alert"> NON Supprimer </div';
  }
}


//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

// Planifier un nouveau projet ce week-end
if (isset($_POST['soumettre'])) {
  $nom = $_POST['nom'];
  $date = $_POST['date'];
  $heure = $_POST['heure'];
  $commentaire = $_POST['commentaire'];


  $addElement = $db->prepare("INSERT INTO weekend(nom, date, heure, commentaire)
  VALUES('$nom', '$date', '$heure' , '$commentaire')");
  $addElement->execute();
}

// Afficher tous les projets du week-end
$selectElement = $db->prepare("SELECT * FROM weekend");
$selectElement->execute();


//Supprimer un élément de la liste
if (isset($_POST['remove_weekend'])) {
  $removeList = $db->prepare("DELETE FROM weekend WHERE Id= :id ");
  $getId = $_POST['remove_weekend'];
  $removeList->bindParam("id", $getId);

  if ($removeList->execute()) {
    echo '<div class=" alert alert-warning alert-dismissible fade show" role="alert"><strong>Supprimer!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" 
      aria-label="Close"></button></div>';
    header("location:ce_week-end.php");
  } else {
    echo '<div class="alert alert-warning" role="alert"> NON Supprimer </div';
  }
}

//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

// Ajouter une tache à faire (todolist)
if (isset($_POST['ajouter'])) {
  $nom = $_POST['nom'];
  $commentaire = $_POST['commentaire'];

  $addTask = $db->prepare("INSERT INTO todolist(nom, commentaire)
  VALUES('$nom', '$commentaire')");
  $addTask->execute();
}

// Afficher les taches à ne pas oublier
$selectTask = $db->prepare("SELECT * FROM todolist");
$selectTask->execute();


//Remove
if (isset($_POST['remove_todolist'])) {
  $removeList = $db->prepare("DELETE FROM todolist WHERE Id= :id ");
  $getId = $_POST['remove_todolist'];
  $removeList->bindParam("id", $getId);

  if ($removeList->execute()) {
    echo '<div class=" alert alert-warning alert-dismissible fade show" role="alert"><strong>Supprimer!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" 
      aria-label="Close"></button></div>';
    header("location:todolist.php");
  } else {
    echo '<div class="alert alert-warning" role="alert"> NON Supprimer </div';
  }
}

//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------

// Ajouter une tache à faire (à ne pas oublier)
if (isset($_POST['valider'])) {
  $nom = $_POST['nom'];
  $nombre = $_POST['nombre'];
  $lieu = $_POST['lieu'];
  $commentaire = $_POST['commentaire'];

  $addDiner = $db->prepare("INSERT INTO diner(nom, nombre, lieu, commentaire)
  VALUES('$nom', '$nombre' , '$lieu' , '$commentaire')");
  $addDiner->execute();
}

// Afficher les taches à ne pas oublier
$selectDiner = $db->prepare("SELECT * FROM diner");
$selectDiner->execute();


//Remove
if (isset($_POST['remove_diner'])) {
  $removeList = $db->prepare("DELETE FROM diner WHERE Id= :id ");
  $getId = $_POST['remove_diner'];
  $removeList->bindParam("id", $getId);

  if ($removeList->execute()) {
    echo '<div class=" alert alert-warning alert-dismissible fade show" role="alert"><strong>Supprimer!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" 
      aria-label="Close"></button></div>';
    header("location:diner.php");
  } else {
    echo '<div class="alert alert-warning" role="alert"> NON Supprimer </div';
  }
}
