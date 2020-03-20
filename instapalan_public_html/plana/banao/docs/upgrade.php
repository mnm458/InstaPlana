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
   
   <li><a class="" href="scheduling.php">How to schedule </a></li>
   <li>
     <a class="has-child open" href="#">Integrations </a>

     <ul style="display: block">
     
       <li><a class="" href="paypal.php">PayPal </a></li>
       <li><a class="" href="stripe.php">Stripe </a></li>
    
     </ul>
   </li>
   <li><a class="" href="#" target="_blank">FAQ </a></li>
  
 </ul>         </aside>
         <!-- END Sidebar -->


         <!-- Main content -->
        <article class="col-md-9 col-sm-9 main-content" role="main">
          <section>
            <h2 id="installation"><a href="#">Upgrade Instruction</a></h2>
            <p>
              Upgrade process is very easy and similar to installation process. 
              <strong>Before uprading the application we strongly recommend to 
              backup all of application files and database.</strong>
            </p>

            <p>
              Please read the following step-by-step guide to upgrade your app.
            </p>

            <br>
            
            <ul class="step-text">
              <li>
                <h5>Take a backup of the directories:</h5>
                <p>Open the root directory of the website and take a backup of the following directories:</p><br>
                <p>
                  Uploads (user's media files) directory: <br>
                  <code>/assets/uploads/</code>
                </p>

                <p>
                  Instagram sessions directory: <br>
                  <code>/app/sessions/</code>
                </p>

                <p>
                  Modules directory. This directory contains all module related files which you've installed. If you've not installed any module yet, you can skip ahead.<br>
                  <code>/inc/plugins/</code>
                </p>

                <p>
                  Theme directory. This directory contains all theme related files. If you're using the default theme without making any changes, you can skip ahead.<br>
                  <code>/inc/themes/</code>
                </p>
              </li>

              <li>
                <h5>Get database credentials</h5>
                <p>
                  Open <code>/app/config/db.config.php</code> file in your current installation. 
                  Then copy your database credentials credentials to the safe place. 
                  You'll need them soon.
                </p>
              </li>


              <li>
                <h5>Copy Crypto Key</h5>

                <p>
                  Open <code>/app/config/config.php</code> file in your current 
                  installation. Copy the value of <code>CRYPTO_KEY</code> constant to the 
                  safe place. You'll need it soon.
                </p>
              </li>

              <li>
                <h5>Remove old files</h5>
                <p>
                  Remove all application files from your server. 
                  <span class="text-warning">Don't make any changes to your database.</span>
                </p>
              </li>

              <li>
                <h5>Upload and Extract</h5>
                <p>
                  Upload new zip archive file to your server and extract all of its 
                  content to your old application directory.
                </p>

                <div class="text-gray">
                  Please note that some hosting providers don't allow to extract 
                  <code>.htaccess</code> files from zip archive. There are two <code>.htaccess</code> files in 
                  archive file. One of them in <code>root directory</code>, 
                  another in <code>/app</code> directory. Please make sure both of 
                  these files has been extracted.
                </div>
              </li>

              <li>
                <h5>Navigate to installation page</h5>

                <p>
                  Navigate to your website address. 
                  You should be redirected to installation page.
                </p>
              </li>

              <li>
                <h5>Start Installation</h5>

                <p>
                  On installation page click Start Installation button. 
                  And check if you server is configured correctly to run 
                  the application. If everything is alright, then you should 
                  see Next button at the bottom of page. Click it!
                </p>
              </li>

              <li>
                <h5>Purchase Code, Installation mode</h5>

                <p>
                  At this step you should be asked several questions. First include your purchase code.
                  Next question should be installation mode. It could be either clean installation or uprade from previous version(s).
                  This guide is intended for upgrading from previous version(s). So select "<strong>Yes, Upgade from version X.X</strong>" from the dropdown list.
                  X.X is the version which is was installed on your server just before removing the app files in step 3.
                  If you want to do clean installion then have a look at <a href="https://docs.getnextpost.io/installation.html"><strong>Installation guide</strong></a>.
                </p>
              </li>

              <li>
                <h5>Crypto Key and Database Details</h5>
                <p>
                  Enter the Crypto Key that you've copied in step 2 and 
                  database credentials that you've copied in step 1
                </p>
              </li>

              <li>
                <h5>Finish Installation</h5>

                <p>
                  Click Finish Installation button. If everythig went OK, 
                  you'll see success messae after few seconds.
                </p>
              </li>

              <li>
                <h5>Upload the directories from the backup</h5>
                <p>Upload the following directories which you've got a backup in step 1.</p><br>

                <p>
                  Instagram sessions directory: <br>
                  <code>/app/sessions/</code>
                </p>

                <p>
                  Uploads (user's media files) directory: <br>
                  <code>/assets/uploads/</code>
                </p>

                <p>
                  Modules directory. If you've not installed any module yet, you can skip ahead.<br>
                  <code>/inc/plugins/</code>
                </p>

                <p>
                  Theme directory. If you're using the default theme without making any changes, you can skip ahead.<br>
                  <code>/inc/themes/</code>
                </p>
              </li>
            </ul>
          </section>

          <section>
            <h2 id="errors"><a href="https://docs.getnextpost.io/upgrade.php#errors">Errors</a></h2>
            <p>
              During the installation process sometimes you might get an error. 
              Generally detailed description about the error should be displayed.
            </p>

            <p>
              If you're getting <code>Unexpected error occured!</code> then most likely
              your server configuration doesn't match application requirement. At this case,
              you should have a look at PHP error log for more information about the error.
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
 