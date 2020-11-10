
	 <script src="<?php echo $js ?>backend.js"></script>
	 <script>
		  function get_child_options(){
	      var parentID = jQuery('#parent').val();
	      jQuery.ajax({
	       url :'/eCommerce/admin/parsers/child_categories.php',
	       type: 'POST',
	       data: {parentID : parentID},
	       success: function(data){
	       	jQuery('#child').html(data);

	       },
	        error: function(){alert("Someting went worng the child options.")}
	      });
		  } 	
	      jQuery('select[name="parent"]').change(get_child_options);
	 </script>
 </body>
</html>


 

