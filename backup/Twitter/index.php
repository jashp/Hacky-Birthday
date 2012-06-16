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
         <header data-role="header" id="masthead">
            <h1>Web Designer Feed</h1>
         </header>
         <div data-role="content">
            <ul data-role="listview" data-theme="c" data-dividertheme="a">
               <li data-role="list-divider">Publications</li>
               <li>
                  <img src="images/webdesignermag.png" alt="Web Designer Mag">
                  <h3><a href="feed.php?twitterUser=webdesignermag">Web Designer Mag</a></h3>
                  <p>Defining the internet through beautiful design</p>
               </li>
               <li data-role="list-divider">Events</li>
               <li>
                  <img src="images/fowd.png" alt="FOWD">
                  <h3><a href="feed.php?twitterUser=FOWD">Future of Web Design</a></h3>
                  <p>It&rsquo;s in your hands</p>
               </li>
               <li>
                  <img src="images/aneventapart.png" alt="An Event Apart">
                  <h3><a href="feed.php?twitterUser=aneventapart">An Event Apart</a></h3>
                  <p>The design conference for people who make web sites</p>
               </li>
               <li data-role="list-divider">Jobs</li>
               <li>
                  <img src="images/authenticjobs.png" alt="Authentic Jobs">
                  <h3><a href="feed.php?twitterUser=authenticjobs">Authentic Jobs</a></h3>
                  <p>Full-time and freelance job opportunities for web, design, and creative professionals</p>
               </li>
               <li>
                  <img src="images/37jobs.png" alt="37Signals Job Board">
                  <h3><a href="feed.php?twitterUser=37jobs">37Signals Job Board</a></h3>
                  <p>Tech Jobs: Design, Programming, Rails, Executive, and more.</p>
               </li>
            </ul>
         </div>
         <footer data-role="footer">
            <h4><a href="http://www.studiomohu.com" rel="external">Developed by Mohu&trade;</a></h4>
         </footer>
      </div>
   </body>
</html>