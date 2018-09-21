<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{

    // Testons si l'extension est autorisée
    $infosfichier = pathinfo($_FILES['monfichier']['name']);
    $extension_upload = $infosfichier['extension'];
    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_autorisees))
    {
        // On peut valider le fichier et le stocker définitivement
        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
        echo "L'envoi a bien été effectué !";
    }

}
?>

SECURISER LE FORMULAIRE DE CONTACT

 <?php
//tout dabord il faut verifier que tous les champs soit remplits avec la bonne forme (email doit etre composé d'un @ et d'un email valide
if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Invalid name';
        }
        if(!preg_match("/^[A-Za-z .'-]+$/", $subject)){
          $subject_error = 'Invalid subject';
        }
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'Invalid email';
        }
        if(strlen($message) === 0){
          $message_error = 'Your message should not be empty';
        }
      }
      ?>
<?php
//il faut ensuite vérifier que tous les champs soit remplits une fois que l'utilisateur click sur submit
if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
    $to = 'youremail@addres.com'; // edit here
    $body = " Name: $name\n E-mail: $email\n Message:\n $message";
    if(mail($to, $subject, $body)){
        echo '<p style="color: green">Message sent</p>';
    }else{
        echo '<p>Error occurred, please try again later</p>';
    }
}
?>




