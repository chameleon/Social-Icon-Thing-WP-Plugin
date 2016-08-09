<?php
/*
Plugin Name: Social Icons Thing
Description: Gives users the ability to add their social media links to the database and automatically show related clickable icons on the page in the Google Material Icon font.
Version: 1.0
Author: Joe
Created with this awesome plugin maker: http://wpsettingsapi.jeroensormani.com/
Author URI: 
License: GPL
*/
/*
Here is the Material Font social icon array:
*/

//FOR NOW-  IF x is not empty, build array with icon class
//if field 0 has a value, add this to user array:  facebbok-box, value
//if field 1 has a value, add this to user array: twitter-box, value
//etc, then
// html can loop through user aray to build <a tags with urls and icons


// switch (n) {
//     case label1:
//         code to be executed if n=label1;
//         break;
//     case label2:
//         code to be executed if n=label2;
//         break;
//     case label3:
//         code to be executed if n=label3;
//         break;
//     ...
//     default:
//         code to be executed if n is different from all labels;
// } 


$userSocialIcons = array(
    "facebook-box" => "facebook.com",
    "twitter-box" => "twitter.com",
    "github-box" => "github.com",
    "pinterest-box" => "pinterest.com",
    "stackoverflow" => "stackoverflow.com",
    "google-plus-box" => "google.com",
    "linkedin-box" => "linkedin.com"
);

/*
BUILD AN ARRAY HERE FOR THE HTML PAGE TO EASILY LOOP THROUGH - LESS HTML THAT WAY.
1) SO LOOP THROUGH THIS ARRAY:$options[],   $options = get_option( 'sit_settings' );
AND FOR EACH, 
2) grab the class name from Material Lookup Array and
3) add class name to user hash.

var_dump(parse_url($url, PHP_URL_HOST));

*/
$options = get_option( 'sit_settings' );
//print_r($options);


add_action( 'admin_menu', 'sit_add_admin_menu' );
add_action( 'admin_init', 'sit_settings_init' );


function sit_add_admin_menu(  ) { 

	add_menu_page( 'Social Icons Thing', 'Social Icons Thing', 'manage_options', 'social_icons_thing', 'sit_options_page' );

}


function sit_settings_init(  ) { 

	register_setting( 'pluginPage', 'sit_settings' );

	add_settings_section(
		'sit_pluginPage_section', 
		__( 'Configure your Social Icons- YOU MUST USE http:// prefix.', 'wordpress' ), 
		'sit_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'sit_text_field_0', 
		__( 'Facebook profile link:', 'wordpress' ), 
		'sit_text_field_0_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);

	add_settings_field( 
		'sit_text_field_1', 
		__( 'Twitter profile link:', 'wordpress' ), 
		'sit_text_field_1_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);

	add_settings_field( 
		'sit_text_field_2', 
		__( 'LinkedIn profile link:', 'wordpress' ), 
		'sit_text_field_2_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);

	add_settings_field( 
		'sit_text_field_3', 
		__( 'Google+ profile link:', 'wordpress' ), 
		'sit_text_field_3_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);

	add_settings_field( 
		'sit_text_field_4', 
		__( 'Pinterest profile link:', 'wordpress' ), 
		'sit_text_field_4_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);

	add_settings_field( 
		'sit_text_field_5', 
		__( 'Stack Overflow profile link:', 'wordpress' ), 
		'sit_text_field_5_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);

	add_settings_field( 
		'sit_text_field_6', 
		__( 'GitHUB profile link:', 'wordpress' ), 
		'sit_text_field_6_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);

	add_settings_field( 
		'sit_textarea_field_11', 
		__( 'Customize the tagline that appears in the header:', 'wordpress' ), 
		'sit_textarea_field_11_render', 
		'pluginPage', 
		'sit_pluginPage_section' 
	);


}


	//$url = "http://www.facespace.com";
	//var_dump(parse_url($url, PHP_URL_HOST));


function sit_text_field_0_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<input type='text' size='80' name='sit_settings[sit_text_field_0]' value='<?php 
		echo $options['sit_text_field_0']; ?>'>
	<?php

}


function sit_text_field_1_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<input type='text' size='80' name='sit_settings[sit_text_field_1]' value='<?php echo $options['sit_text_field_1']; ?>'>
	<?php

}


function sit_text_field_2_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<input type='text' size='80' name='sit_settings[sit_text_field_2]' value='<?php echo $options['sit_text_field_2']; ?>'>
	<?php

}


function sit_text_field_3_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<input type='text' size='80' name='sit_settings[sit_text_field_3]' value='<?php echo $options['sit_text_field_3']; ?>'>
	<?php

}


function sit_text_field_4_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<input type='text' size='80' name='sit_settings[sit_text_field_4]' value='<?php echo $options['sit_text_field_4']; ?>'>
	<?php

}


function sit_text_field_5_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<input type='text' size='80' name='sit_settings[sit_text_field_5]' value='<?php echo $options['sit_text_field_5']; ?>'>
	<?php

}


function sit_text_field_6_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<input type='text' size='80' name='sit_settings[sit_text_field_6]' value='<?php echo $options['sit_text_field_6']; ?>'>
	<?php

}

function sit_textarea_field_11_render(  ) { 

	$options = get_option( 'sit_settings' );
	?>
	<textarea cols='40' rows='5' name='sit_settings[sit_textarea_field_11]'> 
		<?php echo $options['sit_textarea_field_11']; ?>
 	</textarea>
	<?php

}


function sit_settings_section_callback(  ) { 

	echo __( '', 'wordpress' ); //first param shows up as a section Description

}


function sit_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Social Icons Thing</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>