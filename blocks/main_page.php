<html>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<head>
<title>Main page</title>
</head>


<body>
<p id="nav_name"> Головна сторінка<p>
<div id="content_writing_style">
<?php 
$charrus=mysql_query("set names 'cp1251'");
$query_get_all_news = mysql_query("SELECT * FROM news ORDER by datetime desc");
while ($row_news = mysql_fetch_array($query_get_all_news))
{
	echo '<div id="news_element">';
	echo '<font id="news_list_title">'; echo $row_news['title']; echo '</font>';
	


	echo '<div class="comment more">';
	echo $row_news['content'];
	echo '</div>';

	if ($row_news['picture'])
	{
	 	echo '<div id="news_list_picture">';
		echo '<img src="documents/news/'.$row_news['picture'].'"" id="news_list_picture">';
		echo '</div>';
	}
	if ($row_news['video'])
	{
	 	
		echo '<iframe title="YouTube video player" width="501" height="346" src="'.$row_news['video'].'" frameborder="0" allowfullscreen></iframe><br>';
		
	}
	echo '<font id="news_list_author">Автор : </font>';
	echo '<font id="news_list_author_write">'.$row_news['name'].' '.$row_news['surname'].'</font> ';
	echo '<font id="news_list_author"> ,  Дата публікації : </font>';
	echo '<font id="news_list_author_write">'.$row_news['datetime'].'</font>';
	echo '</div>';

}



?>
</div>
<SCRIPT>
$(document).ready(function() {
	var showChar = 700;
	var ellipsestext = "...";
	var moretext = "Читати дальше";
	var lesstext = "Згорнути";
	$('.more').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});
</SCRIPT>
</body>

</html>