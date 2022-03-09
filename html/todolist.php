<?php  require './connect.php'; 
require_once './header.php'; ?>

    <main>
        <h1>Todolist</h1>
        <p><!-- trait horizontal noir --></p>
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

                      <form  method="POST">
                      <div class="mb-3">
                        <label  class="form-label" >Nom</label>
                        <input type="text" class="form-control" name="nom"  required>
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Commentaire</label>
                        <input type="text" class="form-control"  name="commentaire" required>
                      </div>
                      
                      <button  class="btn btn-primary" name="ajouter" >Ajouter</button>
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
      <th scope="col">Commentaire</th>
      <th scope="col">Détails</th>
      <th scope="col">Supprimer</th>
      
    </tr>
  </thead>
  <tbody >
        <tr>
<?php foreach($selectTask as $task){?>
<td ><?php echo $task['nom'];?></td>
<td ><?php echo $task['commentaire'];?></td>
<td><button type="button" class="detail badge btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">Détail</button></td> 

<td><?php echo "<form method='POST'> <button class='badge  btn-danger' name ='remove_todolist' value='" . $task['id']. "' type='submit'>Supprimer</button>" ;?></td>

        </tr>
       <?php }?>

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

           <?php echo $task['nom']; ?> 
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<?php require_once './footer.php'; ?>









