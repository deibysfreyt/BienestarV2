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
                                        
                                                        
                                                       
                                                            <label class="control-label">Fecha de Solicitud:</label>
                                                            <input name="fecha" type="date" style="border: 0" readonly=”readonly” id="fecha">
                                                    
                                                    
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a href="#personal" data-toggle="tab">Datos Personal</a>
                                            </li>
                                            <li>
                                                <a href="#account" data-toggle="tab">Beneficiario</a>
                                            </li>
                                            <li>
                                                <a href="#address" data-toggle="tab">Informacion Adicional</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="personal">
                                            <div class="row">                                               
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">fingerprint</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Cedula
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="cedula" type="text" class="form-control" id="cedula" maxlength="8">
                                                            <input type="hidden" name="id_solicitante" id="id_solicitante">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">phone</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Telefono Movil
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="tlf_movil" type="email" class="form-control" id="tlf_movil" maxlength="11">
                                                        </div>
                                                    </div>
                                                     <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">work</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Ocupacion
                                                                
                                                            </label>
                                                            <input name="ocupacion" type="text" class="form-control" id="ocupacion" maxlength="45">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Nombre y Apellido
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="nombre_apellido" type="text" class="form-control" id="nombre_apellido" maxlength="45">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">call_end</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Telefono Fijo
                                                                
                                                            </label>
                                                            <input name="tlf_fijo" type="text" class="form-control" id="tlf_fijo" maxlength="11">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">monetization_on</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Ingresos Bs.
                                                            
                                                            </label>
                                                            <input name="ingreso" type="text" class="form-control" id="ingreso" maxlength="9">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">event_note</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            
                                                            <input name="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento">

                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">accessibility_new</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Estado Civil</label>
                                                            <select name="estado_civil" class="form-control" id="estado_civil">
                                                                <option disabled="" selected=""></option>
                                                                <option value="Soltera(o)">Soltera(o)</option>
                                                                <option value="Casada(o)">Casada(o)</option>
                                                                <option value="Divorciada(o)">Divorciada(o)</option>
                                                                <option value="Separada(o)">Separada(o)</option>
                                                                <option value="Conviviente">Conviviente</option>
                                                                <option value="Viuda(o)">Viuda(o)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">location_city</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Parroquia</label>
                                                            <select name="parroquia" class="form-control" id="parroquia">
                                                                <option disabled="" selected=""></option>
                                                                <option value="Buena Vista">Buena Vista</option>
                                                                <option value="Catedral">Catedral</option>
                                                                <option value="Concepció">Concepción</option>
                                                                <option value="Felipe Alvarado">Felipe Alvarado</option>
                                                                <option value="Juan de Villegas">Juan de Villegas</option>
                                                                <option value="El Cuji">El Cuji</option>
                                                                <option value="Juárez">Juárez</option>
                                                                <option value="Santa Rosa">Santa Rosa</option>
                                                                <option value="Tamaca">Tamaca</option>
                                                                <option value="Unión">Unión</option>
                                                                <option value="Otros">Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">home</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Direccion de Habitacion
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="direccion" type="text" class="form-control" id="direccion">
                                                        </div>
                                                    </div>
                                                </div>
                                                                                             
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account">                                            
                                            <div class="row">                                               
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">fingerprint</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Cedula</label>
                                                            <input name="cedula_b" type="text" class="form-control" id="cedula_b" maxlength="8">
                                                            <input type="hidden" name="id_beneficiario" id="id_beneficiario">
                                                        </div>
                                                    </div>
                                                                                                        
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Nombre y Apellido
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="nombre_apellido_b" type="text" class="form-control" id="nombre_apellido_b" maxlength="45">
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">event_note</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            
                                                            <input name="fecha_nacimiento_b" type="date" class="form-control" id="fecha_nacimiento_b">
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                                
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">today</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Semana de Embarazo?</label>
                                                            <select name="semana_embarazo" class="form-control" id="semana_embarazo">
                                                                <option value="" selected=""></option> 
                                                                <?php
                                                                    for ($i=0; $i <= 42; $i++) { 
                                                                        echo "<option value=$i>". $i."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>                                                           
                                                </div>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">local_hospital</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Tipo de Solicitud
                                                                <small>(required)</small>
                                                            </label>
                                                            <select name="id_tipo_solicitud" class="form-control" id="id_tipo_solicitud">
                                                                <option disabled="" selected=""></option>
                                                                <option value="Si"> Si </option>
                                                                <option value="No"> No </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div><h4 class="info-text"><u> Area Medica Asistencial</u></h4></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">pets</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Diagnostico</label>
                                                            <input name="talla_zapato" type="text" class="form-control" id="talla_zapato">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">pets</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Monto Aprobado</label>
                                                            <input name="talla_zapato" type="text" class="form-control" id="talla_zapato">
                                                        </div>
                                                    </div>                                                           
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">airline_seat_legroom_reduced</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Motivo de la Solicitud</label>
                                                            <input name="talla_pantalon" type="text" class="form-control" id="talla_pantalon">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">local_offer</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Observacion</label>
                                                            <input name="talla_franela" type="text" class="form-control" id="talla_franela">
                                                        </div>
                                                    </div>                                                          
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">local_offer</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Recursos Disponible</label>
                                                            <input name="talla_franela" type="text" class="form-control" id="talla_franela">
                                                        </div>
                                                    </div>
                                                                                                               
                                                </div>                                                
                                            </div>
                                            <div class="col-sm-4">
                                                                                                           
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                
                                                
                                                <div class="col-sm-12">
                                                    <div><h4 class="info-text"><u> Area fisica ambiental </u></h4></div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">account_balance</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Tipo de Vivienda</label>
                                                            <select name="tipo_vivienda" class="form-control" id="tipo_vivienda">
                                                                <option disabled="" selected=""></option>
                                                                <option value="Quinta">Quinta</option>
                                                                <option value="Apartamento">Apartamento</option>
                                                                <option value="Casa">Casa</option>
                                                                <option value="Rancho">Rancho</option>
                                                            </select>
                                                        </div>
                                                    </div>                                             
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">pan_tool</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Tenencia</label>
                                                            <select name="tenencia" class="form-control" id="tenencia">
                                                                <option disabled="" selected=""></option>
                                                                <option value="Propia">Propia</option>
                                                                <option value="Alquilada">Alquilada</option>
                                                                <option value="Alojada">Alojada</option>
                                                                <option value="Otros">Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>                                              
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">build</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Construccion</label>
                                                            <select name="construccion" class="form-control" id="construccion">
                                                                <option disabled="" selected=""></option>
                                                                <option value="Bloque">Bloque</option>
                                                                <option value="Bahareque">Bahareque</option>
                                                                <option value="Zinc">Zinc</option>
                                                                <option value="Otros">Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>                                              
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">get_app</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Tipo de Piso</label>
                                                            <select name="tipo_piso" class="form-control" id="tipo_piso">
                                                                <option disabled="" selected=""></option>
                                                                <option value="Granito">Granito</option>
                                                                <option value="Cerámica">Cerámica</option>
                                                                <option value="Cemento">Cemento</option>
                                                                <option value="Tierra">Tierra</option>
                                                            </select>
                                                        </div>
                                                    </div>                                          
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a>           
                                                      <button id="" type="button" class="btn btn-rose btn-round" onclick="agregarDetalle()"> <span class="fa fa-plus"></span> Agregar Familiar</button>
                                                    </a>
                                                </div>

                                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                    <table id="detalles" class="table" style="background-color: rgba(200, 200, 200, 0.2);">
                                                      <thead class="text-rose">
                                                        <th>Opciones</th>
                                                        <th>Nombre y Apellido</th>
                                                        <th>Edad</th>
                                                        <th>Parentesco</th>
                                                        <th>Ocupacion</th>
                                                        <th>Observacion</th>                              
                                                      </thead>
                                                      <tbody>
                                                                  
                                                      </tbody>
                                                                            
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
                                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
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