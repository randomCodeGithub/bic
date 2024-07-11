<?php if (!defined('ABSPATH')) exit;
/**
 * This file contains code related to WordPress blocks.
 * Add your custom blocks inside "acf/init" hook.
 * 
 * @package pandago3-child
 */

/**
 * Add your custom blocks here using PDG::add_block() function.
 */
add_action('acf/init', function () {
    PDG::add_block('Hero', true);
    PDG::add_block('Statistics', true);
    PDG::add_block('Sectors', true, true, false, true);
    PDG::add_block('Services', true);
    PDG::add_block('References', true);
    PDG::add_block('Slider', true, true, false, true);
    PDG::add_block('Contacts', true, false, false, true);
    PDG::add_block('Contact form', true, true);
    PDG::add_block('Posts', true);
    PDG::add_block('Text and image', true);
});
