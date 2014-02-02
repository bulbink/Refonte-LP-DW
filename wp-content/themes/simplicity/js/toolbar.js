$j(window).load(function(){
	setTimeout(function(){
		$j("#panel").animate({marginLeft: "0px"});
		$j("a.open").addClass('opened');
		$j("#panel").addClass('opened-panel');
	},1000);
});


$j(document).ready(function() {
	
	$j('#panel select').sSelect();
	
	$j("#panel a.open").click(function(e){
		e.preventDefault();
		var margin_left = $j("#panel").css("margin-left");
		if (margin_left == "-235px"){
			$j("#panel").animate({marginLeft: "0px"});
			$j("#panel").addClass('opened-panel');
			$j(this).addClass('opened');
		}
		else{
			$j("#panel").animate({marginLeft: "-235px"});
			$j(this).removeClass('opened');
			$j("#panel").removeClass('opened-panel');
		}
		return false;
	});
	
	$j('a.open, span.light, span.dark').mouseleave(function(){
		$j(this).removeClass('button_pressed');
	}).mousedown(function(){
		$j(this).addClass('button_pressed');
  });
	
	$j(".panel-admin-box span").click(function(e){
		$j(".panel-admin-box span").removeClass('active');
		$j(this).addClass('active');
	});
	
	$j('#tootlbar_ajax').change(function(){
		if($j(this).val() != ""){
			
    	$j.post(root+'updatesession.php', {animation : $j(this).val()}, function(data){
					location.reload();
			});
		}
	});
	$j('#tootlbar_footer').change(function(){
		if($j(this).val() != ""){
			
    	$j.post(root+'updatesession.php', {footer : $j(this).val()}, function(data){
					location.reload();
			});
		}
	});
	
	$j('#tootlbar_boxed').change(function(){
		$j('body').removeClass('boxed');
		$j('body').removeClass('wide');
		$j('body').addClass($j(this).val());
	});
	$j('#tootlbar_smooth').change(function(){
		if($j(this).val() != ""){
			
    	$j.post(root+'updatesession.php', {smooth : $j(this).val()}, function(data){
					location.reload();
			});
			
			
		}
	});
	
	// add/remove light style
	$j('.theme_skin .light').on('click',function(){
		$j('body').removeClass('boxed').removeClass('pattern_bgd');
		$j('head').append('<link id="tootlbar_light_skin" rel="stylesheet" href="http://demo.qodeinteractive.com/simplicity/toolbar_light_skin.css" type="text/css" />');
		$j('#tootlbar_boxed').getSetSSValue('wide');
		var logo = $j('.logo img.normal').attr('src').replace("logo.png", "logo2.png");
		$j('.logo img.normal').attr('src',logo);
	});
	
	$j('.theme_skin .dark').on('click',function(){
		$j('head').find("link#tootlbar_light_skin").remove();
		var logo = $j('.logo img.normal').attr('src').replace("logo2.png", "logo.png");
		$j('.logo img.normal').attr('src',logo);
		$j('body').removeClass('boxed').removeClass('pattern_bgd');
	});
	
	$j('#tootlbar_boxed').change(function(){
		if($j("#tootlbar_boxed").getSetSSValue() == "boxed pattern_bgd"){
			$j('head').find("link#tootlbar_light_skin").remove();
			$j('.theme_skin .light').removeClass('active');
			$j('.theme_skin .dark').addClass('active');
			var logo = $j('.logo img.normal').attr('src').replace("logo2.png", "logo.png");
			$j('.logo img.normal').attr('src',logo);
		}else{
			$j('body').removeClass('boxed').removeClass('pattern_bgd');
		}
	});
	

}); 