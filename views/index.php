<script>
    (function ($) {
        var settings = {
            form      : '#form',
            formSubmit: '#submitRegisterForm',
            formConfig: '#form-config-btn',
            formConfirm: '#form-confirm-btn',
            formFinish: '#form-finish-btn',
            formBackConfig: '#form-config-btn',
            urlRun: '',
        };
        function enabledMenu(elm) {
            $(elm).addClass('finished');
        }
        function disabledMenu(elm) {
            $(elm).removeClass('finished');
        }

        var submit = false;
        var config = false;
        var finish = false;
        $(document).on('click', settings.formSubmit, function() {
            var registerName = $('#registerName').val();
            if (registerName == ""){
                $('#error-name').show();
            }
            else {
                $('#error-name').hide();
            }
            var registerEmail = $('#registerEmail').val();
            if (registerEmail == ""){
                $('#error-email').show();
            } else {
                if (registerEmail.indexOf('@') == -1){
                    $('#error-email').show();
                } else {
                    $('#error-email').hide();
                    submit = true;
                }
            }
            if (submit == true){                
                $('#form-config').show();
                $('#form-submit').hide();
                enabledMenu('#menu-config');
                disabledMenu('#menu-setup');
                $(document).on('click', settings.formConfig, function() {
                    var sourceCartName = $('#sourceCartName').val();
                    var targetCartName = $('#targetCartName').val();
                    if (sourceCartName == ""){
                        $('#error-source').show();
                    } else {
                        $('#error-source').hide();
                    }
                    if (targetCartName == ""){
                        $('#error-target').show();
                    } else {
                        $('#error-target').hide();
                    }
                    if (sourceCartName != "" && targetCartName != ""){
                        $('#form-config').hide();
                        $('#form-confirm').show();
                        enabledMenu('#menu-confirm');
                        disabledMenu('#menu-config');
                        // var fullname = document.getElementById("registerName").value;
                        // document.getElementById("yourfullname1").innerHTML = "<strong>Your Name: " + fullname + "</strong>";
                        // var email = document.getElementById("registerEmail").value;
                        // document.getElementById("youremail1").innerHTML = "<strong>Your Email: " + email + "</strong>";
                        var sourceCart = document.getElementById("sourceCartName").value;
                        document.getElementById("yoursourceCartName").innerHTML = "<strong>Your Source Cart URL: " + sourceCart + "</strong>";
                        var targetCart = document.getElementById("targetCartName").value;
                        document.getElementById("yourtargetCartName").innerHTML = "<strong>Your Target Cart URL: " + targetCart + "</strong>";
                        $(document).on('click', settings.formConfirm, function() {
                            $('#form-confirm').hide();
                            $('#form-finish').show();
                        });
                        $(document).on('click', '#form-finish-btn', function() {
                            window.location.reload();
                        });
                    }
                });
                $(document).on('click', '#form-config-back', function() {
                    $('#form-submit').show();
                    $('#form-config').hide();
                    enabledMenu('#menu-setup');
                    disabledMenu('#menu-config');
                });
                $(document).on('click', '#form-confirm-back', function() {
                    $('#form-config').show();
                    $('#form-confirm').hide();
                    enabledMenu('#menu-config');
                    disabledMenu('#menu-confirm');
                });
            }
        });
    })(jQuery);
</script>
<div class="wrap no-js">
    <h2>LitExtension: <?php echo $source_cart; ?> to Woocommerce Migration</h2>
    <div class="content">
        <div class="litextension">
            <div id = "messages"></div>
            <div class="litextension_topdesc">
                <a class="litextension_logo" href="<?php echo $product_link; ?>" target="_blank">
                    <img  alt="Automated Shopping Cart Migration Service" title="Automated Shopping Cart Migration Service" src="<?php echo $img_url; ?>">
                </a>
                <div class="litextension_text">
                    <div class="lit-title"><?php echo $source_cart ?> to WooCommerce Migration</div>
                    <?php echo $source_cart; ?> to Woocommerce Migration Plugin is ultimate Shopping Cart Migration Solution by LitExtension.
                    It allows you to migrate all your products, categories, orders, customers, passwords, SEO URLs and other data from <?php echo $source_cart; ?> to WooCommerce within 3 simple steps.
                    <div class="lit-btn-submit"style="margin-top: 15px"><a target="_blank" href="<?php echo $product_link; ?>"  target="_blank"><button class="submit_button" style="padding: 10px 30px!important">Get It Now</button></a></div>
                </div>
            </div>
            <div class="wrap">
                <div id="litextension-wrap">
                    <div id="litextension-menu">
                        <div id="menu-setup" class="step-menu finished">
                            <strong>1. Registration</strong>
                        </div>
                        <div id="menu-config" class="step-menu">
                            <strong>2. Configuration</strong>
                        </div>
                        <div id="menu-confirm" class="step-menu">
                            <strong>3. Migration</strong>
                        </div>
                    </div>
                    <div class="cls"></div>
                </div>
            </div>
            <div class="tabs_content">
               <!--  <form action="http://litextension.com/zendesk/lite/save" method="post" enctype="multipart/form-data" id="form"> -->
                <form target="_blank" action="http://litextension.com/zendesk/lite/save" method="post" enctype="multipart/form-data" id="form-submit">
                    <div id="lit_register_content">
                        <h1>1. Registration</h1><br/><br/>
                        <div class="left-col">
                            <span style="padding-bottom: 5px">Your Name:<span class="required">*</span></span><br/>
                            <input type="text" size="30" name = "requester_name" required id = "registerName" ><br/>
                            <p id="error-name" class="litextension-error"></i> Please fill your name.</p>
                            <span style="padding-bottom: 5px">Your Email:<span class="required">*</span></span><br/>
                            <input type="text" size="30" name = "requester" required id = "registerEmail">
                            <p id="error-email" class="litextension-error"></i> Please fill your email. Example: example@gmail.com</p>
                        </div>
                        <div class="right-col">Please let us know your requirement<br/>
                            <textarea name = "description" id = "registerRequirement" style='width: 500px;height: 100px'> </textarea>
                        </div>
                        <br/>
                        <input type="hidden" name = "sourceCartName" value="<?php echo $source_cart; ?>">
                        <input type="hidden" name = "targetCartName" value="Opencart">
                        <!-- <div id="form-submit-btn" class="litextension-submit">Submit</div>                         -->
                        <div class="lit-btn-submit"><button class="submit_button" id='submitRegisterForm'>Submit</button></div>
                    </div>
                </form>
                <form action="" method="post" id="form-config" style="display: none;">                   
                    <div id="lit_register_content">
                        <h1>2. Configuration</h1><br/><br/>                       
                        <div>
                            <span style="padding-bottom: 5px">Your Source Cart URL:<span class="required">*</span></span><br/>
                            <input type="text" size="30" name = "requester_sourceCart" required id = "sourceCartName" ><br/>
                            <p id="error-source" class="litextension-error"></i> Please fill your source cart.</p>
                            <span style="padding-bottom: 5px">Your Target Cart URL:<span class="required">*</span></span><br/>
                            <input type="text" size="30" name = "requester_targetCart" required id = "targetCartName">
                            <p id="error-target" class="litextension-error"></i> Please fill your target cart.</p>
                        </div>                       
                        <a id="form-config-back" class="litextension-back">&laquo; Back to previous step</a>
                        <div id="form-config-btn" class="litextension-submit" type="submit">Next</div>
                    </div>
                </form>
                <form action="" enctype="multipart/form-data" method="post" id="form-confirm" style="display: none;">
                    <div id="lit_register_content">
                        <h1>3. Migration</h1><br/><br/>
                        <div>                            
                            <span style="padding-bottom: 5px" id="yoursourceCartName">Your Source Cart:</span><strong></strong><br/>
                            <span style="padding-bottom: 5px" id="yourtargetCartName">Your Target Cart:</span><strong></strong><br/><br/><br/><br/><br/>
                            <a id="form-confirm-back" class="litextension-back">&laquo; Back to previous step</a>
                            <div name="action" id="form-confirm-btn" class="litextension-submit" type="submit">Migration</div>
                        </div>
                    </div>
                </form>
                <form action="" method="post" enctype="multipart/form-data" id="form-finish" style="display: none;margin-left: 260px;">                    
                    <p>Your migration is under process. Please wait, we will email you shortly. Thank you!</p>
                    <div id="form-finish-btn" class="litextension-submit" type="submit" style="margin-left: 160px;">Finish</div>
                </form>
            </div>
            <span class="litextension_support"><span class="litextension_support_icon">If you have any question, please do not hesitate to <a href="http://litextension.com/contacts/" target="_blank">Contact Us</a>. We look forward to assisting you.</span></span>
        </div>
    </div>
</div>
