
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        , made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="publica/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="publica/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="publica/js/bootstrap.min.js" type="text/javascript"></script>
<script src="publica/js/material.min.js" type="text/javascript"></script>
<script src="publica/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="publica/js/jquery.validate.min.js"></script>
<!--  Relieve de las estadistica en Inicio -->
<script src="publica/js/chartist.min.js"></script>
<!--  Formulario -->
<script src="publica/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="publica/js/bootstrap-notify.js"></script>
<!--  DataTables.net Plugin    -->
<script src="publica/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="publica/js/sweetalert2.js"></script>
<!-- Barra de desplazamiento Vertical -->
<script src="publica/js/material-dashboard.js"></script>
<!-- Formulario-->
<script src="publica/js/demo.js"></script>

<!-------------------------------  inicio.php ---------------------------   -->
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in publica/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>
<!-------------------------------  inicio.php ---------------------------   -->

<!-------------------------------  DataTables.php ---------------------------   -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
<!-----------------------------  DataTables.php ----------------------------->

<!-----------------------------  formulario.php ----------------------------->
<script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>
<!-----------------------------  formulario.php ----------------------------->

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>