<?php
require_once('vendor/autoload.php');

use Helper\TombstoneHelper\TombstoneHelper;

class DeadCode {

    private $tombstoneHelper;

    public function __construct() {
        $this->tombstoneHelper = new TombstoneHelper;
    }

    public function called() {
        $this->tombstoneHelper->tombstone('11-Aug-19', 'Vijayan');
    }

    public function notCalled() {
        $this->tombstoneHelper->tombstone('10-Aug-19', 'Vijayan');
    }

}

function deadCodeTrigger() {

    $deadCodeInstance = new DeadCode();

    $deadCodeInstance->called();
}

deadCodeTrigger();