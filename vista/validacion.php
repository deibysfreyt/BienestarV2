<?php require_once("header.php") ?>


<div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Validation Forms </a>
                    </div>
                    
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <form id="RegisterValidation" action="#" method="">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">mail_outline</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Register Forms</h4>
                                        <div class="form-group label-floating">
                                            <label class="control-label">
                                                Email Address
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="email" type="email" required="true" />
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">
                                                Password
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="password" id="registerPassword" type="password" required="true" />
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">
                                                Confirm Password
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="password_confirmation" id="registerPasswordConfirmation" type="password" required="true" equalTo="#registerPassword" />
                                        </div>
                                        <div class="category form-category">
                                            <small>*</small> Required fields</div>
                                        <div class="form-footer text-right">
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="checkbox" name="optionsCheckboxes"> Subscribe to newsletter
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-rose btn-fill">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <form id="LoginValidation" action="#" method="">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">contacts</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Login Form</h4>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email Address
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="email" type="text" email="true" required="true" />
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="password" type="password" required="true" />
                                        </div>
                                        <div class="category form-category">
                                            <star>*</star> Required fields</div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-rose btn-fill btn-wd">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <form id="TypeValidation" class="form-horizontal" action="#" method="">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">Type Validation</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Required Text</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="required" required="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>required</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Email</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="email" email="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>email="true"</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Number</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="number" number="true" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>number="true"</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Url</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="url" url="true.html" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>url="true"</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Equal to</label>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating column-sizing">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" id="idSource" type="text" placeholder="#idSource" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating column-sizing">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" id="idDestination" type="text" placeholder="#idDestination" equalTo="#idSource" />
                                                </div>
                                            </div>
                                            <label class="col-sm-4 label-on-right">
                                                <code>equalTo="#idSource"</code>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-rose btn-fill">Validate Inputs</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <form id="RangeValidation" class="form-horizontal" action="#" method="">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">Range Validation</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Min Length</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="min_length" minLength="5" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>minLength="5"</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Max Length</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="max_length" maxLength="5" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>maxLength="5"</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Range</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="range" range="[6,10]" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>range="[6,10]"</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Min Value</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="min" min="6" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>min="6"</code>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Max Value</label>
                                            <div class="col-sm-7">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" type="text" name="max" max="6" />
                                                </div>
                                            </div>
                                            <label class="col-sm-3 label-on-right">
                                                <code>max="6"</code>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-rose btn-fill">Validate Inputs</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


<?php require_once("footer.php") ?>