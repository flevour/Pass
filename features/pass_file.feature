Feature: Pass\\File class
  In order to manage Pass files well
  As a developer
  I need to wrap them in a class which gives me useful methods
  
  Scenario Outline: Use command
    Given a project file "foo.yml" with <count> passwords
    And I wrap it in a File class
    When I count the passwords
    Then I should get <count>
    
    Examples:
        | count |
        |   1   |
        |   2   |