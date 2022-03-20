<!DOCTYPE html>
<html lang="en">

<?php include("{$_SERVER["DOCUMENT_ROOT"]}/Backend/includes/_head.php") ;?>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <?php include("{$_SERVER["DOCUMENT_ROOT"]}/Backend/includes/_sidebar.php") ;?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <?php include("{$_SERVER["DOCUMENT_ROOT"]}/Backend/includes/_navbar.php") ;?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">formations</a></li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row" style="display: block;
                    flex-wrap: wrap;
                    margin-right: -67.75rem;
                   ">

                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="card-title">Gestion des Formations</h4>
                                                <p class="card-description">Ajouter modifier ou supprimer une formation
                                                </p>
                                            </div>
                                            <div class="col-sm-6" style="    display: flex;
                                          
                                            left: 160px;">
                                                <div class="add">
                                                    <a href="#addformationModel" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-book-plus">&#xE147;</i> <span>Ajouter une formation</span></a>
                                                </div>
                                                <div class="delete" style="   
                                                margin-left: 20px;">

                                                    <a href="#deleteformationModel" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-delete">&#xE15C;</i> <span>suprimer</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>Prix</th>
                                                    <th>Mode</th>
                                                    <th>Cours</th>
                                                    <th>Date</th>
                                                    <th>Ville</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
                                                        $conn = new mysqli("localhost", "root", "", "gestion_formations");
                                                        $query="SELECT formation.* , cours.nom, formation_date.date,ville.ville
                                                        FROM formation,cours,formation_date,ville
                                                        WHERE  formation.id_cours=cours.id_cours
                                                        AND formation.id_date = formation_date.id_date";
                                                        // -- AND ville.id|_ville =formation.id_ville;

                                                        $result = $conn->query($query);
                                                        $i=1;
                                                        while($row = $result->fetch_array())
                                                        {
                                                            ?>
                                                            <tr>
                                                    <td><?php echo($row["id_formation"]); ?></td>
                                                    <td><?php echo($row["price"]); ?></td>
                                                    <td><?php echo($row["mode"]); ?></td>
                                                    <td><?php echo($row["nom"]); ?></td>
                                                    <td><?php echo($row["date"]); ?></td>
                                                    <td><?php echo($row["ville"]); ?></td>
                                                    <td>
                                                        <a href="#editformationModel" class="edit" data-toggle="modal"><i class="mdi mdi-pencil"style="color: #F44336;font-size: 20px;" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a href="#deleteformationModel" class="delete" data-toggle="modal"><i class="mdi mdi-delete" style="color: #FFC107;font-size: 20px;    margin: 0 15px;" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                    </td>
                                                    </tr>
                                                        <?php $i++; } ?>
                                                
                                            </tbody>
                                        </table>
                                        <div class="clearfix" style="margin-top: 20px;">
                                            <div class="hint-text"> <b>5</b> / <b>25</b> entrées</div>
                                            <ul class="pagination">
                                                <li class="page-item disabled"><a href="#">Précédent</a></li>
                                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                                <li class="page-item"><a href="#" class="page-link">suivant</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="addformationModel" class="modal fade">

                                <div class="modal-dialog">

                                 <div class="modal-content">
                                <form action="/BackEnd/actions/action.php" method="POST">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Ajouter un formateur</h4>
                                         <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                          <div class="modal-body">
                                                <div class="form-group">
                                                        <label for="exampleInputName1">Prix</label>
                                                        <input name="price" type="number" class="form-control" id="exampleInputName1" placeholder="Nom">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Mode</label>
                                                        <select name="mode" class="form-control" id="exampleSelectGender">
                                              <option>Presentiel</option>
                                              <option>A distance</option>
                                               </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Date</label>
                                                        <select name="id_date" class="form-control" >
                                                            <?php 
                                                                $query="SELECT id_date,date FROM formation_date";
                                                                $result = $conn->query($query);
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                 ?>
                                                                    <option value="<?php echo($row["id_date"]); ?>"><?php echo($row["date"]); ?></option>
                                                                <?php 
                                                                }
                                                            ?>
                                                         </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label >Cours</label>
                                                        <select name="id_cours" class="form-control" >
                                                            <?php 
                                                                $query="SELECT id_cours,nom FROM cours";
                                                                $result = $conn->query($query);
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                 ?>
                                                                    <option value="<?php echo($row["id_cours"]); ?>"><?php echo($row["nom"]); ?></option>
                                                                <?php 
                                                                }
                                                            ?>
                                                         </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Ville</label>
                                                        <select name="id_ville" class="form-control" >
                                                            <?php 
                                                                $query="SELECT id_ville,ville FROM ville";
                                                                $result = $conn->query($query);
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                 ?>
                                                                    <option value="<?php echo($row["id_ville"]); ?>"><?php echo($row["ville"]); ?></option>
                                                                <?php 
                                                                }
                                                            ?>
                                                         </select>
                                                    </div>

                                              </div>
                                                <div class="modal-footer ">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                <input name="addFormateur" type="submit" class="btn btn-primary mr-2" value="Ajouter">
                                                </div>
                                        </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal HTML -->
                                <div id="editformationModel" class="modal fade">

                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modifier la formation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Prix</label>
                                                        <input type="number" class="form-control" id="exampleInputName1" placeholder="Nom">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Mode</label>
                                                        <select class="form-control" id="exampleSelectGender">
                                              <option>Presentiel</option>
                                              <option>A distance</option>
                                               </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">date</label>
                                                        <input type="date" class="form-control" id="exampleInputName1" placeholder="Prenom">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Cours</label>
                                                        <select class="form-control" id="exampleSelectGender">
                                              <option>Prince 2</option>
                                              <option>Web Technologies</option>
                                              <option>JEE </option>
                                              <option>ITIL </option>
                                               </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Cours</label>
                                                        <select class="form-control" id="exampleSelectGender">
                                              <option>Rabat</option>
                                              <option>Nante</option>
                                              <option>CasaBlanca </option>
                                              <option>Kenitra </option>
                                               </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer ">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                <input type="submit" class="btn btn-primary mr-2" value="Modifier">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal HTML -->
                                <div id="deleteformationModel" class="modal fade ">
                                    <div class="modal-dialog ">
                                        <div class="modal-content ">
                                            <form>
                                                <div class="modal-header ">
                                                    <h4 class="modal-title ">Suprimer formation</h4>
                                                    <button type="button " class="close " data-dismiss="modal " aria-hidden="true ">&times;</button>
                                                </div>
                                                <div class="modal-body ">
                                                    <p>Etes vous sur vous voulez suprimer ces enregistrement?</p>
                                                    <p class="text-warning "><small>cette action ne peut pas être annulé.</small></p>
                                                </div>
                                                <div class="modal-footer ">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                    <input type="submit" class="btn  mr-2 btn-danger" value="suprimer">
                                                </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <?php include("{$_SERVER["DOCUMENT_ROOT"]}/Backend/includes/_footer.php") ;?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/BackEnd/assets/vendors/js/vendor.bundle.base.js "></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/BackEnd/assets/js/off-canvas.js "></script>
    <script src="/BackEnd/assets/js/hoverable-collapse.js "></script>
    <script src="/BackEnd/assets/js/misc.js "></script>
    <script src="/BackEnd/assets/js/settings.js "></script>
    <script src="/BackEnd/assets/js/todolist.js "></script>
    <script src="/BackEnd/assets/js/file-upload.js "></script>
    
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>
<script>
        function putInfoInEditModal(rowNum)
        {                
            var id   = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            var fname = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(2)").innerText;
            var lname = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(3)").innerText;
            var description = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(4)").innerText;
            var id_cours = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(5)").innerText;
                                
            document.getElementById("formateur_id").value=id
            document.getElementById("formateur_prenom").value=fname
            document.getElementById("formateur_nom").value=lname
            document.getElementById("formateur_description").innerHTML=description
            document.getElementById("cours_id").value=id_cours
        }
        
        function putInfoInDeleteModal(rowNum)
        {
            var id = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            var name = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(2)").innerText;
                                     
            document.getElementById("delete_formateur_id").value=id
            document.getElementById("delete_formateur_nom").textContent=name
        }
</script>
</html>