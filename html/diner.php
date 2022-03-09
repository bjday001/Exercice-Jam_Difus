<?php require './connect.php';
require_once './header.php'; ?>

<main>
    <h1>Qu'est-ce qu'on mange ce soir ?</h1>
    <p>
        <!-- trait horizontal noir -->
    </p>
</main>

<div class="container">
    <div class="jumbotron">
        <hr class="my-4">
    </div>

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
                            <label class="form-label">Nombre de personnes</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lieu</label>
                            <input type="text" class="form-control" name="lieu" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Commentaire</label>
                            <input type="text" class="form-control" name="commentaire" required>
                        </div>

                        <button class="btn btn-primary" name="valider">Ajouter</button>
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
                <th scope="col">Nombre de personnes</th>
                <th scope="col">Lieu</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Détails</th>
                <th scope="col">Supprimer</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach ($selectDiner as $index) { ?>
                    <td><?php echo $index['nom']; ?></td>
                    <td><?php echo $index['nombre']; ?></td>
                    <td><?php echo $index['lieu']; ?></td>
                    <td><?php echo $index['commentaire']; ?></td>
                    <td><button type="button" class="detail badge btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">Détail</button></td>

                    <td><?php echo "<form method='POST'> <button class='badge  btn-danger' name ='remove_diner' value='" . $index['id'] . "' type='submit'>Supprimer</button>"; ?></td>

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

                <?php echo $index['nom']; ?>

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



</body>

</html>