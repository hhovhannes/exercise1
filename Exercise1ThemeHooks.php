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

    //section where I override the configs

    public function setup() {
        $this->structure();
    }

    public function structure() {
        saveToConfig([
            'Vanilla.Categories.Layout' => 'table',
            'Vanilla.Discussions.Layout' => 'table',
        ]);

        return true;
    }


    /**
     * An example of naming
     *
     * @param  Controller $sender The sending controller object.
     * @param  array $args The arguments passed to the event handler.
     */
    public function controllerName_hookLocation_handler($sender, $args){

    }

    //the function which will handle commentCount and discussionCount, in a new themehook
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

    /**
     * Add link to drafts page to me module flyout menu.
     *
     * @param MeModule $sender The MeModule
     * @param array $args Potential arguments
     *
     * @return void
     */
    public function meModule_flyoutMenu_handler($sender, $args) {
        if (!val('Dropdown', $args, false)) {
            return;
        }
        /** @var DropdownModule $dropdown */
        $dropdown = $args['Dropdown'];
        $dropdown->addLink(t('My Drafts'), '/drafts', 'profile.drafts', '', [], ['listItemCssClasses' => ['link-drafts']]);
    }





}
