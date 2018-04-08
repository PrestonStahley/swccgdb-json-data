SW:CCG DB cards JSON data
=========

The goal of this repository is to store [SW:CCG DB](https://swccgdb.com) card data in a format that can be easily updated by multiple people and their changes reviewed.

## Description of properties in schemas

Required properties are in **bold**.

#### Set schema

* **code** - identifier of the set. The acronym of the set name, with matching case. Examples: `"ANH"` for A New Hope, `"DS2"` for Death Star II, `"OTSD"` for Official Tournament Sealed Deck.
* **name** - properly formatted name of the set. Examples: `"A New Hope"`, `"Death Star II"`, `"Official Tournament Sealed Deck"`.
* **position** - number of the set. Example: `1` for Premiere.
* **released** - date when the set was officially released. Format of the date is YYYY-MM-DD. May be `null` - this value is used when the date is unknown. Example: `"1995-12-01"` for Premire.
* **size** - number of different cards in the set. May be `null` - this value is used when the pack is just an organizational entity, not a physical pack.  Examples: `324` for Premire, `null` for assorted draft cards.

#### Card schema

* ability
* armor
* characteristics
* **code** - 5 digit card identifier. Consists of two zero-padded numbers: first two digits are the cycle position, last three are position of the card within the cycle (printed on the card).
* darkSideIcons
* deploy - Deploy cost of the card. May be `null` - this value is used when the card has a special, possibly variable, cost.
* destiny
* **faction_code** - Possible values: `"light"`, `"dark"`
* forfeit
* lore
* gametext
* hyperspeed
* icons
* landspeed
* lightSideIcons
* maneuver
* **name**
* parsec
* politics
* **position**
* power
* **rarity_code** - Card rarity. Possible values: `"F"`, `"C"`, `"C1"`, `"C2"`, `"C3"`, `"U"`, `"U1"`, `"U2"`, `"Ur"`, `"R"`, `"R1"`, `"R2"`, `"Xr"`, `"Pm"`
* **set_code** - Example: `"ANH"` for A New Hope.
* subType
* **type_code** - Type of the card. Possible values: `"Admiral's Order"`, `"Character"`, `"Creature"`, `"Defensive Shield"`, `"Device"`, `"Effect"`, `"Epic Event"`, `"Interrupt"`, `"Jedi Test"`, `"Location"`, `"Objective"`, `"Podracer"`, `"Starship"`, `"Vehicle"`, `"Weapon"`
* uniqueness

## JSON text editing tips

Full description of (very simple) JSON format can be found [here](http://www.json.org/), below there are a few tips most relevant to editing this repository.

#### Non-ASCII symbols

When symbols outside the regular [ASCII range](https://en.wikipedia.org/wiki/ASCII#ASCII_printable_code_chart) are needed, UTF-8 symbols come in play. These need to be escaped using `\u<4 letter hexcode>`.

To get the 4-letter hexcode of a UTF-8 symbol (or look up what a particular hexcode represents), you can use a UTF-8 converter, such as [this online tool](http://www.ltg.ed.ac.uk/~richard/utf-8.cgi).

#### Quotes and breaking text into multiple lines

To have text spanning multiple lines, use `\n` to separate them. To have quotes as part of the text, use `\"`.  For example, `"flavor": "\"If you only knew the power of the dark side.\"\n-Darth Vader"` results in following flavor text:

> *"If you only knew the power of the dark side."*  
> *-Darth Vader*

#### SW:CCG symbols

These can be used in a card's `text` section.

 * `[unique]`
 * `[restricted]`
 * `[maintain]`
 * `[recycle]`
 * `[sacrifice]`


#### Translations

To merge new changes in default language in all locales, run the CoffeeScript script `update_locales`.

Pre-requisites:
 * `node` and `npm` installed
 * `npm -g install coffee-script`

Usage: `coffee update_locales.coffee`
