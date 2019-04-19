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
                        <a class="navbar-brand" href="#"> Tipos de Solicitudes </a>
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
                                        <h4 class="card-title"> <?php if (isset($respuesta[0])) { echo 'Actualizar ';}else{ echo 'Registrar ';} ?>Solicitudes a Asignar</h4>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Solicitudes
                                                <star>*</star>
                                            </label>
                                            <select name="solicitud" class="form-control" id="solicitud">
                                                <option value="<?php if(isset($respuesta[1])){ echo trim($respuesta[1]); }  ?>" selected=""> <?php if (isset($respuesta[1])){ echo trim($respuesta[1]); } ?> </option>
                                                <option value="Ayudas Medicas">Ayudas Medicas</option>
                                                <option value="Canastillas">Canastillas</option>
                                                <option value="Enseres y Ayudas Tecnicas">Enseres y Ayudas Técnicas</option>
                                                <option value="Otros">Otros</option>
                                            </select>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descripción
                                                <star>*</star>
                                            </label>
                                            <input type="hidden" name="id_tipo_solicitud" id="id_tipo_solicitud" value="<?php if(isset($respuesta[0])){ echo trim($respuesta[0]); } ?>">
                                            <input class="form-control" name="descripcion" type="text" id="descripcion" value="<?php if(isset($respuesta[2])){ echo trim($respuesta[2]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado
                                                <star>*</star>
                                            </label>
                                            <select name="condicion" class="form-control" id="condicion">
                                                <option value="<?php if(isset($respuesta[3]) && $respuesta[3]==1){ echo $respuesta[3]; }else{ echo '1'; }  ?>" <?php if(isset($respuesta[3]) && $respuesta[3]==1){ echo 'selected=""'; }?> >
                                                    <?php if (isset($respuesta[3]) && $respuesta[3]==1){ echo 'Habilitado'; }else{ echo 'Habilitado'; } ?>
                                                </option>
                                                <option value="<?php if(isset($respuesta[3]) && $respuesta[3]==0){ echo $respuesta[3]; }else{ echo '0'; }  ?>"  <?php if(isset($respuesta[3]) && $respuesta[3]==0){ echo 'selected=""'; }?> >
                                                    <?php if (isset($respuesta[3]) && $respuesta[3]==0 ){ echo 'Deshabilitado'; }else{ echo 'Deshabilitado'; } ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="category form-category">
                                            <star>*</star> Archivos Requeridos </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-rose btn-fill btn-wd"> <?php if (isset($respuesta[0])) { echo 'Actualizar';}else{ echo 'Registrar';} ?> </button>
                                            <a href="index.php?do=tablaSolicitud"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                                        </div>
                                    </div>
                                </form>
                                <div>
                                    
                                </div>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>

<?php require_once("footer.php") ?>