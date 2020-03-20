        <div class="asidenav">
            <div class="asidenav-group">
                <div class="asidenav-title"><?= __("General Settings") ?></div>
                <ul>
                    <li class="<?= $page == "site" ? "active" : "" ?>"><a href="<?= APPURL."/settings/site" ?>"><?= __("Site Settings") ?></a></li>
                    <li class="<?= $page == "landing" ? "active" : "" ?>"><a href="<?= APPURL."/settings/landing" ?>"><?= __("Landing Page Settings") ?></a></li>
                    <li class="<?= $page == "logotype" ? "active" : "" ?>"><a href="<?= APPURL."/settings/logotype" ?>"><?= __("Logotype") ?></a></li>
                    <li class="<?= $page == "other" ? "active" : "" ?>"><a href="<?= APPURL."/settings/other" ?>"><?= __("Other Settings") ?></a></li>
              <li class="<?= $page == "package" ? "active" : "" ?>"><a href="<?= APPURL."/packages" ?>"><?= __("Package Settings") ?></a></li>     
            </div>

            

            <div class="asidenav-group">
                <div class="asidenav-title"><?= __("Email") ?></div>
                <ul>
                    <li class="<?= $page == "smtp" ? "active" : "" ?>"><a href="<?= APPURL."/settings/smtp" ?>"><?= __("SMTP") ?></a></li>
                    <li class="<?= $page == "notifications" ? "active" : "" ?>"><a href="<?= APPURL."/settings/notifications" ?>"><?= __("Email Notifications") ?></a></li>
                </ul>
            </div>

            <div class="asidenav-group">
                <div class="asidenav-title"><?= __("Integrations") ?></div>
                <ul>
                   
                 
                    
                 
                    <li class="<?= $page == "paypal" ? "active" : "" ?>"><a href="<?= APPURL."/settings/paypal" ?>"><?= __("PayPal Integration") ?></a></li>
                    <li class="<?= $page == "stripe" ? "active" : "" ?>"><a href="<?= APPURL."/settings/stripe" ?>"><?= __("Stripe Integration") ?></a></li>
                  
                   
                </ul>
            </div>
        </div>