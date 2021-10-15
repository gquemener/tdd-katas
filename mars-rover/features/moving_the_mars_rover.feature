Feature: Moving the Mars rover
    In order to explore the planet
    As the Mars Rover
    I need to be able to turn and move forward

    Scenario: Successfully follow a sequence of turn and move commands
        Given Mars has been splitted into a grid of 10 x 10 squares
        When I reveive the "MMRMMLM" commands sequence
        Then my current position should be "2:3:N"

    Scenario: Successfully move back to origin when moving forward long enough
        Given Mars has been splitted into a grid of 10 x 10 squares
        When I reveive the "MMMMMMMMMM" commands sequence
        Then my current position should be "0:0:N"
