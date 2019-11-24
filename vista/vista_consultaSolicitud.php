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
                            <a href="solicitud"><button class="btn btn-rose btn-round" id="btnagregar">
                                <i class="fa fa-plus-circle"></i> Crear Nueva Solicitud
                            </button></a>
                            <div class="box-tools pull-right">
                                <?php
                                    if (isset($_GET["p"])) { 
                                        $ID = $_GET["p"];
                                        echo $ID;
                                    }
                                ?> </div>
                        </div>                       
                        <div class="col-md-12" id="listadoregistros">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Tablas de Solicitudes Activas o Inactivas</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th><b>.CI.</b></th>
                                                    <th>&nbsp;<b>Solicitante</b></th>
                                                    <th><b>Beneficiario</b></th>                                                    
                                                    <th class="disabled-sorting text-right"><b>Opciones</b></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><b>.CI.</b></th>
                                                    <th><b>&nbsp;Solicitante</b></th>
                                                    <th><b>Beneficiario</b></th>
                                                    <th class="text-right">Opciones</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    //Listamos todo los datos para mostrarlo en el DATA TABLE
                                                    $resp=$solicitud->listarD();
                                                            
                                                    foreach ($resp as $row => $item) {
                                                        /*
                                                        if($item["condicion"]) { 
                                                            $icono = "check_circle";
                                                            $tipo = "success";
                                                        }else{
                                                            $icono = "remove_circle";
                                                            $tipo = "warning";
                                                        } */
                                                            $icono = "check_circle";
                                                            $tipo = "success";                                                             
                                                            echo '<tr>
                                                                    <td>'.$item["cedula"].'</td>
                                                                    <td><a href="index.php?do=solicitud&id_s='.$item["id_s"].'" class="btn btn-simple btn-warning btn-icon"><i class="material-icons">account_circle</i></a>'.$item["solicitante"].'</td>
                                                                    <td>'.$item["beneficiario"].'</td>
                                                                    <td class="text-right">
                                                                        <a href="index.php?do=solicitud&id_b='.$item["id_b"].'" class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i></a>
                                                                    </td>
                                                                </tr>';                                                         
                                                    }//fin del foreach                                        
                                                    
                                                 ?>
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