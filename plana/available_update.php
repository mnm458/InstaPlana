<?php 
  $ver = $_GET['ver'];
  function updateCurl($url,$method){
        
     $curl = curl_init();
      // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
      return $resp;
     
     
}
 
           $version_update = updateCurl('http://apps.ranksol.com/app_updates/rankpost/update_logs.php?ver='.$ver.'&time='.time(), 
'post');


 $version_update =  json_decode($version_update,true);
 
 
?>

<!DOCTYPE html>
 <html lang="en">
  
 <head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <meta name="description" content="" />
     <meta name="keywords" content="" />

     <title>RankPost - A Wiser Way To Schedule And Auto Post on Instagram</title>

     <!-- Styles -->
     <link href="./assets2/css/plugins.css" rel="stylesheet" />

     <!-- Fonts -->
     <link href='https://fonts.googleapis.com/css?family=Raleway:100,300,400,500%7CLato:300,400' rel='stylesheet' type='text/css' />

     <link rel="icon" href="./assets2/img/favicon.png" />
   </head>

   <body>

     <header class="site-header ">

   <!-- Top navbar & branding -->
   <nav class="navbar navbar-default navbar-light" style="box-shadow: none; border-bottom: 1px solid #f0f0f0;">
     <div class="container">

      
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
           <span class="glyphicon glyphicon-option-vertical"></span>
         </button>

         <button type="button" class="navbar-toggle for-sidebar" data-toggle="offcanvas">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>

         <a class="navbar-brand" href="index.php"><img src="./assets/img/logo.png" alt="RankPost" /></a>
       </div>

      
     
     </div>
   </nav>
   <!-- END Top navbar & branding -->

   </header>

     <main class="container">
       <div class="row">

         <!-- Sidebar -->
       
         <!-- END Sidebar -->


         <!-- Main content -->
        <article class="col-md-9 col-sm-9 main-content" role="main">
          <section>
            <h2 id="installation"><a href="#">Avaliable Updates</a></h2>
            <p>
              Update process is very easy and you may finish all process 
              just in 2 minutes.
            </p>

            <br>
            
            <ul class="step-text">
              <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Version</th>
      <th scope="col">Created Date</th>
      <th scope="col">Editions</th>
    </tr>
  </thead>
  <tbody>
  
  
  <?php ?>
  
  <?php 
  $count = 1;
        foreach($version_update as $version)
        {
    ?>
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $version['version']; ?></td>
      <td><?php echo $version['date']; ?></td>
      <td><?php echo $version['updates']; ?></td>
    </tr>
  <?php 
  $count++;
      }
    ?>
  </tbody>
</table>


            </ul>
          </section>

        
        </article>
         <!-- END Main content -->
       </div>
     </main>


     <!-- Footer -->
     <footer class="site-footer">
       <div class="container">
         <a id="scroll-up" href="#"><i class="fa fa-angle-up"></i></a>

         <div class="row">
           <div class="col-md-6 col-sm-6">
             <p>Copyright &copy; 2018. All Rights reserved </p>
           </div>
           <div class="col-md-6 col-sm-6">
             <ul class="footer-menu">
               <li><a class="btn btn-primary" style="color:white" href="update_app.php?ver=<?php echo $ver; ?>">Update Now </a></li>
             </ul>
           </div>
         </div>
       </div>
     </footer>
     <!-- END Footer -->

     <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92210897-3', 'auto');
  ga('send', 'pageview');

</script>     <script src="./assets2/js/plugins.js"></script>
   </body>
 </html>
 