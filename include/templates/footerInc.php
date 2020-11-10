
	    <script src="<?php echo $js ?>backend.js"></script>



	     <script >
	    	 
 function detailsmodal(id) {
   var data = {"id" : id};


  jQuery.ajax({

		url:<?=BASEURL; ?>+'admin/model.php',
		method : "POST",
		data   : data, 

		success: function(data){
		jQuery('body').append(data);
		jQuery('#details-modal').modal('toggle');
		},

		error : function(){
		alert("Something went worng")
		},

  
  });

}



	    </script>


</body>
</html>