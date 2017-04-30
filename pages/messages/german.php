<?PHP
/**
 * Streamers Admin Panel
 *
 * Originally written by Sebastian Graebner <djcrackhome>
 * Fixed and edited by David Schomburg <dave>
 *
 * The Streamers Admin Panel is a web-based administration interface for
 * Nullsoft, Inc.'s SHOUTcast Distributed Network Audio Server (DNAS),
 * and is intended for use on the Linux-distribution Debian.
 *
 * LICENSE: This work is licensed under the Creative Commons Attribution-
 * ShareAlike 3.0 Unported License. To view a copy of this license, visit
 * http://creativecommons.org/licenses/by-sa/3.0/ or send a letter to
 * Creative Commons, 444 Castro Street, Suite 900, Mountain View, California,
 * 94041, USA.
 *
 * @author     Sebastian Graebner <djcrackhome@streamerspanel.com>
 * @author     David Schomburg <dave@streamerspanel.com>
 * @copyright  2009-2012  S. Graebner <djcrackhome> D. Schomburg <dave>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-ShareAlike 3.0 Unported License
 * @link       http://www.streamerspanel.com
 */


$messages["admsrv_1"] = "Server Newssystem";
$messages["admsrv_2"] = "Newssystem Ein";
$messages["admsrv_3"] = "Newssystem Aus";
$messages["admsrv_4"] = "Server Newssystem f&uuml;r Serverstatus";

$messages["admsrv_5"] = "Befehle ausf&uuml;hren als";
$messages["admsrv_6"] = "ssh2";
$messages["admsrv_7"] = "shellexec";
$messages["admsrv_8"] = "ssh2 oder shellexec verwenden";

$messages["admsrv_9"] = "Server News";
$messages["admsrv_10"] = "Ein";
$messages["admsrv_11"] = "Aus";
$messages["admsrv_12"] = "Server Nachrichten auf der Startseite anzeigen";



//
//
//	General Variables
$messages["g01"]		=   "SAP 3.4.2";
$messages["g0"]		=		"Streamers Admin Panel - ".$messages["g01"]."";
$messages["g1"]		=		"Es konnte keine Verbindung zur Datenbank hergestellt werden!";
$messages["g2"]		=		"Die Datenbank wurde nicht gefunden!";
$messages["g3"]		=		"Seite nicht gefunden, bitte Administrator Informieren";
$messages["g4"]		=		"Nachrichten konnten nicht geladen werden!";
$messages["g5"]		=		"Einstellungen konnten nicht geladen werden!";
//
//
//  ./install.php
$messages["i0"]		=		"SAP AFTER INSTALL GREETINGS MESSAGE ";                                                     ///////////////// MUST BE EDIT
$messages["i1"]		=		"Keine Verbindung zur Datenbank!";
$messages["i2"]		=		'MySQL: notices konnte nicht angelegt werden!';
$messages["i3"]		=		'MySQL: servers konnte nicht angelegt werden!';
$messages["i4"]		=		'MySQL: settings konnte nicht angelegt werden!';
$messages["i5"]		=		'MySQL: users konnte nicht angelegt werden!';
$messages["i6"]		=		'MySQL: notices Inhalt kann nicht eingef&uuml;gt werden!';
$messages["i7"]		=		'MySQL: notices Inhalt kann nicht eingef&uuml;gt werden!';
$messages["i7"]		=		'MySQL: settings Inhalt kann nicht eingef&uuml;gt werden!';
$messages["i8"]		=		'MySQL: userInhalt kann nicht eingef&uuml;gt werden!';
$messages["i9"]		=		'Installation erfolgreich! install.php l&ouml;schen, database.php auf 444 setzen! Zum Panel';
$messages["i10"]	=       'Installation vom Streamers Panel 3.5 Shoutcast2';
$messages["i11"]	=		'INSTALLATION';
$messages["i12"]	=		'Viel Spaß!';
$messages["i13"]	=		'PHP Erweiterungen:';
$messages["i14"]	=		'SSH2 nicht gefunden!';
$messages["i15"]	=		'SSH2 OK';
$messages["i14-1"]	=		'Shellexec nicht gefunden!';
$messages["i15-1"]	=		'Shellexec OK';
$messages["i14-2"]	=		'Sudo nicht gefunden!';
$messages["i15-2"]	=		'Sudo OK';
$messages["i16"]	=		'MySql nicht gefunden!';
$messages["i17"]	=		'MySql Ok';
$messages["i18"]	=		'PHP safe mode off!';
$messages["i19"]	=		'PHP safe mode off';
$messages["i20"]	=		'upload_max_filesize zu gering!';
$messages["i21"]	=		'upload_max_filesize OK';
$messages["i22"]	=		'Datei database.php OK';
$messages["i23"]	=		'Datei database.php besitzt nicht die erforderlichen Rechte!';
$messages["i24"]	=		'Ordner Zugriffsrecht OK';
$messages["i25"]	=		'Ordner Zugriffsrecht "page" OK!';
$messages["i26"]	=		'Ordner Zugriffsrecht "temp" OK!';
$messages["i26-1"]	=		'Ordner Zugriffsrecht "logs" OK!';
$messages["i27"]	=		'Ordner Zugriffsrecht "pages" FALSCH ';
$messages["i28"]	=		'Ordner Zugriffsrecht "temp" FALSCH';
$messages["i28-1"]	=		'Ordner Zugriffsrecht "logs" FALSCH';
$messages["i28-2"]	=		'Ordner Zugriffsrecht "bitratecontrol" OK!';
$messages["i28-3"]	=		'Ordner Zugriffsrecht "bitratecontrol" FALSCH';
$messages["i28-4"]	=		'Ordner Zugriffsrecht "uploads" OK!';
$messages["i28-5"]	=		'Ordner Zugriffsrecht "uploads" FALSCH';
$messages["i29"]	=		'Information';
$messages["i30"]	=		'User IP';
$messages["i31"]	=		'Server IP';
$messages["i32"]	=		'Panel Version';
$messages["i33"]	=		'Wilkommen zur Installation von Streamers Admin Panel '.$messages["g01"].'';
$messages["i34"]	=		'Vor der Installation bitte pr&uuml;fen ob folgende Erweiterungen auf dem Server installiert sind:';
$messages["i35"]	=		'PHP Version 5.3 mit der Konfiguration (safe_mode=&quot;off&quot;)';
$messages["i36"]	=		'SSH2 als PHP extension';
$messages["i36-1"]	=		'IonCube Loader als PHP extension';
$messages["i37"]	=		'PHP auf Apache Server';
$messages["i38"]	=		'Linux Server (Debian 6 Squeeze empfohlen)';
$messages["i39"]	=		'Linux: &quot;GNU C Library&quot; (glibc) auf einer 32 Bit Umgebung mit Version 6 oder neuer';
$messages["i40"]	=		'Linux: Sudo wird ben&ouml;tigt';
$messages["i41"]	=		'MySQL Datenbank Server';
$messages["i42"]	=		'Hinweis';
$messages["i43"]	=		'In dieser Box, erhalten Sie Informationen zur Bedinung';
$messages["i44"]	=		'MySQL Kofiguration';
$messages["i45"]	=		'MySQL Server';
$messages["i46"]	=		'Url MySQL Server (localhost)';
$messages["i47"]	=		'MySQL Benutzername';
$messages["i48"]	=		'MySql Datenbank User';//Username of MySQL
$messages["i49"]	=		'MySQL Passwort';//MySQL Paswort
$messages["i50"]	=		'Datenbankname';
$messages["i51"]	=		'Mysql Datenbankname';// Database Name for MySQL
$messages["i52"]	=		'Admin Account';
$messages["i53"]	=		'Admin Benutzername';
$messages["i54"]	=		'Admin Benutzername f&uuml;r Panel';//Enter Admin Username for Panel
$messages["i55"]	=		'Admin Paswort';
$messages["i56"]	=		'Admin Benutzerpasswort';//Enter Admin Password for Panel
$messages["i57"]	=		'Server Einstellungen';
$messages["i58"]	=		'Server Pfad zum Panel';
$messages["i59"]	=		'Server Pfad zum Panel';//The full path the Panel is located
$messages["i60"]	=		'IP oder Domain vom Server';
$messages["i61"]	=		'IP oder Domain vom Server';// The IP or Domain of this Server
$messages["i62"]	=		'Server Name';
$messages["i63"]	=		'Name des Servers';
$messages["i64"]	=		'SSH Verbindungs Einstellung';
$messages["i65"]	=		'SSH Benutzername';

$messages["i67"]	=		'SSH Passwort';
$messages["i68"]	=		'SSH Port';
$messages["i69"]	=		'Sprache';
$messages["i70"]	=		'SAP Sprache';
$messages["i71"]	=		'Sprache der Benutzeroberfläche';
$messages["i172"]	=		'Überprüfung der Vorraussetzung zur Installation';
$messages["i66"]	=		'SSH / Shellexec Benutzername';// SSH USERNAME
$messages["i666"]	=		'SSH / Shellexec Benutzerpasswort';// SSH USERNAME

$messages["i73"]	=		'IonCube Loader nicht gefunden!';
$messages["i73-1"]	=		'IonCube Loader Ok';

$messages['install_allow_usage_statistics_label'] = 'Nutzungsstatistiken senden';
$messages['install_allow_usage_statistics_description'] = 'Sie helfen uns sehr, wenn sie uns diese Informationen zur Verfuegung stellen.';
$messages['install_sc_serv_rights_checked'] = 'Dateirechte sc_serv.bin OK';
$messages['install_sc_serv_rights_failed'] = 'Dateirechte pruefen files/linux/sc_serv.bin!';
$messages['install_sc_trans_rights_checked'] = 'Dateirechte sc_trans.bin OK';
$messages['install_sc_trans_rights_failed'] = 'Dateirechte pruefen file/linux/sc_trans.bin!';
$messages['install_post_max_size_checked'] = 'post_max_size OK';
$messages['install_post_max_size_failed'] = 'post_max_size zu gering > 20M';
$messages['issh1'] = "SSH methode w&auml;hlen";
$messages['issh2'] = "Bitte w&auml;hlen Sie";
$messages['issh3'] = "ssh2";
$messages['issh4'] = "shellexec";
$messages['issh5'] = "SSH oder Shellexec Zugang w&auml;hlen";



//
//
//	./index.php
$messages["1"]		=		"Die Logindaten wurden nicht korrekt eingegeben!";
$messages["2"]		=		"Der Captcha Code wurde nicht korrekt eingegeben!";
$messages["3"]		=		"Sie wurden erfolgreich von dem Panel ausgeloggt!";
$messages["4"]		=		"Benutzeranmeldung";
$messages["5"]		=		"<b>Bitte benutzen Sie das folgende Loginfeld um Ihre Identit&auml;t festzustellen!</b>";
$messages["6"]		=		"Login";
$messages["7"]		=		"Benutzername";
$messages["8"]		=		"Ihr pers&ouml;nlicher Benutzername";
$messages["9"]		=		"Passwort";
$messages["10"]		=		"Ihr pers&ouml;nliches Passwort";
$messages["11"]		=		"Captcha Eingabe";
$messages["12"]		=		"Anmelden";
$messages["13"]		=		"Zur&uuml;cksetzen";
$messages["14"]		=		"Weblogin";
//
//
//	./content.php
$messages["15"]		=		"Sie wurden erfolgreich mit Ihren pers&ouml;nlichen Daten angemeldet";
$messages["16"]		=		"Das Installationsverzeichnis des Panels befindet sich noch im Webverzeichnis";
$messages["17"]		=		"Sie k&ouml;nnen keine Administrationsseiten aufrufen, ohne Administrator-Rechte";
$messages["18"]		=		"Die Nachricht mit der ID " . (isset($_GET['delmessid']) ? $_GET['delmessid'] : null) ." wurde erfolgreich aus der Datenbank gel&ouml;scht";
$messages["19"]		=		"Die Nachricht mit der ID ". (isset($_GET['delmessid']) ? $_GET['delmessid'] : null) ." konnte nicht aus der Datenbank gel&ouml;scht werden";
$messages["20"]		=		"Sie sind angemeldet als";
$messages["21"]		=		"Abmelden";
$messages["22"]		=		"Herzlich Willkommen";
$messages["23"]		=		"Sie haben keine neue Nachrichten";
$messages["24"]		=		"Sie haben";			//	Sie haben 'eine' neue Nachricht
$messages["25"]		=		"neue Nachricht";
$messages["26"]		=		"Sie haben";			//	Sie haben 'zwei' neue Nachrichten
$messages["27"]		=		"neue Nachrichten";
$messages["28"]		=		"Benutzeransicht";
$messages["add28"]	=		"DJ-Ansicht";
$messages["29"]		=		"Hauptmenu";
$messages["30"]		=		"server, seite und stream";
$messages["31"]		=		"Nachrichtencenter";
$messages["32"]		=		"Öffentliche Server";
$messages["33"]		=		"Meine Kontoeinstellungen";
$messages["add33"]	=   	"Benutzer AutoDJ anlegen";
$messages["34"]		=		"Eigene Radioserver";
$messages["add34"]	=		"Radioserver";
$messages["35"]		=		"AutoDJ";
$messages["36"]		=		"autodj, dj, playlist, mp3s";
$messages["37"]		=		"MP3 Upload, Playlist";
$messages["38"]		=		"AutoDJ Einstellungen";
$messages["39"]		=		"Administration";
$messages["40"]		=		"server und zugriff";
$messages["41"]		=		"Servereinstellungen";
$messages["42"]		=		"Radioserver Konfiguration";
$messages["43"]		=		"Benutzerkonten";
$messages["nws1"]   =       "Server News";
$messages["44"]		=		"Informationen";
$messages["45"]		=		"Loginname und Servername";
$messages["46"]		=		"Benutzername";
$messages["47"]		=		"Servername";
$messages["48"]		=		"Version";
$messages["49"]		=		"Bitte Playlist leeren und dann Daten einf&uuml;gen"; 	// not used anymore, xml error on output
$messages["49-1"]	=		"Support";

$messages["565"]	=		"Webtools";
$messages["566"]	=		"Streambox, usw.";
$messages["567"]	=		"Servername";
$messages["568"]    =       "Streambox Gernerator";
$messages["569"]    =       "Webplayer";
//
//
//	./messages.php
$messages["50"]		=		"Keine Nachricht ausgew&auml;lt!";
$messages["51"]		=		"Eine Nachricht von";
$messages["52"]		=		"Betreff";
$messages["53"]		=		"Mitteilung";
//
//
//	./pages/account_bottom.php
$messages["54"]		=		"Benutzerdaten und Kontoinformationen";
$messages["55"]		=		"Benutzen Sie diese Seite um Ihre Informationen zu Ihrem Benutzerkonto zu editieren, oder etwas nachzuschauen. Diese Informationen teilen Sie mit dem Administrator dieses Panels. Nur dieser kann Ihre Informationen aufrufen. Sie haben aber auch die M&ouml;glichkeit Ihr pers&ouml;nliches Passwort zu &auml;ndern. Sie k&ouml;nnen jederzeit Ihre Informationen nach Belieben &auml;ndern.";
$messages["56"]		=		"Benutzer Infos";
$messages["57"]		=		"Hier k&ouml;nnen Sie Ihre pers&ouml;nlichen Informationen, sowie auch Ihr pers&ouml;nliches Passwort &auml;ndern.";
$messages["58"]		=		"Einstellungen der pers&ouml;nlichen Daten Ihres Benutzerkontos";
$messages["59"]		=		"Benutzername";
$messages["60"]		=		"Ihr Benutzername auf diesem Panel";
$messages["61"]		=		"Kennwort";
$messages["62"]		=		"Ihr aktuelles Passwort";
$messages["63"]		=		"Wiederholung";
$messages["64"]		=		"Nur bei &Auml;nderung wiederholen";
$messages["65"]		=		"Benutzer Level";
$messages["66"]		=		"Ihr Benutzerstatus in diesem Panel";
$messages["67"]		=		"Vorname";
$messages["68"]		=		"Ihr Vorname";
$messages["69"]		=		"Nachname";
$messages["70"]		=		"Ihr Nachname";
$messages["71"]		=		"E-Mail Adresse";
$messages["72"]		=		"Ihr angegebene E-Mail Adresse";
$messages["73"]		=		"Telefonnummer";
$messages["74"]		=		""; //Eine Festnetznummer unter der man Sie erreichen kann
$messages["75"]		=		"Handynummer";
$messages["76"]		=		"";   //Eine Mobilfunknummer unter der man Sie erreichen kann
$messages["77"]		=		"Alter";
$messages["78"]		=		"";//Ihr Alter f&uuml;r Statistikzwecke
$messages["79"]		=		"Admin Notes";
$messages["80"]		=		""; //Notierungen vom Administrator des Panels
$messages["81"]		=		"&Auml;ndern";
$messages["82"]		=		"Bitte &uuml;berpr&uuml;fen Sie die Eingabe der Passw&ouml;rter, diese stimmen nicht &uuml;berein";
$messages["83"]		=		"Zur &Auml;nderung des Passworts, m&uuml;ssen Sie dies im zweiten Passwort Feld wiederholen";
$messages["84"]		=		"Ihre Benutzerdaten wurden erfolgreich in die Datenbank &uuml;bertragen";
$messages["85"]		=		"Ihre Benutzerdaten konnten nicht erfolgreich &uuml;bertragen werden";
//
//
//	./pages/admradio_bottom.php
$messages["86"]		=		"Konfiguration der Shoutcast Server auf diesem Server";
$messages["87"]		=		"Hier haben Sie die M&ouml;glichkeit Shoutcast Server zu erstellen, bearbeiten, und zu l&ouml;schen. Diese Server k&ouml;nnen Sie auf einen beliebigen Benutzer dieses Panels registrieren. Falls Sie sich entscheiden den Benutzer sp&auml;ter zu &auml;ndern k&ouml;nnen Sie den Server ganz einfach editieren. Hier haben Sie auch die M&ouml;gleichkeit einen AutoDJ, dem Server hinzuzuf&uuml;gen, oder auch zu entziehen.";
$messages["88"]		=		"Shoutcast Server";
$messages["89"]		=		"Hier k&ouml;nnen Sie einen Shoutcast Server erstellen, bearbeiten, oder ganz einfach neustarten.";
$messages["90"]		=		"Kunde des Servers";
$messages["91"]		=		"Port";
$messages["92"]		=		"Speicherplatz";
$messages["93"]		=		"Neuer Server";
$messages["94"]		=		"Es sind keine Server auf Ihren Benutzernamen zugeteilt!";
$messages["95"]		=		"L&ouml;schen";
$messages["96"]		=		"Neustarten";
$messages["97"]		=		"Einstellen";
$messages["98"]		=		"Neuer Shoutcast Server erstellen";
$messages["99"]		=		"Servereinstellungen dieses Panels";
$messages["100"]	=		"Server Kunde";
$messages["101"]	=		"Name des Server-Kunden";
$messages["102"]	=		"Admin Passwort";
$messages["103"]	=		"changeme";
$messages["104"]	=		"Administrator Password des Streams";
$messages["105_pre"]=		"Passwort";
$messages["105"]	=		"Sendepasswort des Streams";
$messages["106"]	=		"Server Port";
$messages["107"]	=		"Der Port des Shoutcast Streams";
$messages["108"]	=		"Maximale Zuh&ouml;rer";
$messages["109"]	=		"Maximale Zuh&ouml;rerzahl";
$messages["110"]	=		"Streambitrate";
$messages["111"]	=		"Maximale Bitrate";
$messages["112"]	=		"&Ouml;ffentlich-Panel";
$messages["113"]	=		"Server im Panel anzeigen";
$messages["114"]	=		"AutoDJ";
$messages["115"]	=		"Eingeschaltet";
$messages["116"]	=		"Ausgeschaltet";
$messages["117"]	=		"Status f&uuml;r den AutoDJ f&uuml;r den Stream";
$messages["118"]	=		"Webspace (MB)";
$messages["119"]	=		"Webspeichers f&uuml;r den AutoDJ (in MB)";
$messages["120"]	=		"Traffic (MB)";
$messages["121"]	=		"Trafficbegrenzung des Servers";
$messages["122"]	=		"Logfile";
$messages["123"]	=		"Speicherort der Logfiles";
$messages["124"]	=		"Realtime";
$messages["125"]	=		"Streaminfos ausgegeben werden";
$messages["126"]	=		"Screenlog";
$messages["127"]	=		"Loginhalt wird in der Anzeige angezeigt";
$messages["128"]	=		"ShowLastSongs";
$messages["129"]	=		"Wieviele Songs in der /played.html";
$messages["130"]	=		"Tchlog";
$messages["131"]	=		"Sollen YP Tracks mitgeloggt werden";
$messages["132"]	=		"Weblog";
$messages["133"]	=		"Webaktivit&auml;ten loggen";
$messages["134"]	=		"W3CEnable";
$messages["135"]	=		"W3C Aktivit&auml;ten loggen";
$messages["136"]	=		"W3CLog";
$messages["137"]	=		"Speicherort der W3CLog Datei";
$messages["138"]	=		"Source IP";
$messages["139"]	=		"Quell-IP Adresse des Streams";
$messages["140"]	=		"Destination IP";
$messages["141"]	=		"Ziel-IP Adresse des Streams";
$messages["142"]	=		"YPort";
$messages["143"]	=		"Verbindung zu yp.shoutcast.com";
$messages["144"]	=		"Name Lookups";
$messages["145"]	=		"DNS Erkennung der Quell IP's";
$messages["146"]	=		"Relay Port";
$messages["147"]	=		"Falls dieser Shoutcast Server als Relay dienen soll. Port-Angabe";
$messages["148"]	=		"Relay Server";
$messages["149"]	=		"IP-Adresse des Relay";
$messages["150"]	=		"AutoDumpUser";
$messages["151"]	=		"Falls User gekickt werden sollen wenn Quelle sich abmeldet";
$messages["152"]	=		"AutoDumpUserTime";
$messages["153"]	=		"Sekundenangabe nach dem der Listener gekickt werden sollen";
$messages["154"]	=		"ContentDir";
$messages["155"]	=		"Verzeichnisangabe des Inhalts";
$messages["156"]	=		"Introfile";
$messages["157"]	=		"Verzeichnisangabe der Intro-Datei";
$messages["158"]	=		"Titleformat";
$messages["159"]	=		"Server Title Format";
$messages["160"]	=		"Publicserver";
$messages["161"]	=		"Shoutcast Server &ouml;ffentlich zeigen";
$messages["162"]	=		"Allow Relay";
$messages["163"]	=		"Server auf anderen Server als Inhalt erlauben";
$messages["164"]	=		"Allow Public Relay";
$messages["165"]	=		"RelayServer als &ouml;ffentlich zeigen";
$messages["166"]	=		"Metaintervall";
$messages["167"]	=		"Nur Metaangabe, belassen Sie es auf 8192 oder 32768";
$messages["168"]	=		"Absenden";
$messages["169"]	=		"wird schon benutzt, der Port wurde ge&auml;ndert in";	// Port ..... : 'port'
$messages["170"]	=		"Der Server wurde erfolgreich installiert und in die Datenbank kopiert";
$messages["171"]	=		"Der Server konnte nicht erstellt werden, bitte wenden Sie sich an den Support";
$messages["172"]	=		"Der angegebene Port ist keine Zahl, bitte &uuml;berpr&uuml;fen Sie das";
$messages["173"]	=		"Die Servereinstellungen wurden erfolgreich ge&auml;ndert und gespeichert";
$messages["174"]	=		"Die Einstellungen konnten nicht in die Datenbank gespeichert werden";
$messages["175"]	=		"Dieser Server existiert nicht in der Datenbank oder auf diesem Server";
$messages["176"]	=		"Die PID des Servers konnte nicht aus der Datenbank gelesen ";
$messages["177"]	=		"Dieser Server ist schon Online, und ben&ouml;tigt kein weiteren Start";
$messages["178"]	=		"Das Panel kann die tempor&auml;re Konfigdatei nicht erstellen";
$messages["179"]	=		"Das Panel kann die tempor&auml;re Konfigdatei nicht beschreiben";
$messages["180"]	=		"Das Panel kann den Server nicht starten, Admin wurde kontaktiert";
$messages["181"]	=		"Das Panel hat den Shoutcast Server neugestartet und ist jetzt Online";
$messages["182"]	=		"Die PID des Servers konnte nicht aus der Datenbank gelesen werden (Server war nicht gestartet)";
$messages["183"]	=		"Die angegebene ID stimmt mit keinem Server auf diesem Server &uuml;berein";
$messages["184"]	=		"Der Server wurde erfolgreich auf der Datenbank und diesem Panel gel&ouml;scht";
$messages["185"]	=		"Der gew&uuml;nschte Server konnte nicht aus diesem System gel&ouml;scht werden";
$messages["186"]	=		"Die angegebene ID stimmt mit keinem Server auf diesem Server &uuml;berein";
$messages["187"]	=		"Das Panel kann den Server nicht starten, bitte den Admin kontaktieren";
$messages["adb1"]   =       "Bitte Liste w&auml;hlen";
//
//
//	./pages/admserver_bottom.php
$messages["188"]	=		"Eigenschaften des Servers";
$messages["189"]	=		"Hier k&ouml;nnen Sie wichtige Einstellungen des Servers konfigurieren und ver&auml;ndern. Diese wichtige Daten werden f&uuml;r alle Funktionen des Panel ben&ouml;tigt, damit dieses einwandfrei funktionieren kann. Alle diese Konfigurationen sind nur Ihnen, also dem Administrator dieses Panels, einsehbar. Diese k&ouml;nnenver&auml;ndert werden. Wir empfehlen Ihnen also diese Einstellungen mit Vorsicht zu bearbeiten.";
$messages["190"]	=		"Server Settings";
$messages["191"]	=		"&Uuml;ber das folgende Formular k&ouml;nnen Sie wichtige Einstellungen des Servers hinzuf&uuml;gen oder &auml;ndern.";
$messages["192"]	=		"Servereinstellungen dieses Panels";
$messages["193"]	=		"IP/DNS Adresse";
$messages["194"]	=		"Die IP/DNS des aktuellen Server";
$messages["195"]	=		"Betriebssystem";
$messages["196"]	=		"Das Server Betriebssystem";
$messages["197"]	=		"SSH Benutzer";
$messages["198"]	=		"Der SSH Benutzername";
$messages["199"]	=		"SSH Passwort";
$messages["200"]	=		"Das SSH Passwort";
$messages["201"]	=		"SSH Port";
$messages["202"]	=		"Der SSH Port zum WebServer";
$messages["203"]	=		"Verzeichnis";
$messages["204"]	=		"Das Verzeichnis zum Panel";
$messages["205"]	=		"Server Name";
$messages["206"]	=		"Der Servername des Servers";
$messages["207"]	=		"Server Slogan";
$messages["208"]	=		"Der Slogan Ihres Servers";
$messages["209"]	=		"MP3-Dateigr&ouml;&szlig;e";
$messages["210"]	=		"Maximal Dateigr&ouml;&szlig;e einer MP3-Datei beim Upload (in MB)";
$messages["211"]	=		"Spracheinstellung";
$messages["212"]	=		"Angabe der Sprachdatei des Panel";
$messages["213"]	=		"Ausf&uuml;hrungszeit";
$messages["214"]	=		"Maximale Ausf&uuml;hrungszeit des Uploads zum Server (in sec)";
$messages["215"]	=		"Updatecheck";
$messages["216"]	=		"Updatefunktion einstellen";
$messages["217"]	=		"AutoDJ Config";
$messages["218"]	=		"Konfigurationsdatei nach Start behalten";
$messages["219"]	=		"Shoutcast Config";
$messages["220"]	=		"Konfigurationsdatei nach Start behalten";
$messages["221"]	=		"Captchaabfrage";
$messages["222"]	=		"Captchaabfrage beim Login";
$messages["223"]	=		"Auflistungslimit";
$messages["224"]	=		"Maximale Auflistungen in der Anzeige";
$messages["225"]	=		"&Uuml;bernehmen";
$messages["226"]	=		"Alle Einstellungen wurden erfolgreich ge&auml;ndert und gespeichert";
$messages["227"]	=		"Ein schwerwiegender Fehler ist bei der Speicherung aufgetreten";
$messages["227-1"]	=		"Liveadmin";
$messages["227-2"]	=		"Liveadmin Code(URL)";
//
//
//	./pages/admuser_bottom.php
$messages["228"]	=		"Benutzereinstellungen f&uuml;r dieses Panel";
$messages["229"]	=		"Hier k&ouml;nnen Sie alle Benutzer dieses Panels editieren, oder l&ouml;schen. Sie k&ouml;nnen nat&uuml;rlich auch weitere Benutzer dem Panel hinzuf&uuml;gen. Alle diese Einstellungen k&ouml;nnen Sie jederzeit wieder ver&auml;ndern. Administratoren k&ouml;nnen sich nicht l&ouml;schen. Nachdem Sie den Benutzer erfolgreich erstellt haben, empfehlen wir Ihnen diesem einen Server zu registrieren.";
$messages["230"]	=		"Benutzer";
$messages["231"]	=		"Bitte w&auml;hlen Sie zwischen eines der folgenden Benutzer um diesen zu editieren. Oder erstellen Sie einen neuen.";
$messages["232"]	=		"Benutzername";
$messages["233"]	=		"Anzahl der Server";
$messages["234"]	=		"Neuer User";
$messages["235"]	=		"l&ouml;schen";
$messages["236"]	=		"einstellen";
$messages["237"]	=		"Server registriert";	// 'user: number' .....
$messages["238"]	=		"Neue Benutzerdaten eingeben";
$messages["239"]	=		"Benutzerdaten ver&auml;ndern";
$messages["240"]	=		"Servereinstellungen dieses Panels";
$messages["241"]	=		"Benutzername";
$messages["242"]	=		"Ihr Benutzername auf diesem Panel";
$messages["243"]	=		"Benutzerpasswort";
$messages["244"]	=		"Ihr aktuelles Passwort";
$messages["245"]	=		"Wiederholen";
$messages["246"]	=		"Nur bei &Auml;nderung wiederholen";
$messages["247"]	=		"Super Administrator";
$messages["add247"] =       "DJ";
$messages["248"]	=		"Benutzer";
$messages["249"]	=		"Ihr Benutzerstatus in diesem Panel";
$messages["250"]	=		"Telefonnummer";
$messages["251"]	=		"Eine Festnetznummer von Ihnen";
$messages["252"]	=		"Handynummer";
$messages["253"]	=		"Eine Mobilfunknummer von Ihnen";
$messages["254"]	=		"E-Mail Adresse";
$messages["255"]	=		"Ihr angegebene E-Mail Adresse";
$messages["256"]	=		"Vorname";
$messages["257"]	=		"Ihr Vorname";
$messages["258"]	=		"Nachname";
$messages["259"]	=		"Ihr Nachname";
$messages["260"]	=		"Geburtstag";
$messages["261"]	=		"Ihr Alter f&uuml;r Statistikzwecke";
$messages["262"]	=		"SuperAdmin Note";
$messages["263"]	=		"Notierungen des Administrator";
$messages["264"]	=		"Absenden";
$messages["265"]	=		"Zugriffsberechtigung";
$messages["266"]	=		"Dieser Benutzer existiert schon und kann daher nicht nochmal erstellt werden";
$messages["267"]	=		"Bitte &uuml;berpr&uuml;fen Sie die Eingabe der Passw&ouml;rter, diese stimmen nicht &uuml;berein";
$messages["268"]	=		"Der Benutzer wurde erfolgreich erstellt, und in die Datenbank eingetragen";
$messages["269"]	=		"Der Benutzer konnte nicht erfolgreich in die Datenbank eingetragen werden";
$messages["270"]	=		"Dieser Benutzer existiert nicht, bitte &uuml;berpr&uuml;fen Sie die ID";
$messages["271"]	=		"Ihre Ver&auml;nderungen wurden erfolgreich ver&auml;ndert und gespeichert";
$messages["272"]	=		"Die Daten konnten nicht korrekt in die Datenbank eingef&uuml;gt werden";
$messages["273"]	=		"Ein Benutzer kann nicht seinen eigenen Benutzernamen aus dem Panel l&ouml;schen";
$messages["274"]	=		"Ein Administrator kann nur direkt &uuml;ber die Datenbank gel&ouml;scht werden";
$messages["275"]	=		"Der Benutzer wurde erfolgreich aus der Datenbank und dem System gel&ouml;scht";
$messages["276"]	=		"Der Benutzer konnte nicht erfolgreich aus dem System gel&ouml;scht werden";
$messages["add01"]	=		"Relay ein";
$messages["add02"]	=		"Relay aus";
$messages["add03"]	=		"Server &ouml;ffentlich";
$messages["add04"]	=		"Server privat";
$messages["add05"]	=		"Webaktivit&auml;ten nicht geloggt";
$messages["add06"]	=		"Webaktivit&auml;ten geloggt";
$messages["add07"]	=		"Server im Panel &ouml;ffentlich";
$messages["add08"]	=		"Server im Panel nicht &ouml;ffentlich";
$messages["add04"]	=		"Server privat";
$messages["add04"]	=		"Server privat";

//
//
//	./pages/autodj_bottom.php
$messages["277"]	=		"Shoutcast AutoDJ & DJ Konfiguration";
$messages["278"]	=		"Hier k&ouml;nnen Sie den AutoDJ konfigurieren. Bitte w&auml;hlen Sie zwischen den Playlisten die Sie &uuml;ber die MP3/AACP Einstellungen erstellt haben, klicken sie auf Stoppen dann Starten. <u><b>Hinweis:</b></u> Nach dem Anlegen/L&ouml;schen neuer Dj's den <b><font color='#FF0000'>AutoDJ neustarten</font></b> und auch bei anderen &Auml;nderungen am AutoDJ, damit die neuen Daten &uuml;bernommen werden!";
$messages["279"]	=		"AutoDJ Auswahl";
$messages["280"]	=		"Bitte &uuml;ber das Auswahlmen&uuml; die Wiedergabeliste ausw&auml;hlen, mit der Sie den AutoDJ starten m&ouml;chten.";
$messages["281"]	=		"IP-Adresse";
$messages["282"]	=		"Port";
$messages["283"]	=		"Playlist";
$messages["284"]	=		"Es sind keine Server auf Ihren Benutzernamen zugeteilt!";
$messages["285"]	=		"Starten";
$messages["286"]	=		"Stoppen";
$messages["287"]	=		"Einstellen";
$messages["288"]	=		"Eigenschaften des AutoDJ";
$messages["288-1"]	=		"Eigenschaften der DJ's";
$messages["289"]	=		"Bitte f&uuml;llen Sie die folgenden Formulareintr&auml;ge aus um den AutoDJ korrekt konfigurieren zu k&ouml;nnen. Diese Einstellungen k&ouml;nnen Sie jederzeit wieder &auml;ndern oder auch l&ouml;schen. Bitte versuchen Sie keines dieser Eintr&auml;ge leer zu lassen, da es sonst zu Problemen beim Start des AutoDJ zum Shoutcast Server kommen kann. Hier k&ouml;nnen Sie auch neue DJ's anlegen und wieder l&ouml;schen.";
$messages["289-1"]	=		"Bitte f&uuml;llen Sie die folgenden Formulareintr&auml;ge aus um den DJ korrekt konfigurieren zu k&ouml;nnen. Hier k&ouml;nnen Sie auch neue DJ's anlegen, jederzeit wieder &auml;ndern und wieder l&ouml;schen.";
$messages["290"]	=		"AutoDJ Konfig";
$messages["290-1"]	=		"DJ Konfig";
$messages["291"]	=		"Bitte f&uuml;llen Sie die folgenden Formulare korrekt aus und versuchen Sie nichts frei zu lassen.";
$messages["292"]	=		"AutoDJ Konfiguration";
$messages["292-1"]	=		"DJ Konfiguration";
$messages["293"]	=		"Server IP";
$messages["294"]	=		"Die Serverip des Shoutcast Server";
$messages["295"]	=		"Server Port";
$messages["296"]	=		"Der Serverport des Shoutcast Server";
$messages["297"]	=		"Server Password";
$messages["298"]	=		"Das Passwort zum Verbinden";
$messages["299"]	=		"Bitrate";
$messages["300"]	=		"Die &Uuml;bertragungsrate des Streams";
$messages["301"]	=		"Stream Titel";
$messages["302"]	=		"Name des AutoDJ";
$messages["303"]	=		"Stream URL";
$messages["304"]	=		"Webadresse Ihres Radios";
$messages["305"]	=		"Stream Genre";
$messages["306"]	=		"Das Musikgenre dieses Senders";
$messages["307"]	=		"Shuffle";
$messages["308"]	=		"Zuf&auml;llige Wiedergabe";
$messages["309"]	=		"Qualit&auml;t";
$messages["310"]	=		"Qualit&auml;t [1 = Beste | 10 = Schnellste]";
$messages["311"]	=		"Crossfade";
$messages["312"]	=		"&Uuml;bergang der Lieder";
$messages["313"]	=		"Crossfade L&auml;nge";
$messages["314"]	=		"Die L&auml;nge des Musik&uuml;bergangs [in Millisekunde]";
$messages["315"]	=		"Bandbreite";
$messages["316"]	=		"Musikbandbreite in Hz";
$messages["317"]	=		"ID3 Benutzung";
$messages["318"]	=		"ID3 Benutzung der MP3 Dateien";
$messages["319"]	=		"&Ouml;ffentlich zeigen";
$messages["320"]	=		"Stream &ouml;ffentlich gezeigen";
$messages["321"]	=		"Channel";
$messages["322"]	=		"Musikchannel [Mono | Stereo]";
$messages["323"]	=		"AIM";
$messages["324"]	=		"Benutzer Verbindung f&uuml;r AOL";
$messages["325"]	=		"ICQ";
$messages["326"]	=		"Benutzer Verbindung f&uuml;r ICQ";
$messages["327"]	=		"IRC";
$messages["328"]	=		"Benutzer Verbindung f&uuml;r IRC";
$messages["329"]	=		"Aktualisieren";
$messages["330"]	=		"Zur&uuml;ck zur Auswahl";
$messages["331"]	=		"Aktuell ist ein DJ mit dem Server verbunden, bitte melden Sie sich zuerst ab";
$messages["332"]	=		"Es wurde keine Playlist angegeben, mit welcher der Server starten kann";
$messages["333"]	=		"Der AutoDJ wurde erfolgreich mit der angegebenen Wiedergabeliste gestartet";
$messages["334"]	=		"Es konnte keine Prozess ID gefunden werden. Der Port wurde nicht gestartet";
$messages["335"]	=		"Der AutoDJ wurde erfolgreich von diesen Port getrennt und wurde beendet";
$messages["336"]	=		"Die Konfigurationsdateien f&uuml;r Port";	// $messages["336"] portnumber $messages["336_pre"]
$messages["336_pre"]=		"wurden erfgolreich aktualisiert";
$messages["337"]	=		"Diesem Server ist keine AutoDJ Funktion zugewiesen, bitte Admin kontaktieren";
//
//
//	./pages/contact_bottom.php
$messages["338"]	=		"Kontaktm&ouml;glichkeit an den Administrator";
$messages["339"]	=		"Hier haben Sie die M&ouml;glichkeit, den Administrator des Server zu kontaktieren. Sofern sich die Frage oder das Anliegen um Ihr Produkt oder dem Server handelt, kontaktieren Sie bitte den Admin, andernfalls bitte das Programmiererteam des Panes. Administratoren k&ouml;nnen &uuml;ber dieses Formular Nachrichten verschicken, um damit z.B. andere Admins zu kontaktieren.";
$messages["340"]	=		"Kontaktformular";
$messages["341"]	=		"Bei Fragen rund um Ihren Shoutcast Server und dieses Panel k&ouml;nnen Sie hierdr&uuml;ber Ihren Admin kontaktieren.";
$messages["342"]	=		"Hier haben Sie die M&ouml;glichkeit den Administrator des Servers zu kontaktieren";
$messages["343"]	=		"Name";
$messages["344"]	=		""; //Hier bitte ihren Namen eintragen
$messages["345"]	=		"EMail Adresse";
$messages["346"]	=		"Keine g&uuml;ltige EMail!";
$messages["347"]	=		"Eintrag in Ordnung!";
$messages["348"]	=		"Betreff";
$messages["349"]	=		"Bitte einen Betreff eingeben!";
$messages["350"]	=		"Eintrag in Ordnung!";
$messages["351"]	=		"Sie haben keine Nachricht eingegeben!";
$messages["352"]	=		"Eintrag in Ordnung!";
$messages["353"]	=		"Absenden";
$messages["354"]	=		"Zur&uuml;cksetzen";
$messages["355"]	=		"Ihre Nachricht wurde erfolgreich an den Administrator versendet";
$messages["356"]	=		"Ihre Nachricht konnte leider nicht erfolgreich versendet werden";
$messages["357"]	=		"Es wurde keine g&uuml;ltige EMail Adresse eingegeben";
//
//
//	./pages/main_bottom.php
$messages["358"]	=		"Schnell&uuml;bersicht auf alle Funktionen";
$messages["359"]	=		"AutoDJ";
$messages["360"]	=		"Mein Konto";
$messages["361"]	=		"Kontakt";
$messages["362"]	=		"Eigene Server";
$messages["363"]	=		"MP3-Upload";
$messages["364"]	=		"Einstellungen";
$messages["365"]	=		"Radioserver";
$messages["366"]	=		"Kunden";
$messages["367"]	=		"Hilfsinfomenu";
$messages["368"]	=		"Hier finden Sie, auch auf allen weiteren Unterseiten, alle Informationen zu der aktuellen Seite.";
$messages["369"]	=		""; //Auf dieser Hauptseite k&ouml;nnen Sie durch Schnellstarticons direkt auf die gew&uuml;nschte Funktion kommen
$messages["370"]	=		"Nachrichtencenter";
$messages["371"]	=		"Keine neue Nachrichten verf&uuml;gbar";
$messages["372"]	=		"l&ouml;schen";
$messages["373"]	=		"lesen";
//
//
//	./pages/music_bottom.php
$messages["374"]	=		"Auswahl des Servers f&uuml;r den Upload der MP3 Dateien";
$messages["375"]	=		"Zur Ausf&uuml;hrung des AutoDJ ben&ouml;tigen Sie Multimedia Dateien, welche &uuml;ber den AutoDJ dann an den jeweiligen Shoutcast Server gesendet werden. Diese k&ouml;nnen Sie hier auf den Server hochladen, und dann als Playlist speichern. Diese werden dann dann nach dem n&auml;chsten AutoDJ-Neustart automatisch geladen. Bitte w&auml;hlen Sie nun hier folgend den jeweiligen Server aus.";
$messages["376"]	=		"Server Auswahl";
$messages["377"]	=		"Bitte w&auml;hlen Sie den Server, welchen Sie f&uuml;r den Upload oder die Playlistfunktion, ausw&auml;hlen m&ouml;chten.";
$messages["378"]	=		"IP-Adresse";
$messages["379"]	=		"Port";
$messages["380"]	=		"Speicherplatz";
$messages["381"]	=		"Traffic";
$messages["382"]	=		"Es sind keine Server auf Ihren Benutzernamen zugeteilt!";
$messages["383"]	=		"playlist";
$messages["384"]	=		"upload";
$messages["385"]	=		"Es wurde kein Port f&uuml;r die weitere Funktion ausgew&auml;hlt";
$messages["386"]	=		"Sie besitzen keine Rechte um diesen Port f&uuml;r AutoDJ steuern zu k&ouml;nnen";
$messages["387"]	=		"Das Verzeichnis dieses Ports konnte nicht erstellt werden, bitte CHMOD &uuml;berpr&uuml;fen";
$messages["388"]	=		"Der Speicherplatz dieses Ports wurde &uuml;berschritten, ein weiterer Upload ist nicht m&ouml;glich";
$messages["389"]	=		"Der Ordnerinhalt des Ordners dieses Ports konnte nicht ausgelesen werden";
$messages["390"]	=		"Sie besitzen keine Rechte um diesen Port f&uuml;r AutoDJ zugreifen zu k&ouml;nnen";
//
//
//	./pages/playlist_bottom.php
$messages["391"]	=		"Playlisten Konfiguration f&uuml;r den Shoutcast Port";
$messages["392"]	=		"Hier k&ouml;nnen Sie die Wiedergabelisten f&uuml;r Ihren AutoDJ zuf&auml;llig mit allen Liedern oder individuell erstellen. Bei einer zuf&auml;lligen Erstellung einer Wiedergabeliste, werden alle Lieder, welche sich zu dem aktuellen Zeitpunkt in Ihrem Musik-Upload Ordner befinden, in die Wiedergabelisten zuf&auml;llig eingef&uuml;gt. Bei einer individuellen Auswahl, k&ouml;nnen Sie Ihre Wiedergabeliste selbst bestimmen.";
$messages["393"]	=		"Playlist";
$messages["394"]	=		"Bitte w&auml;hlen Sie zwischen einer zuf&auml;lligen oder individuellen Erstellung, oder einer neuen Playlist.";
$messages["395"]	=		"Neue Playlist erstellen";
$messages["396"]	=		"Gr&ouml;&szlig;e";
$messages["397"]	=		"neue playlist";
$messages["398"]	=		"l&ouml;schen";
$messages["399"]	=		"zuf&auml;llig";
$messages["400"]	=		"individuell";
$messages["401"]	=		"Playlist indiviuell gestalten";
$messages["402"]	=		"Playlist";
$messages["403"]	=		"Ihr Shoutcast Server Musikordner";
$messages["404"]	=		"Ihre AutoDJ-Playliste";
$messages["405"]	=		"Speichern";
$messages["406"]	=		"Playlist leeren";
$messages["407"]	=		"Die Wiedergabeliste wurde erfolgreich gel&ouml;scht";
$messages["408"]	=		"Die Wiedergabeliste konnte nicht gefunden werden";
$messages["409"]	=		"Die Playliste konnte nicht erstellt werden!";
$messages["410"]	=		"Ihre Playliste wurde erfolgreich ge&auml;ndert und gespeichert!";
$messages["411"]	=		"Die Playliste konnte nicht erstellt werden!";
$messages["412"]	=		"Ihre Playliste wurde erfolgreich ge&auml;ndert und gespeichert!";
$messages["413"]	=		"Die Playliste konnte nicht gefunden werden, bitte l&ouml;schen Sie diese!";
$messages["414"]	=		"Das Portverzeichnis existiert nicht!";
$messages["415"]	=		"Eine Playlist mit solch einem Dateinamen existiert schon!";
$messages["416"]	=		"Dieser Dateiname ist nicht erlaubt, bitte &auml;ndern Sie diesen!";
$messages["417"]	=		"Ihre Playliste wurde erfolgreich ge&auml;ndert und gespeichert!";
$messages["418"]	=		"Die Playliste konnte nicht gefunden werden, bitte l&ouml;schen Sie diese!";
$messages["419"]	=		"Das Portverzeichnis existiert nicht!";
$messages["420"]	=		"Das Verzeichnis konnte nicht ausgelesen werden!";
$messages["421"]	=		"Das Verzeichnis konnte nicht ausgelesen werden!";
//
//
//	./pages/public_bottom.php
$messages["422"]	=		"&Ouml;ffentliche Server";
$messages["423"]	=		"Alle Benutzer dieses Panels, welche einen Zugang zu diesem Panel besitzen, sind in der Lage alle hier folgenden Server zu sehen. Diese wurden vom Administrator dieses Panels f&uuml;r diese freigegeben. Diese k&ouml;nnen als Beispiel Server oder als Testserver benutzt werden. Falls der	jeweilige	Server	online ist, ist in der Tabelle ein zugeh&ouml;riger Link verf&uuml;gbar, auf den man dann den Stream verfolgen kann.";
$messages["424"]	=		"Public Server";
$messages["425"]	=		"Alle Benutzer des Panels auf diesem Server k&ouml;nnen alle folgenden Server einsehen und verfolgen.";
$messages["426"]	=		"IP";
$messages["427"]	=		"Port";
$messages["428"]	=		"Inhaber";
$messages["429"]	=		"Webspeicherplatz";
$messages["430"]	=		"Es sind keine &Ouml;ffentlichen Server verf&uuml;gbar";
$messages["431"]	=		"Anh&ouml;ren";
$messages["432"]	=		"Offline";
//
//
//	./pages/server_bottom.php
$messages["433"]	=		"Konfiguration Ihres Shoutcast Servers";
$messages["434"]	=		"Hier k&ouml;nnen Sie Ihren Shoutcast Server ausw&auml;hlen um diesen dann zu editieren, starten, oder zu stoppen. Alle folgenden Server wurden Ihrem Benutzernamen zugewiesen. Falls Sie eine Erweiterung des Webspeichers w&uuml;nschen, kontaktieren Sie bitte Ihren Administrator, welcher Ihnen den Speicher erwarten k&ouml;nnte. Bei einem Mausklick auf den gew&auml;hlten Server gelangen Sie direkt auf diesen.";
$messages["435"]	=		"Server Auswahl";
$messages["436"]	=		"Bitte w&auml;hlen Sie von den folgenden Servern um diesen zu editieren, starten, oder stoppen zu k&ouml;nnen.";
$messages["437"]	=		"IP-Adresse";
$messages["438"]	=		"Port";
$messages["439"]	=		"Speicherplatz";
$messages["add439"] =       "Benutzer";
$messages["440"]	=		"Es sind keine Server auf Ihren Benutzernamen zugeteilt!";
$messages["441"]	=		"Stoppen";
$messages["442"]	=		"Starten";
$messages["443"]	=		"Einstellen";
$messages["444"]	=		"Eigenschaften des Shoutcast Server auf Port";
$messages["445"]	=		"Folgend k&ouml;nnen Sie die Konfigurationsdatei des Shoutcast Servers &auml;ndern. Diese ist notwendig damit der Server einwandfrei funktioniert. Diese Einstellungen k&ouml;nnen Sie jederzeit &auml;ndern. Bitte versuchen Sie alle Eintr&auml;ge zu f&uuml;llen damit es zu keinen Komplikationen beim Start des Servers kommen kann. Alle diese Einstellungen kann jederzeit vom Administrator ver&auml;ndert werden.";
$messages["446"]	=		"Shoutcast Konfig";
$messages["447"]	=		"Bitte alle folgenden Formulareintr&auml;ge f&uuml;r die Konfiguration des Shoutcast Servers einstellen.";
$messages["448"]	=		"Shoutcast Server Konfiguration";
$messages["449"]	=		"Aktualisieren";
$messages["450"]	=		"Zur&uuml;ck zur Auswahl";
$messages["451"]	=		"Server Kunde";
$messages["452"]	=		"Maximale Zuh&ouml;rer";
$messages["453"]	=		"Server Port";
$messages["454"]	=		"Streambitrate";
$messages["455"]	=		"Admin Passwort";
$messages["456"]	=		"Passwort";
$messages["457"]	=		"&Ouml;ffentlich-Panel";
$messages["458"]	=		"Logfile";
$messages["459"]	=		"Realtime";
$messages["460"]	=		"Screenlog";
$messages["461"]	=		"ShowLastSongs";
$messages["462"]	=		"Tchlog";
$messages["463"]	=		"Weblog";
$messages["464"]	=		"W3CEnable";
$messages["465"]	=		"W3CLog";
$messages["466"]	=		"Source IP";
$messages["467"]	=		"Destination IP";
$messages["468"]	=		"YPort";
$messages["469"]	=		"Name Lookups";
$messages["470"]	=		"Relay Port";
$messages["471"]	=		"Relay Server";
$messages["472"]	=		"AutoDumpUser";
$messages["473"]	=		"AutoDumpUserTime";
$messages["474"]	=		"ContentDir";
$messages["475"]	=		"Introfile";
$messages["476"]	=		"Titleformat";
$messages["477"]	=		"Publicserver";
$messages["478"]	=		"Allow Relay";
$messages["479"]	=		"Allow Public Relay";
$messages["480"]	=		"Metaintervall";
$messages["481"]	=		"Kundenname des Server";
$messages["482"]	=		"Maximale Zuh&ouml;rer";
$messages["483"]	=		"Der Port des Shoutcast Streams";
$messages["484"]	=		"Maximale Bitrate f&uuml;r den AutoDJ und Radioservers";
$messages["485"]	=		"Administrator Password des Streams";
$messages["486"]	=		"Sendepasswort des Streams";
$messages["487"]	=		"Server im Panel anzeigen [1 = An | 0 = Aus]";
$messages["488"]	=		"Speicherort der Logfiles";
$messages["489"]	=		"Streaminfos sollen aktuell ausgegeben werden [1 = An | 0 = Aus]";
$messages["490"]	=		"Loginhalt wird in der Anzeige angezeigt [1 = An | 0 = Aus]";
$messages["491"]	=		"Gibt an wieviele Songs in der /played.html anzeigt werden";
$messages["492"]	=		"Sollen YP Tracks mitgeloggt werden [yes = An | no = Aus]";
$messages["493"]	=		"Sollen die Webaktivit&auml;ten geloggt werden [yes = An | no = Aus]";
$messages["494"]	=		"Sollen W3C Aktivit&auml;ten geloggt werden [yes = An | no = Aus]";
$messages["495"]	=		"Speicherort der W3CLog Datei";
$messages["496"]	=		"Quell-IP Adresse des Streams";
$messages["497"]	=		"Ziel-IP Adresse des Streams";
$messages["498"]	=		"Y-Port f&uuml;r Verbindung zu yp.shoutcast.com";
$messages["499"]	=		"DNS Erkennung der Quell IP's [1 = An | 0 = Aus]";
$messages["500"]	=		"Falls dieser Shoutcast Server als Relay dienen soll. Port-Angabe";
$messages["501"]	=		"IP-Adresse des Relay";
$messages["502"]	=		"Falls User gekickt werden sollen wenn Quelle sich abmeldet";
$messages["503"]	=		"Sekundenangabe nach dem der Listener gekickt werden sollen";
$messages["504"]	=		"Verzeichnisangabe des Inhalts";
$messages["505"]	=		"Verzeichnisangabe der Intro-Datei";
$messages["506"]	=		"Server Title Format";
$messages["507"]	=		"Shoutcast Server &ouml;ffentlich zeigen";
$messages["508"]	=		"Server auf anderen Server als Inhalt erlauben";
$messages["509"]	=		"RelayServer als &ouml;ffentlich zeigen";
$messages["510"]	=		"Nur Metaangabe, belassen Sie es auf 8192 oder 32768";
$messages["511"]	=		"Dieser Server existiert nicht, oder ist nicht auf Sie registriert";
$messages["512"]	=		"Dieser Server existiert nicht in der Datenbank und auf diesem Server";
$messages["513"]	=		"Dieser Server ist schon Online, und ben&ouml;tigt kein weiteren Start";
$messages["514"]	=		"Das Panel kann die tempor&auml;re Konfigdatei nicht erstellen";
$messages["515"]	=		"Das Panel kann die tempor&auml;re Konfigdatei nicht beschreiben";
$messages["516"]	=		"Panel kann den Shoutcast Server nicht starten, bitte Admin kontaktieren";
$messages["517"]	=		"Panel kann den Shoutcast Server nicht starten, Admin wurde kontaktiert";
$messages["518"]	=		"Panel hat den Shoutcast Server neugestartet und ist jetzt Online";
$messages["519"]	=		"Dieser Shoutcast Server ist nicht gestartet worden, und ist nicht erreichbar";
$messages["520"]	=		"Die PID des Servers konnte nicht aus der Datenbank gelesen werden";
$messages["521"]	=		"Panel hat den Shoutcast Server erfolgreich geschlossen und ist jetzt beendet";
$messages["522"]	=		"Die Einstellungen wurden erfolgreich in die Datenbank &uuml;bertragen";
$messages["523"]	=		"Die Einstellungen konnten nicht erfolgreich &uuml;bertragen werden";
//
//
//	./pages/update.php
$messages["524"]	=		"Es ist eine neuere Version f&uuml;r dieses Panel verf&uuml;gbar, bitte aktualisieren";
//
//
//	./pages/upload_bottom.php
$messages["525"]	=		"Dateiupload auf den Shoutcast Port";
$messages["526"]	=		"Hier k&ouml;nnen Sie ihre MP3 Dateien, welche sp&auml;ter &uuml;ber den AutoDJ an den Shoutcast Server gesendet werden hochladen. Bitte achten Sie dabei das nur der verf&uuml;gbare Speicherplatz daf&uuml;r benutzt werden kann. Bitte beachten Sie auch die Limiterungen der folgend angezeigten Werte. Darunter k&ouml;nnen Sie Ihre Dateien aufgelistet sehen, welche Sie dort downloaden oder auch von Ihrem Speicher l&ouml;schen k&ouml;nnen.";
$messages["527"]	=		"Upload von MP3";
$messages["528"]	=		"Bitte nach jeder &Auml;nderung jeglicher Dateien hier, die Playliste des jeweiligen AutoDJ Server aktualisieren.";
$messages["529"]	=		"MP3 Upload auf den Port";
$messages["530"]	=		"Einstellungen";
$messages["531"]	=		"Maximal";
$messages["532"]	=		"Aktuell";
$messages["533"]	=		"Speicherplatz";
$messages["534"]	=		"Datenverkehr";
$messages["535"]	=		"Maximale Dateigr&ouml;&szlig;e";
$messages["536"]	=		"Erlaubter Dateityp";
$messages["537"]	=		"Shoutcast Port";
$messages["538"]	=		"Datei Hochladen";
$messages["539"]	=		"Hochladen";
$messages["540"]	=		"Zur&uuml;ck zur Auswahl";
$messages["541"]	=		"Dateiname";
$messages["542"]	=		"Gr&ouml;&szlig;e";
$messages["543"]	=		"l&ouml;schen";
$messages["544"]	=		"download";
$messages["545"]	=		"Zur&uuml;ck";
$messages["546"]	=		"Vor";
$messages["547"]	=		"Der Gesamtspeicherplatz des Ordners konnte nicht ermittelt werden";
$messages["548"]	=		"Der Gesamtspeicherplatz des Ordners konnte nicht ermittelt werden";
$messages["549"]	=		"Die Dateigr&ouml;&szlig;e &uuml;berschreitet den verf&uuml;gbaren Speicherplatz";
$messages["550"]	=		"Die Datei wurde erfolgreich hochgeladen und in das Verzeichnis kopiert";
$messages["551"]	=		"Es ist ein Fehler beim Versuch aufgetreten, diese Datei hochzuladen";
$messages["552"]	=		"Diese Datei existiert schon auf diesem System Port";
$messages["553"]	=		"Dieser Dateityp ist nicht erlaubt, oder beinhaltet keine MP3 Datei";
$messages["554"]	=		""; //Doppelte Funktion gewesen
$messages["555"]	=		""; //Doppelte Funktion gewesen
$messages["556"]	=		"Die Datei wurde erfolgreich vom System und dem Panel gel&ouml;scht";
$messages["557"]	=		"Die Datei zur L&ouml;schung kann nicht im System gefunden werden";
$messages["558"]	=		"Der Download konnte nicht gestartet werden, da keine Datei gefunden wurde";
$messages["559"]	=		"";    //Doppelte Funktion gewesen
$messages["560"]	=		"";   // Doppelte Funktion gewesen
$messages["561"]	=		"Das Verzeichnis konnte nicht ausgelesen werden!";
$messages["562"]	=		"Das Verzeichnis konnte nicht ausgelesen werden!";
$messages["563"]	=		"Das Verzeichnis konnte nicht ausgelesen werden!";


//
//
// autodj_bottom.php
$messages["dd1"]		=		"Zuf&auml;llige Wiedergabe ein";
$messages["dd2"]		=		"Zuf&auml;llige Wiedergabe aus";
$messages["dd3"]		=		"Crossfade ein";
$messages["dd4"]		=		"Crossfade aus";
$messages["dd5"]		=		"ID3 ein Benutzung";
$messages["dd6"]		=		"ID3 aus Benutzung";
$messages["dd7"]		=		"Stream öffentlich gezeigt";
$messages["dd8"]		=		"Stream nicht öffentlich gezeigt";

//
//
//admserver_bottom.php
$messages["dd9"]		=		"Updates werden durchf&uuml;hrt";
$messages["dd10"]		=		"Updates werden unterbunden";
$messages["dd11"]		=		"AutoDJ Config ein";
$messages["dd12"]		=		"AutoDJ Config aus";
$messages["dd13"]		=		"Shoutcast Config ein";
$messages["dd14"]		=		"Shoutcast Config aus";
$messages["dd15"]		=		"Capatchaabfrage ein";
$messages["dd16"]		=		"Capatchaabfrage aus";

//
//
//admnews_bottom.php
$messages["adm1"]		=		"Server News";
$messages["adm2"]		=		"Streamers Admin Panel - News Center, Nachrichten die Sie hie hinterlegen werden auf der Startseite angezeigt!";
$messages["adm3"]		=		"Server News";
$messages["adm4"]		=		"Es werden jeweils die letzten 3 Meldungen auf der Startseite angezeigt.";
$messages["adm5"]		=		"Sie haben hier die M&ouml;glichkeit Ihren Kunden eine Nachricht zu hinterlassen";
$messages["adm6"]		=		"Titel";
$messages["adm7"]		=		"Ihre Nachricht wurde erfolgreich gespeichert";
$messages["adm7"]		=		"Achtung dieses Feld darf nicht leer sein!";
$messages["adm8"]		=		"l&ouml;schen";
$messages["adm"]		=		"Updates";

//
$messages["urlformat"]  =      "HomepagesUrl mit http://";
$messages["urlformat1"]  =     "zb. http://www.deineurl.de";



//
//
//	language credit
$messages["564"]	=		"<a href=\"http://www.streamerspanel.com\">Translated by djcrackhome</a>";
$messages["564"]	=		'Streamers Panel | djcrackhome | Dave | Shippo21 |<a href="http://www.streamerspanel.com">http://www.streamerspanel.com</a>';

// ./pages/autodj_bottom.php sc_trans2
$messages["sct1"]       =                 "Audio Format";
$messages["sct2"]       =                 "MP3 Quality";
$messages["sct3"]       =                 "Mp3 Mode";
$messages["sct4"]       =                 "Calendarrewrite";
$messages["sct5"]       =                 "DJ-Calendarfile";
$messages["sct5-1"]     =                 "PL-Calendarfile";
$messages["sct6"]       =                 "Outprotocol";
$messages["sct7"]       =                 "Log";
$messages["sct8"]       =                 "Use Metadata";
$messages["sct9"]       =                 "PL-Calendarfile";
$messages["sct10"]      =                 "Xfade";
$messages["sct11"]      =                 "Xfadethreshol";
$messages["sct12"]      =                 "DJ Port1";
$messages["sct13"]      =                 "DJ Login1";
$messages["sct14"]      =                 "DJ Password1";
$messages["sct15"]      =                 "DJ Priority";
$messages["sct16"]      =                 "<font color='#FF0000'>DJ Password f&uuml;r Encoder</font>";
$messages["sct17"]      =                 "<font color='#FF0000'>Login1:Password1</font>";
$messages["sct18"]      =                 "<font color='#FF0000'>DJ Sende Port</font>";
$messages["sct19"]      =                 "MP3";
$messages["sct20"]      =                 "aacPlus";
$messages["sct21"]      =                 "<font color='#FF0000'>DJ IP / URL</font>";
$messages["sct22"]      =                 "<font color='#FF0000'>Deine Sende IP / URL</font>";
$messages["sct23"]      =                 "SC Trans Log";
$messages["sct24"]      =                 "SC Trans Log";
$messages["sct25"]      =                 "DJ Port 2";
$messages["sct26"]      =                 "Jukebox";
$messages["sct27"]      =                 "Gast-DJ";
$messages["sct27-1"]    =                 "DJ";
$messages["sct27-2"]    =                 "Sendeleitung";
$messages["sct27-3"]    =                 "Admin";
$messages["sct28"]      =                 "Off";
$messages["sct29"]      =                 "On";
$messages["sct30"]      =                 "Aufnahme";

// ./pages/bitratecontrol_bottom.php
$messages["bt1"]      =                 "Bitrate Control";
$messages["bt2"]      =                 "Hier haben Sie die M&ouml;glichkeit, die Kontrolle der vorgegebenen Maximumbitrate an und auszuschalten!<br>S&auml;mtliche Server werden im Abstand von 2 Minuten &uuml;berpr&uuml;ft. Bei &uuml;berschreiten der zul&auml;ssigen Maximalsendebitrate wird der entsprechende Server gestoppt und muss &uuml;ber das Panel neu gestartet werden.";
$messages["bt3"]      =                 "Diese Funktion steht im Moment nur unter Linux zur Verf&uuml;gung";
