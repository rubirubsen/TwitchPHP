<?php 
include ("_gidb_mysqli.inc.php");


function verbindungDb()
{
		$db=gisql_pconnect("127.0.1","root","p4tr1ckk");
		gisql_set_charset("utf8",$db);
		gisql_select_db("twitchBot",$db);	
}

function werbung($ircSocket, $ircChannel, $user)
{
	fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PurpleStar " . $user ." - https://discord.gg/f4QwWb2 PurpleStar \n \r");
}

function liga($ircSocket, $ircChannel, $user)
{
	fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PurpleStar " . $user ." - Der F1 2020 Weekend-League-Code lautet: CM#_GPBQJ98 PurpleStar \n \r");
}

function streamdauer($ircSocket, $ircChannel, $user)
{
fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me PurpleStar " . $user ." PurpleStar DU ENTSCHEIDEST WIE LANGE RUBI STREAMT: Für jeden Follow gibt es 1 Minute on Top! T1Sub - 10 min // T2 Sub - 20 min // T3 Sub - 30 min // 100 Bits - 6 Minuten // 1€ - 6 Minuten. Falls Hosts oder Raids reinkommen verlängert jeder Zuschauer den Stream um eine Minute. Vorraussetzung dafür sind mindestens 10 Teilnehmer pro Raid/Host. SeemsGood \n \r");
}


function koffein()
{
	
}

function kaffeeBitte($ircSocket, $ircChannel, $user)
{
	echo "BEFEHL: !kaffeeBitte ERKANNT! \n";
    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me macht eine frische Tasse CoffeeTime für " . $user . " \n \r");
}

function aktuell($ircSocket, $ircChannel, $user)
{
	echo "BEFEHL: !aktuell ERKANNT! \n";
    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :@".$user." - Rubi bastelt gerade an einem Verzeichniss für Kaninchen, Ihre Halter und ihre Züchter. Das Mikro ist aus, damit er sich besser fokussieren kann und voran kommt. Genieß' die Musik und falls du etwas bestimmtes hören magst, nutz doch die Rubicons ;-) SeemsGood \n \r");
}

function queue($ircSocket, $ircChannel, $user)
{
	echo "BEFEHL: !queue ERKANNT! \n";
    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :@".$user." - https://songify.rocks/queue.php?id=bb2e94d4-deb2-48dc-af38-4cd3d351c1b1 SeemsGood \n \r");
}

function musikwunsch($ircSocket, $ircChannel, $user)
{
	echo "BEFEHL: !aktuell ERKANNT! \n";
    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :@".$user." - Du kannst dir Songs wünschen , indem du einfach Deine Rubicons einlöst und 'Künstler - Titel' in das Textfeld schreibst SeemsGood \n \r");
}

function wins($ircSocket, $ircChannel, $user)
{
	echo "BEFEHL: !WINS ERKANNT! \n \r";
                    $sql = "select za_win from t_zaehler" ;
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $win = intval($ds['za_win']);
                    echo $win. "\n \r";
					if ($user == "rubizockt")
					{
                    	fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me HSWP  Du hast schon ". $win ."x alle Spieler überlebt HSWP  \n \r");
					}
					else
					{
						fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me HSWP  @".$user." | Rubi hat schon ". $win ."x alle Spieler überlebt HSWP  \n \r");
					}
}

function winAdd($ircSocket,$ircChannel,$user)
{
	$sql = "select za_win from t_zaehler" ;
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $wins = intval($ds['za_win']);
                    if ($user == "rubizockt")
					{
					$wins++;
                    $sql2 = "UPDATE `t_zaehler` SET `za_win`='" . $wins . "'";
                    $abf=gisql_query($sql2);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me SeemsGood Anzahl auf ". $wins ." Wins erhöht SeemsGood \n \r");
					}
					else
					{
					fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me Leider hast du das nicht zu entscheiden ... Kappa \n \r");
					}
}

function winDel($ircSocket,$ircChannel)
{
	$sql = "select za_win from t_zaehler" ;
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $wins = intval($ds['za_win']);
                    $wins--;
                    $sql2 = "UPDATE `t_zaehler` SET `za_win`='" . $wins . "'";
                    $abf=gisql_query($sql2);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me SeemsGood Anzahl auf ". $wins ." Wins gesenkt SeemsGood \n \r");
}


function SpotAuth()
{
$url = "https://accounts.spotify.com/api/token";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Authorization: Basic N2EwMzE3MTliNTUwNDY1YmJiYmVlNTE2MDFhODBmYmY6N2E4OTU1ZTgyNzkwNDViMjg4MWE5ZmNiMzQwMWFhNGM=",
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "grant_type=client_credentials";		

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);



//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$myJSON = json_decode($resp, true);

curl_close($curl);
var_dump($myJSON);
$token = $myJSON['access_token'];
$token_type = $myJSON['token_type'];
$exp = $myJSON['expires_in'];
$scope = $myJSON['scope'];
$GLOBALS['access_token'] = $token;
echo "<br><br>";
echo "<hr>";
echo "access token: ".$token;
echo "<br><br>";
echo "token type: ".$token_type;
echo "<br><br>";
echo "expires in: ".$exp;
echo "<br><br>";
echo "scopes: ".$scope;
$access_token = $token;
}


function TrackInfo($user,$ircSocket,$ircChannel)
{
	$access_token="";
	$refresh_token="";
	$client_id = "7a031719b550465bbbbee51601a80fbf";
	$client_secret = "7a8955e8279045b2881a9fcb3401aa4c";
	$redirect_uri = "http://192.168.0.16/spotify/testlabor.php";
	$code = "";
	
	$url = "https://api.spotify.com/v1/me/player?market=ES&additional_types=episode";

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$headers = array(
	   "Accept: application/json",
	   "Content-Type: application/json",
	   "Authorization: Bearer BQA7WPLAD4onwCiEHEzak5n8Yi95elmpKdUvnjwzeZn4kudAOxX5uR4ZohjAPxagmt2fOLsFdAuK1Arv_YbDEAj--89D7R6mtvoGmEklY0mBj2ik7uSaz91pt8E4U23FRgE60tNNoZ0ZQsfP7lB4WYQGmg",
	);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	//for debug only!
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$resp = curl_exec($curl);
	curl_close($curl);
	//var_dump($resp);
	$myJSON = json_decode($resp, true);

	fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :@".$user.": SingsNote ".($myJSON['item']['artists']['0']['name'])." - ".($myJSON['item']['name'])." SingsNote  🔈".($myJSON['device']['volume_percent'])." % \n \r");
}

function obtainRefresh($client_id,$client_secret,$code,$redirect_uri)
{
	$url = "https://accounts.spotify.com/api/token";

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$headers = array(
	   "Content-Type: application/x-www-form-urlencoded",
	);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	$data = "client_id=".$client_id."&client_secret=".$client_secret."&grant_type=authorization_code&code=".$code."&redirect_uri=".$redirect_uri;

	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

	//for debug only!
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$resp = curl_exec($curl);
	curl_close($curl);
	$myJSON = json_decode($resp, true);
	
	//var_dump($myJSON);
	
	$token = $myJSON['access_token'];
	$token_type = $myJSON['token_type'];
	$exp = $myJSON['expires_in'];
	$refresh = $myJSON['refresh_token'];
	$scope = $myJSON['scope'];
	
	// echo "<br><br>";
	// echo "<hr>";
	// echo "access token: ".$token;
	// echo "<br><br>";
	// echo "token type: ".$token_type;
	// echo "<br><br>";
	// echo "expires in: ".$exp;
	// echo "<br><br>";
	// echo "refresh_token: ".$refresh;
	// echo "<br><br>";
	// echo "scopes: ".$scope;
	// echo "<br><br>";
}

function RubiZockt($ircSocket, $ircChannel, $user)
{

	$url = "https://api.twitch.tv/kraken/search/channels?query=RubiZockt";

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$headers = array(
					   "Accept: application/vnd.twitchtv.v5+json",
					   "Client-ID: o2aamy4s11aewdlmkb9vj4w11vzanv",
					);
					
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	
	//for debug only!
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$resp = curl_exec($curl);
	curl_close($curl);
	$myJSON = json_decode($resp, true);
	fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me ➠ ".($myJSON['channels']['0']['game'])." ◆ Rubi hat momentan ".($myJSON['channels']['0']['followers'])." Follower und hätte gerne 300! - ♥ ".($myJSON['channels']['0']['views'])." Views ♥ - ◼ ".($myJSON['channels']['0']['status'])." ◼ \n \r");

}

function befehle($ircSocket, $ircChannel, $user)
{
	$sql = "SELECT * FROM t_kommandos";
	$abf = gisql_query($sql);
	
    $anz = mysqli_num_rows($abf);
	
	for($i="0";$i<$anz;$i++)
	{
		$ds = gisql_fetch_array($abf);
		fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :".$ds['ko_name']." - ".$ds['ko_befehl']."\n \r");
	}
}
?>