<?php require './connect.php'; ?>
<?php require_once './header.php'; ?>

<main>
        <h1>Prochains Rendez-vous</h1>
        <p><!-- trait horizontal noir --></p>
        
    </main>

<div class="container">

    <!-- Button trigger modal -->
    <button type="button" class="badge btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter<span class="badge bg-secondary"></span>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une Liste</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="text" class="form-control" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Heure</label>
                            <input type="text" class="form-control" name="heure" required>
                        </div>

                        <button class="btn btn-primary" name="envoyer">Ajouter</button>
                    </form>


                </div>

            </div>
        </div>
    </div>


    <hr class="my-4">

</div>


<div class="container">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>

                <th scope="col">Nom</th>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Détails</th>
                <th scope="col">Supprimer</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($selectRdv as $listRdv) { ?>
                    <td><?php echo $listRdv['nom']; ?></td>
                    <td><?php echo $listRdv['date']; ?></td>
                    <td><?php echo $listRdv['heure']; ?></td>
                    <td><button type="button" class="detail badge btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">Détail</button></td>

                    <td><?php echo "<form method='POST'> <button class='badge  btn-danger delete' data-id = '' data-action = 'delete' data-body-message 'etes vouus sur ?' name ='delete' value='" . $listRdv['id'] . "' type='submit'>Supprimer</button>"; ?></td>

            </tr>
        <?php } ?>

        </tbody>
    </table>


</div>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php echo $listRdv['nom']; ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="js/sweetalert.js"></script>
<?php

global $addRdvExec;

if ((isset($_POST['envoyer'])) && ($addRdvExec == true)) { ?>
    <script>
        swal("Bonne nouvelle!", "Votre rendez-vous a bien été enregistré !", "success");
    </script>
<?php } elseif ((isset($_POST['envoyer'])) && ($addRdvExec == false)) { ?>
    <script>
        swal("Mauvaise  nouvelle!", "Votre rendez-vous n'a pas été enregistré !", "error");
    </script>

<?php }
?>
<?php require_once './footer.php'; ?>
