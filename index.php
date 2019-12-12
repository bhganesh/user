<?php
echo "User Page<br/>";
$curl_cmd = 'curl --connect-timeout 1';
$meta_host = '169.254.169.254';
$meta_data['ami-id'] = $ami_id = exec($curl_cmd." http://".$meta_host."/latest/meta-data/ami-id/");
$meta_data['instance-id'] = $instance_id = exec($curl_cmd." http://".$meta_host."/latest/meta-data/instance-id/");
$meta_data['availability-zone'] = $reg_az = exec($curl_cmd." http://".$meta_host."/latest/meta-data/placement/availability-zone/");
$meta_data['public-hostname'] = $public_hostname = exec($curl_cmd." http://".$meta_host."/latest/meta-data/public-hostname/");

/** find the availability zone **/
 function findAZ ($az) {
	// check if the value is null/empty
	if (empty($az) || !isset($az)) {
	return 'Error: unknown az';
	}
	$az = strtolower($az);
	return $az;		
 } //end function
 
 /** find the region **/
 function findRegion ($region) {
 	// check if the value is null/empty
	if (empty($region) || !isset($region)) {
	return 'Error: unknown region';
	}
	$region = substr($region, 0,-1);
	$region = strtoupper($region);
	return $region;
 } //end function
 
?>
<h2>AWS  - Region</h2>
<p><?php echo findRegion($meta_data['availability-zone']); ?></p><br>
<h3>Availability Zone</h3>
<p><?php echo findAZ($meta_data['availability-zone']); ?></p><br>
<h3>Information</h3>
<p>Server: <?php echo $server_software.'<br>Public IP: ';?><a href="http://<?php echo $server_ip; ?>"><?php echo $server_ip; ?></a></p>
<p>Client: <?php echo $client_agent.'<br>IP: '.$client_ip; ?></p>