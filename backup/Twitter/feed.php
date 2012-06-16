<?php
   $twitterUser = empty($_GET['twitterUser']) ? 'webdesignermag' : $_GET['twitterUser'];
   $json = file_get_contents("http://twitter.com/status/user_timeline/$twitterUser.json", true); //get the twitter JSON feed
   $result = json_decode($json); //json_decode content as array
   $feedName = $result[0]->user->name;
?>
<!DOCTYPE html> 
<html>
   <head>
      <meta charset="UTF-8">
      <title>Web Designer Feed</title>
      <link rel="apple-touch-icon-precomposed" href="images/dashboard-icon.png" />
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css" />
      <link rel="stylesheet" href="mobile.css">
      
      <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js"></script>
   </head>
   <body>
      <div data-role="page">
         <header data-role="header">
            <h1><?php echo($feedName) ?></h1>
         </header>
         <div>
            <ul class="tweets">
               <?php
               foreach ($result as $item) {
                  $text = htmlentities($item->text, ENT_QUOTES, 'utf-8');
                  $time = date('g:ia', strtotime($item->created_at));
                  $date = date('jS M', strtotime($item->created_at));
                  
                  $text = preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a href="$1">$1</a>', $text); //turn URLs into links
                  $text = preg_replace('/@(\w+)/', '<a href="http://twitter.com/$1">@$1</a>', $text); //turn twitter usernames into links
                  $text = preg_replace('/\s#(\w+)/', ' <a href="http://search.twitter.com/search?q=%23$1">#$1</a>', $text); //turn twitter #tags into links
                  
                  echo('<li class="ui-li">');
                  echo('<h3>'.$text.'</h3>');
                  echo('<p>Posted on '.$date.' at '.$time.'</p>');
                  echo('</li>');
               }
               ?>
            </ul>
         </div>
         <footer data-role="footer">
            
         </footer>
      </div>
   </body>
</html>