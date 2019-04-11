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
                    	<div class="box-header with-border" style="margin-top: -40px;">
                			<!-- Bonton para mostrar el formulario -->
			            	<button class="btn btn-rose btn-round" id="btnagregar" onclick="mostrarform(true)">
			              		<i class="fa fa-plus-circle"></i> Agregar Nueva Solicitudes
			            	</button>
			            	<div class="box-tools pull-right"></div>
			          	</div>                       
                        <div class="col-md-6 col-md-offset-3" id="formularioregistros">
                            <div class="card">
                                <form id="LoginValidation" method="post">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">contacts</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Nuevas Solicitudes a Asignar</h4>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Solicitudes
                                                <star>*</star>
                                            </label>
                                            <select name="solicitud" class="form-control" id="solicitud">
                                                <option disabled="" selected=""></option>
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
                                            <input type="hidden" name="id_tipo_solicitud" id="id_tipo_solicitud">
                                            <input class="form-control" name="descripcion" type="text" id="descripcion" required/>
                                        </div>
                                        <div class="category form-category">
                                            <star>*</star> Archivos Requeridos </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-rose btn-fill btn-wd">Register</button>
                                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                                <div>
                                	
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="listadoregistros">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">DataTables.net</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Date</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>                      
                    </div>
                </div>
            </div>

<?php require_once("footer.php") ?>