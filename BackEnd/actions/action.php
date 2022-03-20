<?php
 //<?php echo '<img  class="img-xs rounded-circle "src="data:image;base64,'.base64_encode($row['image']).'"al="Image">'
//Login
//include("/BackEnd/config/connexion.php");
$conn = new mysqli("localhost", "root", "", "gestion_formations");
//we check if a login button is pressed
if(isset($_POST["login"]))
{

    //We check if login credentials are right from database (db>admin)
    $username=$_POST["username"];
    $password=$_POST["password"];
    

        //We run SQL Query to check if 
    $query="SELECT count(*),id FROM admin WHERE username= '{$username}' AND password = '{$password}'";

    $result = $conn->query($query);
    $row = $result->fetch_assoc();



    //Redirect user to home if username or password are right
    if($row["count(*)"]==1)
    {
        //we start session
        session_start();
        //we set important atributes (connected,username,email...)

        $_SESSION["connected"]=true;
        $_SESSION["username"]=$username;
        $_SESSION["id"]=$row["id"];
        header("location: /Backend/index.php");
    }
    //redirect login.php?loginFailed=1 if username or password are wrong
    else if($row["count(*)"]==0)
    {
        header("location: /Backend/login.php?loginFailed=1");
    }
}
//logout
if(isset($_GET["logout"]))
{
        session_start();

    if($_GET["logout"]=="true")
    {   
        session_unset();
        header("location: /Backend/login.php");

    }

}
//Add Domain
if(isset($_POST["addDomain"]))
{
    $name=$_POST["nom"];
    $description=$_POST["description"];

    
    $query="INSERT INTO domaine(nom,description) VALUES('{$name}','{$description}') ";

    $conn->query($query);
    header("location: /Backend/pages/domaine.php");
}
//Edit Domain
if(isset($_POST["editDomain"]))
{
    $id_domaine=$_POST["id_domaine"];
    $name=$_POST["nom"];
    $description=$_POST["description"];
   
    
    $query="UPDATE domaine SET nom = '{$name}', description='{$description}' where id_domaine  = {$id_domaine}" ;

    $conn->query($query);
    header("location: /Backend/pages/domaine.php");
}
//Delete Domain
if(isset($_POST["deleteDomain"]))
{
    $id_domaine=$_POST["id_domaine"];
       
    $query="DELETE FROM domaine WHERE id_domaine  = {$id_domaine} " ;

    $conn->query($query);
    header("location: /Backend/pages/domaine.php");
}
//Add Sujet
if(isset($_POST["addSujet"])){
    $name=$_POST["add_sujet_nom"];
    $short_description=$_POST["add_sujet_s_d"];
    $long_description=$_POST["add_sujet_l_d"];
    $ind_benifits=$_POST["add_sujet_i_b"];
    $bus_benifits=$_POST["add_sujet_b_b"];
    $id_domaine=$_POST["add_sujet_id_domaine"];	
    $query="INSERT INTO sujet(name, short_description,long_description, individual_benefits,business_benefits, id_domaine) VALUES('{$name}','{$short_description}','{$long_description}','{$ind_benifits}','{$bus_benifits}',{$id_domaine})";
    $conn->query($query);
    header("location: /Backend/pages/domaine.php#gestion-des-sujet");
}
//Edit sujet
if(isset($_POST["editSujet"]))
{
    $id_sujet=$_POST["id_sujet"];
    $name=$_POST["add_sujet_nom"];
    $short_description=$_POST["add_sujet_s_d"];
    $long_description=$_POST["add_sujet_l_d"];
    $ind_benifits=$_POST["add_sujet_i_b"];
    $bus_benifits=$_POST["add_sujet_b_b"];
    $id_domaine=$_POST["add_sujet_id_domaine"];	
 	
   
    
    $query="UPDATE sujet SET name = '{$name}',short_description = '{$short_description}', long_description='{$long_description}',individual_benefits='{$ind_benifits}',business_benefits='{$bus_benifits}',id_domaine='{$id_domaine}' 
    where id_sujet  = {$id_sujet}" ;

    echo($query);
    $conn->query($query);
    header("location: /Backend/pages/domaine.php#gestion-des-sujet");
}
//Delete sujet
if(isset($_POST["deleteSujet"]))
{
    $id_sujet=$_POST["id_sujet"];
    
    echo($id_sujet);
    $query="DELETE FROM sujet where id_sujet = {$id_sujet}" ;
    
    $conn->query($query);
    header("location: /Backend/pages/domaine.php#gestion-des-sujet");
    
}
//Add cours
if(isset($_POST["addCours"])){
    $nom=$_POST["nom_cours"];
    $content=$_POST["content"];
    $description=$_POST["description"];
    $audience=$_POST["audience"];
    $duration=$_POST["duration"];
    $test_included=$_POST["test_included"];
    $test_content=$_POST["test_content"];	
    $id_sujet=$_POST["id_sujet"];

    $query="INSERT INTO cours(nom, content,description, audience,duration, test_included,test_content,id_sujet) VALUES('{$nom}','{$content}','{$description}','{$audience}','{$duration}',{$test_included},'{$test_content}',{$id_sujet})";
    $conn->query($query);
    echo($query);
    header("location: /Backend/pages/domaine.php#gestion-des-sujet");
}
//Edit cours
if(isset($_POST["addCours"]))
{
    $nom=$_POST["nom_cours"];
    $content=$_POST["content"];
    $description=$_POST["description"];
    $audience=$_POST["audience"];
    $duration=$_POST["duration"];
    $test_included=$_POST["test_included"];
    $test_content=$_POST["test_content"];	
    $id_sujet=$_POST["id_sujet"];

    $query="UPDATE cours SET nom = '{$nom}', content = '{$content}', description = {$description}, audience = '{$audience}', duration = '{$duration}', test_included = '{$test_included}', test_content = '{$test_content}', id_sujet = '{$id_sujet}' WHERE cours.id_cours = {$id_cours};";
    $conn->query($query);
    echo($query);
    header("location: /Backend/pages/domaine.php#gestion-des-sujet");
}
//delete cours
if(isset($_POST["deleteCours"]))
{
    $id_sujet=$_POST["id_cours"];
    
    echo($id_sujet);
    $query="DELETE FROM cours where id_cours = {$id_cours}" ;
    
    $conn->query($query);
    header("location: /Backend/pages/domaine.php#gestion-des-sujet");
   
}
//Add Pays
if(isset($_POST["addPays"])){
    $pays=$_POST["pays"];
    $query="INSERT INTO pays(pays) VALUES('{$pays}') ";
    $conn->query($query);
    header("location: /Backend/pages/lieu.php");
}
//Edit Pays
if(isset($_POST["editPays"]))
{
    $id_pays=$_POST["id_pays"];
    $pays=$_POST["pays"];
   
   
    
    $query="UPDATE pays SET pays = '{$pays}' where id_pays  = {$id_pays}" ;

    $conn->query($query);
    header("location: /Backend/pages/lieu.php");
}
//Delete pays
if(isset($_POST["deleteDomain"]))
{
    $id_pays=$_POST["id_pays"];
       
    $query="DELETE FROM pays WHERE id_pays  = {$id_pays} " ;

    $conn->query($query);
    header("location: /Backend/pages/lieu.php");
}
//Add Ville
if(isset($_POST["addVille"])){
    $id_pays=$_POST["id_pays"];
    $ville=$_POST["ville"]; 
    $query="INSERT INTO ville(id_pays,ville) VALUES('{$id_pays}','{$ville}') ";
    $conn->query($query);
    header("location: /Backend/pages/lieu.php");
}
//Edit Ville
if(isset($_POST["editVille"]))
{
    $id_ville=$_POST["id_ville"];
    $id_pays=$_POST["id_pays"];
    $ville=$_POST["ville"]; 
    $query="UPDATE ville SET id_pays='{$id_pays}',ville = '{$ville}' 
    where id|_ville  = {$id_ville}" ;

    $conn->query($query);
    header("location: /Backend/pages/domaine.php");
}
//Add Formateur
if(isset($_POST["addFormateur"])){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $description=$_POST["description"];
    $id_cours=$_POST["id_cours"];
    $query="INSERT INTO formateur(first_name, last_name,description,id_cours) VALUES('{$fname}','{$lname}','{$description}','{$id_cours}')";
    $conn->query($query);
    header("location: /Backend/pages/formateurs.php");
}
//Edit Formateur
if(isset($_POST["editFormateur"]))
{
    $id_formateur=$_POST["id_formateur"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $description=$_POST["description"];
    $id_cours=$_POST["id_cours"];	
    $query="UPDATE formateur SET id_formateur='{$id_formateur}',first_name = '{$fname}', last_name = '{$lname}',description = '{$description}',id_cours = '{$id_cours}'
    where id_formateur  = {$id_formateur}" ;

    $conn->query($query);
    header("location: /Backend/pages/formateurs.php");
}
//Delete Formateur
if(isset($_POST["deleteFormateur"]))
{
    $id_formateur=$_POST["id_formateur"];
       
    $query="DELETE FROM formateur WHERE id_formateur  = {$id_formateur} " ;

    $conn->query($query);
    header("location: /Backend/pages/formateurs.php");
}
//Add Date
if(isset($_POST["addDate"]))
{
    $date=$_POST["date"];
    $query="INSERT INTO formation_date(date) VALUES('{$date}') ";

    $conn->query($query);
    header("location: /Backend/pages/date-formation.php");
}
//Edit Date
if(isset($_POST["editDate"]))
{
    $id_date=$_POST["id_date"];
    $date=$_POST["date"];
    $query="UPDATE  formation_date SET date = '{$date}' where id_date  = {$id_date}" ;

    $conn->query($query);
    header("location: /Backend/pages/date-formation.php");
}
//Delete Date
if(isset($_POST["deleteDate"]))
{
    $id_date=$_POST["id_date"];
       
    $query="DELETE FROM formation_date WHERE id_date  = {$id_date} " ;

    $conn->query($query);
    header("location: /Backend/pages/date-formation.php");
}
//add Formation
if(isset($_POST["addFormation"])){
    $price=$_POST["price"];
    $mode=$_POST["mode"];
    $id_cours=$_POST["id_cours"];
    $id_date=$_POST["id_date"];
    $id_ville=$_POST["id_ville"];
    
    $query="INSERT INTO formation(price, mode,id_cours, id_date,id_ville) VALUES('{$price}','{$mode}','{$id_cours}','{$id_date}','{$id_ville}')";
    $conn->query($query);
    header("location: /Backend/pages/gestion-formations.php");
}
//edit formation
if(isset($_POST["editFormation"]))
{
    $id_formation=$_POST["id_formation"];
    $price=$_POST["price"];
    $mode=$_POST["mode"];
    $id_cours=$_POST["id_cours"];
    $id_date=$_POST["id_date"];
    $id_ville=$_POST["id_ville"];
    $query="UPDATE formation SET price = '{$price}',mode = '{$mode}', id_cours='{$id_cours}',id_date='{$id_date}',id_ville='{$id_ville}' 
    where id_formation  = {$id_formation}" ;

    echo($query);
    $conn->query($query);
    header("location: /Backend/pages/gestion-formations.php");
}
?>