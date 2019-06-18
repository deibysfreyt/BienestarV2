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
                        <a class="navbar-brand" href="#"> Gestion de Solicitudes </a>
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
                                        <h4 class="card-title"> <?php if (isset($tipo_solicitud["id_tipo_solicitud"])) { echo 'Actualizar ';}else{ echo 'Registrar ';} ?>Solicitudes a Gestionar</h4>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Solicitudes
                                                <star>*</star>
                                            </label>
                                            <input class="form-control" name="solicitud" type="text" id="solicitud" value="<?php if(isset($tipo_solicitud["solicitud"])){ echo trim($tipo_solicitud["solicitud"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Descripción
                                                <star>*</star>
                                            </label>
                                            <input type="hidden" name="id_tipo_solicitud" id="id_tipo_solicitud" value="<?php if(isset($tipo_solicitud["id_tipo_solicitud"])){ echo $tipo_solicitud["id_tipo_solicitud"]; } ?>">
                                            <input class="form-control" name="descripcion" type="text" id="descripcion" value="<?php if(isset($tipo_solicitud["descripcion"])){ echo trim($tipo_solicitud["descripcion"]); } ?>" required/>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado
                                                <star>*</star>
                                            </label>
                                            <select name="condicion" class="form-control" id="condicion">
                                                <option value="<?php if(isset($tipo_solicitud["condicion"]) && $tipo_solicitud["condicion"]==1){ echo $tipo_solicitud["condicion"]; }else{ echo '1'; }  ?>" <?php if(isset($tipo_solicitud["condicion"]) && $tipo_solicitud["condicion"]==1){ echo 'selected=""'; }?> >
                                                    <?php if (isset($tipo_solicitud["condicion"]) && $tipo_solicitud["condicion"]==1){ echo 'Habilitado'; }else{ echo 'Habilitado'; } ?>
                                                </option>
                                                <option value="<?php if(isset($tipo_solicitud["condicion"]) && $tipo_solicitud["condicion"]==0){ echo $tipo_solicitud["condicion"]; }else{ echo '0'; }  ?>"  <?php if(isset($tipo_solicitud["condicion"]) && $tipo_solicitud["condicion"]==0){ echo 'selected=""'; }?> >
                                                    <?php if (isset($tipo_solicitud["condicion"]) && $tipo_solicitud["condicion"]==0 ){ echo 'Deshabilitado'; }else{ echo 'Deshabilitado'; } ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="category form-category">
                                            <star>*</star> Archivos Requeridos </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-rose btn-fill btn-wd"> <?php if (isset($tipo_solicitud["id_tipo_solicitud"])) { echo 'Actualizar';}else{ echo 'Registrar';} ?> </button>
                                            <a href="index.php?do=tablaSolicitud"><button class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>

<?php require_once("footer.php") ?>