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

    Scenario: Use command all
      Given a project file "foo.yml" with 2 passwords
      And a project file "bar.yml" with 1 password
      When I run "php pass all"
      Then I should get:
      """
      bar.yml: 1 passwords
      foo.yml: 2 passwords
      """