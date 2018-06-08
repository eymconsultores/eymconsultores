<?php
require 'simple_html_dom.php';
$url = 'http://emol.com/economia';
/*$html = file_get_html( $url );
$posts = $html->find('div[class=cont_378_e_2015]');
foreach( $posts as $post ){
	$link = $post->find('div div h1 a',1);
	$url = $link->attr['href'];
	$title = $link->innertext;
	//$img = $post->find('div[class=post-body] img',0)->attr['src'];
	echo "Este es el titulo: ",$title,".\n Este es el link:",$url;
}*/


$html = file_get_html($url);
$i=0;
foreach($html->find('a') as $link) {
    
    if (substr_count($link->href, 'http://') == 1) {
			echo "<a href='".$link->href."'>".$link->href."</a><br />";

		}elseif (substr_count($link->href, 'javascript') == 1 || substr_count($link->href, '#') == 1 || substr_count($link->href, '/') == 1) {
			
			echo "";
		}else{
			echo "<a href='http://www.emol.com/".$link->href."'>http://www.emol.com".$link->href."</a><br />";
		}

	/*<Script>
    	location = "<?php echo $link->href; ?>";
	</Script>*/
     
}