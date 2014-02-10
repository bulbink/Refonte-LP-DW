<?php
require_once(dirname(__FILE__) . '/../class/pgm-helper.php');
header('Content-Type: application/javascript');

$id = pgm_Helper::arr_get($_GET, 'id');
$url = pgm_Helper::arr_get($_GET, 'url');
if (!is_numeric($id)) {
    return;
}
?>
jQuery(function() {
    var mapView=new MapView({
	el: jQuery("#map<?php echo $id; ?>"),
	url:{load: <?php echo json_encode(base64_decode($url)); ?>}	
    });    
    mapView.loadModel(<?php echo json_encode($id); ?>);
});

