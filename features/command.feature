Feature: tool
  In order to use credentials efficiently
  As a developer
  I need to find them quickly
  
  Scenario: Use command
    Given the command exist
    When I run "php pass"
    Then I should get:
    """
    bar
    foo
    """