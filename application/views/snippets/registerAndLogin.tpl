<div class='chatMateContainerLoginInner'>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#signUp" aria-controls="signUp" role="tab" data-toggle="tab">SIGN UP</a></li>
        <li role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">LOGIN</a></li>
    </ul>

    <div class="tab-content chatMateContainerLoginInnerTabs">
        <!-- REGISTER FORM -->
        <div role="tabpanel" class="tab-pane active" id="signUp">
            <div class='col-lg-9 col-md-9 col-sm-12 col-xs-12'>
                <form action='/register' method='POST'>
                    <legend>REGISTER</legend>
                    <label for='username'>Username</label>
                    <input type='text' class='form-control' name='username' value='' placeholder='Username'/>
                    <br/>
                    <label for='eMail'>E-Mail</label>
                    <input type='text' class='form-control' name='eMail' value='' placeholder='E-Mail'/>
                    <br/>
                    <label for='password'>Password</label>
                    <input type='password' class='form-control' name='password' value='' placeholder='Password'/>
                    <br/>
                    <label for='passwordRepeat'>Password repeat</label>
                    <input type='password' class='form-control' name='passwordRepeat' value='' placeholder='Password repeat'/>
                    <br/>
                    <div class="checkbox">
                        <label><input name='agb' type="checkbox" value="">I accept the <a href="#" title="AGBs">AGBs</a></label>
                    </div>
                    
                    <button type='submit' name='submitRegister' class='btn btn-success btn-block'>Sign up for free</button>
                </form>
            </div>

            <div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
                <legend>Benefits</legend>
                <ul class="list-group">
                    <li class="list-group-item"><i class="glyphicon glyphicon-ok patchedOk"></i> Chat with your friends - anytime and where ever you want, for FREE</li>
                    <li class="list-group-item"><i class="glyphicon glyphicon-ok patchedOk"></i> Chat with your friends - anytime and where ever you want, for FREE</li>
                    <li class="list-group-item"><i class="glyphicon glyphicon-ok patchedOk"></i> Chat with your friends - anytime and where ever you want, for FREE</li>
                    <li class="list-group-item"><i class="glyphicon glyphicon-ok patchedOk"></i> Chat with your friends - anytime and where ever you want, for FREE</li>
                    <li class="list-group-item"><i class="glyphicon glyphicon-ok patchedOk"></i> Chat with your friends - anytime and where ever you want, for FREE</li>
                    <li class="list-group-item"><i class="glyphicon glyphicon-ok patchedOk"></i> Chat with your friends - anytime and where ever you want, for FREE</li>
                </ul>
            </div>
        </div>

        <!-- LOGIN FORM -->
        <div role="tabpanel" class="tab-pane" id="login">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <form action='/login' method='POST'>
                    <legend>LOGIN</legend>
                    <label for='username'>Username or E-Mail</label>
                    <input type='text' class='form-control' name='username' value='' placeholder='Username or E-Mail'/>
                    <br/>
                    <label for='password'>Password</label>
                    <input type='password' class='form-control' name='password' value='' placeholder='Password'/>
                    <br/>
                    <button type='submit' name='submitLogin' class='btn btn-success btn-block'>Login</button>
                </form>
            </div>
        </div>
    </div>

</div>