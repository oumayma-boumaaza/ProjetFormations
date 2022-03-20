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
                                <li class="breadcrumb-item"><a href="#">inscriptions</a></li>
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
                                                <h4 class="card-title">Gestion des éléves inscrits</h4>
                                                <p class="card-description">Ajouter modifier ou supprimer un éléve
                                                </p>
                                            </div>
                                            <div class="col-sm-6" style="    display: flex;
                                          
                                            left: 160px;">
                                                <div class="add">
                                                    <a href="#addinscriptionModel" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-book-plus">&#xE147;</i> <span>Ajouter un éléve</span></a>
                                                </div>
                                                <div class="delete" style="   
                                                margin-left: 20px;">

                                                    <a href="#deleteinscriptionModel" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-delete">&#xE15C;</i> <span>suprimer</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Telephone</th>
                                                    <th>Email</th>
                                                    <th>Company</th>
                                                    <th>Payé</th>
                                                    <th>Formation</th>
                                                    <th>date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php 
                                                        $conn = new mysqli("localhost", "root", "", "gestion_formations");
                                                        $query="SELECT inscription.* , cours.nom, formation_date.date
                                                        FROM inscription,formation,cours,formation_date
                                                        WHERE inscription.id_formation = formation.id_formation
                                                        AND formation.id_cours=cours.id_cours
                                                        AND formation.id_date = formation_date.id_date;";
                                                        $result = $conn->query($query);
                                                        $i=1;
                                                        while($row = $result->fetch_array())
                                                        {
                                                            ?>
                                                            <tr>

                                                    <td><?php echo($row["id_inscription"]); ?></td>
                                                    <td><?php echo($row["last_name"]); ?></td>
                                                    <td><?php echo($row["first_name"]); ?></td>
                                                    <td><?php echo($row["phone"]); ?></td>
                                                    <td><?php echo($row["email"]); ?></td>
                                                    <td><?php echo($row["company"]); ?></td>
                                                    <td><?php echo($row["paid"]); ?></td>
                                                    <td><?php echo($row["nom"]); ?></td>
                                                    <td><?php echo($row["date"]); ?></td>
                                                    <td>
                                                        <a href="#editinscriptionModel" class="edit" data-toggle="modal"><i class="mdi mdi-pencil"style="color: #F44336;font-size: 20px;" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a href="#deleteinscriptionModel" class="delete" data-toggle="modal"><i class="mdi mdi-delete" style="color: #FFC107;font-size: 20px;    margin: 0 15px;" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                    </td>
                                                    </tr>
                                                        <?php $i++; } ?>
                                                

                                            </tbody>
                                        </table>
                                        <div class="clearfix" style="margin-top: 20px;">
                                            <div class="hint-text"> <b>3</b> / <b>25</b> entrées</div>
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
                                <div id="addinscriptionModel" class="modal fade">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ajouter une inscription</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Nom</label>
                                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Prenom</label>
                                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Prenom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Telephone</label>
                                                        <input type="tel" class="form-control" id="exampleInputName1" placeholder="06********">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Email</label>
                                                        <input type="email" class="form-control" id="exampleInputName1" placeholder="*********@gmail.com">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Payment</label>
                                                        <select class="form-control" id="exampleSelectGender">
                                                        <option>Oui</option>
                                                         <option>Non</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Company</label>
                                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="company name">
                                                    </div>



                                                </form>
                                            </div>
                                            <div class="modal-footer ">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                <input type="submit" class="btn btn-primary mr-2" value="Ajouter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal HTML -->
                                <div id="editinscriptionModel" class="modal fade">

                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modifier l'inscription</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Nom</label>
                                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Prenom</label>
                                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Prenom">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Telephone</label>
                                                        <input type="tel" class="form-control" id="exampleInputName1" placeholder="06********">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Email</label>
                                                        <input type="email" class="form-control" id="exampleInputName1" placeholder="*******@gmail.com">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Payment</label>
                                                        <select class="form-control" id="exampleSelectGender">
                                                        <option>Oui</option>
                                                         <option>Non</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">Company</label>
                                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Company name">
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
                                <div id="deleteinscriptionModel" class="modal fade ">
                                    <div class="modal-dialog ">
                                        <div class="modal-content ">
                                            <form>
                                                <div class="modal-header ">
                                                    <h4 class="modal-title ">Suprimer l'inscription</h4>
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
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip "]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox "]');
            $("#selectAll ").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll ").prop("checked ", false);
                }
            });
        });
    </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>