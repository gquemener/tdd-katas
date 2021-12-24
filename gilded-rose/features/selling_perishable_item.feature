Feature: Updating quality of each

    Scenario: Successfully degrade quality of perishable item
        # Rules:
        # - Quality degrades by 1 every day
        # - Once the sell by date has passed, Quality degrades twice as fast
        # - The Quality of an item is never negative
        # - The Quality of an item is never more than 50
        Given the perishable item "+5 Dexterity Vest, 3, 20"
        Then the item should have the following history:
            | Sell in | Quality |
            | 3       | 20      |
            | 2       | 19      |
            | 1       | 18      |
            | 0       | 17      |
            | -1      | 15      |
            | -2      | 13      |

    Scenario: Successfully degrade quality of fine-tunable item
        # Rules:
        # - "Aged Brie" actually increases in Quality the older it gets
        Given the "fine-tunable" item "Aged Brie, 3, 20"
        Then the item should have the following history:
            | Sell in | Quality |
            | 3       | 20      |
            | 2       | 21      |
            | 1       | 22      |
            | 0       | 23      |
            | -1      | 25      |
            | -2      | 27      |
