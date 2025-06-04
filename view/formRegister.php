<h3><?= $lang['register'] ?? 'Register' ?></h3>

<form class="form-horizontal" role="form" method="POST" action="registerAnswer">
                    <form class="form-horizontal" role="form" method="POST" action="registerAnswer">
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label"><?= $lang['name'] ?? 'Name' ?></label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label"><?= $lang['email'] ?? 'E-Mail Address' ?></label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="" required> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label"><?= $lang['password'] ?? 'Password' ?></label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" value="" required> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label"><?= $lang['password-confirm'] ?? 'Confirm Password' ?></label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="confirm" value="" required> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" name="save" style="background-color:#703C96;">
                                <?= $lang['register'] ?? 'Register' ?>
                            </button>
                        </div>
                    </div>
</form>
