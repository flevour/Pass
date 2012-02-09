Feature: tool
  In order to use credentials efficiently
  As a developer
  I need to find them quickly
  
  Scenario: Use command
    Given the command exist
    When I run "php pass"
    Then I should get:
    """
    Console Tool

    Usage:
      [options] command [arguments]

    Options:
      --help           -h Display this help message.
      --quiet          -q Do not output any message.
      --verbose        -v Increase verbosity of messages.
      --version        -V Display this application version.
      --ansi              Force ANSI output.
      --no-ansi           Disable ANSI output.
      --no-interaction -n Do not ask any interactive question.

    Available commands:
      all    Lists all passwords available
      help   Displays help for a command
      list   Lists commands
    """