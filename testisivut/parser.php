<?php

//http://www.mtv.fi/api/nitf/3163800
//http://www.mtv.fi/api/search/rss?q=a&pageSize=100
    
require 'simple_html_dom.php';
// Create DOM from URL or file
$html = file_get_html('feed.html');


// Find all links
foreach($html->find('link') as $element)
       echo $element->href . '<br>'; 
