<?php

defined('SYSPATH') or die('No direct script access.');

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Controller_Welcome extends Controller_Template {

    /**
     * Main template to load
     * @var string
     */
    public $template = "index.tpl";

    /**
     * Contains session
     * @var null
     */
    private $session = NULL;

    /**
     * Every request goes over here
     * @throws View_Exception
     */
    public function action_index() {
        // Init the session
        $this->session = Session::instance();
        //$this->session->set('test', 'test');
        //var_dump($this->session->get('test'));

        $chatMate = ChatMate::init($this->request, $this->response);

        // Get view
        $view = View::factory(ChatMate::getTemplate());
        
        // Render the assigned stuff
        $this->template->content = $view->render();
    }

}
