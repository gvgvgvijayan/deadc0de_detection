<?php

namespace Helper\TombstoneHelper;

use Scheb\Tombstone\{
    GraveyardProvider,
    Handler\StreamHandler,
    Tracing\TraceProvider
};

class TombstoneHelper {
    public $logPath = "/var/www/html/tombstone/logs/tombstones.log";

    public function __construct() {
        $streamHandler = new StreamHandler($this->logPath);

        GraveyardProvider::getGraveyard()->addHandler($streamHandler);
    }

    public function tombstone() {
        try {
            $trace = TraceProvider::getTraceHere();
            GraveyardProvider::getGraveyard()
                    ->tombstone(func_get_args(), $trace, []);
        } catch (\Exception $ex) {
            //Log your exception
            var_dump($ex);
        }
    }

}
