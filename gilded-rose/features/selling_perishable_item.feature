Feature: selling perishable item
    # Rules:
    # - Once the sell by date has passed, Quality degrades twice as fast
    # - The Quality of an item is never negative
    # - The Quality of an item is never more than 50

    Scenario: Successfully degrade quality and sell in date
        Given the perishable item "+5 Dexterity Vest, 3, 20"
        Then the item should have the following history:
            | Sell in | Quality |
            | 3       | 20      |
            | 2       | 19      |
            | 1       | 18      |
            | 0       | 17      |
            | -1      | 15      |
            | -2      | 13      |

    Scenario: Successfully limit lower quality value to 0
        Given the perishable item "+5 Dexterity Vest, 3, 1"
        Then the item should have the following history:
            | Sell in | Quality |
            | 3       | 1       |
            | 2       | 0       |
            | 1       | 0       |
