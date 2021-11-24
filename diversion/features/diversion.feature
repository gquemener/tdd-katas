Feature: diversion
    In order to know how many n-digit binary numbers are there that don't have two adajacent 1 bits
    As a software developper
    I need a console command that answers the question given any n

    Scenario Outline: Output the result of the question given any input number
        When I execute "bin/diversion <input>"
        Then result code should be 0
        And output should be <output>

        # 3 => 000, 001, 010, 100, 101
        # 4 => 0000, 0001, 0010, 0011, => 3
        #      0100, 0101, 0110, 0111, => 2
        #      1000, 1001, 1010, 1011, => 3
        #      1100, 1101, 1110, 1111  => 0
        #                                 8

        Examples:
            | input | output |
            | 3     | 5      |
            | 4     | 8      |
