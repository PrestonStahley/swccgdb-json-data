SW:CCG DB cards JSON data
=========

The goal of this repository is to store [SW:CCG DB](https://swccgdb.com) card data in a format that can be easily updated by multiple people and their changes reviewed.

## Description of properties in schemas

Required properties are in **bold**.

#### Cycle schema

* **code** - Identifier of the cycle. Example: `"full"`.
* **name** - Properly formatted name of the cycle. Example: `"Full Sets"`.
* **position** - Number of the cycle. Example: `1` for Full Sets.
* **size** - Number of sets in the cycle. Example: `12` for Full Sets.

#### Set schema

* **code** - Identifier of the set. The acronym of the set name, lower case, 2 - 5 characters. Examples: `"pr"` for Premiere, `"ds2"` for Death Star II, `"otsd"` for Official Tournament Sealed Deck.
* **cycle_code** - Identifier of the cycle the set belongs to. Must refer to a cycle `"code"` value. Examples: `"full"` for Premiere, `"premium"` for Official Tournament Sealed Deck.
* **name** - Properly formatted name of the set. Examples: `"Premiere"`, `"Death Star II"`, `"Official Tournament Sealed Deck"`.
* **position** - Number of the set within the cycle, in chronological order. Example: `1` for Premiere.
* **id** - Unique 2 digit set identifier. Example: `01` for Premiere.
* **date_release** - date when the set was officially released. Format of the date is YYYY-MM-DD. May be `null` - this value is used when the date is unknown. Example: `"1995-12-01"` for Premiere.
* **size** - Number of different cards in the set. May be `null` - this value is used when the set is just an organizational entity, not a physical set.  Example: `324` for Premiere.

#### Card schema

* **code** - 5 digit card identifier. Consists of two zero-padded numbers: first two digits are the set id, last three are position of the card within the set. Set position is based on Decipher card list order: All light side cards in alphabetical order, followed by all dark side cards in alphabetical order.
* ability - Character, Starship, Vehicle only.
* armor - Character, Starship, Vehicle only.
* characteristics
* clone_army - Character, Starship only.
* dark_side_icons - Location only.
* dark_side_text - Location only.
* defense_value - Creature only.
* defense_value_name - Creature only.
* deploy - Deploy cost of the card. Character, Creature, Starship, Vehicle, Weapon only. May be `null` - this value is used when the card has a special, possibly variable, cost.
* destiny - Destiny value of the card. May be `null` - this value is used when the card has a special, possibly variable, cost.
* episode_1
* episode_7
* ferocity - Creature only. May be `null` - this value is used when the card has a special, possibly variable, cost.
* first_order - Starship only.
* force_aptitude - Character only.
* forfeit - Forfeit value of the card. Character, Creature, Starship, Vehicle, Weapon only. May be `null` - this value is used when the card has a special, possibly variable, cost.
* **gametext**
* grabber - Effect, Defensive Shield only.
* **has_errata**
* hyperspeed - Starship only.
* **image_url**
* independent - Starship only.
* landspeed - Vehicle only. May be `null` - this value is used when the card has a special, possibly variable, cost.
* light_side_icons - Location only.
* light_side_text - Location only.
* lore
* maneuver - Character, Starship only.
* mobile - Location only.
* model_type - Character, Creature, Starship, Vehicle only.
* **name**
* nav_computer - Character, Starship only.
* permanent_weapon - Character only.
* pilot - Character, Starship, Vehicle only
* planet - Location only.
* politics - Character only.
* **position**
* power - Character, Starship, Vehicle only. May be `null` - this value is used when the card has a special, possibly variable, cost.
* presence - Character, Starship, Vehicle only.
* **rarity_code** - Possible values: `"C"`, `"C1"` `"C2"`, `"C3"` `"U"`, `"U1"` `"U2"`, `"R"` `"R1"`, `"R2"` `"F"`, `"PM"` `"PM2"`, `"PM3"`, `"PM3"`, `"PM5"`, `"PV"`, `"UR"`, `"XR"`.
* republic - Character, Starship only.
* resistance - Starship, Vehicle only.
* scomp_link - Starship, Vehicle, Location only.
* selective - Creature only.
* separatist - Character only.
* **set_code**
* **side_code** - Possible values: `"light"`, `"dark"`.
* site_creature - Location only.
* site_exterior - Location only.
* site_interior - Location only.
* site_starship - Location only.
* site_underground - Location only.
* site_underwater - Location only.
* site_vehicle - Location only.
* space - Location only.
* subtype_code
* system_parsec - Location only. May be `null` - this value is used when the card has a special, possibly variable, cost.
* trade_federation - Starship only.
* **type_code**
* **uniqueness**
* warrior - Character only.

## JSON text editing tips

Full description of (very simple) JSON format can be found [here](http://www.json.org/), below there are a few tips most relevant to editing this repository.

#### Non-ASCII symbols

When symbols outside the regular [ASCII range](https://en.wikipedia.org/wiki/ASCII#ASCII_printable_code_chart) are needed, UTF-8 symbols come in play. These need to be escaped using `\u<4 letter hexcode>`.

To get the 4-letter hexcode of a UTF-8 symbol (or look up what a particular hexcode represents), you can use a UTF-8 converter, such as [this online tool](http://www.ltg.ed.ac.uk/~richard/utf-8.cgi).

#### Quotes and breaking text into multiple lines

To have quotes as part of the text, use `\"`.  For example, `"flavor": "\"If you only knew the power of the dark side.\""` results in following flavor text:

> *"If you only knew the power of the dark side."*

#### SW:CCG symbols

These can be used in a card's `text` section.

 * `[unique]`
 * `[restricted]`
 * `[maintain]`
 * `[recycle]`
 * `[sacrifice]`
