
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL; ?>/static/user_end/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/static/user_end/js/bootstrap-select.js"></script>	
    <script type="text/javascript">
		$('select').selectpicker();
		$(function(){
		  $('#tags input').on('focusout', function(){    
			var txt= this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g,''); // allowed characters list
			if(txt) $(this).before('<span class="tag">'+ txt +'</span>');
			this.value="";
			this.focus();
		  }).on('keyup',function( e ){
			// comma|enter (add more keyCodes delimited with | pipe)
			if(/(188|13)/.test(e.which)) $(this).focusout();
		  });		  
		  $('#tags').on('click','.tag',function(){
			 $(this).remove(); 
		  });
		});
	</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>

