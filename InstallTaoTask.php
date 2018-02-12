<?php

require_once "phing/Task.php";

class InstallTaoTask extends Task {
	

 /**
     * The message passed in the buildfile.
     */
    private $taoPath;

    /** @var TaoConfig */
    private $taoConfig;

    /**
     * The setter for the attribute "message"
     */
    public function setTaoPath($str) {
        $this->taoPath = $str;
    }

    /**
     * The init method: Do init steps.
     */
    public function init() {

        // nothing to do here
    }

    public function addTaoConfig(TaoConfig $config){
    	$this->taoConfig = $config;
    }

    /**
     * The main entry point method.
     */
    public function main() {
    	$this->install();
    }

    private function install()
    {
        $installPath = $this->taoPath. '/tao/install/init.php';
        if (!is_file($installPath)) {
    		throw new Exception("InstallTaoTask require a tao package install should be found ".$installPath);
    	}
    	require_once $installPath;

        $pathConfig = [
            'root_path' => $this->taoPath . '/',
            'install_path' => $this->taoPath . '/tao/install/',
        ];

        // Running the service.
        $container->offsetSet(tao_scripts_TaoInstall::CONTAINER_INDEX, $pathConfig);
        $options = ['argv' => $this->taoConfig->toArray()];

        $installer = new tao_scripts_TaoInstall($container, $options);
    }
}
