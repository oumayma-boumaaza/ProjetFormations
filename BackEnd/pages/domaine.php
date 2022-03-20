<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        if(!isset($_SESSION["connected"]))
        {
            header("location: /Backend/login.php");
        }
    ?>

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
                                <li class="breadcrumb-item"><a href="#">Domaines formations</a></li>
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
                                                <h4 class="card-title">Gestion des domaines</h4>
                                                <p class="card-description">Ajouter modifier ou supprimer un domaine
                                                </p>
                                            </div>
                                            <div class="col-sm-6" style="    display: flex;
                                          
                                            left: 160px;">
                                                <div class="add">
                                                    <a href="#addDomainModel" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-account-network">&#xE147;</i> <span>Ajouter un Domaine</span></a>
                                                </div>
                                                <div class="delete" style="   
                                                margin-left: 20px;">

                                                    <a href="#deleteDomainModel" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-delete">&#xE15C;</i> <span>suprimer</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th> # </th>
                                                    <th>Nom Domaine</th>
                                                    <th>Description</th>

                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
                                                        $conn = new mysqli("localhost", "root", "", "gestion_formations");
                                                        $query="SELECT * FROM domaine";

                                                        $result = $conn->query($query);
                                                        $i=1;
                                                        while($row = $result->fetch_array())
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo($row["id_domaine"]); ?></td>
                                                                <td><?php echo($row["nom"]); ?></td>
                                                                <td><?php echo($row["description"]); ?> </td>
                                                                <td>
                                                                    <a onclick="putInfoInEditModal(<?php echo($i); ?>)"   href="#editDomainModel" class="edit" data-toggle="modal"><i class="mdi mdi-pencil"style="color: #F44336;font-size: 20px;" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                                    <a onclick="putInfoInDeleteModal(<?php echo($i); ?>)" href="#deleteDomainModel" class="delete" data-toggle="modal"><i class="mdi mdi-delete" style="color: #FFC107;font-size: 20px;    margin: 0 15px;" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
                                <div id="addDomainModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ajouter un Domaine</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input name="nom" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Description</label>
                                                        <textarea name ="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" name="addDomain" class="btn btn-success" value="Add">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal HTML-->   
                                <div id="editDomainModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modifier le domaine</h4>
                                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input id="domaine_id" name="id_domaine" type="hidden" class="form-control" >
                                                        <label>Nom</label>
                                                        <input id="domaine_nom" name="nom" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Description</label>
                                                        <textarea id="domaine_description" name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" name="editDomain" class="btn btn-info" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deleteDomainModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Suprimer le domaine</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes vous sur vous voulez suprimer le domaine <span id="delete_domaine_nom"></span>?</p>
                                                    <p class="text-warning"><small>cette action ne peut pas être annulé.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="delete_domaine_id" name="id_domaine" >
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input name="deleteDomain" type="submit" class="btn btn-danger" value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gestion des sujet -->
                        <div id="gestion-des-sujet" class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="card-title">Gestion des sujets</h4>
                                                <p class="card-description">Ajouter modifier ou supprimer un sujet
                                                </p>
                                            </div>
                                            <div class="col-sm-6" style="    display: flex;
                                          
                                            left: 160px;">
                                                <div class="add">
                                                    <a href="#addSujetsModel" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-book-plus">&#xE147;</i> <span>Ajouter un sujet</span></a>
                                                </div>
                                                <div class="delete" style="   
                                                margin-left: 20px;">

                                                    <a href="#deleteSujetsModel" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-delete">&#xE15C;</i> <span>suprimer</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function putDataInfoInModal(data)
                                        {
                                            document.getElementById("paragraph_of_modal").innerText=data;
                                        }
                                    </script>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th> # </th>
                                                    <th>Nom sujet</th>
                                                    <th>Short description</th>
                                                    <th>Long description</th>
                                                    <th>Individual benefits</th>
                                                    <th>Business benefits </th>
                                                    <th>Domaine </th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
                                                        $conn = new mysqli("localhost", "root", "", "gestion_formations");
                                                        $query="SELECT sujet.*,domaine.nom FROM sujet INNER JOIN domaine ON  domaine.id_domaine=sujet.id_domaine ";
                                                        $result = $conn->query($query);
                                                        $i=1;
                                                        while($row = $result->fetch_array())
                                                        {
                                                            ?>
                                                       <tr>

                                                    <td><?php echo($row["id_sujet"]); ?></td>
                                                    <td><?php echo($row["name"]); ?></td>
                                                    <td><?php echo($row["short_description"]); ?></td>
                                                    <td><a onclick="putDataInfoInModal(this.getAttribute('data-info'))" data-info="<?php echo($row["long_description"]); ?>" href="#readSujetsModal" class="read" data-toggle="modal"><i class="mdi mdi-book-open-variant" style="color: #03a9f4;font-size: 20px;margin-left: 40px;" data-toggle="tooltip" title="Read">&#xE254;</i></a></td>
                                                    <td><a onclick="putDataInfoInModal(this.getAttribute('data-info'))" data-info="<?php echo($row["individual_benefits"]); ?>" href="#readSujetsModal" class="read" data-toggle="modal"><i class="mdi mdi-book-open-variant" style="color: #03a9f4;font-size: 20px;margin-left: 40px;" data-toggle="tooltip" title="Read">&#xE254;</i></a></td>
                                                    <td><a onclick="putDataInfoInModal(this.getAttribute('data-info'))" data-info="<?php echo($row["business_benefits"]); ?>" href="#readSujetsModal" class="read" data-toggle="modal"><i class="mdi mdi-book-open-variant" style="color: #03a9f4;font-size: 20px;margin-left: 40px;" data-toggle="tooltip" title="Read">&#xE254;</i></a></td>
                                                    <td><?php echo($row["nom"]); ?></td>
                                                    <td>
                                                        <a onclick="EditfoInSujetModal(<?php echo($i); ?>)"  href="#editSujetsModel" class="edit" data-toggle="modal"><i class="mdi mdi-pencil"style="color: #F44336;font-size: 20px;" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a onclick="deleteSujetModal(<?php echo($i); ?>)" href="#deleteSujetsModel" class="delete" data-toggle="modal"><i class="mdi mdi-delete" style="color: #FFC107;font-size: 20px;    margin: 0 15px;" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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

                                
                                <div id="addSujetsModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ajouter un sujet</h4>
                                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input name="add_sujet_nom" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Short description</label>
                                                        <input name="add_sujet_s_d" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Long description</label>
                                                        <textarea name="add_sujet_l_d" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Individual benefits</label>
                                                        <textarea name="add_sujet_i_b" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Business benefits</label>
                                                        <textarea name="add_sujet_b_b" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomDomain">Domaine</label>
                                                        <select name="add_sujet_id_domaine" class="form-control" id="nomDomain">
                                                            <?php 
                                                                $query="SELECT id_domaine,nom FROM domaine";
                                                                $result = $conn->query($query);
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                 ?>
                                                                    <option value="<?php echo($row["id_domaine"]); ?>"><?php echo($row["nom"]); ?></option>
                                                                <?php 
                                                                }
                                                            ?>
                                                         </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Telecharger image</label>
                                                        <input type="file" name="img[]" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                            <span class="input-group-append">
                                                                  <button class="file-upload-browse btn btn-primary" type="button">Telecharger</button>
                                                            </span>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <input  type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input name="addSujet" type="submit" class="btn btn-info" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal HTML -->
                                <div id="editSujetsModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modifier le sujet</h4>
                                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                         <input id="sujet_id" name="id_sujet" type="hidden" class="form-control" >
                                                        <label>Nom</label>
                                                        <input id="sujet_nom" name="add_sujet_nom"  type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Short description</label>
                                                        <input id="sujet_sd" name="add_sujet_s_d" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Long description</label>
                                                        <input id="sujet_ld" name="add_sujet_l_d" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Individual benefits</label>
                                                        <input id="sujet_ib" name="add_sujet_i_b" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Business benefits</label>
                                                        <input id="sujet_bb" name="add_sujet_b_b" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomDomain">Domaine</label>
                                                        <select id="domain_nom" name="add_sujet_id_domaine" class="form-control" >
                                                            <?php 
                                                                $query="SELECT id_domaine,nom FROM domaine";
                                                                $result = $conn->query($query);
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                 ?>
                                                                    <option value="<?php echo($row["id_domaine"]); ?>"><?php echo($row["nom"]); ?></option>
                                                                <?php 
                                                                }
                                                            ?>
                                                         </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Telecharger image</label>
                                                        <input type="file" name="img[]" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                            <span class="input-group-append">
                                                                  <button class="file-upload-browse btn btn-primary" type="button">Telecharger</button>
                                                            </span>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input name="editSujet" type="submit" class="btn btn-info" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deleteSujetsModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Suprimer le sujet</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes vous sur vous voulez suprimer cet enregistrement?</p>
                                                    <p class="text-warning"><small>cette action ne peut pas être annulé.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input id="delete_id_sujet" type="hidden" name="id_sujet">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input name="deleteSujet" type="submit" class="btn btn-danger" value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Read Modal HTML -->
                                <div id="readSujetsModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="paragraph_of_modal" ></p>
                                                </div>
                                                <div class="modal-footer">

                                                    <input type="submit" class="btn btn-primary" value="Okey">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="card-title">Gestion des cours</h4>
                                                <p class="card-description">Ajouter modifier ou supprimer un cours
                                                </p>
                                            </div>
                                            <div class="col-sm-6" style="    display: flex;
                                          
                                            left: 160px;">
                                                <div class="add">
                                                    <a href="#addCoursModel" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-book-plus">&#xE147;</i> <span>Ajouter un cours</span></a>
                                                </div>
                                                <div class="delete" style="   
                                                margin-left: 20px;">

                                                    <a href="#deletecoursModel" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-delete">&#xE15C;</i> <span>suprimer</span></a>
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
                                                    <th>Contenue</th>
                                                    <th>Description</th>
                                                    <th>Audience</th>
                                                    <th>Duration</th>
                                                    <th>Test inclut</th>
                                                    <th>Test Contenue</th>
                                                    <th>Domaine</th>
                                                    <th>Sujet</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           
                                                    <?php 
                                                        $conn = new mysqli("localhost", "root", "", "gestion_formations");
                                                        $query="SELECT cours.*,sujet.name,domaine.nom FROM cours,sujet,domaine WHERE sujet.id_sujet=cours.id_sujet AND sujet.id_domaine=domaine.id_domaine";
                                                        $result = $conn->query($query);
                                                        //print_r($result->fetch_array());
                                                        $i=1;
                                                        while($row = $result->fetch_array())
                                                        {
                                                            ?>
                                                <tr>
                                                    <td><?php echo($row["id_cours"]); ?></td>
                                                    <td><?php echo($row["nom"]); ?></td>
                                                    <td><?php echo($row["content"]); ?></td>
                                                    <td><?php echo($row["description"]); ?></td>
                                                    <td><?php echo($row["audience"]); ?></td>
                                                    <td><?php echo($row["duration"]); ?></td>
                                                    <td><?php echo($row["test_included"]); ?></td>
                                                    <td><?php echo($row["test_content"]); ?>.</td>
                                                    <td><?php echo($row["name"]); ?></td>
                                                    <td><?php echo($row[10]); ?></td>
                                                    
                                                    <td>
                                                        <a href="#editCoursModel" class="edit" data-toggle="modal"><i class="mdi mdi-pencil"style="color: #F44336;font-size: 20px;" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a href="#deletecoursModel" class="delete" data-toggle="modal"><i class="mdi mdi-delete" style="color: #FFC107;font-size: 20px;    margin: 0 15px;" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
                                <div id="addCoursModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ajouter un cours</h4>
                                                    <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input name="nom_cours" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Contenue</label>
                                                        <input name="content" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Description</label>
                                                        <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Audience</label>
                                                        <input name="audience" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Duration</label>
                                                        <input name="duration" type="number" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Test Inclus?</label>
                                                        <input name="test_included" type="number" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Test Contenu</label>
                                                        <textarea  name="test_content" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Sujet</label>
                                                        <select name="id_sujet" class="form-control" >
                                                            <?php 
                                                                $query="SELECT id_sujet,name FROM sujet";
                                                                $result = $conn->query($query);
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                 ?>
                                                                    <option value="<?php echo($row["id_sujet"]); ?>"><?php echo($row["name"]); ?></option>
                                                                <?php 
                                                                }
                                                            ?>
                                                         </select>
                                                    </div>
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <input  type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input name="addCours" type="submit" class="btn btn-info" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Edit Modal HTML -->
                                <div id="editCoursModel" class="modal fade">

                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modifier le cours</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input id="nom" name="nom_cours" type="text" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Contenue</label>
                                                        <input id="contenue" name="content" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Description</label>
                                                        <textarea id="description" name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Audience</label>
                                                        <input id="audience" name="audience" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Duration</label>
                                                        <input id="duration" name="duration" type="number" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Test Inclus?</label>
                                                        <input id="TI" name="test_included" type="number" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleTextarea1">Test Contenu</label>
                                                        <textarea id="sujet_nom" name="test_content" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Sujet</label>
                                                        <select id="sujet_nom" name="id_sujet" class="form-control" >
                                                            <?php 
                                                                $query="SELECT id_sujet,name FROM sujet";
                                                                $result = $conn->query($query);
                                                                while($row = $result->fetch_assoc())
                                                                {
                                                                 ?>
                                                                    <option value="<?php echo($row["id_sujet"]); ?>"><?php echo($row["name"]); ?></option>
                                                                <?php 
                                                                }
                                                            ?>
                                                         </select>
                                                    </div>
                                                   
                                                </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                                <button class="btn btn-dark">Cancel</button>
                                            </div>
                                         </div>
                                      </form>
                                            
                                            
                                     </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deletecoursModel" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Suprimer les cours</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes vous sur vous voulez suprimer ces enregistrement?</p>
                                                    <p class="text-warning"><small>cette action ne peut pas être annulé.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" class="btn btn-danger" value="Delete">
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
                
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- partial:../../partials/_footer.html -->
    <?php include("{$_SERVER["DOCUMENT_ROOT"]}/Backend/includes/_footer.php") ;?>
                <!-- partial -->
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
    <script src="/BackEnd/assets/js/file-upload.js"></script>
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
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>
<script>
        function putInfoInEditModal(rowNum)
        {
                                        
            //We gonna get the information from the table depending on which row (td:nth-child(1))
            var id   = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            var name = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(2)").innerText;
            var description = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(3)").innerText;
            //we gonna set these information in the modal                            
            document.getElementById("domaine_id").value=id
            document.getElementById("domaine_nom").value=name
            document.getElementById("domaine_description").innerHTML=description
        }
        
        function putInfoInDeleteModal(rowNum)
        {
            //We gonna get the information from the table depending on which row (td:nth-child(1))
            var id = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            var name = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(2)").innerText;
            //we gonna set these information in the modal                            
            document.getElementById("delete_domaine_id").value=id
            document.getElementById("delete_domaine_nom").textContent=name
        }
      
      function EditfoInSujetModal(rowNum)
        {
                                        
            //We gonna get the information from the table depending on which row (td:nth-child(1))
            var id   =   document.querySelector("#gestion-des-sujet > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            var name =   document.querySelector("#gestion-des-sujet > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(2)").innerText;
            var sd =     document.querySelector("#gestion-des-sujet > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(3)").innerText;
            var ld =     document.querySelector("#gestion-des-sujet > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(4)>a").getAttribute("data-info")
            var ib =     document.querySelector("#gestion-des-sujet > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(5)>a").getAttribute("data-info")
            var bb =     document.querySelector("#gestion-des-sujet > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(6)>a").getAttribute("data-info")
            var domain = document.querySelector("#gestion-des-sujet > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(7)").innerText;

            //we gonna set these information in the modal                            
            document.getElementById("sujet_id").value=id
            document.getElementById("sujet_nom").value=name
            document.getElementById("sujet_sd").value=sd
            document.getElementById("sujet_ld").value=ld
            document.getElementById("sujet_ib").value=ib
            document.getElementById("sujet_bb").value=bb
            document.getElementById("domain_nom").valueL=domain
        }
        
        function deleteSujetModal(rowNum)
        {              
            document.getElementById("delete_id_sujet").value=rowNum;
        }


        function EditCoursModal(rowNum)
        {
                                        
            //We gonna get the information from the table depending on which row (td:nth-child(1))
                        
            var id   =   document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            var name =   document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(2)").innerText;
            var contenue =     document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(3)").innerText;
            var description =     document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(4)>a").getAttribute("data-info")
            var audience =     document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(5)>a").getAttribute("data-info")
            var duration =     document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(6)>a").getAttribute("data-info")
            var TI =     document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(7)>a").getAttribute("data-info")
            var sujet = document.querySelector("#gestion-des-cours > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(8)").innerText;

            //we gonna set these information in the modal                            
            document.getElementById("cours_id").value=id
            document.getElementById("nom").value=name
            document.getElementById("contenuen").value=contenue
            document.getElementById("description").value=description
            document.getElementById("audience").value=audience
            document.getElementById("duration").value=duration
            document.getElementById("TI").value=TI
            document.getElementById("sujet_nom").valueL=sujet
        }

</script>
</html>