</div>
</div>
</div>
<?php require "footer.php" ?>

</div> <!-- cierre de main-container -->

<!--[if !IE]> -->
<script type="text/javascript">
	window.jQuery || document.write("<script src='<?php echo $dir ?>/assets/js/jquery.js'>"+"<"+"/script>");

</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='.<?php echo $dir ?>/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $dir ?>/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
	$.fn.serializeObject = function()
	{
	    var o = {};
	    var a = this.serializeArray();
	    $.each(a, function() {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	    
	    return o;
	};
	<?php unset($_SESSION["usuario"]["hash"]); ?>
	var user = <?php echo json_encode($_SESSION["usuario"]); ?>;
	console.log(user);
	var primero = true;
</script>
<script src="<?php echo $dir ?>/assets/js/bootstrap.js"></script>
<script src="<?php echo $dir ?>/assets/js/jquery.gritter.js"></script>

<!-- page specific plugin scripts -->


<!-- ace scripts 

<script src="<?php echo $dir ?>/assets/js/ace/elements.colorpicker.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.fileinput.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.typeahead.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.wysiwyg.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.spinner.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.treeview.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.wizard.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.ajax-content.js"></script>


<script src="<?php echo $dir ?>/assets/js/ace/ace.touch-drag.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.searchbox-autocomplete.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.aside.js"></script>-->
<script src="<?php echo $dir ?>/assets/js/ace/elements.scroller.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.settings.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.settings-rtl.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.settings-skin.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/elements.typeahead.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.sidebar.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.submenu-hover.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.widget-box.js"></script>
<script src="<?php echo $dir ?>/assets/js/ace/ace.widget-on-reload.js"></script>

<script src="<?php echo $dir ?>/assets/js/myJs.js"></script>

<?php echo $include_js ?>

<script>

 

</script>
</body>

</html>