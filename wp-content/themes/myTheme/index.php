


<?php
	/*
	header.php 头文件
	1. 包含所有在<body>之前的代码，包含<body>
	2. 在</head>标签之前，添加<?php wp_head();?>的标签来代表头部
	3. 在<body>标签之后，添加<?php body_class();?>的标签来代表身体所需要的所有class
	footer.php 脚文件
	1. 包含所有在</body>之后的代码，包含</body>
	2. 在</body>之前，添加<?php wp_footer(); ?>的标签来代表脚部
	透过
	1. get_header(); 来包含头文件
	2. get_footer(); 来包含脚文件
	wordpress 如何引入 js 和 style?
	1. wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer ); 来引入 Javascript
	2. wp_enqueue_style( $handle, $src, $deps, $ver, $media );		来引入 CSS style sheet


	wp_query: https://developer.wordpress.org/reference/classes/wp_query/
	所有模板的標籤: https://codex.wordpress.org/Template_Tags
	*/
	get_header();
?>
<div class="header_img" id="aside2">
	
    <div class="topnav">
    	<div class="container_12">
        
		<div class="logo"><a href="index.html"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="ENVISION" width="157" height="36" border="0" /></a></div>

<!-- topmenu -->            
        <div class="menu-header">
        
	        <ul class="topmenu">
				<li class="parent first current-menu-item"><a href="#"><span>Sliders</span></a>
                	<ul class="sub-menu">
                        <li class="first"><a href="index.html"><span>Main slider</span></a></li>
                        <li><a href="index-slider-images.html"><span>Nivo slider</span></a></li>
                        <li><a href="index-slider-text.html"><span>Text / Video slider</span></a></li>                        
                    </ul>
                </li>
              	<li class="parent"><a href="#"><span>Pages</span></a>
                    <ul class="sub-menu">
                        <li class="first"><a href="page-sidebar-r.html"><span>Pages with Sidebar</span></a></li>
                        <li class="parent"><a href="#"><span>Portfolio pages</span></a>
                        	<ul class="sub-menu">
                            	<li class="first"><a href="portfolio.html"><span>1 column with Sidebar</span></a></li>
                            	<li><a href="portfolio-2cols.html"><span>2 columns with Sidebar</span></a></li>
                                <li><a href="portfolio-3cols.html"><span>3 columns Full Width</span></a></li>
                                <li class="last"><a href="portfolio-4cols.html"><span>4 columns Full Width</span></a></li>
                             </ul>
                        </li>
                        <li class="last"><a href="page-pricing.html"><span>Pricing page</span></a></li>
                    </ul>
              </li>
              <li class="parent"><a href="#"><span>Styles</span></a>
              		<ul class="sub-menu">
                        <li class="first"><a href="styles-columns.html"><span>Column Shortcodes</span></a></li>
                        <li><a href="styles-typography.html"><span>Typography</span></a></li>
						<li class="last"><a href="styles-shortcodes.html"><span>HTML Shortcodes</span></a></li>                        
                    </ul>
              </li>
              <li class="parent"><a href="#"><span>Portfolio</span></a>
					<ul class="sub-menu">
                        <li class="first parent"><a href="#"><span>With sidebar</span></a>
                        	<ul class="sub-menu">
                            	<li class="first"><a href="portfolio.html"><span>1 column</span></a></li>
                            	<li class="last"><a href="portfolio-2cols.html"><span>2 columns</span></a></li>
                             </ul>
                        </li>
                        <li class="parent last"><a href="#"><span>Full width</span></a>	
                        	<ul class="sub-menu">
                                <li><a href="portfolio-3cols.html"><span>3 columns</span></a></li>
                                <li class="last"><a href="portfolio-4cols.html"><span>4 columns</span></a></li>
                             </ul>
						</li>										
                    </ul>
              </li>
              <li><a href="blog.html"><span>Blog</span></a></li>
              <li class="last"><a href="contacts.html"><span>Contact</span></a></li>
       	  </ul>
        </div>
<!--/ topmenu -->        
	</div>            
    </div>
<!--/ header -->

<!-- slider -->        

    <div class="container_12">
        <div class="slider">
        	
            	<div id="header_images">
					<img src="<?php bloginfo('template_url'); ?>/images/slider1_image_1.jpg" class="header_image" color="#17191e" alt="" link="#link1" />
                    <img src="<?php bloginfo('template_url'); ?>/images/slider1_image_2.jpg" class="header_image" color="#054065" alt="" link="#link2" />
                    <img src="<?php bloginfo('template_url'); ?>/images/slider1_image_3.jpg" class="header_image" color="#3f0731" alt="" link="#link3" />
				</div>
                <div class="header_controls">            
                <a href="#" id="header_controls_left">Previous</a>
                <a href="#" id="header_controls_right">Next</a>                </div>
                <div id="overlay_bg"></div>
        </div>
    </div>
   
<!--/ slider -->    
</div>


<div class="welcome_bar">
<!-- bar -->	
<div class="container_12 bar">
        <div class="bar-icon"><img src="<?php bloginfo('template_url'); ?>/images/icon_rss.png" width="80" height="80" alt="" /></div>
        <div class="bar-title">
            <h1>Welcome to <span>Envision</span>, the interactive agency!</h1>
            <div class="sub-text">We have a passion for pixel perfect design. But don’t take our word for it, look for yourself:</div>
        </div>
        <div class="bar-right">
        	<a href="javascript:void(0);" class="button_link large_button"><span>View Portfolio</span></a></div>
        <div class="clear"></div>
    </div>
<!--/ bar -->   
</div>



<!-- middle body --> 
<div class="middle homepage">
	<div class="container_12">
    
<?php
/******** Getting variables from the Databases *******************************/ 
$args = array(
    /*
    'post_type'=>'page',    // 查找出所有頁面為page的
    'page_id'=>2         // 查詢id 為 2 的page
    */
    'post_type'=>'page'
);

$wp_query = new WP_Query($args);

if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {       // If this is the last post, the loop will start over
        $wp_query->the_post();
        //這裡開始輸入你想要的模板
        // echo "<ul>";
        // echo "<li>". get_the_title() ."</li>"; 
        // echo "</ul>";
?>
<div class="col col_1_3">
    <div class="inner">
        <h2>Title: <?php the_title(); ?></h2>
        <p style="color:grey; font-style: italic;">Author: <?php the_author();?></p>
        <p><?php the_content('More...', get_the_title()); ?></p>
   	  	<!--<h2>Award winning design &amp; coding</h2>
        <p>These three icons below the text paragraphs<img src="<?php bloginfo('template_url'); ?>/images/temp_img_2.png" alt="" width="93" height="76" class="alignright" /> are custom created for the Envision theme &amp; the  included PSD files contain all the layers needed to edit them. </p>-->
        <a href="<?php the_permalink(); ?>" class="link-more">more details</a>      
    </div>
</div>

<?php
    }
} else {
    // 如果沒有找到任何結果，就輸出以下的結果
    echo "No posts at all!";
}

/* Restore original Post Data */
wp_reset_postdata();
/***************************************/ 
?>

    <div class="divider_space"></div>
    
    <div class="box box_white">
    
        <div class="col col_2_3">
            <div class="inner">
                <div class="quoteBox-big">
                    <div class="quote-title"><strong>WHAT OTHERS SAY ABOUT US:</strong></div>
                    <div class="quote-text">Over the last eighteen months our sales have increased three-fold since the launch of our new web site. We have to say it has made us delighted we chose Envision.</div>
                    <div class="quote-author"><span class="violet">George Mansion,</span>  founder Silicon App Inc</div>    
                </div>
            </div>
        </div>
        
<div class="col col_1_3">
        	<div class="inner">
            	
                <!-- newsletter -->
                <div class="newsletterBox">
                	<div class="bg">
                        <div class="ribbon"></div>
                        <h2>Stay in touch with us!</h2>
                        <div class="before-text">Sign up for our weekly newsletter to receive updates, news, and interesting tidbits.</div>
                        <form action="" method="post">
                            <input type="text" value="" name="" class="inputField" />
                            <input type="submit" value="" name="" class="btn-submit" />
                            <div class="clear"></div>
                        </form>
                	</div>
                </div>
                <!--/ newsletter -->
            </div>
      </div>
        
    <div class="clear"></div>
    </div>
    
    <div class="divider_space"></div>
    
    <div class="col col_1_2">
        <div class="inner">
        	
            <!-- tab box -->
            <div class="tabBox">
				<div class="tabTitle"><h3>Services:</h3></div>
                <ul class="tabs">
                      <li><a href="#tabcontent1"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon_1.png" width="51" height="42" alt="" /></a></li>
                      <li><a href="#tabcontent2"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon_2.png" width="51" height="42" alt="" /></a></li>
                      <li><a href="#tabcontent3"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon_3.png" width="51" height="42" alt="" /></a></li>
                </ul>

                <div class="tabcontent">
                	<div class="inner">
                	<img src="<?php bloginfo('template_url'); ?>/images/temp/temp_img_1.jpg" alt="" width="230" height="143" class="alignleft" />
                	<h3>Creative webdesign</h3>
                    <p>The point of using Lorem Ipsum is that it has a near “more-or-less” normal and distribution of letters.</p>
                    
                    <div class="clear"></div>
                    </div>
              	</div>
                <div class="tabcontent">
                	<div class="inner">
                	<img src="<?php bloginfo('template_url'); ?>/images/temp/temp_img_2.jpg" alt="" width="230" height="143" class="alignleft" />
                	<h3>Apps for Mobile phones</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod . <a href="#tabcontent1">Jump to first tab.</a></p>
                    <div class="clear"></div>
                    </div>
				</div>
                <div class="tabcontent">
                	<div class="inner">
                	<img src="<?php bloginfo('template_url'); ?>/images/temp/temp_img_3.jpg" alt="" width="230" height="143" class="alignright" />
                	<h3>Statistics</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    
                	<div class="clear"></div>
                    </div>
                </div>
            </div>
            <!--/ tab box -->
        </div>
    </div>
    
<div class="col col_1_2">
    	<div class="inner">
    		
            <!-- tab box -->
            <div class="tabBox">
				<div class="tabTitle"><h3>Solutions:</h3></div>
                <ul class="tabs">
                      <li><a href="#tabcontent1"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon_5.png" width="51" height="42" alt="" /></a></li>
                      <li><a href="#tabcontent2"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon_4.png" width="51" height="42" alt="" /></a></li>
                      <li><a href="#tabcontent3"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon_6.png" width="51" height="42" alt="" /></a></li>
                </ul>

                <div class="tabcontent">
                	<div class="inner">
                	<img src="<?php bloginfo('template_url'); ?>/images/temp/temp_img_3.jpg" alt="" width="230" height="143" class="alignleft" />
                	<h3>Apps for Mobile phones</h3>
                    <p>The point of using Lorem Ipsum is that it has a near “more-or-less” normal and distribution of letters.</p>
                    
                    <div class="clear"></div>
                    </div>
              	</div>
                <div class="tabcontent">
                	<div class="inner">
               	  	<h3>Everything for your need!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    <div class="clear"></div>
                    </div>
				</div>
                <div class="tabcontent">
                	<div class="inner">
                	<img src="<?php bloginfo('template_url'); ?>/images/temp/temp_img_2.jpg" alt="" width="230" height="143" class="alignleft" />
                	<h3>Weather</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    
                	<div class="clear"></div>
                    </div>
                </div>
            </div>
            <!--/ tab box -->
      </div>
	</div>
    
    <div class="clear"></div>
  </div>	
</div>
<!--/ middle body -->   
    
<div class="footer">
<div class="footer_bg">
	<div class="container_12">
    
    	<div class="col_1_4 col">
	        <div class="inner">
            	<h3>What we do</h3>
            	<ul>
                	<li><a href="#">Interactive Technology</a></li>
                    <li><a href="#">Online Marketing</a></li>
                    <li><a href="#">Website Design</a></li>
                    <li><a href="#">Strategy &amp; Analysis</a></li>
                    <li><a href="#">E-Learning</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col_1_4 col">
          <div class="inner">
            	<h3>Who We Are</h3>
            	<ul>
                	<li><a href="#">About us</a></li>
                    <li><a href="#">Our History</a></li>
                    <li><a href="#">Vision that drives us</a></li>
                    <li><a href="#">The Mission</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col_1_4 col">
          <div class="inner">
            	<h3>Featured work</h3>
            	<ul>
                	<li><a href="#">Silicon App</a></li>
                    <li><a href="#">Art Gallery</a></li>
                    <li><a href="#">Bon Apetit </a></li>
                    <li><a href="#">Exquisite Works</a></li>
                    <li><a href="#">Clean Classy Corp</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col_1_4 col">
          <div class="inner">
            	<h3>From our Blog</h3>
            	<ul>
                	<li><a href="#">Just released WS 2.3</a></li>
                    <li><a href="#">Not going to support IE6...</a></li>
                    <li><a href="#">Great feedback from...</a></li>
                    <li><a href="#">Don’t ask when!</a></li>
                    <li><a href="#">Best tutorial on jQuery</a></li>
                </ul>
            </div>
        </div>
        
      <div class="divider_space"></div>
    	
        <div class="col_2_3 col">
	        <div class="inner">
            	<a href="#" class="link-twitter" title="Twitter">Twitter</a>
                <a href="#" class="link-fb" title="Facebook">Facebook</a>
                <a href="#" class="link-flickr" title="Flickr">Flickr</a>
                <a href="#" class="link-da" title="deviantART">deviantART</a>
                <a href="#" class="link-rss" title="RSS Feed">RSS Feed</a>            </div>
        </div>
        
        <div class="col_1_3 col">
	        <div class="inner">
            	<p class="copyright">&copy; 2013 <a href="http://sc.chinaz.com/" target="_blank">sc.chinaz.com</a>. Please don’t steal!</p>
          </div>
      </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
<?php

	get_footer();
?>