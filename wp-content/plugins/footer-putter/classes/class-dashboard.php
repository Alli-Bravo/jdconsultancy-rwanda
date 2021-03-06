<?php
class Footer_Putter_Dashboard extends Footer_Putter_Admin {

	function init() {
		add_action('admin_menu', array($this, 'admin_menu'));
		add_action('load-widgets.php', array($this, 'add_tooltip_support'));
		add_action('admin_enqueue_scripts', array($this ,'register_tooltip_styles'));
		add_action('admin_enqueue_scripts', array($this ,'register_admin_styles'));
		add_filter('plugin_action_links',array($this, 'plugin_action_links'), 10, 2 );
	}

	function admin_menu() {
		$intro = sprintf('Intro (v%1$s)', $this->get_version());
		$this->screen_id = add_menu_page($this->get_name(), $this->get_name(), 'manage_options', 
		$this->get_slug(), array($this,'page_content'), $this->icon );
		add_submenu_page($this->get_slug(), $this->get_name(), $intro, 'manage_options', $this->get_slug(), array($this,'page_content') );
		add_action('admin_enqueue_scripts', array($this, 'register_admin_styles'));
 		add_action('admin_enqueue_scripts', array($this, 'register_tooltip_styles'));		
		add_action('load-'.$this->get_screen_id(), array($this, 'load_page'));
	}

	function page_content() {
 		$title = $this->admin_heading('Footer Putter v'. $this->get_version());				
		$this->print_admin_form($title, __CLASS__, $this->get_keys()); 
	} 

	function load_page() {
		$this->add_tooltip_support();
		$this->add_meta_box('intro', 'Introduction',  'intro_panel');
		$this->add_meta_box('details','Details', 'footer_panel');
		$this->add_meta_box('news', $this->get_name().' '.__('News'), 'news_panel', null, 'advanced');
		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin'));
	}

 	function footer_panel($post,$metabox) {
		print $this->tabbed_metabox($metabox['id'], array(
         'Widgets' => $this->widgets_panel(),
         'Instructions' => $this->instructions_panel(),
         'Footer Hook' =>  $this->hooks_panel(),
         'Useful Links' =>  $this->links_panel()
		));
   }

		
	function intro_panel($post,$metabox) {
     	$plugin = $this->get_name();
     	print <<< INTRO_PANEL
<p>{$plugin} allows you to put a footer to your site that adds credibility to your site, with BOTH visitors and search engines.</p>
<p>Google is looking for some indicators that the site is about a real business.</p>
<ol>
<li>The name of the business or site owner</li>
<li>A copyright notice that is up to date</li>
<li>A telephone number</li>
<li>A postal address</li>
<li>Links to Privacy Policy and Terms of Use pages</p>
</ol>

<p>Human visitors may pay some credence to this information but will likely be more motivated by trade marks, trust marks and service marks.</p>
INTRO_PANEL;
	}

	function widgets_panel() {
    	return <<< WIDGETS_PANEL
<p>The plugins define two widgets: 
<ol>
<li>a <b>Footer Copyright Widget</b> that places a line at the foot of your site containing as many of the items listed above that you want to disclose.</li>
<li>a <b>Trademarks Widget</b> that displays a line of trademarks that you have previously set up as "Links".
</ol></p>
<p>Typically you will drag both widgets into the Custom Footer Widget Area.</p>
<p>The widgets have settings that allow you to control both the footer content and the layout, and also whether or not the widgets appear at all on landing pages.</p>
WIDGETS_PANEL;
	}

	function instructions_panel() {
     	$plugin = $this->get_name();
     	$widgets_url = admin_url('widgets.php');
    	$credits_url = $this->plugin->get_link_url('credits');
    	$trademarks_url = $this->plugin->get_link_url('trademarks'); 
    	return <<< INSTRUCTIONS_PANEL
<h4>Create Standard Pages And Footer Menu</h4>
<ol>
<li>Create a <i>Privacy Policy</i> page with the slug/permalink <em>privacy</em>, choose a page template with no sidebar.</li>
<li>Create a <i>Terms of Use</i> page with the slug/permalink <em>terms</em>, choose a page template with no sidebar.</li>
<li>Create a <i>Contact</i> page with a contact form.</li>
<li>Create an <i>About</i> page, with information either about the site or about its owner.</li>
<li>If the site is selling an information product you may want to create a <i>Disclaimer</i> page, regarding any claims about the product performance.</li>
<li>Create a WordPress menu called <i>Footer Menu</i> and add the above pages to the footer menu.</li>
</ol>
<h4>Update Business Information</h4>
<ol>
<li>Go to <a href="{$credits_url}">Footer Credits</a> and update the Site Owner details, contact and legal information.</li>
<li>Optionally include contact details such as telephone and email. You may also want to add Geographical co-ordinates for your office location for the purposes of local search.</li>
</ol>
<h4>Create Trademark Links</h4>
<ol>
<li>Go to <a href="{$trademarks_url}"><i>Footer Trademarks</i></a> and follow the instructions:</li>
<li>Create a link category with a name such as <i>Trademarks</i></li>
<li>Add a link for each of your trademarks and put each in the <i>Trademarks</i> link category</li>
<li>For each link specify the link URL and the image URL</li>
</ol>
<h4>Set Up Footer Widgets</h4>
<ol>
<li>Go to <a href="{$widgets_url}"><i>Appearance > Widgets</i></a></li>
<li>Drag a <i>Footer Copyright Widget</i> and a <i>Footer Trademarks widget</i> into a suitable footer Widget Area</li>
<li>For the <i>Footer Trademarks</i> widget and choose your link category, e.g. <i>Trademarks</i>, and select a sort order</li>
<li>For the <i>Footer Copyright</i> widget, select the <i>Footer Menu</i> and choose what copyright and contact information you want to you display</li>
<li>Review the footer of the site. You can use the widget to change font sizes and colors using pre-defined classes such as <i>tiny</i>, <i>small</i>, <i>dark</i>, <i>light</i> or <i>white</i> or add your own custom classes</li> 
<li>You can also choose to suppress the widgets on special pages such as landing pages.</li> 
<li>If the footer is not in the right location you can use the <i>Footer Hook</i> feature described below to add a new widget area called <i>Credibility Footer</i> where you can locate the footer widgets.</li> 
</ol>
INSTRUCTIONS_PANEL;
	}
	
	function hooks_panel() {
    	$home_url = $this->plugin->get_home();
     	$plugin = $this->get_name();
    	return <<< HOOKS_PANEL
<p>The footer hook is only required if your theme does not already have a footer widget area into which you can drag the two widgets.</p>
<p>For some themes, the footer hook is left blank, for others use a WordPress hook such as <i>get_footer</i> or <i>wp_footer</i>, 
or use a theme-specific hook such as <i>twentytfourteen_credits</i>, <i>twentyfifteen_credits</i>, <i>genesis_footer</i>, <i>pagelines_leaf</i>, etc.</p>
<p>Check out the <a href="{$home_url}">{$plugin} page</a> for more information about the plugin.</p> 
HOOKS_PANEL;
	}
	
	function links_panel() {
		$home = $this->plugin->get_home();	
 		return <<< LINKS_PANEL
<ul>
<li><a rel="external" target="_blank" href="{$home}">Footer Putter Plugin Home</a></li>
<li><a rel="external" target="_blank" href="https://www.diywebmastery.com/footer-credits-compatible-themes-and-hooks/">Themes and Recommended Footer Hooks</a></li>
<li><a rel="external" target="_blank" href="https://www.diywebmastery.com/4098/how-to-add-a-different-footer-on-landing-pages/">How To Use A Different Footer On Landing Pages</a></li>
<li><a rel="external" target="_blank" href="https://www.diywebmastery.com/4109/using-html5-microdata-footer/">Using HTML5 Microdata for better SEO and Local Search</a></li>
</ul>
LINKS_PANEL;
	}
	
}
