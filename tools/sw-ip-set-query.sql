/*
Query the SW-IP SQLite DB and return a format closer to our schema.
Note: The database file must be converted to SQLite3 before it can be opened in a tool like DB Browser for SQLite.
The created table tpm2 can then be exported as JSON.
*/

DROP TABLE IF EXISTS tmp1;
DROP TABLE IF EXISTS tmp2;

CREATE TABLE tmp1 AS
SELECT
Ability as ability,
Armor as armor,
Characteristics as characteristics,
'' as clone_army,
DarkSideIcons as dark_side_icons,
DarkSideText as dark_side_text,
CreatureDefenseValue as defense_value,
CreatureDefenseValueName as defense_value_name,
Deploy as deploy,
Destiny as destiny,
Episode1 as episode_1,
'' as episode_7,
Ferocity as ferocity,
'' as first_order,
ForceAptitude as force_aptitude,
Forfeit as forfeit,
Gametext as gametext,
Grabber as grabber,
Errata as has_errata,
Hyperspeed as hyperspeed,
'' as image_url,
Independent as independent,
LightSideIcons as light_side_icons,
LightSideText as light_side_text,
Lore as lore,
Landspeed as landspeed,
Maneuver as maneuver,
Mobile as mobile,
ModelType as model_type,
CardName as name,
Astromech as nav_computer,
PermanentWeapon as permanent_weapon,
Pilot as pilot,
Planet as planet,
Politics as politics,
Power as power,
Droid as presence,
Rarity as rarity_code,
Republic as republic,
'' as resistance,
ScompLink as scomp_link,
SelectiveCreature as selective,
'' as separatist,
'pr' as set_code,
Grouping as side_code,
Creature as site_creature,
Exterior as site_exterior,
Interior as site_interior,
Starship as site_starship,
Underground as site_underground,
Underwater as site_underwater,
Vehicle as site_vehicle,
Space as space,
subType as subtype_code,
Parsec as system_parsec,
TradeFederation as trade_federation,
CardType as type_code,
Uniqueness as uniqueness,
Warrior as warrior
FROM SWD db WHERE Expansion = 'Premiere' ORDER BY Grouping DESC, CardName ASC;

CREATE TABLE tmp2 AS
SELECT '01'||substr('000'||rowid, -3, 3) as code, rowid as position, * FROM tmp1 ORDER BY side_code DESC, name ASC;

SELECT * FROM tmp2 ORDER BY code ASC;