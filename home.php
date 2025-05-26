<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    

    <link rel="stylesheet" href="style.css"/>

</head>
<body>
    
    <!--navi navi navi--> 
    <?php include('navbar.php'); ?>



      <!--humpeyjj-->
      <section id="home">
        <div class="container">
          <h5></h5>
          <h1><span>Welcome to CATipunan!</span></h1>
          <p>Saving stray lives — that’s CAT-ipunan’s mission.</p>
          <a href="moning.php"><button>Adopt Now</button></a>
        </div>
      </section>


     
      <div class="container text-center mt-5 py-5">
        <h3>Find your Purr-fect friend </h3>
        <p>Adopt Happiness, One Meow at a Time.!</p>
      </div>
          
          

        </div>
      </section>

      <!--catz-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!--cat1-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="https://i.pinimg.com/736x/6d/1e/80/6d1e8093417e9819d6cc74f3bcd98323.jpg"/>
            <div class="details">
              <h2>Strays</h2>
              <a href="moning.php"><button class="text-uppercase">view monings</button></a>
            </div>
          </div>

          <!--cat2-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="https://i.pinimg.com/736x/c7/ce/6b/c7ce6b6e0ddc647b70de2bc59625ae4d.jpg"/>
            <div class="details">
              <h2>Rescued</h2>
              <a href="moning.php"><button class="text-uppercase">view monings</button></a>
            </div>
          </div>
      

      <!--cat3-->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="https://i.pinimg.com/736x/44/c4/fc/44c4fcd2c5447880e47e709e269c0b44.jpg"/>
        <div class="details">
          <h2>Senior Monings</h2>
          <a href="moning.php"><button class="text-uppercase">view monings</button></a>
        </div>
      </div>
    </div>
    </section>

      
<!--footer mwah-->
<?php include('footer.php'); ?>
    


</body>
</html>