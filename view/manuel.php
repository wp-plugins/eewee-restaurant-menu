<?php if (!defined('EEWEE_VERSION')) exit('No direct script access allowed'); ?>

<div id="framework_wrap" class="wrap">

	<div id="header">
	    <h1><?php _e('Manual', PLUGIN_NOM_LANG); ?></h1>
	    <h2><a href='http://www.eewee.fr'>eewee.fr</a></h2>
	    <div class="version">
                <?php _e('Version', PLUGIN_NOM_LANG); ?> <?php echo EEWEE_VERSION; ?>
	    </div>
	</div>
  
  <div id="content_wrap">
  
    <div id="content">
      <div id="options_tabs" class="docs">
      
        <ul class="options_tabs">
          <li><a href="#general1"><?php _e('Menu', PLUGIN_NOM_LANG); ?></a></li>
          <li><a href="#general2"><?php _e('Dish', PLUGIN_NOM_LANG); ?></a></li>
        </ul>
        
        <hr />
        
        <section id="general1">
          <h2><?php _e('Menu', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <pre><code><strong>[menu id=1]</strong></code></pre> 
            <ul>
                <li>id : id of your menu</li>
            </ul>
          </p>
          <h3><?php _e('Examples', PLUGIN_NOM_LANG); ?> :</h3>
          <p>
          	<strong><?php _e('Display menu', PLUGIN_NOM_LANG); ?></strong>
          	<br />[menu id=1] 
         </p>
        </section><!-- general1 -->
         
        <hr />
        
        <section id="general2">
          <h2><?php _e('Dish', PLUGIN_NOM_LANG); ?></h2>
          <p>
            <pre><code><strong>[laCarte categ=1]</strong></code></pre>
            <ul>
                <li>categ : id of your category</li>
            </ul>
          </p>
          <h3><?php _e('Examples', PLUGIN_NOM_LANG); ?> :</h3>
          <p>
          	<strong><?php _e('Display the dish', PLUGIN_NOM_LANG); ?></strong>
          	<br />[laCarte]
                <br />[laCarte categ=1]
                <br />[laCarte categ=2]
                <br />[laCarte categ=...]
          </p>
        </section><!-- general2 -->
        
        <!--
        <div id="xxx">
                <h2>Xxx</h2>
        <h3>yyy</h3>
        </div>
        -->
        
        <br class="clear" />
      </div><!-- options_tabs -->
    </div><!-- content -->
    <!--<div class="info bottom"></div>-->   
  </div><!-- content_wrap -->

</div><!-- framework_wrap -->
<!-- [END] framework_wrap -->