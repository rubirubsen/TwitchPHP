<?php 

//* PRELOAD OF IPORTANT STUFF!! *// 
session_start();
require_once("inc/func.php");
date_default_timezone_set("Europe/Berlin");
verbindungDb();


//* BOT STARTS HERE *//



$ircServer = "irc.chat.twitch.tv";
$ircPort = "6667";
$ircChannel = "rubizockt";



set_time_limit(0);
ini_set('display_errors', 'on');

$ircSocket = fsockopen($ircServer, $ircPort, $eN, $eS);

if ($ircSocket) 
{

    fwrite($ircSocket, "PASS oauth:z0m1idvt6qm11bshf3wzru26mypai6 \n");
	fwrite($ircSocket, "USER kfeemaschine \n");
    fwrite($ircSocket, "NICK kfeemaschine \n");
    fwrite($ircSocket, "JOIN #" . $ircChannel . "\n");
    echo "Verbindung hergestellt \n";
    
    while(1) 
    {
        while($data = fgets($ircSocket, 128)) 
        {
            echo($data);
            flush();
            
                       
            // Separate all data
            $exData = explode(' ', $data);
            $nachricht = explode(':', $data);
            
            $anz = count($nachricht);
            
            
            // Send PONG back to the server
            if($exData[0] == "PING") 
            {
                fwrite($ircSocket, "PONG ".$exData[1]."\n");
                echo "PONG GESENDET! \n";
            }
            
            /*Manual Commands */
            $anz = count ($nachricht);
            $username = explode('!', $exData[0]);
            $user = substr($username[0], 1);
            
            
            
            if ($anz == 3)
            
            {
                $command = str_replace(array(chr(10), chr(13)), '', $nachricht[2]);
                //echo $command. "\n";  //$command = reine Nachricht ohne prefixe !!! 
                
                if ($command == "!da")
                {
                    echo "BEFEHL: TestBefehl ERKANNT! \n";
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :Da! KonCha \n \r");
                }
				
				if ($command == ";)")
                {
                    echo "COOLER DUDE AM START!!! \n";
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :;) \n \r");
                }
                
                if ($command == "!ts3")
                {
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : Die 'Adresse' lautet rubizockt  \n \r");
                }
				
				if ($command == "!befehle")
                {
					befehle($ircSocket, $ircChannel, $user);
                }
                
				if ($command == "!lurk")
                {
					switch($user)
					{
						case 'rubizockt';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : DatSheffy   ". $user ." Nicht wundern, der Typ da im Stream ist gleich wieder da LUL \n \r");break;
						case 'kffeemaschine';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : oddDrums   ". $user ." verschwindet wie Kaffeeduft im Hintergrund, aber hat dennoch ein Auge auf euch . . . \n \r");break;
						case 'heyrandale';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PopCorn   ". $user ." verschwindet im Lurk - the sun is shining, the weather is sweet babe ;) \n \r");break;
						case 'devilkoenig';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PopCorn ". $user ." ist ab jetzt im Lurk! #KingFap PopCorn \n \r");break;
						case 'Erik_Zev';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PopCorn Auf zu neuen Höchstleistungen: ". $user ." ist ab jetzt im Lurk! Viel Spaß!! PopCorn \n \r");break;
						case 'einfahcdamian';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PopCorn JAWOLLSKI POLSKI! ". $user ." ist ab jetzt im Lurk! PopCorn \n \r");break;
						case 'schwatvogel';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : DrinkPurple  ". $user ." ist ab jetzt im Lurk! Bring' Bier mit, wenn du wieder kommst! DrinkPurple \n \r");break;
						case 'kampfkotze';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : SoonerLater  ". $user ." rollt langsam mit dem Stuhl ins Dunkle - er lurkt! SoonerLater  \n \r");break;
						case 'gyrosgeier';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : DatSheffy   ". $user ." Beep! Bop! Beep! 11000111100011 = Bis später, Simon <3 \n \r");break;
						case 'tunzie95';
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : LUL ". $user ." Weg isser, hadde habibi! \n \r");break;
						default;
							fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PopCorn ". $user ." ist ab jetzt im Lurk! See ya!! PopCorn \n \r");break;
					}
				}
				
                if($command == "!zeit")
                {
                    $timestamp = time();
                    $uhrzeit = date("H:i",$timestamp);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :" . $user . ", es ist nun ".$uhrzeit." Uhr \n \r");
                }
                
                if($command == "!datum")
                {
                    $timestamp = time();
                    $datum = date("d.m.Y",$timestamp);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :" . $user . ", heute ist der ".$datum.". \n \r");
                }
                
				if($command == "!hype")
                {               
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype TwitchUnity rubizoHype \n \r");
                }
				
				if($command == "!lautlos")
                {               
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : Falls ihr den Stream lautlos stellen möchtet, macht das bitte über den Tab im Browser (Rechtsklick-Tab stummschalten) anstatt direkt im Stream. Somit werdet ihr weiter als Viewer aufgeführt und helft euren Lieblingsstreamern ;) \n \r");
                }				
				
                if ($command == "!kaffeeBitte")
                {
					kaffeeBitte($ircSocket, $ircChannel, $user);
                }
                
                if ($command == "!discord")
                {
                    echo "BEFEHL: !DISCORD ERKANNT! \n";
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : PurpleStar " . $user ." - https://discord.gg/f4QwWb2 PurpleStar \n \r");
                }
                
                if ($command == "!insta")
                {
                    echo "BEFEHL: !INSTA ERKANNT! \n";
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : TTours " . $user ." - https://instagram.com/rubizockt/ TTours \n \r");
                }
                
                if ($command == "!werbung")
                {
                    werbung($ircSocket, $ircChannel, $user);
                }
				
				 if ($command == "!liga")
                {
                    liga($ircSocket, $ircChannel, $user);
                }
                
                if ($command == "!kaffee")
                {
                    echo "BEFEHL: !koffein ERKANNT! \n \r";
                    
                    $sql = "select za_kaffee from t_zaehler" ;
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $kaff = intval($ds['za_kaffee']);
                    echo $kaff. "\n \r";
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me CoffeeTime Rubi hat schon ". $kaff ." Kaffee getrunken CoffeeTime \n \r");
                }
                
				if ($command == "!aktuell")
				{
					RubiZockt($ircSocket, $ircChannel, $user);
				}
				
                if ($command == "!kaffee+")
                {
                    $sql = "select za_kaffee from t_zaehler" ;
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $kaff = intval($ds['za_kaffee']);
                    $kaff++;
                    $sql2 = "UPDATE `t_zaehler` SET `za_kaffee`='" . $kaff . "'";
                    $abf=gisql_query($sql2);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me CoffeeTime Anzahl auf ". $kaff ." Kaffee erhöht CoffeeTime \n \r");
                }
                
                if ($command == "!wins")
                {
                    wins($ircSocket, $ircChannel, $user);
                }
                                
                if ($command == "!queue")
                {
                    queue($ircSocket, $ircChannel, $user);
                }
                
                if ($command == "!musik")  //NOCH NICHT IN FUNKTION//
                {
                    TrackInfo($user,$ircSocket,$ircChannel);
                }
                
                if ($command == "!winAdd")
                {
                    winAdd($ircSocket,$ircChannel,$user);
                }
                
				if ($command == "!streamdauer")
				{
					streamdauer($ircSocket, $ircChannel, $user);
				}
				
                if ($command == "!winDel")
                {
                    winDel($ircSocket,$ircChannel);
                }
                
                if ($command == "!kaffee-")
                {
                    $sql = "select za_kaffee from t_zaehler" ;
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $kaff = intval($ds['za_kaffee']);
                    $kaff--;
                    $sql2 = "UPDATE `t_zaehler` SET `za_kaffee`='" . $kaff . "'";
                    $abf=gisql_query($sql2);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me CoffeeTime Anzahl auf ". $kaff ." Kaffee gesenkt CoffeeTime \n \r");
                }
                
                if ($command == "!keinKaffee")
                {
                    $sql = "select za_kaffee from t_zaehler" ;
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $kaff = 0;
                    
                    $sql2 = "UPDATE `t_zaehler` SET `za_kaffee`='" . $kaff . "'";
                    $abf=gisql_query($sql2);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :/me CoffeeTime Anzahl auf ". $kaff ." Kaffee eingestellt CoffeeTime \n \r");
                }
                
                if ($command == "!dabei")
                {
                    $sql="SELECT be_follow_date FROM t_benutzer WHERE be_name='".$user."'";
                    $abf= gisql_query($sql);
                    
                    $ds = gisql_fetch_array($abf);
                    $be_follow_date = $ds['be_follow_date'];
                    
                    $jahr=substr($ds['be_follow_date'],0,4);
                    $monat=substr($ds['be_follow_date'],5,2);
                    $tag=substr($ds['be_follow_date'],8,2);
                    $zeit=substr($ds['be_follow_date'],11,5);
                    $datum = $tag.".".$monat.".".$jahr;
                    
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : ".$user.", Du folgst seit: " . $datum ." \n \r");
                    
                }
                
                if(preg_match("/cool/", $command)) 
                {
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :CoolCat CoolCat CoolCat \n \r");
                    echo "\033[31mICH \033[33mBIN \033[32mCOOL!! \033[0m \n";
                }
                
                if(preg_match("/gute nacht/", $command)) 
                {
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :Gute Nacht - ".$user." - bis zum nächsten Mal TwitchUnity HeyGuys \n \r");
                    echo "\033[31mICH \033[33mBIN \033[32mCOOL!! \033[0m \n";
                }
                
                if(preg_match("/Bot/", $command)) 
                {
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :MrDestructoid MrDestructoid Hier gibt es keine Bot's MrDestructoid  MrDestructoid \n \r");
                    echo "\033[31m WORT \033[0m BOT \033[31m ERKANNT - ANTWORT ABGESENDET! \033[0m \n";
                    break;
                }
                
                if(preg_match("/^!musikwunsch/", $command))
                {
                    musikwunsch($ircSocket, $ircChannel, $user);
                }
                
                if (preg_match("/^!so/", $command))
                {
                    if($user == "rubizockt")
                    {
                    $user = substr($command, 4);
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :Shoutout an http://www.twitch.tv/".$user." | Folgt da mal rein! \n \r");
                    }
                    else
                    {
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :Shoutout an http://www.twitch.tv/".$user." | Folgt da mal rein! \n \r");
                    }
                }
                
                
                if (preg_match("/^!addUser/", $command))
                {
                    if ($user == "rubizockt")
                    {
                    $user2 = substr($command, 4);
                    $follow_date = explode(" ",$user2, 2);
                    $sql="INSERT INTO `t_benutzer` (`be_id`, `be_name`, `be_follow_date`) VALUES (NULL, '".$exData[4]."', '".$exData[5]."')";
                    $abf=gisql_query($sql);
                    
                    var_dump($exData[4]);
                    var_dump($exData[5]);
                    }
                    else
                    {
                        fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :Nope! LUL  \n \r");
                        break;
                    }
                }
                
                if(preg_match("/kfeemaschine/", $command)) 
                {
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " :KonCha  \n \r");
                    echo "\033[31m WORT \033[0m KFEEMASCHINE \033[31m ERKANNT - ANTWORT ABGESENDET! \033[0m \n";
                }
                
                if(preg_match_all('~\b(hi|hallo|hey|hello|moin)\b~i', $command, $matches))  //preg_match_all sucht alle Worte
                {
                    fwrite($ircSocket, "PRIVMSG #". $ircChannel . " : HeyGuys HeyGuys " . $user . " HeyGuys HeyGuys \n \r");
                    echo " *** " . $user . " begrüßt! *** \n \r" ;
                }
            }
        }
		
		
    }
} else 
    {
        echo $eS . ": " . $eN;
    }


?>

