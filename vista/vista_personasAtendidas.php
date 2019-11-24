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
                        <a class="navbar-brand" href="#"> Solicitud de Beneficio </a>

                    </div>
                    <div class="navbar-brand">
                        <label>Fecha Actual: </label>
                        <input type="text" name="fecha_actual" style="border: 0" id="fecha_actual" readonly=”readonly”>
                    </div>                   
                </div>
            </nav>
            <div class="content" style="margin-top: 20px">
                <div class="container-fluid">
                    <div class="col-sm-12 col-sm-offset">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="green" id="wizardProfile">
                                <form method="post">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            Build Your Profile
                                        </h3>
                                        <h5>This information will let us know more about you.</h5>
                                        
                                        <label class="control-label" style="color: red;"><b>Lugar:</b></label>
                                        <input name="lugar" type="text" style="font-weight: bold; border-top: none;" id="lugar" required="">
                                        <label class="control-label" style="border: 0;color: red;"><b>Medico Tratante:</b></label>
                                        <select name="id_medicos" id="id_medicos"  data-live-search="true" required="">
                                            <option disabled="" selected=""></option>
                                            <?php
                                                //Listamos todo los datos para mostrarlo en el DATA TABLE
                                                $resp=$medicos->seleccionarM();
                                                           
                                                foreach ($resp as $row => $item) {
                                                    echo '<option value="'.$item["id_medicos"].'" style="font-weight: bold;"> Dr. '.$item["nombre_apellido"].'</option>';
                                                }//fin del foreach
                                            ?>
                                        </select>
                                        <label class="control-label" style="border: 0;color: red;"><b>Servicios:</b></label>
                                        <select name="id_servicios" id="id_servicios"  data-live-search="true" required="">
                                            <option disabled="" selected=""></option>
                                            <?php
                                                //Listamos todo los datos para mostrarlo en el DATA TABLE
                                                $resp=$servicios->seleccionarSr();
                                                           
                                                foreach ($resp as $row => $item) {
                                                    echo '<option value="'.$item["id_servicios"].'" style="font-weight: bold;">'.$item["nombre"].'</option>';
                                                }//fin del foreach
                                            ?>
                                        </select>
                                        <label class="control-label" style="border: 0;color: red;"><b>Fecha:</b></label>
                                        <input name="fecha" type="date" style="border: 0; font-weight: bold;" id="fecha" required="">
                                    </div>
                                    <div class="wizard-navigation" style="margin-top: -2em">
                                        <ul>
                                            <li>
                                                <a href="#address" data-toggle="tab">Personas Atendidas</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">                                        
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -5em">
                                                    <a>           
                                                      <button id="" type="button" class="btn btn-rose btn-round" onclick="agregarDetalle()"> <span class="fa fa-plus"></span> Agregar Personas</button>
                                                    </a>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                    <table id="detalles" class="table" style="background-color: rgba(200, 200, 200, 0.2);">
                                                      <thead class="text-rose">
                                                        <th>Opc.</th>
                                                        <th>Benef.</th>
                                                        <th>Edad</th>
                                                        <th>Repre.</th>
                                                        <th>.CI.</th>
                                                        <th>Tlf:</th>
                                                        <th>Parroq.</th>
                                                        <th>T.</th>
                                                        <th>P.</th>
                                                        <th>Diagn.</th>                              
                                                      </thead>
                                                      <tbody>
                                                        <!-- LA funcion de Familiares de Java Actua -->
                                                      </tbody>                 
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
                    </div>
                </div>
            </div>
            


<?php require_once("footer.php") ?>