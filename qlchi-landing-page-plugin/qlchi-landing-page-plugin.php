<?php
/*
Plugin Name: QLCHI Landing Page POC
Plugin URI:  https://quantumleapchicago.com
Description: Ravenswood Technology Group POC. append ?lp=1, ?lp=2, or ?lp=1234 to bluehat.qlchi.com in order to test.
Version:     0.1
Author:      Owen | Lv 32 Cyberwizard | Quantum Leap Chicago
Author URI:  https://quantumleapchicago.com
License:     Totally free, GPL compatible, copy and paste
License URI: https://quantumleapchicago.com

This is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.
 
This is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 
*/


// Plugin purpose: listen to "?lp=value" in the URL (QSP), and redirect to one of 2 pages based on result.
// Eventually, this will take options from Admin panel; for now we'll hardcode the functionality.

    // Nerdy bonus: Change out 'lp' key for 'utm_campaign' or other UTM4 / GA and you have plug-and-play with EXISTING campaigns (driving traffic to home page)

    // Nerdy bonus: We use integer / numeric values for lp values, not strings.
    // This allows us to design rudimentary arithmetic to determine landing page in the future;

        // for example user gets +1 engagement for every page visited or article read; 
        // we read "engagement" value to determine lp value;
        // if lp=0 then first visit; if lp=1 then repeat visitor. If lp > 5, targeted page. If LP > 10, probably a registered user, or maybe an interested party; show closing pages such as countdown timers to encourage immediate action.



// todo - add admin panel options

    // In order to add our options to the Admin page, we must hook our function here:

            /*
            add_action('admin_menu', 'test_plugin_setup_menu');
             
            function test_plugin_setup_menu(){
                add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
            }
             
            function test_init(){
                echo "<h1>Hello World!</h1>";
            }
            */

// for now we'll hard code the destination URLs;
    $option1 = 'https://quantumleapchicago.com';
    $option2 = 'https://contoso.com';


// housekeeping: define blank vars to ensure they are cleared (security)
    $destination = "";
    $do_redirect = "";


// Define redirect by writing "Location: " to header

    // Define function for modularity
    // wrapped in safety code to prevent unwarranted header injection
    // unique namespace to prevent overwrite

    function qlchi_redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }


// Get value from URL

    // use php global, will correctly handle any position (?lp= and or &lp=)
    $lp = $_GET['lp'];


// Check lp value and set appropriate destination, set flag for redirect

    // if lp = 1
    if ($lp == "1") {

        // set URL to option 1
        $destination = $option1;

        // set flag to do redirect
        $do_redirect = 1;

    // if lp = 2
    } elseif ($lp == "2") {

        // set URL 
        $destination = $option2;

        // set flag to do redirect
        $do_redirect = 1;


    // if LP not set or anything else, do nothing
    } else {
        // purposefully do nothing; continue main page if not defined.
    }


// If flag set, execute redirect
    if ($do_redirect == 1) {

        // redirect
        qlchi_redirect($destination);

    } else {
        // purposefully do nothing; continue main page if not defined.   
    }

        

?>