            <form class="js-ajax-form" 
                  action="<?= APPURL . "/settings/" . $page ?>"
                  method="POST">
                <input type="hidden" name="action" value="save">

                <div class="section-header clearfix">
                    <h2 class="section-title"><?= __("Landing Page Settings") ?></h2>
                    <div class="section-actions clearfix hide-on-large-only">
                        <a class="mdi mdi-menu-down icon js-settings-menu" href="javascript:void(0)"></a>
                    </div>
                </div>

                <div class="section-content">
                    <div class="form-result"></div>

                    <div class="clearfix">
                        <div class="col s12 m6 l5">
                            
 <div class="mb-20">
                                <label class="form-label"><?= __("About Heading") ?></label>

                                <input class="input"
                                       name="heading" 
                                       type="text" 
                                       value="<?= htmlchars($Landing->get("data.heading")) ?>" 
                                       placeholder="<?= __("Enter heading here") ?>"
                                       maxlength="100">
                            </div>
                            <div class="mb-20">
                                <label class="form-label"><?= __("About Site") ?></label>

                                <textarea class="input" 
                                          name="about"
                                          maxlength="255"
                                          rows="3"><?= htmlchars($Landing ->get("data.about")) ?></textarea>

                                <ul class="field-tips">
                                    <li></li>
                                </ul>
                            </div>

                            <div class="mb-40">
                                

                                
                            </div>
                        </div>

                        <div class="col s12 m6 l5">
                            
                        </div>
                    </div>

                    <div class="clearfix">
                        <div class="col s12 m6 l5">
                            <input class="fluid button" type="submit" value="<?= __("Save") ?>">
                        </div>
                    </div>
                </div>
            </form>