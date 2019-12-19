<?php
/**
 * @author    My Name <name@email.com>
 * @copyright 2015 (c) My Organizations
 * @license   http://opensource.org/licenses/MIT MIT
 */
/**
 * Adds locale data to the view, and adds a respond button to the discussion page.
 */
namespace Vanilla\Themes\Exercise1;

class Exercise1ThemeHooks extends \Gdn_Plugin {
    /**

     *
     * @param  Controller $sender The sending controller object.
     */
    public function base_render_before($sender) {
        // Bail out if we're in the dashboard
        if (inSection('Dashboard')) {
            return;

        }
    }


    /**
     * An example of naming
     *
     * @param  Controller $sender The sending controller object.
     * @param  array $args The arguments passed to the event handler.
     */
    public function controllerName_hookLocation_handler($sender, $args){

    }


    /**
     * Adds commentsCount and discussionsCount to Meta in discussion section
     *
     * @param  Controller $sender The sending controller object.
     * @param  array $args The arguments passed to the event handler.
     */
    public function discussionController_discussionInfo_handler($sender, $args) {
        echo '<span class="MItem comments-discussions-number">' . $args["Discussion"]->CountComments. ' comments  </span>';
        echo '<span class="MItem comments-discussions-number">' . $sender->Data["Category"]["CountDiscussions"] . ' discussions</span>';

    }



}
