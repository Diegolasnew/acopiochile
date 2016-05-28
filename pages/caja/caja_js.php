<script src="<?php echo $dir  ?>/assets/js/jquery.colorbox.js"></script>
<script src="<?php echo $dir  ?>/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo $dir  ?>/assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo $dir  ?>/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script src="<?php echo $dir  ?>/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>
<script src="<?php echo $dir  ?>/assets/js/bootbox.js"></script>
<script src="<?php echo $dir  ?>/assets/js/jquery.easypiechart.js"></script>
<script src="<?php echo $dir  ?>/assets/js/ace/elements.scroller.js"></script>
<script src="<?php echo $dir  ?>/assets/js/chosen.jquery.js"></script>

<script src="<?php echo $dir  ?>/pages/caja/caja.js"></script>
<script src="<?php echo $dir  ?>/pages/caja/functions.js"></script>

<script src="<?php echo $dir  ?>/assets/js/ace/elements.fileinput.js"></script>

<?php global $aportes_cajas_json; ?>
<script type="text/javascript">
	var aportes_cajas_json = <?php echo json_encode($aportes_cajas_json) ?>;
</script>