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
                   "><div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="card-title">Gestion des Dates de Formation</h4>
                                                <p class="card-description">Ajouter modifier ou supprimer une date
                                                </p>
                                            </div>
                                            <div class="col-sm-6" style="    display: flex;
                                          
                                            left: 160px;">
                                                <div class="add">
                                                    <a href="#adddatenModel" class="btn btn-success" data-toggle="modal"><i class="mdi mdi-book-plus">&#xE147;</i> <span>Ajouter une date</span></a>
                                                </div>
                                                <div class="delete" style="   
                                                margin-left: 20px;">

                                                    <a href="#deletedateModel" class="btn btn-danger" data-toggle="modal"><i class="mdi mdi-delete">&#xE15C;</i> <span>suprimer</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php 
                                                        $conn = new mysqli("localhost", "root", "", "gestion_formations");
                                                        $query="SELECT * FROM formation_date ";
                                                        $result = $conn->query($query);
                                                        $i=1;
                                                        while($row = $result->fetch_array())
                                                        {
                                                            ?>
                                                            <tr>
                                                    <td><?php echo($row["id_date"]); ?></td>
                                                    <td><?php echo($row["date"]); ?></td>
                                                    <td>
                                                        <a onclick="putInfoInEditModal(<?php echo($i); ?>)" href="#editdateModel" class="edit" data-toggle="modal"><i class="mdi mdi-pencil"style="color: #F44336;font-size: 20px;" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                        <a onclick="putInfoInDeleteModal(<?php echo($i); ?>)" href="#deletedateModel" class="delete" data-toggle="modal"><i class="mdi mdi-delete" style="color: #FFC107;font-size: 20px;    margin: 0 15px;" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
                                <div id="adddatenModel" class="modal fade">

                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ajouter une date</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                            <div class="modal-body">
                                                
                                                    <div class="form-group">
                                                        <label for="exampleInputName1">date</label>
                                                        <input name="date" type="date" class="form-control" id="exampleInputName1" placeholder="Prenom">
                                                    </div>
                                             </div>
                                            <div class="modal-footer ">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                <input type="submit" name="addDate" class="btn btn-success" value="Add">
                                            </div>
                                                </form> 
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal HTML -->
                                <div id="editdateModel" class="modal fade">

                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modifier la date</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                            <div class="modal-body">
                                                
                                                    <div class="form-group">
                                                    <input id="date_id" name="id_date" type="hidden" class="form-control" >
                                                       
                                                        <label for="exampleInputName1">date</label>
                                                        <input id="date" name="date" type="date" class="form-control" id="exampleInputName1" placeholder="Prenom">
                                                    </div>
                                             </div>
                                            <div class="modal-footer ">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                <input name="editDate" type="submit" name="addDate" class="btn btn-success" value="Edit">
                                            </div>
                                                </form> 
                                            
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal HTML -->
                                <div id="deletedateModel" class="modal fade ">
                                    <div class="modal-dialog ">
                                        <div class="modal-content ">
                                            <form action="/BackEnd/actions/action.php" method="POST">
                                                <div class="modal-header ">
                                                    <h4 class="modal-title ">Suprimer date</h4>
                                                    <button type="button " class="close " data-dismiss="modal " aria-hidden="true ">&times;</button>
                                                </div>
                                                <div class="modal-body ">
                                                    <p>Etes vous sur vous voulez suprimer cet enregistrement?</p>
                                                    <p class="text-warning "><small>cette action ne peut pas être annulé.</small></p>
                                                </div>
                                                <div class="modal-footer ">
                                                     <input id="date_id" type="hidden" name="id_date" >
                                                    <input  type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                                    <input name="deleteDate" type="submit" class="btn btn-danger" value="Delete">
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
<script>
        function putInfoInEditModal(rowNum)
        {                
            var id   = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            var date = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(2)").innerText;
          
                                
            document.getElementById("date_id").value=id
            document.getElementById("date").value=date
        
        }
        function putInfoInDeleteModal(rowNum){
        var id = document.querySelector("body > div > div > div > div > div.row > div:nth-child(1) > div > div.card-body > div.table-responsive > table > tbody > tr:nth-child("+rowNum+") > td:nth-child(1)").innerText;
            
                                     
            document.getElementById("date_id").value=id
        }
     
</script>
</html>