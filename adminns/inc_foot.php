<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');?>
    </div>
    <script src="<?= BASE_URL ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="<?= BASE_URL ?>assets/js/sb-admin-2.js"></script>
    <script>
        $(document).ready(function() {$('#dataTables-example').DataTable({responsive: true});});
    </script>
</body>
</html>