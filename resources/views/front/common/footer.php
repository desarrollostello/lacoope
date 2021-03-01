		<!-- FOOTER -->
        <div class="row" id="footer">
				<div class="col-6 texto-footer d-flex justify-content-center align-items-center">LA COOPERATIVA DE PATAGONES Y VIEDMA</div>
				<div class="col-6 logo-footer  d-flex justify-content-center align-items-center">logo</div>
			</div>
		<!-- FIN FOOTER-->

		<!-- javascripts ---------->
		<script src="js/jquery-3.5.1.min.js" type="javascript"></script>
		
		<!--
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
		<!--<script src="js/jquery-3.5.1.slim.min.js" type="javascript"></script>-->
		<script>window.jQuery || document.write('<script src="js/jquery-3.5.1.slim.min.js"><\/script>')</script>

		<script src="js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
		
    	<script src="js/popper.min.js" type="javascript"></script>
		<script src="js/bootstrap.min.js" type="javascript"></script>
		<script src="js/bootstrap.bundle.min.js" type="javascript"></script>
		<script type="text/javascript">
        $("nav .nav-link").on("click", function(){
			
			var menues = $(".nav li"); 
			menues.removeClass("active");
			//alert(this);
           $(this).addClass("active");
        });
    </script>
	</body>
</html>