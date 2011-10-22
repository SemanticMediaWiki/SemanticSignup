<?php
/**
 * /**
 * Internationalization file for the SemanticSignup extension.
 * Created on 7 Jan 2008
 *
 * @file SemanticSignup.i18n.php
 * @ingroup SemanticSignup
 *
 * @author Serhii Kutnii
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

$messages['en'] = array(
	'semanticsignup' => 'Semantic Signup',
	'ses-desc' => 'A MediaWiki extension built on top of Semantic Forms allowing to populate a user page with semantic data at signup time',
	'ses-nousername' => 'Username has not been specified.',
	'ses-nopwdmatch' => 'Password and password confirmation do not match.',
	'ses-norealname' => 'Real name is required but has not been specified.',
	'ses-userexists' => 'User already exists.',
	'ses-emailfailed' => 'Confirmation e-mail sending failed.',
	'ses-createforbidden' => 'Current user is not allowed to create accounts.',
	'ses-throttlehit' => 'The maximum number of new user accounts per day has been exceeded for this IP address.',
	'ses-userexists' => 'User already exists.'
);

/** Belarusian (Taraškievica orthography) (‪Беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Renessaince
 */
$messages['be-tarask'] = array(
	'ses-desc' => 'Пашырэньне MediaWiki, пабудаванае паверх Сэмантычных формаў, якое дазваляе зьмяшчаць на старонцы ўдзельніка падчас стварэньня рахунку сэмантычныя зьвесткі',
	'ses-nousername' => 'Імя ўдзельніка не пазначанае.',
	'ses-nopwdmatch' => 'Пароль і яго пацьверджаньне не супадаюць.',
	'ses-norealname' => 'Не пазначаны абавязковы атрыбут — сапраўднае імя.',
	'ses-userexists' => 'Удзельнік ужо існуе.',
	'ses-emailfailed' => 'Не атрымалася даслаць электронны ліст з пацьверджаньнем.',
	'ses-createforbidden' => 'Гэтаму ўдзельніку забаронена ствараць рахункі.',
	'ses-throttlehit' => 'Для гэтага IP-адрасу перавышаная дзённая колькасьць новых рахункаў.',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'semanticsignup' => 'Semantische Anmeldung',
	'ses-desc' => 'Ermöglicht das Ergänzen der Benutzerseite mit semantischen Benutzerdaten, die dieser während der Anmeldung angibt',
	'ses-nousername' => 'Der Benutzername wurde nicht angegeben.',
	'ses-nopwdmatch' => 'Das Passwort und die Passwortbestätigung stimmen nicht überein.',
	'ses-norealname' => 'Der bürgerliche Name ist erforderlich, wurde aber nicht angegeben.',
	'ses-userexists' => 'Der Benutzer ist bereits vorhanden.',
	'ses-emailfailed' => 'Der Versand der Bestätigungs-E-Mail ist gescheitert.',
	'ses-createforbidden' => 'Der aktuelle Benutzer ist nicht berechtigt, Konten zu erstellen.',
	'ses-throttlehit' => 'Die Anzahl neuer Benutzerkonten je Tag wurde für diese IP-Adresse überschritten.',
);

/** French (Français)
 * @author Gomoko
 */
$messages['fr'] = array(
	'semanticsignup' => 'Inscription sémantique',
	'ses-desc' => "Une extension de MediaWiki construite par-dessus les formulaires sémantiques permettant de peupler une page utilisateur avec des données sémantiques au moment de l'inscription",
	'ses-nousername' => "Le nom d'utilisateur n'a pas été spécifié.",
	'ses-nopwdmatch' => 'Le mot de passe et sa confirmation ne concordent pas.',
	'ses-norealname' => "Le vrai nom est obligatoire mais n'a pas été spécifié.",
	'ses-userexists' => "L'utilisateur existe déjà.",
	'ses-emailfailed' => "L'envoi du courriel de confirmation a échoué.",
	'ses-createforbidden' => "L'utilisateur courant n'est pas autorisé à créer des comptes.",
	'ses-throttlehit' => 'Le nombre de nouveaux comptes utilisateur par jour a été dépassé pour cette adresse IP.',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'semanticsignup' => 'Enscripcion sèmantica',
	'ses-userexists' => 'L’utilisator ègziste ja.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'semanticsignup' => 'Rexistro semántico',
	'ses-desc' => 'Unha extensión MediaWiki construída a partir de formularios semánticos para encher unha páxina de usuario con datos semánticos á hora do rexistro',
	'ses-nousername' => 'Non especificou o nome de usuario.',
	'ses-nopwdmatch' => 'O contrasinal e a confirmación do contrasinal non coinciden.',
	'ses-norealname' => 'O nome real é necesario, pero non o especificou.',
	'ses-userexists' => 'O usuario xa existe.',
	'ses-emailfailed' => 'Erro durante o envío do correo electrónico de confirmación.',
	'ses-createforbidden' => 'O usuario actual non ten permiso para crear contas.',
	'ses-throttlehit' => 'Este enderezo IP superou o número máximo de novas contas de usuario ao día.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'semanticsignup' => 'Inscription semantic',
	'ses-desc' => 'Un extension de MediaWiki, construite super Formularios Semantic, que permitte plenar un pagina de usator con datos semantic al momento de creation del conto',
	'ses-nousername' => 'Le nomine de usator non ha essite specificate.',
	'ses-nopwdmatch' => 'Contrasigno e confirmation non corresponde.',
	'ses-norealname' => 'Le nomine real es obligatori ma non ha essite specificate.',
	'ses-userexists' => 'Le usator existe jam.',
	'ses-emailfailed' => 'Le invio del e-mail de confirmation ha fallite.',
	'ses-createforbidden' => 'Le usator actual non ha le permission de crear contos.',
	'ses-throttlehit' => 'Le numero maxime de nove contos de usator per die ha essite excedite pro iste adresse IP.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ses-nousername' => 'De Benotzernumm gouf net uginn.',
	'ses-norealname' => 'De richtegen Numm ass verlaangt mä e gouf net uginn.',
	'ses-userexists' => 'De Benotzer gëtt et schonn.',
	'ses-createforbidden' => 'Den aktuelle Benotzer däerf keng Benotzerkonten uleeën.',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'semanticsignup' => 'Семантичка регистрација',
	'ses-desc' => 'Додаток за МедијаВики врз Семантичките обрасци кој овозможува пополнување на корисничка страница со семантички податоци во текот на регистрацијата',
	'ses-nousername' => 'Нема наведено корисничко име.',
	'ses-nopwdmatch' => 'Двете лозинки не се совпаѓаат.',
	'ses-norealname' => 'Нема наведено вистинско име, но ова е задолжително.',
	'ses-userexists' => 'Корисникот веќе постои.',
	'ses-emailfailed' => 'Не успеав да ја испратам потврдната порака по е-пошта.',
	'ses-createforbidden' => 'На тековниот корисник не му е дозволено да создава сметки.',
	'ses-throttlehit' => 'Надминат е максималниот дозволен број на новосоздадени кориснички сметки од оваа IP-адреса.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'semanticsignup' => 'Semantisch inschrijven',
	'ses-desc' => 'Uitbreiding bovenop Semantic Forms om een gebruikerspagina aan te maken met semantische gegevens tijdens de registratie',
	'ses-nousername' => 'De gebruikersnaam is niet opgegeven.',
	'ses-nopwdmatch' => 'Het wachtwoord en de bevestiging komen niet overeen.',
	'ses-norealname' => 'Een echte naam is vereist maar is niet opgegeven.',
	'ses-userexists' => 'De gebruiker bestaat al.',
	'ses-emailfailed' => 'Het verzenden van de bevestigingse-mail is mislukt.',
	'ses-createforbidden' => 'De huidige gebruiker mag geen nieuwe gebruikers aanmaken.',
	'ses-throttlehit' => 'Het maximale aantal aan te maken gebruikers per dag is bereikt voor dit IP-adres.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Event
 */
$messages['no'] = array(
	'semanticsignup' => 'Semantisk brukerkontoinformasjon',
	'ses-desc' => 'En MediaWiki-utvidelse bygd på Semantic Forms som tillater å legge inn semantiske data på en brukerside ved opprettelse av en bruker',
	'ses-nousername' => 'Brukernavn er ikke angitt.',
	'ses-nopwdmatch' => 'Passord og passord-bekreftelse stemmer ikke overens.',
	'ses-norealname' => 'Det kreves at virkelig navn oppgis.',
	'ses-userexists' => 'Bruker finnes allerede.',
	'ses-emailfailed' => 'Sendingen av bekreftende e-post feilet.',
	'ses-createforbidden' => 'Aktuell bruker tillates ikke å opprette brukerkontoer.',
	'ses-throttlehit' => 'Maksimalt antall nye brukere tillatt opprettet per døgn er overskredet for denne IP-adressen.',
);

