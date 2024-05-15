<?php
require_once 'SmartyBC.class.php';

class Smarty extends SmartyBC {
    public function __construct() {
        parent::__construct();

        $this->setTemplateDir('templates/');
        $this->setCompileDir('templates_c/');
        $this->setConfigDir('configs/');
        $this->setCacheDir('cache/');

        $this->assign('base_url', 'http://localhost/user_registration/');
    }
}