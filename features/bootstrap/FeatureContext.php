<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Symfony\Component\Console\Input\StringInput;

use Pass\Application;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $output;
    
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
    }

    /**
     * @Given /^the command exist$/
     */
    public function theCommandExist()
    {
    }

    /**
     * @When /^I run "([^"]*)"$/
     */
    public function iRun($command)
    {
        $output = shell_exec($command);
        $this->output = $output;
    }

    /** @Then /^I should get:$/ */
    public function iShouldGet(PyStringNode $string)
    {
        // avoid interferences with white spaces
        $string = str_replace(array("\n", ' '), '', (string) $string);
        $output = str_replace(array("\n", ' '), '', $this->output);
        
        if ($string !== $output) {
            throw new Exception(
                "Actual output is:\n" . $this->output
            );
        }
    }

    /**
     * @Given /^a project file "([^"]*)" with (\d+) password[s]?$/
     */
    public function aProjectFileWithPasswords($filename, $nPasswords)
    {
        if (!file_exists('passwords')) {
            mkdir('passwords');
        }
        $content = '';
        foreach (range(1, $nPasswords) as $i) {
            $content .= "password$i\n";
        }
        file_put_contents(sprintf('passwords/%s', $filename), $content);
    }
}
