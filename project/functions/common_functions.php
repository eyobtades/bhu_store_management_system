<?php

    //Send Message
    if (isset($_POST['send_message'])) {
        send_message();
    }

    function assets(){
        echo '
                <!-- Font Awesome Icons -->
                <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

                <!-- Theme style -->
                <link rel="stylesheet" href="../dist/css/adminlte.min.css">

                <!--Custom css-->
                <link rel="stylesheet" href="../dist/css/style.css">

                <!-- summernote -->
                <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">

                <!--Icon for Store Management System-->
                <link rel="icon/image" href="../images/bhu.png" type="image/icon">

                <!-- overlayScrollbars -->
                <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

                <!-- Google Font: Source Sans Pro -->
                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

                <!-- Ionicons -->
                  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

                <!-- SweetAlert2 -->
                <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
                
                <!-- Toastr -->
                <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
            ';

    }


    function login_assets(){
        echo '
                <!-- Font Awesome Icons -->
                <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

                <!-- Theme style -->
                <link rel="stylesheet" href="dist/css/adminlte.min.css">

                <!--Custom css-->
                <link rel="stylesheet" href="dist/css/style.css">

                <!--Icon for Store Management System-->
                <link rel="icon/image" href="../../images/bhu.png" type="image/icon">

                <!-- Google Font: Source Sans Pro -->
                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

            ';

    }
    function scriptPlugin(){
        echo '

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="../dist/js/demo.js"></script>

        <!-- Myscripts -->
        <script src="../dist/js/script.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="../dist/js/monitor.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="../plugins/raphael/raphael.min.js"></script>
        <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="../plugins/chart.js/Chart.min.js"></script>

        <!-- PAGE SCRIPTS -->
        <script src="../dist/js/pages/dashboard2.js"></script>

        <!-- DataTables -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <!-- Summernote -->
        <script src="../plugins/summernote/summernote-bs4.min.js"></script>

        <!-- jQuery Knob -->
        <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- Sparkline -->
        <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- page script -->

        <!-- FLOT CHARTS -->
        <script src="../plugins/flot/jquery.flot.js"></script>

        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="../plugins/flot-old/jquery.flot.resize.min.js"></script>

        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="../plugins/flot-old/jquery.flot.pie.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- Toastr -->
        <script src="../plugins/toastr/toastr.min.js"></script>

        <!-- FLOT CHARTS -->
        <script src="../plugins/flot/jquery.flot.js"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="../plugins/flot-old/jquery.flot.resize.min.js"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="../plugins/flot-old/jquery.flot.pie.min.js"></script>

        ';
    }



?>
