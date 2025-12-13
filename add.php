<?php
$email=$title=$ingredients='';

$error=array('email'=>'','title'=>'','ingredients'=>'');
if (isset($_POST['submit'])) {
    
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']); 
    // echo htmlspecialchars($_POST['ingredients']);

    //check email

    if(empty($_POST['email'])){
       $error['email']='an email is required <br />';
    }else{
        $email=$_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email']='email must be a valid email address';

        }
    }
    //check title
    if(empty($_POST['title'])){



         $error['title']= 'an title is required <br />';
    }else{
        $title=$_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
            $error['title']= 'title must be letters and spaces only <br />';
        }
    }

    //check ingredients
    if(empty($_POST['ingredients'])){
        $error['ingredients']= 'at leat one ingredients is required <br />';
    }else{
        $ingredients=$_POST['ingredients'];
       if(!preg_match('/^[a-zA-Z\s]+$/',$ingredients)){
            $error['ingredients']='ingredients must be a comma separated list';
    }
}
    if(array_filter($error)){
        //echo 'errors in the form';
    }else{
        //echo 'form is valid';
        header('location: index.php');
    }

}        //end of POST check
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>

    <!-- Use POST instead of POST(recommended) -->
    <form class="white" action="add.php" method="POSt">
        
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo $email?>">

        <div class="red-text"><?php echo $error['email']; ?></div>

        <label>Pizza Title:</label>
        <input type="text" name="title" value="<?php echo $title?>">

         <div class="red-text"><?php echo $error['title']; ?></div>

        <label>Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo $ingredients?>">

         <div class="red-text"><?php echo $error['ingredients']; ?></div>

        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>


<?php include('templates/footer.php'); ?>
</html>
