<?php
namespace Pass;
use Symfony\Component\Console\Application as BaseApplication;
use Pass\Command\ListCommand;

class Application extends BaseApplication {
    /**
     * Gets the default commands that should always be available.
     *
     * @return array An array of default Command instances
     */
    protected function getDefaultCommands()
    {
        $defaults = parent::getDefaultCommands();
        $defaults[] = new ListCommand();
        return $defaults;
    }
}