<?php

$setCode = "ref3";
$json = file_get_contents("./set/raw/{$setCode}.json");
$set = json_decode($json,true);

foreach ($set as $key => $value) {

  foreach($set[$key] as $prop => $val) {

    // Format required fields
    if (in_array($prop, array('type_code', 'side_code'))) {
      $set[$key][$prop] = kebabCase($val);
    }

    if ($prop == 'position') {
      $set[$key][$prop] = (int)$val;
    }

    if ($prop == 'rarity_code') {
      if($val == 'Common') { $set[$key][$prop] = 'C'; }
      if($val == 'Common1') { $set[$key][$prop] = 'C1'; }
      if($val == 'Common2') { $set[$key][$prop] = 'C2'; }
      if($val == 'Common3') { $set[$key][$prop] = 'C3'; }
      if($val == 'Uncommon') { $set[$key][$prop] = 'U'; }
      if($val == 'Uncommon1') { $set[$key][$prop] = 'U1'; }
      if($val == 'Uncommon2') { $set[$key][$prop] = 'U2'; }
      if($val == 'Rare') { $set[$key][$prop] = 'R'; }
      if($val == 'Rare1') { $set[$key][$prop] = 'R1'; }
      if($val == 'Rare2') { $set[$key][$prop] = 'R2'; }
      if($val == 'Fixed') { $set[$key][$prop] = 'F'; }
      if($val == 'Premium') { $set[$key][$prop] = 'PM'; }
      if($val == 'Exclusive Rare') { $set[$key][$prop] = 'XR'; }
      if($val == 'Ultra Rare') { $set[$key][$prop] = 'UR'; }
    }

    if ($prop == 'image_url') {
      $setName = $set[$key]['set_code'];
      if($setName == 'pr') { $setName = 'Premiere'; }
      if($setName == 'anh') { $setName = 'ANewHope'; }
      if($setName == 'hoth') { $setName = 'Hoth'; }
      if($setName == 'dah') { $setName = 'Dagobah'; }
      if($setName == 'cc') { $setName = 'CloudCity'; }
      if($setName == 'jp') { $setName = 'JabbasPalace'; }
      if($setName == 'se') { $setName = 'SpecialEdition'; }
      if($setName == 'edr') { $setName = 'Endor'; }
      if($setName == 'ds2') { $setName = 'DeathStarII'; }
      if($setName == 'tat') { $setName = 'Tatooine'; }
      if($setName == 'cor') { $setName = 'Coruscant'; }
      if($setName == 'tp') { $setName = 'TheedPalace'; }
      if($setName == '2pp') { $setName = 'PremiereIntroductoryTwoPlayerGame'; }
      if($setName == 'jpack') { $setName = 'JediPack'; }
      if($setName == '2pesb') { $setName = 'EmpireStrikesBackIntroductoryTwoPlayerGame'; }
      if($setName == 'rlp') { $setName = 'RebelLeader'; }
      if($setName == 'otsd') { $setName = 'OfficialTournamentSealedDeck'; }
      if($setName == 'epp') { $setName = 'EnhancedPremiere'; }
      if($setName == 'ecc') { $setName = 'EnhancedCloudCity'; }
      if($setName == 'ejp') { $setName = 'EnhancedJabbasPalace'; }
      if($setName == 'jpsd') { $setName = 'JabbasPalaceSealedDeck'; }
      if($setName == 'ref2') { $setName = 'ReflectionsII'; }
      if($setName == 'ta') { $setName = 'ThirdAnthology'; }
      if($setName == 'ref3') { $setName = 'ReflectionsIII'; }
      $side = upperCase($set[$key]['side_code']);
      $name = cleanCardName($set[$key]['name']);
      $set[$key][$prop] = "{$setName}-{$side}/large/{$name}.gif";
    }

    if ($prop == 'has_errata') {
      $set[$key][$prop] = (boolean)$val;
    }

  }

  foreach($set[$key] as $prop => $val) {

    // Format or remove optional fields

    if ($prop == 'subtype_code') {
      if(in_array($set[$key]['type_code'], array('character', 'creature', 'starship', 'vehicle', 'weapon', 'location', 'interrupt', 'effect')) && !empty($val)) {
        $set[$key][$prop] = kebabCase($val);
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('ability', 'armor', 'power'))) {
      if(in_array($set[$key]['type_code'], array('character', 'starship', 'vehicle'))) {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('pilot', 'presence'))) {
      if(in_array($set[$key]['type_code'], array('character', 'starship', 'vehicle'))) {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'characteristics') {
      if(in_array($set[$key]['type_code'], array('character', 'creature', 'starship', 'vehicle', 'weapon', 'location', 'interrupt', 'effect'))) {
        $set[$key][$prop] = $val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'model_type') {
      if(in_array($set[$key]['type_code'], array('character', 'creature', 'starship', 'vehicle'))) {
        $set[$key][$prop] = $val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('clone_army', 'republic', 'nav_computer'))) {
      if(in_array($set[$key]['type_code'], array('character', 'starship'))) {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'maneuver') {
      if(in_array($set[$key]['type_code'], array('character', 'starship', 'vehicle'))) {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('warrior', 'permanent_weapon', 'separatist'))) {
      if(in_array($set[$key]['type_code'], array('character'))) {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('politics'))) {
      if(in_array($set[$key]['type_code'], array('character'))) {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'force_aptitude') {
      if($set[$key]['type_code'] == 'character') {
        $set[$key][$prop] = $val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('first_order', 'independent', 'trade_federation'))) {
      if($set[$key]['type_code'] == 'starship') {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('landspeed'))) {
      if($set[$key]['type_code'] == 'vehicle') {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('hyperspeed'))) {
      if($set[$key]['type_code'] == 'starship') {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'resistance') {
      if(in_array($set[$key]['type_code'], array('starship', 'vehicle'))) {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'scomp_link') {
      if(in_array($set[$key]['type_code'], array('starship', 'vehicle', 'location'))) {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('dark_side_icons', 'light_side_icons', 'system_parsec'))) {
      if($set[$key]['type_code'] == 'location') {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('dark_side_text', 'light_side_text'))) {
      if($set[$key]['type_code'] == 'location') {
        $set[$key][$prop] = $val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('mobile', 'planet', 'site_creature', 'site_exterior', 'site_interior', 'site_underground', 'site_underwater', 'site_starship', 'site_vehicle', 'space'))) {
      if($set[$key]['type_code'] == 'location') {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('deploy', 'forfeit'))) {
      if(in_array($set[$key]['type_code'], array('character', 'creature', 'starship', 'vehicle', 'weapon'))) {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'destiny') {
      if($set[$key]['type_code'] != 'location') {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'episode_1') {
      if($set[$key]['type_code'] != 'jedi-test') {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'episode_7') {
      if(!in_array($set[$key]['type_code'], array('jedi-test', 'podracer'))) {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'grabber') {
      if(in_array($set[$key]['type_code'], array('effect', 'defensive-shield'))) {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if (in_array($prop, array('defense_value', 'ferocity'))) {
      if($set[$key]['type_code'] == 'creature') {
        $set[$key][$prop] = (int)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'selective') {
      if($set[$key]['type_code'] == 'creature') {
        $set[$key][$prop] = (boolean)$val;
      } else {
        unset($set[$key][$prop]);
      }
    }

    if ($prop == 'defense_value_name') {
      if($set[$key]['type_code'] == 'creature') {
        $set[$key][$prop] = $val;
      } else {
        unset($set[$key][$prop]);
      }
    }

  }

}

file_put_contents("./set/{$setCode}.json", json_encode($set));

function kebabCase($val) {
  $kebabables = array(" ", "/");
  return str_replace($kebabables, '-', strtolower($val));
}

function cleanCardName($val) {
  $s = strtolower($val);
  return preg_replace('/[^a-z0-9\&]+/i', '', $s);
}

function upperCase($val) {
  return str_replace(' ', '', ucwords($val));
}

?>