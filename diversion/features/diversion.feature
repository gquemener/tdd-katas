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
        # 5 => 00000 00001 00010 00011 00100 00101 00110 00111 01000 01001 01010 01011 01100 01101 01110 01111 => 8
        #      10000 10001 10010 10011 10100 10101 10110 10111 11000 11001 11010 11011 11100 11101 11110 11111 => 5
        #                                                                                                      => 13

        Examples:
            | input | output |
            | 0     | 0      |
            | 1     | 2      |
            | 2     | 3      |
            | 3     | 5      |
            | 4     | 8      |
            | 5     | 13     |
            | 6     | 21     |
            | 7     | 34     |
            | 8     | 55     |
            | 9     | 89     |
            | 10    | 144    |
