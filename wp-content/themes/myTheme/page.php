<?php get_header(); ?>

<div class="header_img">
	
    <div class="topnav">
    <div class="container_12">
		<div class="logo"><a href="<?php bloginfo('template_url'); ?>/index.html"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="ENVISION" width="157" height="36" border="0" /></a></div>

<!-- topmenu -->            
        <div class="menu-header">
        
	        <ul class="topmenu">
				<li class="parent first"><a href="<?php bloginfo('template_url'); ?>/#"><span>Sliders</span></a>
                	<ul class="sub-menu">
                        <li class="first"><a href="<?php bloginfo('template_url'); ?>/index.html"><span>Main slider</span></a></li>
                        <li><a href="<?php bloginfo('template_url'); ?>/index-slider-images.html"><span>Nivo slider</span></a></li>
                        <li><a href="<?php bloginfo('template_url'); ?>/index-slider-text.html"><span>Text / Video slider</span></a></li>                        
                    </ul>
                </li>
              	<li class="parent current-menu-item"><a href="<?php bloginfo('template_url'); ?>/#"><span>Pages</span></a>
                    <ul class="sub-menu">
                        <li class="first"><a href="<?php bloginfo('template_url'); ?>/page-sidebar-r.html"><span>Pages with Sidebar</span></a></li>
                        <li class="parent"><a href="<?php bloginfo('template_url'); ?>/#"><span>Portfolio pages</span></a>
                        	<ul class="sub-menu">
                            	<li class="first"><a href="<?php bloginfo('template_url'); ?>/portfolio.html"><span>1 column with Sidebar</span></a></li>
                            	<li><a href="<?php bloginfo('template_url'); ?>/portfolio-2cols.html"><span>2 columns with Sidebar</span></a></li>
                                <li><a href="<?php bloginfo('template_url'); ?>/portfolio-3cols.html"><span>3 columns Full Width</span></a></li>
                                <li class="last"><a href="<?php bloginfo('template_url'); ?>/portfolio-4cols.html"><span>4 columns Full Width</span></a></li>
                             </ul>
                        </li>
                        <li class="last"><a href="<?php bloginfo('template_url'); ?>/page-pricing.html"><span>Pricing page</span></a></li>
                    </ul>
              </li>
              <li class="parent"><a href="<?php bloginfo('template_url'); ?>/#"><span>Styles</span></a>
              		<ul class="sub-menu">
                        <li class="first"><a href="<?php bloginfo('template_url'); ?>/styles-columns.html"><span>Column Shortcodes</span></a></li>
                        <li><a href="<?php bloginfo('template_url'); ?>/styles-typography.html"><span>Typography</span></a></li>
						<li class="last"><a href="<?php bloginfo('template_url'); ?>/styles-shortcodes.html"><span>HTML Shortcodes</span></a></li>                        
                    </ul>
              </li>
              <li class="parent"><a href="<?php bloginfo('template_url'); ?>/#"><span>Portfolio</span></a>
					<ul class="sub-menu">
                        <li class="first parent"><a href="<?php bloginfo('template_url'); ?>/#"><span>With sidebar</span></a>
                        	<ul class="sub-menu">
                            	<li class="first"><a href="<?php bloginfo('template_url'); ?>/portfolio.html"><span>1 column</span></a></li>
                            	<li class="last"><a href="<?php bloginfo('template_url'); ?>/portfolio-2cols.html"><span>2 columns</span></a></li>
                             </ul>
                        </li>
                        <li class="parent last"><a href="<?php bloginfo('template_url'); ?>/#"><span>Full width</span></a>	
                        	<ul class="sub-menu">
                                <li><a href="<?php bloginfo('template_url'); ?>/portfolio-3cols.html"><span>3 columns</span></a></li>
                                <li class="last"><a href="<?php bloginfo('template_url'); ?>/portfolio-4cols.html"><span>4 columns</span></a></li>
                             </ul>
						</li>										
                    </ul>
              </li>
              <li><a href="<?php bloginfo('template_url'); ?>/blog.html"><span>Blog</span></a></li>
              <li class="last"><a href="<?php bloginfo('template_url'); ?>/contacts.html"><span>Contact</span></a></li>
       	  </ul>
        </div>
<!--/ topmenu -->        
	</div>            
    </div>
<!--/ header -->
</div>

<div class="welcome_bar">
<!-- bar -->	
    <div class="container_12 bar">
        <div class="bar-icon"><img src="<?php bloginfo('template_url'); ?>/images/icon_pages.png" width="64" height="64" alt="" /></div>
        <div class="bar-title">
            <h1>Page with <span>Sidebar</span> on the right side</h1>
            <div class="breadcrumbs"><a href="<?php bloginfo('template_url'); ?>/index.html">Homepage</a> <a href="<?php bloginfo('template_url'); ?>/pages.html">Site Pages</a> Page with Sidebar on right</div>
        </div>
        <div class="bar-right">
        	
            <div id="search-2" class="widget-container widget_search">
                <form method="get" id="searchform" action="">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" name="s" id="s" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" />
                        <input type="submit" id="searchsubmit"  value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" />
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<!--/ bar -->   
</div>	
    
<!-- middle body -->    
<div class="middle" id="sidebar_right">
	<div class="container_12">    	
    
            <div class="wrapper">
                <div class="content">
                	<?php
                		if(have_posts()) {
                			while (have_posts()) {
                				the_post();
                	?>
                			<h1>	<?php the_title();?> </h1>
                	<?php
                				echo "<br/>";
                				the_content();
                			}
                		} else {
                			get_tempalte_part('content','none');
                		}
                	?>
                </div>
            </div>
            
            <div class="sidebar">
            	<div class="inner">
	            	
                    <!-- widget categories -->
                    <div class="widget-container  widget_categories">
                    	<h3>Categories:</h3>
                        <ul>
                        	<li><div><a href="<?php bloginfo('template_url'); ?>/page-sidebar-r.html">Page with Right Sidebar</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/page-sidebar-l.html">Page with Left Sidebar</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/page-fullwidth.html">Full width Page</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/portfolio-sidebar-col1.html">1 col Portfolio (sidebar)</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/portfolio-sidebar-col2.html">2 cols Portfolio (sidebar)</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/portfolio-full-cols3.html">3 column Portfolio (Fullwidth)</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/portfolio-full-cols4.html">4 column Portfolio</a></div></li>
                        </ul>
                    </div>
                    <!--/ widget categories -->
                    
                    <div class="widget-container  widget_categories">
                    	<h3>View more:</h3>
                        <ul>
                        	<li><div><a href="<?php bloginfo('template_url'); ?>/#">Typography</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/#">Shortcodes</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/#">Easy page examples</a></div></li>
                            <li><div><a href="<?php bloginfo('template_url'); ?>/#">Contact</a></div></li>
                        </ul>
                    </div>
                    
					<a href="<?php bloginfo('template_url'); ?>/contacts.html" class="button_link large_button"><span>Contact us for a quote</span></a>                    
                  
                    
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
                	<li><a href="<?php bloginfo('template_url'); ?>/#">Interactive Technology</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Online Marketing</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Website Design</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Strategy &amp; Analysis</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">E-Learning</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col_1_4 col">
	        <div class="inner">
            	<h3>Who We Are</h3>
            	<ul>
                	<li><a href="<?php bloginfo('template_url'); ?>/#">About us</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Our History</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Vision that drives us</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">The Mission</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col_1_4 col">
	        <div class="inner">
            	<h3>Featured work</h3>
            	<ul>
                	<li><a href="<?php bloginfo('template_url'); ?>/#">Silicon App</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Art Gallery</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Bon Apetit </a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Exquisite Works</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Clean Classy Corp</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col_1_4 col">
	        <div class="inner">
            	<h3>From our Blog</h3>
            	<ul>
                	<li><a href="<?php bloginfo('template_url'); ?>/#">Just released WS 2.3</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Not going to support IE6...</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Great feedback from...</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Don’t ask when!</a></li>
                    <li><a href="<?php bloginfo('template_url'); ?>/#">Best tutorial on jQuery</a></li>
                </ul>
            </div>
        </div>
        <div class="divider_space"></div>
    	
        <div class="col_2_3 col">
	        <div class="inner">
            	<a href="<?php bloginfo('template_url'); ?>/#" class="link-twitter" title="Twitter">Twitter</a>
                <a href="<?php bloginfo('template_url'); ?>/#" class="link-fb" title="Facebook">Facebook</a>
                <a href="<?php bloginfo('template_url'); ?>/#" class="link-flickr" title="Flickr">Flickr</a>
                <a href="<?php bloginfo('template_url'); ?>/#" class="link-da" title="deviantART">deviantART</a>
                <a href="<?php bloginfo('template_url'); ?>/#" class="link-rss" title="RSS Feed">RSS Feed</a>            </div>
        </div>
        
        <div class="col_1_3 col">
	        <div class="inner">
            	<p class="copyright">&copy; 2013 <a href="<?php bloginfo('template_url'); ?>/http://sc.chinaz.com/" target="_blank">sc.chinaz.com</a>. Please don’t steal!</p>
          </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>

<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>

<?php get_footer(); ?>