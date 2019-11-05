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
                                        <h4 class="card-title"> <?php if (isset($Ms["id_medicos"])) { echo 'Actualizar ';}else{ echo 'Registrar ';} ?>Medicos</h4>
                                        
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre y Apellido
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="nombre_apellido" type="text" id="nombre_apellido" value="<?php if(isset($Ms["nombre_apellido"])){ echo trim($Ms["nombre_apellido"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cedula
                                                <star>*</star>
                                            </label>
                                            <input type="hidden" name="id_medicos" id="id_medicos" value="<?php if(isset($Ms["id_medicos"])){ echo $Ms["id_medicos"]; } ?>">
                                            <input class="form-control" name="cedula" type="text" id="cedula" value="<?php if(isset($Ms["cedula"])){ echo trim($Ms["cedula"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cargo
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="cargo" type="text" id="cargo" value="<?php if(isset($Ms["cargo"])){ echo trim($Ms["cargo"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Especialidad
                                            </label>
                                            <input class="form-control" name="especialidad" type="text" id="especialidad" value="<?php if(isset($Ms["especialidad"])){ echo trim($Ms["especialidad"]); } ?>"/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Teléfono
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="tlf" type="text" id="tlf" value="<?php if(isset($Ms["tlf"])){ echo trim($Ms["tlf"]); } ?>"/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado
                                                <star>*</star>
                                            </label>
                                            <select name="condicion" class="form-control" id="condicion">
                                                <option value="<?php if(isset($Ms["condicion"]) && $Ms["condicion"]==1){ echo $Ms["condicion"]; }else{ echo '1'; }  ?>" <?php if(isset($Ms["condicion"]) && $Ms["condicion"]==1){ echo 'selected=""'; }?> >
                                                    <?php if (isset($Ms["condicion"]) && $Ms["condicion"]==1){ echo 'Habilitado'; }else{ echo 'Habilitado'; } ?>
                                                </option>
                                                <option value="<?php if(isset($Ms["condicion"]) && $Ms["condicion"]==0){ echo $Ms["condicion"]; }else{ echo '0'; }  ?>"  <?php if(isset($Ms["condicion"]) && $Ms["condicion"]==0){ echo 'selected=""'; }?> >
                                                    <?php if (isset($Ms["condicion"]) && $Ms["condicion"]==0 ){ echo 'Deshabilitado'; }else{ echo 'Deshabilitado'; } ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="category form-category">
                                            <star>*</star> Archivos Requeridos </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-rose btn-fill btn-wd"> <?php if (isset($Ms["id_medicos"])) { echo 'Actualizar';}else{ echo 'Registrar';} ?> </button>
                                            <a href="tablaMedicos"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>

<?php require_once("footer.php") ?>