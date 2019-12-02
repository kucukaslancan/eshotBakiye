<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>Kart Bakiye Sorgulama</title>



    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 
    <!-- Custom styles for this template -->
    <link href="css/Site.css" rel="stylesheet">
</head>
 
<body class="text-center"  >
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Check Balance</h3>
                
            </div>
        </header>

        <main role="main" class="inner cover">
           <section class="form-simple" style="opacity: 0.95;">

    <!--Form with header-->
    <div class="card">

      
        <!--Header-->

        <div class="card-body mx-4 mt-4">
            <form id="can"  >
                <!--Body-->
                <div class="md-form">
                    <label   class="text-danger">İzmirim Kart Numaranız :</label>
                    <input type="text" id="cardId"  class="form-control">
                    <br />
                </div>
            </form>
             <div class="text-center mb-4">
                    <button id="btnSubmit" type="submit" class="btn btn-danger btn-block z-depth-2">Sorgula</button>
             </div>

<div id="son" class="alert alert-success"></div>
<?php
if (isset($_SESSION["gecmisKart"]) ) {
    echo "<span class='text-danger'>Önceki Sorgulamalar: ".$_SESSION["gecmisKart"]."</span>";
}
?>
        </div>

    </div>
    <!--/Form with header-->

</section>
        </main>

        <footer class="mastfoot mt-auto">
        
        </footer>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#son").hide();
              $("#btnSubmit").click(function(){
                 $.ajax({
                    type:"POST",
                    url: "ajaxProcess.php",
                    data: 'kartNumarasi='+$("#cardId").val(), 
                    success: function(res){

                      $("#son").fadeIn();
                      $("#son").html(res); 
                    }
                });
               
              });

      });
    </script>
</body>
</html>

 