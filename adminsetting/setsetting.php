<?php
include_once 'phpClass/sql.php';
/**
* InterFace to store Site Details
*/
interface siteDetail{
	public function getTitle();
	public function getHost();
}

/**
* SiteData: Store Site Data
*/
class SiteData implements siteDetail 
{
	private $title;
	private $host;
	
	public function __construct($list)
	{
		$this->title=$list['sitename'];
		$this->host=$list['site url'];

		define('site title', $this->title);
		define('site url', $this->host);

	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getHost()
	{
		return $this->host;
	}
}

$ret=$db->GetData("`metaname`,`metadata`","site_meta","userid=0");
$list=array();
foreach ($ret as $key => $row) {
	# code...
	$list[$row['metaname']]=$row['metadata'];
}
$site=new SiteData($list);
?>
