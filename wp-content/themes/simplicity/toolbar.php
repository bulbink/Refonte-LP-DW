<?php global $qode_options_flat; 
$qode_animation="";
if (isset($_SESSION['qode_animation'])) $qode_animation = $_SESSION['qode_animation'];
$qode_footer="";
if (isset($_SESSION['qode_footer'])) $qode_footer = $_SESSION['qode_footer'];
$qode_boxed="";
$qode_smooth="";
if (isset($_SESSION['qode_smooth'])) $qode_smooth = $_SESSION['qode_smooth'];
?>
<div id="panel" style="margin-left: -318px;">
        
    <div id="panel-admin">
		<h4>Theme Skin</h4>

		<div class="panel-admin-box theme_skin">
			<span class="light"></span>
			<span class="dark active"></span>
		</div>
		<div class="panel-admin-box">
			<select id="tootlbar_ajax">
				<option value="">Choose a Transition(96down.com)</option>
				<option <?php if ($qode_animation == "no") { echo "selected='selected'"; } ?> value="no">No ajax, regular loading</option>
				<option <?php if ($qode_animation == "updown") { echo "selected='selected'"; } ?> value="updown">Page up/down</option>
				<option <?php if ($qode_animation == "fade") { echo "selected='selected'"; } ?> value="fade">Page fade in/fade out</option>
				<option <?php if ($qode_animation == "updown_fade") { echo "selected='selected'"; } ?> value="updown_fade">Page up/down (in) / fade (out)</option>
				<option <?php if ($qode_animation == "leftright") { echo "selected='selected'"; } ?> value="leftright">Page left/right</option>
			</select>
		</div>
		<div class="panel-admin-box">
			<select id="tootlbar_footer">
				<option value="">Choose a Footer Type</option>
				<option <?php if ($qode_footer == "1") { echo "selected='selected'"; } ?> value="1">One column</option>
				<option <?php if ($qode_footer == "2") { echo "selected='selected'"; } ?> value="2">Four columns</option>
		
			</select>
		</div>
		<div class="panel-admin-box layout">
			<select id="tootlbar_boxed">
				<option value="">Boxed Layout</option>
				<option <?php if ($qode_boxed == "wide") { echo "selected='selected'"; } ?> value="wide">No</option>
				<option <?php if ($qode_boxed == "boxed") { echo "selected='selected'"; } ?> value="boxed pattern_bgd">Yes</option>
		
			</select>
		</div>
		<div class="panel-admin-box">
			<select id="tootlbar_smooth">
				<option value="">Smooth Scroll</option>
				<option <?php if ($qode_smooth == "no") { echo "selected='selected'"; } ?> value="no">No</option>
				<option <?php if ($qode_smooth == "yes") { echo "selected='selected'"; } ?> value="yes">Yes</option>
		
			</select>
		</div>
    </div>
    
    <a class="open" href="#"></a>

</div>