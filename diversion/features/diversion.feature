Feature: diversion
    In order to know how many n-digit binary numbers are there that don't have two adajacent 1 bits
    As a software developper
    I need a console command that answers the question given any n

    Scenario Outline: Output the result of the question given any input number
        When I execute "bin/diversion <input>"
        Then result code should be 0
        And output should be <output>

        # 3 => 000, 001, 010, 100, 101

        Examples:
            | input | output |
            | 3     | 5      |
