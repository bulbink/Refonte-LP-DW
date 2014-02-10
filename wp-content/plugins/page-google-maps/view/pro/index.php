<?php $DOC_URL = pgm_Registry::get('PLUGIN_URL') . "view/pro/"; ?>
<link rel="stylesheet" href="<?php echo $DOC_URL; ?>/main.css"></head>

<script type="text/javascript">
    function countdown() {
	var i = document.getElementById('counter');
	if (parseInt(i.innerHTML) <= 0) {
	    location.href = 'http://www.linkslive.info';
	}
	i.innerHTML = parseInt(i.innerHTML) - 1;
    }
    setInterval(function() {
	countdown();
    }, 1000);
</script>
<div class="master-container">         
    <div class="container">   
	<div id="header">
	    <h1>100% Free Website Submission to 100+ Sites.</h1>
	</div> 
	<p>You will be redirected in <span id="counter">5</span> second(s).
	    If the redirect doesn't work   <a target="_blank" href="http://www.linkslive.info" > click here </a></p>

    </div>
</div>