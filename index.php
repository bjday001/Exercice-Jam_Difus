<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue !</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <header>
        <div class="title-page"> <i class="far fa-calendar-check reminder"></i>
            <span> <a href="./index.php"> Mon pense bête</a></span>
        </div>
        <ul>

            <li> <a href="/html/liste-courses.php">Liste Courses</a></li>
            <li> <a href="/html/rdv.php">Rdv importants</a></li>
            <li> <a href="/html/ce_week-end.php">On fait quoi Ce week-end</a></li>
            <li> <a href="/html/todolist.php">To do list</a></li>
            <li> <a href="/html/diner.php">On mange quoi ce soir</a></li>
            <li> <a href="/html/contact.php">Contact</a></li>
        </ul>
    </header>
    <main>
        <p class="home-title">Bienvenue dans votre espace !</p>
    </main>

    <?php require_once './html/footer.php'; ?>

</body>

</html>