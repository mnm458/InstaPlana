       <?php
       session_start();
      // print_r($_SESSION);
           /**
             * Curl to get latest version
             */
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
function getServerURL()
{
    $serverName = $_SERVER['SERVER_NAME'];
    $filePath = $_SERVER['REQUEST_URI'];
    $withInstall = substr($filePath,0,strrpos($filePath,'/')+1);
    $serverPath = $serverName.$withInstall;
    $applicationPath = $serverPath;
    if(strpos($applicationPath,'http://www.')===false)
    {
    if(strpos($applicationPath,'www.')===false)
    $applicationPath = 'www.'.$applicationPath;
    if(strpos($applicationPath,'http://')===false)
    $applicationPath = 'http://'.$applicationPath;
    }    
    //$url = $applicationPath.'uploads/';
    return $applicationPath;
}
    
           $version_update = updateCurl('http://apps.ranksol.com/app_updates/rankpost/update.php?ver='.site_settings("version").'&time='.time(), 
'post');
       
       $version_update = json_decode($version_update,true);
        ?>
        <div id="topbar">
            <div class="clearfix">
                <a href="javascript:void(0)" class="topbar-mobile-menu-icon mdi mdi-menu"></a>

                <?php if (!empty($TopBar->title)): ?>
                    <h1 style="margin-left:30px;" class="topbar-title"><?= $TopBar->title ?></h1>
                    
                     <h1 style="margin-left:10px;" class="topbar-title">
                       
                         V.<?= site_settings("version") ?> 
                         <?php echo $_SESSION['msg']; 
                         
                         unset($_SESSION['msg']);
                         ?>
                         
                         <?php
                 if(site_settings("version")< $version_update['version']){
                     
                     ?>
                  <a href='<?php echo getServerURL(); ?>available_update.php?ver=<?php echo site_settings("version") ?>' ><img src="<?= APPURL . "/assets/img/New_Blink_3.gif" ?>"/></a>
                  <?php
                 }
                 
                 
                 ?>
                         
                    </h1>
               
                     
                     
                <?php endif ?>

                <?php if (!empty($TopBar->subtitle)): ?>
                    <div class="topbar-subtitle"><?= $TopBar->subtitle ?></div>
                <?php endif ?>

                <?php if (!empty($TopBar->btn)): ?>
                    <a class="topbar-special-link" href="<?= !empty($TopBar->btn["link"]) ? $TopBar->btn["link"] : "javascript:void(0)" ?>">
                        <?php if (!empty($TopBar->btn["icon"])): ?>
                            <span class="icon <?= $TopBar->btn["icon"] ?>"></span>
                        <?php endif ?>

                        <?php if (!empty($TopBar->btn["title"])): ?>
                            <?= $TopBar->btn["title"] ?>
                        <?php endif ?>
                    </a>
                <?php endif ?>

                <div class="topbar-actions clearfix">
                    <?php if ($AuthUser->isAdmin()): ?>
                        <div class="item topbar-search">
                            <form action="https://getnextpost.io/modules" target="_blank">
                             
                                <input class="search-box" 
                                       type="text" 
                                       name="q" 
                                       
                                       autocomplete="off">
                                <input class="none" type="submit" value="<?= __("Search") ?>">
                            </form>
                        </div>

                        <div class="item hide-on-small-only">
                            
                             
                            </a>
                        </div>
                    <?php endif; ?>


                    <div class="item">
                        <div class="topbar-profile clearfix">
                            <span class="greeting">
                                <?= __("Hi, %s!", htmlchars($AuthUser->get("firstname"))) ?>
                            </span>

                            <div class="pull-left clearfix context-menu-wrapper">
                                <a href="javascript:void(0)" class="circle">
                                    <span>
                                        <?= 
                                            mb_substr($AuthUser->get("firstname"), 0, 1) .
                                            mb_substr($AuthUser->get("lastname"), 0, 1)
                                        ?>
                                    </span>
                                </a>

                                <a href="javascript:void(0)" class="mdi mdi-chevron-down arrow"></a>

                                <div class="context-menu">
                                    <ul>
                                        <li><a href="<?= APPURL."/profile" ?>"><?= __('Profile') ?></a></li>
                                        <li><a href="<?= APPURL."/logout" ?>"><?= __('Logout') ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>