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

/** Message documentation (Message documentation)
 * @author Shirayuki
 */
$messages['qqq'] = array(
	'ses-desc' => '{{desc|name=Semantic Signup|url=http://www.mediawiki.org/wiki/Semantic_Signup}}',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'semanticsignup' => 'Rexistru semánticu',
	'ses-desc' => "Una estensión MediaWiki construída sobro Formularios Semánticos que permite poblar una páxina d'usuariu con datos semánticos nel momentu de rexistrase",
	'ses-nousername' => "Nun se conseñó un nome d'usuariu.",
	'ses-nopwdmatch' => 'La conseña y la confirmación de la mesma nun casen.',
	'ses-norealname' => " Ye necesariu'l nome real, pero nun se conseñó.",
	'ses-userexists' => "L'usuariu yá esiste.",
	'ses-emailfailed' => "Falló l'unviu del corréu electrónicu de confirmación.",
	'ses-createforbidden' => "L'usuariu actual nun tien permisu pa crear cuentes.",
	'ses-throttlehit' => "Esta direición IP pasó del númberu máximu de cuentes d'usuariu nueves al día.",
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
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

/** Breton (brezhoneg)
 * @author Fulup
 */
$messages['br'] = array(
	'ses-userexists' => "An implijer-mañ zo anezhañ c'hoazh.",
);

/** Czech (česky)
 * @author Vks
 */
$messages['cs'] = array(
	'ses-userexists' => 'Uživatel již existuje.',
);

/** German (Deutsch)
 * @author Kghbln
 */
$messages['de'] = array(
	'semanticsignup' => 'Semantische Anmeldung',
	'ses-desc' => 'Ermöglicht das automatische Erstellen einer aus semantischen Daten bestehenden Benutzerseite, die während der Registrierung erfasst werden',
	'ses-nousername' => 'Der Benutzername wurde nicht angegeben.',
	'ses-nopwdmatch' => 'Das Passwort und die Passwortbestätigung stimmen nicht überein.',
	'ses-norealname' => 'Der bürgerliche Name ist erforderlich, wurde aber nicht angegeben.',
	'ses-userexists' => 'Der Benutzer ist bereits vorhanden.',
	'ses-emailfailed' => 'Der Versand der Bestätigungs-E-Mail ist gescheitert.',
	'ses-createforbidden' => 'Der aktuelle Benutzer ist nicht berechtigt, Konten zu erstellen.',
	'ses-throttlehit' => 'Die Anzahl neuer Benutzerkonten je Tag wurde für diese IP-Adresse überschritten.',
);

/** Spanish (español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'semanticsignup' => 'Registro semántico',
	'ses-desc' => 'Una extensión MediaWiki construída a partir de formularios semánticos para permitir poblar una página de usuario con datos semánticos en el momento del registro',
	'ses-nousername' => 'No se ha especificado el nombre de usuario.',
	'ses-nopwdmatch' => 'La contraseña y la confirmación no coinciden.',
	'ses-norealname' => 'El nombre real es necesario, pero no se ha especificado.',
	'ses-userexists' => 'El usuario ya existe.',
	'ses-emailfailed' => 'Error durante el envío del correo electrónico de confirmación.',
	'ses-createforbidden' => 'El usuario actual no tiene permiso para crear cuentas.',
	'ses-throttlehit' => 'El número máximo de nuevas cuentas de usuario por día ha sido excedido por esta dirección IP.',
);

/** Finnish (suomi)
 * @author Nedergard
 */
$messages['fi'] = array(
	'semanticsignup' => 'Semanttinen kirjautuminen',
	'ses-desc' => 'Semanttisia lomakkeita käyttävä MediaWikin laajennus, jonka avulla käyttäjäsivulle lisätään kirjauduttaessa semanttisia tietoja.',
	'ses-nousername' => 'Käyttäjätunnusta ei ole määritetty.',
	'ses-nopwdmatch' => 'Salasana ja salasanan vahvistus eivät täsmää.',
	'ses-norealname' => 'Oikea nimi on pakollinen, mutta sitä ei ole määritetty.',
	'ses-userexists' => 'Käyttäjä on jo olemassa.',
	'ses-emailfailed' => 'Vahvistussähköpostin lähetys epäonnistui.',
	'ses-createforbidden' => 'Nykyinen käyttäjä ei saa luoda käyttäjätunnuksia.',
	'ses-throttlehit' => 'Tästä IP-osoitteesta luotujen uusien käyttäjätunnusten päiväkohtainen enimmäismäärä on ylitetty.',
);

/** French (français)
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

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'semanticsignup' => 'Enscripcion sèmantica',
	'ses-userexists' => 'L’usanciér ègziste ja.',
);

/** Galician (galego)
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

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'semanticsignup' => 'Semantiske přizjewjenje',
	'ses-desc' => 'Rozšěrjenje MediaWiki, kotrež zmóžnja, wužiwarsku stronu ze semantiskimi datami za přizjewjenje wuhotować',
	'ses-nousername' => 'Wužiwarske mjeno njeje so podało.',
	'ses-nopwdmatch' => 'Hesło a jeho wobkrućenje so njekryjetej.',
	'ses-norealname' => 'Woprawdźite mjeno je trěbne, ale njeje so podało.',
	'ses-userexists' => 'Wužiwar hižo eksistuje.',
	'ses-emailfailed' => 'Słanje wobkrućenskeje e-mejle je so njeporadźiło.',
	'ses-createforbidden' => 'Aktualny wužiwar njesmě konta załožić',
	'ses-throttlehit' => 'Maksimalna ličba nowych wužiwarskich kontow na dźeń je za tutu IP-adresu překročena.',
);

/** Hungarian (magyar)
 * @author TK-999
 */
$messages['hu'] = array(
	'semanticsignup' => 'Szemantikus regisztráció',
	'ses-desc' => 'A szemantikus űrlapok kiterjesztésre épülő épülő MediaWiki kiterjesztés, mely lehetővé teszi a felhasználói lap kitöltését szemantikus adatokkal regisztrációkor.',
	'ses-nousername' => 'Nem adtál meg felhasználónevet.',
	'ses-nopwdmatch' => 'A jelszó és a megerősítése nem egyeznek meg.',
	'ses-norealname' => 'A valódi név szükséges, de nincs megadva.',
	'ses-userexists' => 'A felhasználó már létezik.',
	'ses-emailfailed' => 'A megerősítő e-mail küldése nem sikerült.',
	'ses-createforbidden' => 'Jelen felhasználó nem hozhat létre felhasználói fiókokat.',
	'ses-throttlehit' => 'Ezen IP-cím túllépte az egy nap alatt létrehozható felhasználói fiókok maximumát.',
);

/** Interlingua (interlingua)
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

/** Italian (italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'semanticsignup' => 'Registrazione semantica',
	'ses-desc' => "Un'estensione MediaWiki costruita sulla base di moduli semantici che permette di compilare una pagina utente con i dati semantici in fase di registrazione",
	'ses-nousername' => 'Il nome utente non è stato indicato.',
	'ses-nopwdmatch' => 'La password e la conferma non corrispondono.',
	'ses-norealname' => 'Il nome reale è obbligatorio ma non è stato indicato.',
	'ses-userexists' => 'Nome utente già esistente.',
	'ses-emailfailed' => "Invio dell'email di conferma non riuscito.",
	'ses-createforbidden' => "All'utente attuate non è permesso creare account.",
	'ses-throttlehit' => 'Il numero massimo di nuovi account utente per giorno è stato superato per questo indirizzo IP.',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'semanticsignup' => '意味的利用者登録',
	'ses-nousername' => '利用者名が指定されていません。',
	'ses-nopwdmatch' => 'パスワードとその確認が一致しません。',
	'ses-norealname' => '本名は必須ですが指定されていません。',
	'ses-userexists' => '利用者は既に存在します。',
	'ses-emailfailed' => '確認メールの送信に失敗しました。',
	'ses-createforbidden' => '現在の利用者はアカウント作成を許可されていません。',
	'ses-throttlehit' => 'この IP アドレスから作成できる利用者アカウントの 1 日あたりの最大数を超えました。',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'semanticsignup' => 'Semantesch Aanmällde',
	'ses-desc' => 'Ene Zohsaz för MediaWiki, dä op däm Zohsaz för semantesch Fomolaare opboud un et müjjelesch määt, enem neue Metmaacher sing Metmaachersigg tiräk beim Aanmälde met semantesche Daate ze fölle.',
	'ses-nousername' => 'Et es kein Metmaachernaame aanjejovve.',
	'ses-nopwdmatch' => 'Zweimohl et Paßwoot engerscheidlesch enjejovve.',
	'ses-norealname' => 'Der ääschte Naame fählt. Dä moß ävver aanjejovve wääde.',
	'ses-userexists' => 'Dä Metmaacher jidd_et ald!',
	'ses-emailfailed' => 'En <i lang="en">e-mail</i> zom Beschtääteje ze verschecke hät nit jeflupp.',
	'ses-createforbidden' => 'Dä momäntan enjeloggte Metmaacher darf kein neue Metmaacher aanlääje.',
	'ses-throttlehit' => 'De zohjelohße Aanzahl neue Metmaacher pro Daach för heh di <i lang="en">IP</i>-Addräß es övverschredde.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'ses-nousername' => 'De Benotzernumm gouf net uginn.',
	'ses-nopwdmatch' => "D'Passwuert an d'Confirmatioun vum Passwuert sinn net d'selwecht.",
	'ses-norealname' => 'De richtegen Numm ass verlaangt mä e gouf net uginn.',
	'ses-userexists' => 'De Benotzer gëtt et schonn.',
	'ses-emailfailed' => "D'Confirmatiouns-Mail konnt net geschéckt ginn.",
	'ses-createforbidden' => 'Den aktuelle Benotzer däerf keng Benotzerkonten uleeën.',
	'ses-throttlehit' => "D'Zuel vun neie Benotzerkonte pro Dag gouf fir dës IP-Adress depasséiert.",
);

/** Macedonian (македонски)
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
	'ses-throttlehit' => 'Пречекорен е максималниот дозволен број на новосоздадени кориснички сметки од оваа IP-адреса.',
);

/** Norwegian Bokmål (norsk (bokmål)‎)
 * @author Event
 */
$messages['nb'] = array(
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

/** Polish (polski)
 * @author BeginaFelicysym
 */
$messages['pl'] = array(
	'ses-nousername' => 'Nie określono nazwy użytkownika.',
	'ses-nopwdmatch' => 'Hasło i jego potwierdzenie nie są jednakowe.',
	'ses-norealname' => 'Prawdziwe nazwisko jest wymagane, ale nie zostało określone.',
	'ses-userexists' => 'Użytkownik już istnieje.',
	'ses-emailfailed' => 'Wysyłanie wiadomości e-mail potwierdzenia nie powiodło się.',
	'ses-createforbidden' => 'Bieżący użytkownik nie ma uprawnień do tworzenia kont.',
	'ses-throttlehit' => 'Maksymalna dzienna liczba nowych kont użytkowników została przekroczona dla tego adresu IP.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'semanticsignup' => 'Anscrission semàntica',
	'ses-desc' => "N'estension MediaWiki costruìa ansima ai formolari semàntich ch'a përmët ëd popolé na pàgina utent con dij dat semàntich al moment dl'anscrission",
	'ses-nousername' => "Lë stranòm a l'é nen ëstàit spessificà.",
	'ses-nopwdmatch' => 'La ciav e la ciav confirmà as corëspondo nen.',
	'ses-norealname' => "Ël nòm ver a l'é obligatòri ma a l'é pa stàit spessificà.",
	'ses-userexists' => "L'utent a esist già.",
	'ses-emailfailed' => "La spedission dël mëssagi ëd confirma a l'é falìa.",
	'ses-createforbidden' => "L'utent corent a peul pa creé ëd cont.",
	'ses-throttlehit' => "Ël nùmer màssim ëd cont utent neuv për di a l'é stàit superà për st'adrëssa IP.",
);

/** Brazilian Portuguese (português do Brasil)
 * @author Jaideraf
 */
$messages['pt-br'] = array(
	'semanticsignup' => 'Cadastro Semântico',
	'ses-desc' => 'Uma extensão do MediaWiki construída a partir da extensão Semantic Forms que permite preencher uma página de usuário com dados semânticos na hora do cadastro.',
	'ses-nousername' => 'O username não foi especificado.',
	'ses-nopwdmatch' => 'A senha e a confirmação da senha não coincidem.',
	'ses-norealname' => 'O nome real é necessário, mas não foi especificado.',
	'ses-userexists' => 'Esse usuário já existe.',
	'ses-emailfailed' => 'O envio da confirmação de e-mail falhou.',
	'ses-createforbidden' => 'O usuário atual não tem permissão para criar contas de usuário.',
	'ses-throttlehit' => 'O número máximo por dia de novas contas de usuário criadas a partir desse endereço IP foi excedido.',
);

/** Swedish (svenska)
 * @author Martinwiss
 */
$messages['sv'] = array(
	'semanticsignup' => 'Semantic Signup',
	'ses-desc' => 'Ett tillägg till MediaWiki som kompletterar tillägget Semantic Forms och gör så att användare kan fylla i en användarsida med semantiska data i samband med skapandet av en ny användare.',
	'ses-nousername' => 'Användarnamn har inte angetts.',
	'ses-nopwdmatch' => 'Lösenordet och upprepningen av lösenordet stämmer inte överrens.',
	'ses-norealname' => 'Det rikta namnet krävs men har inte angetts.',
	'ses-userexists' => 'Användaren finns redan.',
	'ses-emailfailed' => 'Det gick inte att skicka bekräftelsebrevet.',
	'ses-createforbidden' => 'Nuvarande användare kan inte skapa nya användare.',
	'ses-throttlehit' => 'För denna IP-adress har största antalet nya användarkonton per dag överskridits.',
);

/** Tamil (தமிழ்)
 * @author Shanmugamp7
 */
$messages['ta'] = array(
	'ses-userexists' => 'பயனர் ஏற்கனவே உள்ளார்.',
	'ses-emailfailed' => 'உறுதிப்படுத்தல் மின்னஞ்சல் அனுப்புவது தோல்வியடைந்தது.',
	'ses-createforbidden' => 'தற்போதைய பயனர் கணக்குகள் உருவாக்க அனுமதிக்கப்படவில்லை.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'semanticsignup' => 'Pagrerehistrong Semantiko',
	'ses-desc' => 'Isang dugtong ng MediaWiki na itinayo sa ibabaw ng mga Pormularyong Semantiko na nagpapahintulot sa pagpupuno sa isang pahina ng tagagamit ng datong semantiko sa panahon ng pagpaparehistro',
	'ses-nousername' => 'Hindi tinukoy ang pangalan ng tagagamit.',
	'ses-nopwdmatch' => 'Hindi magkatugma ang hudyat at pagtitiyak ng hudyat.',
	'ses-norealname' => 'Kailangan ang tunay na pangalan subalit hindi natukoy.',
	'ses-userexists' => 'Umiiral na ang tagagamit.',
	'ses-emailfailed' => 'Nabigo ang pagpapadala ng e-liham ng paniniyak.',
	'ses-createforbidden' => 'Ang pangkasalukuyang tagagamit ay hindi pinapayagang lumikha ng mga akawnt.',
	'ses-throttlehit' => 'Ang pinaka mataas na bilang ng bagong mga akawnt ng tagagamit sa bawat araw ay nalampasan na para sa tirahang ito ng IP.',
);

/** Ukrainian (українська)
 * @author Base
 */
$messages['uk'] = array(
	'semanticsignup' => 'Семантична реєстрація',
	'ses-desc' => 'Розширення MediaWiki побудоване поверх Semantic Forms, що дозволяє розміщати на сторінку користувача семантичні дані під час реєстрації',
	'ses-nousername' => "Ім'я користувача не вказано.",
	'ses-nopwdmatch' => 'Пароль та підтвердження паролю не співпадають.',
	'ses-norealname' => "Справжнє ім'я обов'язково вказати, але не було вказано.",
	'ses-userexists' => 'Користувач уже існує.',
	'ses-emailfailed' => 'Не вдалось надіслати лист з підтвердженням електронної пошти.',
	'ses-createforbidden' => 'Поточному користувачу не дозволено створювати облікові записи.',
	'ses-throttlehit' => 'Максимальне число нових облікових записів на день було досягнуто для цієї IP-адреси.',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Linforest
 */
$messages['zh-hans'] = array(
	'semanticsignup' => '语义登记',
	'ses-desc' => '一个建立在Semantic Forms（语义表单）基础之上的MediaWiki扩展，允许在注册登记时采用语义数据充填用户页面',
	'ses-nousername' => '尚未指定用户名。',
	'ses-nopwdmatch' => '密码与确认密码不匹配。',
	'ses-norealname' => '真实姓名是必需的但尚未指定。',
	'ses-userexists' => '用户已存在。',
	'ses-emailfailed' => '用于确认的电子邮件发送失败。',
	'ses-createforbidden' => '不允许当前用户创建帐户。',
	'ses-throttlehit' => '此IP地址已经超过了每天新用户帐户的最大数量。',
);

/** Traditional Chinese (中文（繁體）‎)
 */
$messages['zh-hant'] = array(
	'semanticsignup' => '語義登記',
	'ses-desc' => '一個建立在Semantic Forms（語義表單）基礎之上的MediaWiki擴展，允許在註冊登記時採用語義數據充填用戶頁面',
	'ses-nousername' => '尚未指定用戶名。',
	'ses-nopwdmatch' => '密碼與確認密碼不匹配。',
	'ses-norealname' => '真實姓名是必需的但尚未指定。',
	'ses-userexists' => '用戶已存在。',
	'ses-emailfailed' => '用於確認的電子郵件發送失敗。',
	'ses-createforbidden' => '不允許當前用戶創建帳戶。',
	'ses-throttlehit' => '此IP地址已經超過了每天新用戶帳戶的最大數量。',
);
