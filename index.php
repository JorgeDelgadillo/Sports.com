<!DOCTYPE html>
<html>
<head>
	<title>Jorge Sports</title>
</head>
<body>
	<?php 
		include("menu.php");
	 ?>
	<div class="feed">
		<section>
			<div id="rssOutput">
				<?php
					$xml=("https://news.google.com/news?cf=all&hl=es&pz=1&ned=es_mx&topic=s&output=rss");
					

					$xmlDoc = new DOMDocument();
					$xmlDoc->load($xml);

					//get elements from "<channel>"
					$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
					$channel_title = $channel->getElementsByTagName('title')
					->item(0)->childNodes->item(0)->nodeValue;
					$channel_link = $channel->getElementsByTagName('link')
					->item(0)->childNodes->item(0)->nodeValue;
					$channel_desc = $channel->getElementsByTagName('description')
					->item(0)->childNodes->item(0)->nodeValue;
/*
					echo("<p id=".'title-rss'."><a href='" . $channel_link
					  . "'>" . $channel_title . "</a>");
					echo("<br>");
					echo($channel_desc . "</p>");
*/					$_blank = "_blank";

					$x=$xmlDoc->getElementsByTagName('item');
					for ($i=0; $i<=7; $i++) {
					  $item_title=$x->item($i)->getElementsByTagName('title')
					  ->item(0)->childNodes->item(0)->nodeValue;
					  $item_link=$x->item($i)->getElementsByTagName('link')
					  ->item(0)->childNodes->item(0)->nodeValue;
					  $item_desc=$x->item($i)->getElementsByTagName('description')
					  ->item(0)->childNodes->item(0)->nodeValue;
					  echo ("<p><a target='".$_blank."' href='" . $item_link
					  . "'>" . $item_title . "</a>");
					  echo ("<br>");
					  echo ($item_desc . "</p>");
					}
				?>

			</div>
		</section>	
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<script>
	function showRSS(str) {
	  if (str.length==0) { 
	    document.getElementById("rssOutput").innerHTML="";
	    return;
	  }
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else {  // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (this.readyState==4 && this.status==200) {
	      document.getElementById("rssOutput").innerHTML=this.responseText;
	    }
	  }
	  xmlhttp.open("GET","getrss.php?q="+str,true);
	  xmlhttp.send();
	}
	</script>

</body>
</html>




