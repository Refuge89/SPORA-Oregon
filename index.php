<?php
/* 
	SPORA for OregonCore v1.32
	Simple Page Of Registration of Accounts for OregonCore

	It is made in the form of one page with fields of input of the 
	information of an account and the list of players being on a server.
	
	Original Creation by mirage666 for MaNGOS	http://pomm.da.ru/
	
	Modified for OregonCore by Kandyman			http://www.burning-wow.eu

*/

$lang="en";			// Language ("en" - english, "ru" - russian)
$host="localhost";		//Your MySql server host (usually localhost)
$user="root";			//Your MySql user
$password="root";		//Your MySql user password
$db="charactersr";			//Character database
$hostr="localhost";		//Login databse host (realmd)
$userr="root";			//MySql User
$passwordr="root";		//MySql login db user pass
$dbr="logon";			//Login db name (realmd)
$database_encoding = ''; 	// Set encoding
$img_base = "img/";		// Image dir
$server = "localhost";		//Realm ip addres
$port = "8085";			//Realm port
$realm = 'Burning Realm'; //Your relamname
$title="Spora for OregonCore";		//Webpage title
$realmlist = 'logon.burning-wow.eu';
$lock_acc=0;			// Lock created account to IP address (1 - on, 0 - off)
$lock_reg=0;			// Registration only one (or more) account from one IP address
				// 0 - not limit, 1 - one acc,  2 - two acc, etc...



Switch ($lang)
{
case "en": 
	$button="create_en.gif";
	$text = Array(
	'acc' => 'Creation of account',
	'create' => 'is completed !',
	'failed' => 'was not possible !',
	'not_all' => 'Fields are filled not all',
	'taken' => 'is already taken !',
	'playerson' => 'players online',
	'off' => 'is offline',
	'realm' => 'set realmlist ',
	'name' => 'Account Name',
	'password' => 'Password',
	'ip_limit' => Array('From your IP ',' accounts are already created'),
	'char' => Array('Name','Race','Class','LvL','Location'),
	);
	break; 
case "ru": 
	$button="create_ru.gif";
	$text = Array(
	'acc' => 	'Ñîçäàíèå àêêàóíòà',
	'create' => 'çàâåðøåíî !',
	'failed' => 'íåâîçìîæíî !',
	'not_all' => 'Çàïîëíåíû íå âñå ïîëÿ',
	'taken' => 'is already taken !',
	'playerson' => 'èãðîêîâ íà ñåðâåðå',
	'off' => 'ñåé÷àñ îòêëþ÷åí',
	'realm' => 'set realmlist ',
	'name' => 'Èìÿ Àêêàóíòà',
	'password' => 'Ïàðîëü',
	'ip_limit' => Array('Ñ âàøåãî IP ',' àêêàóíòîâ óæå ñîçäàíî'),
	'char' => Array('Ïåðñîíàæ','Ðàñà','Êëàññ','ËâË','Ðàñïîëîæåíèå'),
	);
	break; 
}

$maps_a = Array(
	0 => 'Azeroth',
	1 => 'Kalimdor',
	2 => 'UnderMine',
	13 => 'Test zone',
	17 => 'Kalidar',
	30 => 'Alterac Valley',
	33 => 'Shadowfang Keep',
	34 => 'The Stockade',
	35 => 'Stormwind Prison',
	36 => 'Deadmines',
	37 => 'Plains of Snow',
	43 => 'Wailing Caverns',
	44 => 'Monastery Interior',
	47 => 'Razorfen Kraul',
	48 => 'Blackfathom Deeps',
	70 => 'Uldaman',
	90 => 'Gnomeregan',
	109 => 'Sunken Temple',
	129 => 'Razorfen Downs',
	169 => 'Emerald Forest',
	189 => 'Scarlet Monastery',
	209 => 'Zul\'Farrak',
	229 => 'Blackrock Spire',
	230 => 'Blackrock Depths',
	249 => 'Onyxias Lair',
	269 => 'Caverns of Time',
	289 => 'Scholomance',
	309 => 'Zul\'Gurub',
	329 => 'Stratholme',
	349 => 'Maraudon',
	369 => 'Deeprun Tram',
	389 => 'Ragefire Chasm',
	409 => 'The Molten Core',
	429 => 'Dire Maul',
	449 => 'Alliance PVP Barracks',
	450 => 'Horde PVP Barracks',
	451 => 'Development Land',
	469 => 'Blackwing Lair',
	489 => 'Warsong Gulch',
	509 => 'Ruins of Ahn\'Qiraj',
	529 => 'Arathi Basin',
	530 => 'Burning Crusade Zones',
	531 => 'Temple of Ahn\'Qiraj',
	532 => 'Karazhan',
	533 => 'Naxxramas',
	534 => 'Hyjal Past',
	540 => 'Shattered Halls',
	542 => 'Blood Furnace',
	543 => 'Hellfire Ramparts',
	544 => 'Magtheridon\'s Lair',
	545 => 'The Steamvault',
	546 => 'The Black Temple',
	547 => 'The Slave Pens',
	548 => 'Coilfang Resevoir',
	550 => 'The Eye',
	552 => 'The Arcatraz',
	553 => 'The Botanica',
	554 => 'The Mechanar',
	555 => 'Shadow Labyrinth',
	556 => 'Sethekk Halls',
	557 => 'Mana-Tombs',
	558 => 'Auchenai Crypts',
	559 => 'Nagrand Arena',
	560 => 'Hillsbrad Past',
	562 => 'Blade\'s Edge Arena',
	564 => 'Black Temple',
	565 => 'Gruul\'s Lair',
	566 => 'Eye of the Storm',
	568 => 'Zul\'aman',
);

$zone = Array(
	0 => Array(
		Array(700,10,1244,1873,'Undercity',1497),
		Array(-840,-1330,-5050,-4560,'Ironforge',1537),
		Array(1190,200,-9074,-8280,'Stormwind City',1519),
		Array(-2170,-4400,-7348,-6006,'Badlands',3),
		Array(-500,-4400,-4485,-2367,'Wetlands',11),
		Array(2220,-2250,-15422,-11299,'Stranglethorn Vale',33),
		Array(-1724,-3540,-9918,-8667,'Redridge Mountains',44),
		Array(-2480,-4400,-6006,-4485,'Loch Modan',38),
		Array(662,-1638,-11299,-9990,'Duskwood',10),
		Array(-1638,-2344,-11299,-9918,'Deadwind Pass',41),
		Array(834,-1724,-9990,-8526,'Elwynn Forest',12),
		Array(-500,-3100,-8667,-7348,'Burning Steppes',46),
		Array(-608,-2170,-7348,-6285,'Searing Gorge',51),
		Array(2000,-2480,-6612,-4485,'Dun Morogh',1),
		Array(-1575,-5425,-432,805,'The Hinterlands',47),
		Array(3016,662,-11299,-9400,'Westfall',40),
		Array(600,-1575,-1874,220,'Hillsbrad Foothills',267),
		Array(-2725,-6056,805,3800,'Eastern Plaguelands',139),
		Array(-850,-2725,805,3400,'Western Plaguelands',28),
		Array(2200,600,-900,1525,'Silverpine Forest',130),
		Array(2200,-850,1525,3400,'Tirisfal Glades',85),
		Array(-2250,-3520,-12800,-10666,'Blasted Lands',4),
		Array(-2344,-4516,-11070,-9600,'Swamp of Sorrows',8),
		Array(-1575,-3900,-2367,-432,'Arathi Highlands',45),
		Array(600,-1575,220,1525,'Alterac Mountains',36),
	),
	1 => Array(
		Array(2698,2030,9575,10267,'Darnassus',1657),
		Array(326,-360,-1490,-910,'Thunder Bluff',1638),
		Array(-3849,-4809,1387,2222,'Orgrimmar',1637),
		Array(-1300,-3250,7142,8500,'Moonglade',493),
		Array(2021,-400,-9000,-6016,'Silithus',1377),
		Array(-2259,-7000,4150,8500,'Winterspring',618),
		Array(-400,-2094,-8221,-6016,'Un\'Goro Crater',490),
		Array(-590,-2259,3580,7142,'Felwood',361),
		Array(-3787,-8000,1370,6000,'Azshara',16),
		Array(-1900,-5500,-10475,-6825,'Tanaris',440),
		Array(-2478,-5500,-5135,-2330,'Dustwallow Marsh',15),
		Array(360,-1536,-3474,-412,'Mulgore',215),
		Array(4000,-804,-6828,-2477,'Feralas',357),
		Array(3500,360,-2477,372,'Desolace',405),
		Array(-804,-5500,-6828,-4566,'Thousand Needles',400),
		Array(-3758,-5500,-1300,1370,'Durotar',14),
		Array(1000,-3787,1370,4150,'Ashenvale',331),
		Array(2500,-1300,4150,8500,'Darkshore',148),
		Array(3814,-1100,8600,11831,'Teldrassil',141),
		Array(3500,-804,-412,3580,'Stonetalon Mountains',406),
		Array(-804,-4200,-4566,1370,'The Barrens',17),
	),
	530 => Array(
		Array(6135.25,4829,-2344.78,-1473.95,'Shattrath City',3703),
		Array(-6400.75,-7612.20,9346.93,10153.70,'Silvermoon City',3487),
		Array(5483.33,-91.66,1739.58,5456.25,'Netherstorm',3523),
		Array(7083.33,1683.33,-4600,-999.99,'Terokkar Forest',3519),
		Array(10295.83,4770.83,-3641.66,41.66,'Nagrand',3518),
		Array(-10075,-13337.49,-2933.33,-758.33,'Bloodmyst Isle',3525),
		Array(8845.83,3420.83,791.66,4408.33,'Blades Edge Mountains',3522),
		Array(4225,-1275,-5614.58,-1947.91,'Shadowmoon Valley',3520),
		Array(-11066.36,-12123.13,-4314.37,-3609.68,'The Exodar',3557),
		Array(9475,4447.91,-1416.66,1935.41,'Zangarmarsh',3521),
		Array(5539.58,375,-1962.49,1481.25,'Hellfire Peninsula',3483),
		Array(-10500,-14570.83,-5508.33,-2793.75,'Azuremyst Isle',3524),
		Array(-5283.33,-8583.33,6066.66,8266.66,'Ghostlands',3433),
		Array(-4487,-9412,7758,11041,'Eversong Woods',3430)
	),
);

$def = Array(
	'character_race' => Array(
		1 => 'Human',
		2 => 'Orc',
		3 => 'Dwarf',
		4 => 'Night&nbsp;Elf',
		5 => 'Undead',
		6 => 'Tauren',
		7 => 'Gnome',
		8 => 'Troll',
		9 => 'Goblin',
		10 => 'Blood&nbsp;Elf',
		11 => 'Draenei',
	),

	'character_class' => Array(
		1 => 'Warrior',
		2 => 'Paladin',
		3 => 'Hunter',
		4 => 'Rogue',
		5 => 'Priest',
		7 => 'Shaman',
		8 => 'Mage',
		9 => 'Warlock',
		11 => 'Druid',
	),
);

class DBLayer
{
	var $link_id;
	var $query_result;
	var $saved_queries = array();
	var $num_queries = 0;

	function DBLayer($db_host, $db_username, $db_password, $db_name)
	{
		$this->link_id = @mysql_connect($db_host, $db_username, $db_password, true);

		if ($this->link_id)
		{
			if (@mysql_select_db($db_name, $this->link_id))
				return $this->link_id;
			else
				error('Unable to select database. MySQL reported: '.mysql_error(), __FILE__, __LINE__);
		}
		else
			error('Unable to connect to MySQL server. MySQL reported: '.mysql_error(), __FILE__, __LINE__);
	}

	function query($sql)
	{
		$this->query_result = @mysql_query($sql, $this->link_id);

		if ($this->query_result)
		{
			++$this->num_queries;
			return $this->query_result;
		}
		else
		{
			return false;
		}
	}


	function result($query_id = 0, $row = 0)
	{
		return ($query_id) ? @mysql_result($query_id, $row) : false;
	}


	function fetch_assoc($query_id = 0)
	{
		return ($query_id) ? @mysql_fetch_assoc($query_id) : false;
	}


	function fetch_row($query_id = 0)
	{
		return ($query_id) ? @mysql_fetch_row($query_id) : false;
	}


	function num_rows($query_id = 0)
	{
		return ($query_id) ? @mysql_num_rows($query_id) : false;
	}


	function affected_rows()
	{
		return ($this->link_id) ? @mysql_affected_rows($this->link_id) : false;
	}


	function insert_id()
	{
		return ($this->link_id) ? @mysql_insert_id($this->link_id) : false;
	}


	function get_num_queries()
	{
		return $this->num_queries;
	}


	function get_saved_queries()
	{
		return $this->saved_queries;
	}


	function free_result($query_id = false)
	{
		return ($query_id) ? @mysql_free_result($query_id) : false;
	}


	function escape($str)
	{
		if (function_exists('mysql_real_escape_string'))
			return mysql_real_escape_string($str, $this->link_id);
		else
			return mysql_escape_string($str);
	}


	function error()
	{
		$result['error_sql'] = @current(@end($this->saved_queries));
		$result['error_no'] = @mysql_errno($this->link_id);
		$result['error_msg'] = @mysql_error($this->link_id);

		return $result;
	}


	function close()
	{
		if ($this->link_id)
		{
			if ($this->query_result)
				@mysql_free_result($this->query_result);

			return @mysql_close($this->link_id);
		}
		else
			return false;
	}
}

function error($message, $file, $line, $db_error = false)
{
	global $siteerrors;
	$s = "\t\t".'Error: <strong>'.$message.'.</strong>'."\n";
	echo $s;
}

function get_zone_name($mapid, $x, $y){
global $maps_a, $zone;

if (!empty($maps_a[$mapid]))
	{
	$zmap=$maps_a[$mapid];
	if (($mapid==0) or ($mapid==1) or ($mapid==530))
		{
		$i=0; $c=count($zone[$mapid]);
		while ($i<$c)
			{
	if ($zone[$mapid][$i][2] < $x  AND $zone[$mapid][$i][3] > $x AND $zone[$mapid][$i][1] < $y  AND $zone[$mapid][$i][0] > $y) $zmap=$zone[$mapid][$i][4];
			$i++;
			}
		}
	} else $zmap="Unknown zone";
return $zmap;
    } 

function test_realm(){
	global $server, $port;
	$s = @fsockopen("$server", $port, $ERROR_NO, $ERROR_STR,(float)0.5);
	if($s){@fclose($s);return true;} else return false;
}

function get_realm_name(){
	global $hostr, $userr, $passwordr, $dbr, $database_encoding;
	$realm_db = new DBLayer($hostr, $userr, $passwordr, $dbr);
	$realm_db->query("SET NAMES $database_encoding");
	$query = $realm_db->query("SELECT * FROM `realmlist`");
	$result = $realm_db->fetch_assoc($query);
	$realm_db->close();
	unset($realm_db);
	return($result['name']);
}



if (empty($_POST['username']) and empty($_POST['passw']) and empty($_POST['email'])) 
	{
	$cont='         <TR>
                <TD rowSpan=6><IMG height=110 
                  src="'.$img_base.'pixel.gif" width=15></TD>
                <TD vAlign=center align=left width=190><B 
                  style="FONT-SIZE: 8pt;"><LABEL 
                  for=username>'.$text["name"].':</LABEL>&nbsp;</b><BR><INPUT 
                  id=username style="WIDTH: 175px" tabIndex=1 maxLength=16 
                  size=18 name=username></TD>
                <TD rowSpan=6><IMG height=1 src="'.$img_base.'pixel.gif" width=15></TD></TR>
              <TR><TD width=190 height=1></TD></TR>
              <TR><TD width=190 height=1></TD></TR>
              <TR>
                <TD vAlign=center align=left width=190><B 
                  style="FONT-SIZE: 8pt;"><LABEL 
                  for=passw>'.$text["password"].':</LABEL>&nbsp;</B><BR><INPUT id=passw 
                  style="WIDTH: 175px" tabIndex=2 type=password maxLength=16 
                  size=18 name=passw></TD></TR>
              <TR>
                <TD vAlign=center align=left width=190><B 
                  style="FONT-SIZE: 8pt;"><LABEL 
                  for=email>E-mail:</LABEL>&nbsp;</B><BR><INPUT id=email 
                  style="WIDTH: 175px" tabIndex=2 maxLength=50 
                  size=18 name=email></TD></TR>
              <TR>
                <TD align=left>
                  <TABLE cellSpacing=0 cellPadding=0 border=0>
                    <TBODY>
                    <TR>
                      <TD><B style="FONT-SIZE: 8pt;">Burning Crusade Enabled?&nbsp</b>
		      <input type="checkbox" name="flags" value="1" checked></td>
                      <TD></TD>
                      <TD></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD align=left colSpan=3>
                  <TABLE cellSpacing=0 cellPadding=0 border=0>
                    <TBODY>
                    <TR>
                      <TD><IMG height=39 
                        src="'.$img_base.'pixel.gif" width=19></TD>
                      <TD><INPUT class=button 
                        style="WIDTH: 168px; HEIGHT: 39px" tabIndex=3 type=image 
                        alt=Create src="'.$img_base.$button.'" 
                        value=Create border=0></TD>
					</TR></TBODY></TABLE></TD></TR>';
	} 
	elseif  (empty($_POST['username']) or empty($_POST['passw']) or empty($_POST['email'])) 
	{

	$cont='<TR><TD rowSpan=6><IMG height=152 width=1 src="'.$img_base.'pixel.gif"><TD align=Center><SMALL class=error>
	'.$text["not_all"].'
	<br><br><br><br></SMALL></TD></TD></TR><br>';

	}
	else
	{
	$username = strtoupper(htmlspecialchars(trim("$_POST[username]")));
	$passw = strtoupper(trim($_POST['passw']));
	$oregon_pwd = SHA1($username.':'.$passw);
	$email = htmlspecialchars(trim($_POST['email']));
	$ip = getenv('REMOTE_ADDR');
// ñäåëàòü ïðîâåðêó íà íåïîëó÷åíèå èïà

	$realm_db = new DBLayer($hostr, $userr, $passwordr, $dbr);
	$realm_db->query("SET NAMES $database_encoding");

if ($_POST['flags'] == 1){$tbc = "1";} else {$tbc = "0";}

$uniqueuser = $realm_db->query("SELECT * FROM `account` WHERE `username` = '$username' OR `email` = '$email'") or die (mysql_error());
//check user and email
if($is_exist = mysql_num_rows($uniqueuser) > 0)
{
	$cont='<TR><TD rowSpan=6><IMG height=152 width=1 src="'.$img_base.'pixel.gif"><TD align=Center><SMALL class=error>
Username or email<br>'.$text["taken"].'
<br><br><br><br></SMALL></TD></TD></TR><br>';
        }
	else
	{
	if($realm_db->query("INSERT INTO `account` (`username`,`sha_pass_hash`,`email`,`expansion`) VALUES ('$username','$oregon_pwd','$email','$tbc')"))
		{
		$cont='<TR><TD rowSpan=6><IMG height=152 width=1 src="'.$img_base.'pixel.gif"><TD align=Center><SMALL>
'.$text["acc"].'<br><strong>'.$username.'</strong><br>'.$text["create"].'
<br><br><br><br></SMALL></TD></TD></TR><br>';
		}
}

	
	$realm_db->close();
	unset($realm_db);
	}



function make_players_array(){
	global $host, $user, $password, $db, $database_encoding, $pl_array;
$i=0;
	$mangos_db = new DBLayer($host, $user, $password, $db);
	$mangos_db->query("SET NAMES $database_encoding");
	$query = $mangos_db->query("SELECT * FROM `characters` WHERE `online`='1' ORDER BY `name`");
	while($result = $mangos_db->fetch_assoc($query))
	{
		$char_data = ($result['level']);
		$char_gender = ($result['gender']);
		$res_pos=get_zone_name($result['mapId'], $result['positionX'], $result['positionY']);

$pl_array[$i] = Array($result['name'], $result['race'], $result['class'], $char_data, $res_pos, $char_gender);
$i++;
	}
	$mangos_db->close();
	unset($mangos_db);
return $i;
}

$onlineplayers=make_players_array();

if (!$sort = &$_GET['s']) $sort=0;
if (!$flag = &$_GET['f']) $flag=0;
if ($flag==0)	{	$flag=1; $sort_type='<'; } 
		else	{	$flag=0; $sort_type='>'; }
$link=$_SERVER['PHP_SELF']."?f=".$flag."&s=";

if (!empty($pl_array)) 
	{
	usort($pl_array, create_function('$a, $b', 'if ( $a['.$sort.'] == $b['.$sort.'] ) return 0; if ( $a['.$sort.'] '.$sort_type.' $b['.$sort.'] ) return -1; return 1;'));
	}

$list="";
$i=0;
while ($i < $onlineplayers)
	{
	$name=$pl_array[$i][0];
	$race=$pl_array[$i][1];
	$class=$pl_array[$i][2];
	$res_race = $def['character_race'][$race];
	$res_class = $def['character_class'][$class];
	$lvl=$pl_array[$i][3];
	$loc=$pl_array[$i][4];
	$gender=$pl_array[$i][5];
	$list.= "
				<tr class=txt>
					<td></td>
					<td>$name</td>
					<td align='center'><img alt=$res_race src='".$img_base.$race."-$gender.gif' height='18' width='18'></td>
					<td align='center'><img alt=$res_class src='".$img_base."$class.gif' height='18' width='18'></td>
					<td align='center'>$lvl</td>
					<td >$loc</td>
				</tr>";
	$i++;
	}

if (test_realm())
	{
	$realm.=(' ('.$onlineplayers.' '.$text["playerson"].')');
	} else
	{
	$realm.=(' '.$text["off"]);
	}


// Main part !!!
?>
<HTML><HEAD><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><TITLE><?php print $title ?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=windows-1251"><LINK 
id=bnetstyle href="<?php print $img_base ?>style.css" type=text/css 
rel=stylesheet>
<SCRIPT language=javascript>
  <!--
    var styleSheet;
    var agt     = navigator.userAgent.toLowerCase();
    var appVer  = navigator.appVersion.toLowerCase();
    var verInt  = parseInt(appVer);
    var ie      = (appVer.indexOf('msie') != -1);
    var opera   = (agt.indexOf('opera') != -1);
    var mozilla = ((agt.indexOf('mozilla')!=-1) && (agt.indexOf('opera')==-1)
      && (agt.indexOf('spoofer')==-1) && (agt.indexOf('compatible') == -1)
      && (agt.indexOf('webtv')==-1) && (agt.indexOf('hotjava')==-1));
    var ns4     = (mozilla && (verInt == 4));

    if (ie && !opera) {
      document.styleSheets["bnetstyle"].addRule ("input", "background-color: #040D1A");
      document.styleSheets["bnetstyle"].addRule ("input", "border-style: solid");
      document.styleSheets["bnetstyle"].addRule ("input", "border-width: 1px");
      document.styleSheets["bnetstyle"].addRule ("input", "border-color: #7F7F7F");
      document.styleSheets["bnetstyle"].addRule ("input", "color: #FFAC04");

      document.styleSheets["bnetstyle"].addRule ("textarea", "background-color: #040D1A");
      document.styleSheets["bnetstyle"].addRule ("textarea", "border-style: solid");
      document.styleSheets["bnetstyle"].addRule ("textarea", "border-width: 1px");
      document.styleSheets["bnetstyle"].addRule ("textarea", "border-color: #7F7F7F");
      document.styleSheets["bnetstyle"].addRule ("textarea", "color: #FFAC04");

      document.styleSheets["bnetstyle"].addRule ("textarea", "scrollbar-Base-Color: #012158");
      document.styleSheets["bnetstyle"].addRule ("textarea", "scrollbar-Arrow-Color: #7F7F7F");
      document.styleSheets["bnetstyle"].addRule ("textarea", "scrollbar-3dLight-Color: #7F7F7F");
      document.styleSheets["bnetstyle"].addRule ("textarea", "scrollbar-DarkShadow-Color: black");
      document.styleSheets["bnetstyle"].addRule ("textarea", "scrollbar-Highlight-Color: black");
      document.styleSheets["bnetstyle"].addRule ("textarea", "scrollbar-Shadow-Color: #00B3FF");

      document.styleSheets["bnetstyle"].addRule ("select", "background-color: #040D1A");
      document.styleSheets["bnetstyle"].addRule ("select", "color: #FFAC04");

      document.styleSheets["bnetstyle"].addRule ("select.gray", "background-color: #040D1A");
      document.styleSheets["bnetstyle"].addRule ("select.gray", "color: #FFAC04");

      document.styleSheets["bnetstyle"].addRule ("ul.thread", "margin-left: 22px;");
    }
  //-->
  </SCRIPT>
</HEAD>
<BODY text=#cccc99 vLink=#aaaaaa link=#ffffbb bgColor=#000000 leftMargin=0 
topMargin=0 marginheight="0" marginwidth="0">
<FORM name=login_form method=post>
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD align=middle>
      <TABLE cellSpacing=0 cellPadding=0 background="<?php print $img_base ?>/backgrounds/tbc.jpg" border=0 style="background-repeat: no-repeat;">
        <TBODY>
        <TR>
          <TD vAlign=top>
            <DIV style="POSITION: relative">
            <DIV 
            style="LEFT: 130px; WIDTH: 400px; POSITION: absolute; TOP: 0px"></DIV></DIV></TD>
          <TD><IMG height=169 src="<?php print $img_base ?>pixel.gif" 
          width=1></TD>
          <TD></TD></TR>
        <TR>
          <TD><IMG height=1 src="<?php print $img_base ?>pixel.gif" 
          width=203></TD>
          <TD>
		  <TABLE cellSpacing=0 cellPadding=0 width=220 border=0>
		  <TBODY>
            <?php print $cont ?></TBODY></TABLE></TD>
          <TD><IMG height=1 src="<?php print $img_base ?>pixel.gif" 
          width=217></TD></TR>
        <TR>
          <TD colSpan=3>
            <TABLE cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD colSpan=3><IMG height=17 
                  src="<?php print $img_base ?>pixel.gif" width=1></TD></TR>
	      <TR>
                <TD width=106><IMG height=1 
                  src="<?php print $img_base ?>pixel.gif" width=106></TD>
                <TD width=410><SMALL>
			<strong class=title><center><?php print $text['realm']; echo $realmlist; ?></center></strong><br>
<strong class=title><center><?php print $realm ?></center></strong><br>

<table cellpadding='3' cellspacing='0' align='center'>
				<tbody>
<tr class=title>
			<td align='left' nowrap='nowrap' width=50></td>
			<td align='left' nowrap='nowrap' width=60><a href="<?php print $link.'0">'.$text['char'][0] ?></a></td>
			<td align='center' nowrap='nowrap' width=40><a href="<?php print $link.'1">'.$text['char'][1] ?></a></td>
			<td align='center' nowrap='nowrap' width=40><a href="<?php print $link.'2">'.$text['char'][2] ?></a></td>
			<td align='center' nowrap='nowrap' width=40><a href="<?php print $link.'3">'.$text['char'][3] ?></a></td>
			<td align='left' nowrap='nowrap' width=100><a href="<?php print $link.'4">'.$text['char'][4] ?></a></td>
				</tr>
<tr><td class='txt' align='center' colspan='6' nowrap='nowrap'><IMG height=1 src='<?php print $img_base ?>pixel.gif' width=400></td></tr>				<?php print $list ?>				
				</tbody>
</table>

                  </SMALL></TD>
                <TD width=124><IMG height=1 
                  src="<?php print $img_base ?>pixel.gif" width=124></TD></TR>
              <TR>
                <TD colSpan=3><IMG height=100 
                  src="<?php print $img_base ?>pixel.gif" 
            width=1></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></FORM></BODY></HTML>
