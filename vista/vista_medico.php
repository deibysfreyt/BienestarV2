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
                        <a class="navbar-brand" href="#"> Medicos </a>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3" id="formularioregistros">
                            <div class="card">
                                <form id="LoginValidation" method="post">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">description</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title"> <?php if (isset($medicos["id_especialidad"])) { echo 'Actualizar ';}else{ echo 'Registrar ';} ?>Medicos</h4>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Area de la Especialidad
                                                <star>*</star>
                                            </label>
                                            <select name="id_especialidad" id="id_especialidad"  data-live-search="true" class="form-control" >
                                                <option disabled="" selected=""></option>
                                                <?php
                                                    //Listamos todo los datos para mostrarlo en el DATA TABLE
                                                    $resp=$especialidad->seleccionarE();
                                                           
                                                    foreach ($resp as $row => $item) {
                                                        echo '<option value="'.$item["id_especialidad"].'">'.$item["nombre"].'</option>';
                                                    }//fin del foreach
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre y Apellido
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="nombre_apellido" type="text" id="nombre_apellido" value="<?php if(isset($medicos["nombre_apellido"])){ echo trim($medicos["nombre_apellido"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cedula
                                                <star>*</star>
                                            </label>
                                            <input type="hidden" name="id_medico" id="id_medico" value="<?php if(isset($medicos["id_medico"])){ echo $medicos["id_medico"]; } ?>">
                                            <input class="form-control" name="cedula" type="text" id="cedula" value="<?php if(isset($medicos["cedula"])){ echo trim($medicos["cedula"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cargo
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="cargo" type="text" id="cargo" value="<?php if(isset($medicos["cargo"])){ echo trim($medicos["cargo"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Teléfono
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="tlf" type="text" id="tlf" value="<?php if(isset($medicos["tlf"])){ echo trim($medicos["tlf"]); } ?>"/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado
                                                <star>*</star>
                                            </label>
                                            <select name="condicion" class="form-control" id="condicion">
                                                <option value="<?php if(isset($medicos["condicion"]) && $medicos["condicion"]==1){ echo $medicos["condicion"]; }else{ echo '1'; }  ?>" <?php if(isset($medicos["condicion"]) && $medicos["condicion"]==1){ echo 'selected=""'; }?> >
                                                    <?php if (isset($medicos["condicion"]) && $medicos["condicion"]==1){ echo 'Habilitado'; }else{ echo 'Habilitado'; } ?>
                                                </option>
                                                <option value="<?php if(isset($medicos["condicion"]) && $medicos["condicion"]==0){ echo $medicos["condicion"]; }else{ echo '0'; }  ?>"  <?php if(isset($medicos["condicion"]) && $medicos["condicion"]==0){ echo 'selected=""'; }?> >
                                                    <?php if (isset($medicos["condicion"]) && $medicos["condicion"]==0 ){ echo 'Deshabilitado'; }else{ echo 'Deshabilitado'; } ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="category form-category">
                                            <star>*</star> Archivos Requeridos </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-rose btn-fill btn-wd"> <?php if (isset($medicos["id_medico"])) { echo 'Actualizar';}else{ echo 'Registrar';} ?> </button>
                                            <a href="tablaMedico"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>

<?php require_once("footer.php") ?>