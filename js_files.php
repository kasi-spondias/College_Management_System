<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/slider/slider.js"></script>
<script type="text/javascript" src="js/slider/slider_2.js"></script>
<script type="text/javascript">
		$(window).scroll(function () {
                    var height = $('body').height();
                    var scrollTop = $(window).scrollTop();
    
                      if(scrollTop>100){
                          $('#flat-mega-menu').addClass("scroll_menu_home");
                    } 
    else{
        $('#flat-mega-menu').removeClass("scroll_menu_home");
    }
   }); 
</script> 
<!-- Success Message Alert -->
<script type="text/javascript">
	window.setTimeout(function() {
	$(".alert").fadeTo(500, 0).slideUp(500, function(){
		$(this).remove(); 
	});
}, 3000);
</script>
<!-- Success Message Alert -->

<!-- Pagination -->
<script type="text/javascript">
$(document).ready(function() { 
   $('#pages').DataTable();
} );
</script>
<!-- End Pagination -->

<script type="text/javascript">
	function selectSubj(branch){ //alert(branch);
	if(branch!=""){
		loadBatch('Select Subject',branch);	
	}else{
		$("#subj_dropdown").html("<option value=''>Select Subject</option>");	
	}
}

function loadBatch(loadType,loadId){ 
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	$("#subj_loader").show();
    $("#subj_loader").fadeIn(400).html('Please wait... <img src="images/loading.gif" />');
	$.ajax({
		type: "POST",
		url: "load_subj.php",
		data: dataString,
		cache: false,
		success: function(result){
			$("#subj_loader").hide();
			$("#subj_dropdown").html("<option value=''> "+loadType+"</option>");  
			$("#subj_dropdown").append(result);  
		}
	});
}
</script>
