	
    <?php 
    include "Snoopy.class.php";
	$snoopy = new Snoopy;
	
//	$snoopy->fetchtext("http://www.php.net/");
//	print $snoopy->results;
	
//	$snoopy->fetchlinks("http://www.phpbuilder.com/");
//	print $snoopy->results;
	
//	$submit_url = "http://lnk.ispi.net/texis/scripts/msearch/netsearch.html";
	
//	$submit_vars["q"] = "amiga";
//	$submit_vars["submit"] = "Search!";
//	$submit_vars["searchhost"] = "Altavista";
		
//	$snoopy->submit($submit_url,$submit_vars);
//	print $snoopy->results;
	
//	$snoopy->maxframes=5;
//	$snoopy->fetch("http://www.ispi.net/");
//	echo "<PRE>\n";
//	echo htmlentities($snoopy->results[0]); 
//	echo htmlentities($snoopy->results[1]); 
//	echo htmlentities($snoopy->results[2]); 
//	echo "</PRE>\n";

//	$snoopy->fetchform("https://pbxcloud.tw.cnlink.net:1688");
//	print $snoopy->results;

//$snoopy->fetch("https://pbxcloud.tw.cnlink.net:1688/api/extapi.jsp?action=lst");
//	print $snoopy->results;

//$snoopy->submit("https://pbxcloud.tw.cnlink.net:1688/api/extapi.jsp?action=set&ext=65011&pwd=65016501");
//print $snoopy->results;

$ip = file_get_contents('https://api.ipify.org');
    echo "My public IP address is: " . $ip;



//$content = file_get_contents('https://pbxcloud.tw.cnlink.net:1688/api/extapi.jsp?action=lst');
 //   echo "The contents is: " . $content; 

//$url="https://pbxcloud.tw.cnlink.net:1688/api/extapi.jsp?action=lst";
//                $ch = curl_init();
//                        curl_setopt($ch, CURLOPT_URL, $url);
//                        curl_setopt($ch, CURLOPT_HEADER, 0);
//                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                        $html = curl_exec($ch);
                      
//echo $html;
//  curl_close($ch);

    ?>
