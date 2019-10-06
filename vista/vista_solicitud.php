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
                                        <label class="control-label" style="color: red;"><b>Fecha de Solicitud:</b></label>
                                        <input name="fecha" type="date" style="border: 0; font-weight: bold;" id="fecha">
                                        <label class="control-label" style="color: red;"><b>Estado de Solicitud:</b></label>
                                        <input type="hidden" name="id_solicitud" id="id_solicitud">
                                        <select name="estado" id="estado" style="border: 0; background-color: orange; font-weight: bold;">
                                            <option value="En espera" selected="">En espera</option>
                                            <option value="Aprobado">Aprobado</option>             
                                        </select>
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
                                                            <input name="cedula" type="text" class="form-control" id="cedula" maxlength="8" value="<?php if(isset($datos["cedula"])){ echo trim($datos["cedula"]); } ?>">
                                                            <input type="hidden" name="id_solicitante" id="id_solicitante" value="<?php if(isset($datos["id_solicitante"])){ echo $datos["id_solicitante"]; } ?>">
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
                                                            <input type="text" name="tlf_movil" id="tlf_movil" maxlength="11" class="form-control" value="<?php if(isset($datos["tlf_movil"])){ echo trim($datos["tlf_movil"]); } ?>">
                                                        </div>
                                                    </div>
                                                     <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">work</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Ocupacion  
                                                            </label>
                                                            <input type="text" name="ocupacion" id="ocupacion" maxlength="45" class="form-control" value="<?php if(isset($datos["ocupacion"])){ echo trim($datos["ocupacion"]); } ?>">
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
                                                            <input type="text" name="nombre_apellido" id="nombre_apellido" maxlength="45" class="form-control" value="<?php if(isset($datos["nombre_apellido"])){ echo trim($datos["nombre_apellido"]); } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">call_end</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Telefono Fijo  
                                                            </label>
                                                            <input type="text" name="tlf_fijo" id="tlf_fijo" maxlength="11" class="form-control" value="<?php if(isset($datos["tlf_fijo"])){ echo trim($datos["tlf_fijo"]); } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">monetization_on</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Ingresos Bs.
                                                            </label>
                                                            <input type="text" name="ingreso" id="ingreso" maxlength="9" class="form-control" value="<?php if(isset($datos["ingreso"])){ echo trim($datos["ingreso"]); } ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">event_note</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="<?php if(isset($datos["fecha_nacimiento"])){ echo trim($datos["fecha_nacimiento"]); } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">accessibility_new</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Estado Civil</label>
                                                            <select name="estado_civil" id="estado_civil" class="form-control">
                                                                <option value="<?php if(isset($datos["estado_civil"])){ echo trim($datos["estado_civil"]); } ?>" <?php if(isset($datos["estado_civil"])){ echo 'selected=""'; echo 'disable=""'; } ?> > <?php if(isset($datos["estado_civil"])){ echo trim($datos["estado_civil"]); } ?></option>
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
                                                            <select name="parroquia" id="parroquia" class="form-control">
                                                                <option value="<?php if(isset($datos["parroquia"])){ echo trim($datos["parroquia"]); } ?>" <?php if(isset($datos["parroquia"])){ echo 'selected=""'; echo 'disable=""'; } ?> > <?php if(isset($datos["parroquia"])){ echo trim($datos["parroquia"]); } ?></option>
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
                                                            <input type="text" name="direccion" id="direccion" maxlength="100" class="form-control" value="<?php if(isset($datos["direccion"])){ echo trim($datos["direccion"]); } ?>">
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
                                                            <input type="text" name="cedula_b" id="cedula_b" maxlength="8" class="form-control" value="<?php if(isset($datos["cedula_b"])){ echo trim($datos["cedula_b"]); } ?>">
                                                            <input type="hidden" name="id_beneficiario" id="id_beneficiario" value="<?php if(isset($datos["id_beneficiario"])){ echo trim($datos["id_beneficiario"]); } ?>">
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
                                                            <input type="text" name="nombre_apellido_b" id="nombre_apellido_b" maxlength="45" class="form-control" value="<?php if(isset($datos["nombre_apellido_b"])){ echo trim($datos["nombre_apellido_b"]); } ?>">
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">event_note</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <input type="date" name="fecha_nacimiento_b" id="fecha_nacimiento_b" class="form-control" value="<?php if(isset($datos["fecha_nacimiento_b"])){ echo trim($datos["fecha_nacimiento_b"]); } ?>">
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
                                                            <select name="semana_embarazo" id="semana_embarazo" class="form-control">
                                                                <option value="" selected=""></option> 
                                                                <?php
                                                                    for ($i=0; $i <= 42; $i++) { 
                                                                        echo '<option value="'.$i.'">'.$i."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>                                                           
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">local_hospital</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Tipo de Solicitud
                                                                <small>(required)</small>
                                                            </label>
                                                            <select name="id_tipo_solicitud" id="id_tipo_solicitud"  data-live-search="true" class="form-control" >
                                                                <option disabled="" selected=""></option>
                                                                <?php
                                                                    //Listamos todo los datos para mostrarlo en el DATA TABLE
                                                                    $resp=$gestorSolicitud->seleccionarGS();
                                                           
                                                                    foreach ($resp as $row => $item) {
                                                                        echo '<option value="'.$item["id_tipo_solicitud"].'">'.$item["solicitud"].'-'.$item["descripcion"].'</option>';
                                                                    }//fin del foreach
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                                <div class="col-sm-12">
                                                    <div><h4 class="info-text"><u>Area Medica Asistencial</u></h4></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">pets</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Diagnostico</label>
                                                            <input type="text" name="diagnostico" id="diagnostico" maxlength="45" class="form-control">
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
                                                            <input type="text" name="motivo_solicitud" id="motivo_solicitud" maxlength="45" class="form-control">
                                                        </div>
                                                    </div>
                                                    >                                                          
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">local_offer</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Recursos Disponible</label>
                                                            <input type="text" name="recursos_disponibles" id="recursos_disponibles" maxlength="9" class="form-control">
                                                        </div>
                                                    </div>                                                           
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">local_offer</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Observacion</label>
                                                            <input type="text" name="observacion_am" id="observacion_am" maxlength="60" class="form-control">
                                                        </div>
                                                    </div>                                                            
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">pets</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Monto Aprobado</label>
                                                            <input type="text" name="monto_aprobado" id="monto_aprobado" maxlength="9" class="form-control">
                                                        </div>
                                                    </div>                                                           
                                                </div>                                              
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div><h4 class="info-text"><u>Area fisica ambiental</u></h4></div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">account_balance</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Tipo de Vivienda</label>
                                                            <select name="tipo_vivienda" id="tipo_vivienda" class="form-control">
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
                                                            <select name="tenencia" id="tenencia" class="form-control">
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
                                                            <select name="construccion" id="construccion" class="form-control">
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
                                                            <select name="tipo_piso" id="tipo_piso" class="form-control">
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