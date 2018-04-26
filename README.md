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
* ability
* armor
* characteristics
* clone_army
* dark_side_icons
* dark_side_text
* defense_value
* defense_value_name
* deploy - Deploy cost of the card. May be `null` - this value is used when the card has a special, possibly variable, cost.
* destiny
* episode_1
* episode_7
* ferocity
* first_order
* force_aptitude
* forfeit
* **gametext**
* grabber
* **has_errata**
* hyperspeed
* **image_url**
* independent
* landspeed
* light_side_icons
* light_side_text
* lore
* maneuver
* mobile
* model_type
* **name**
* nav_computer
* permanent_weapon
* pilot
* planet
* politics
* power
* presence
* **rarity_code**
* republic
* resistance
* scomp_link
* selective
* separatist
* **set_code**
* **side_code** - Possible values: `"light"`, `"dark"`
* site_creature
* site_exterior
* site_interior
* site_starship
* site_underground
* site_underwater
* site_vehicle
* space
* subtype_code
* system_parsec
* trade_federation
* **type_code**
* **uniqueness**
* warrior

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
