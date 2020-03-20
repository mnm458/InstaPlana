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
     <link href="./assets/css/plugins.css" rel="stylesheet" />

     <!-- Fonts -->
     <link href='https://fonts.googleapis.com/css?family=Raleway:100,300,400,500%7CLato:300,400' rel='stylesheet' type='text/css' />

     <link rel="icon" href="./assets/img/favicon.png" />
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

      
       <div id="navbar" class="navbar-collapse collapse" aria-expanded="true" role="banner">
         <ul class="nav navbar-nav navbar-right">
           <li><a href="#"><strong>FAQ </strong></a></li>
           <li><a href="#" target="_blank"><strong>ISSUES </strong></a></li>
           <li class="hero"><a href="#">Purchase </a></li>
         </ul>
       </div>
     </div>
   </nav>
   <!-- END Top navbar & branding -->

   </header>

     <main class="container">
       <div class="row">

         <!-- Sidebar -->
         <aside class="col-md-3 col-sm-3 sidebar">
             <ul class="sidenav dropable sticky">
   <li><a class="" href="index.php">Overview </a></li>
   <li><a class="" href="installation.php">Installation </a></li>
  
   <li><a class="active" href="scheduling.php">How to schedule </a></li>
   <li>
     <a class="has-child open" href="#">Integrations </a>

     <ul style="display: block">
     
       <li><a class="" href="paypal.php">PayPal </a></li>
       <li><a class="" href="stripe.php">Stripe </a></li>
    
     </ul>
   </li>
   <li><a class="" href="#" target="_blank">FAQ </a></li>
  
 </ul>        </aside>
         <!-- END Sidebar -->


         <!-- Main content -->
        <article class="col-md-9 col-sm-9 main-content" role="main">
          <section>
            <h2 id="scheduling-posts"><a href="#">Scheduling Posts</a></h2>
            <p>
              Proper cron task must be configured for publising scheduled posts. 
              Otherwise scheduled posts will not be published. Also there might be 
              some modules which uses the same cron task.
            </p>

            <p>
              Cron task should run once per minute. In some servers, minimum interval for running cron tasks is 15 minutes.
              If you set interval to 15 minutes, all of your scheduled posts still will publish. But publish time might delay up approximately 15 minutes.
            </p>

            <p>
              Scheduled posts are being published by opening <code>/cron</code> page in your app. 
              So if you've installed the app to <code>www.example.com</code> then cron URL will be <code>www.example.com/cron</code>
            </p>

            <p>
              <br>
              Complete cron task should be similar to: <br>
              <code>* * * * * wget --quiet -O /dev/null http://www.yourwebsite.com/cron</code>
              <br><br>
            </p>
            
            <p>
              If you your cron task didn't work with previous command, then you can try with following command: <br>
              <code>* * * * * wget -- spider -O - http://yourwebsite.com/cron &gt;/dev/null 2&gt;&amp;1</code>
              <br><br>
            </p>

            <p>
              Don't forget to replace <code>http://yourwebsite.com/</code> with the actual URL of your app.
            </p>
            
            <p>
              If your server doesn't support cron task, then you'll not be able to schedule posts successfully.
              Then you should either change your server or use external cron task services. There is not any other workaround, please don't ask.
            </p>

            <p>
              Check <a href="https://www.easycron.com/" target="_blank">easycron.com</a> if you're looking for external cron task service.
            </p>
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
               <li><a href="#">Changelog </a></li>
               <li><a href="mailto:azhar@ranksol.com">Contact us </a></li>
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

</script>     <script src="./assets/js/plugins.js"></script>
   </body>
 </html>
 