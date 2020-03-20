        <nav>
            <div class="nav-logo-wrapper">
            <a href="<?= APPURL."/post" ?>">
                    <img src="<?= site_settings("logomark") ? site_settings("logomark") : APPURL."/assets/img/logomark.png" ?>" 
                         alt="<?= site_settings("site_name") ?>">
                </a>
                            </div>

            <div class="nav-menu">
                <div>
                    <ul>
                        <li >
                            <a href="<?= APPURL."/post" ?>">
                                 <img src="<?=  APPURL."/assets/img/plus.png" ?>" 
                                 <span class="sli sli-event"></span>
                                <span class="label"><?= __('Post') ?></span>
 <span class="tooltip tippy" 
                                      data-position="right"
                                      data-delay="100" 
                                      data-arrow="true"
                                      data-distance="-1"
                                      title="<?= __('Post') ?>"></span>
                             
                            </a>
                        </li>
                        
                        
                        
                        
                        
                 

                        <li class="<?= $Nav->activeMenu == "calendar" ? "active" : "" ?>">
                        
                            <a href="<?= APPURL."/calendar" ?>">
                               <img src="<?=  APPURL."/assets/img/calendar.png" ?>" 
                                <span class="sli sli-event"></span>
                                <span class="label"><?= __('Calendar') ?></span>

                                <span class="tooltip tippy" 
                                      data-position="right"
                                      data-delay="100" 
                                      data-arrow="true"
                                      data-distance="-1"
                                      title="<?= __('Calendar') ?>"></span>
                            </a>
                        </li>

                      

                        <li class="<?= $Nav->activeMenu == "accounts" ? "active" : "" ?>">
                            <a href="<?= APPURL."/accounts" ?>">
                             <img src="<?=  APPURL."/assets/img/instagram.png" ?>" 
                                <span class="sli sli-social-instagram"></span>
                                <span class="label"><?= __('Accounts') ?></span>

                                <span class="tooltip tippy" 
                                      data-position="right"
                                      data-delay="100" 
                                      data-arrow="true"
                                      data-distance="-1"
                                      title="<?= __('Accounts') ?>"></span>
                            </a>
                        </li>

                      

                        <?php \Event::trigger("navigation.add_menu", $Nav, $AuthUser) ?>
                    </ul>

                    <ul>
                        <?php \Event::trigger("navigation.add_special_menu", $Nav, $AuthUser) ?>
                    </ul>

                    <?php if ($AuthUser->isAdmin()): ?>
                        <ul>
                            


                            <li class="<?= $Nav->activeMenu == "users" ? "active" : "" ?>">
                                <a href="<?= APPURL."/users" ?>">
                                    <img src="<?=  APPURL."/assets/img/team.png" ?>" 
                                 <span class="sli sli-people" ></span>
                                    <span class="label"><?= __('Users') ?></span>

                                    <span class="tooltip tippy" 
                                          data-position="right"
                                          data-delay="100" 
                                          data-arrow="true"
                                          data-distance="-1"
                                          title="<?= __('Users') ?>"></span>
                                </a>
                            </li>

                            <?php \Event::trigger("navigation.add_admin_menu", $Nav, $AuthUser) ?>
                            
                            <li class="<?= $Nav->activeMenu == "settings" ? "active" : "" ?>">
                                <a href="<?= APPURL."/settings" ?>">
                                <img src="<?=  APPURL."/assets/img/settings.png" ?>" 
                                    <span class="sli sli-settings menu-icon"></span>
                                    <span class="label"><?= __('Settings') ?></span>

                                    <span class="tippy" 
                                          data-position="right"
                                          data-delay="100" 
                                          data-arrow="true"
                                          data-distance="-1"
                                          title="<?= __('Settings') ?>"></span>
                                </a>
                            </li>

                                                     </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>