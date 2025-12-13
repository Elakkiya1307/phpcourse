<?php
//connect to database

$conn=mysqli_connect('localhost','shaun','Elakkiya@1307','ninja_pizza');

//check connection

if(!$conn){
    echo 'connection error'. mysqli_connect_error();
}

//WRITE querry for all pizzas
$sql='SELECT title, ingredients, id from pizzas';

//make query & get result
$result=mysqli_query($conn,$sql);

//fetch the resulting rows as an array
$pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC);

//free result from memory
mysqli_close($conn);

print_r($pizzas);
?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php');?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
<div class="row">
<?php foreach($pizzas as $pizza){?>

    <div class="col s6 md3">
        <div class="card z-depth-0">
        <div class="card-content center">
            <h6><?php echo htmlspecialchars($pizza['title']);?></h6>
</div>
        </div>
    </div>

    <?php
}?>
</div>
</div>
<?php include("templates/footer.php");?>

</html>

