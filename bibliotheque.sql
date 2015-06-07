-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 06 Juin 2015 à 19:21
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `authors`
--

INSERT INTO `authors` (`id`, `name`, `biography`, `img_file`) VALUES
(1, 'Pierre Rabhi', 'Agriculteur, écrivain et penseur français d''origine algérienne, Pierre Rabhi est un des pionniers de l''agriculture biologique et l’inventeur du concept "Oasis en tous lieux". Il défend un mode de société plus respectueux des hommes et de la terre et soutient le développement de pratiques agricoles accessibles à tous et notamment aux plus démunis, tout en préservant les patrimoines nourriciers. Depuis 1981, il transmet son savoir-faire dans les pays arides d''Afrique, en France et en Europe, cherchant à redonner leur autonomie alimentaire aux populations. Il est aujourd''hui reconnu expert international pour la sécurité alimentaire et a participé à l’élaboration de la Convention des Nations Unies pour la lutte contre la désertification. Il est l’initiateur du Mouvement pour la Terre et l’Humanisme. Il est l''auteur de nombreux ouvrages dont Paroles de Terre, du Sahara aux Cévennes, Conscience et Environnement ou Graines de Possibles, co-signé avec Nicolas Hulot.', '94c2bbf54aa69a978c65b05eeb9861821433605952.bmp'),
(2, 'J.K. Rowling', 'Joanne Kathleen Rowling a grandi en Angleterre où elle est née en 1965. Elle commence à imaginer la saga Harry Potter dès la fin des années 90, après ses études de lettres. Si J.K. Rowling achève le premier tome de la série en 1993, Harry Potter à l''école des sorciers n''est publié qu''en 1997 par Bloomsburry en Angleterre, puis en 1999 par Gallimard en France. Les prix littéraires remis aux premiers tomes, et surtout le formidable bouche à oreille des cours de récréation font de Harry Potter un sorcier mondialement connu. Le septième et dernier volume de la série est paru en 2007. Auteur d''un phénomène éditorial inédit qui bouleverse tous les repères de la littérature jeunesse, JK Rowling a vu son œuvre récompensée par le Prix Andersen en 2010.', 'af284d3e2a102648adc208ef57e59b981433606153.jpg'),
(3, 'George Simenon', 'Georges Simenon naît et passe son enfance à Liège. Il fait preuve très tôt de fortes capacités intellectuelles à l''école mais décide d''abandonner ses études à l''âge de quinze ans. Après avoir acquis une expérience journalistique en Belgique, il se rend à Paris et côtoie le milieu littéraire, qui lui donne la passion de l''écriture. Dès lors, à partir de 1924, il se lance dans la rédaction d''une multitude de romans populaires paraissant sous divers pseudonymes. Ce n''est qu''à l''âge de 28 ans qu''il se décide à signer de son vrai nom l''un de ses ouvrages. Il s''agit du roman policier Pietr le Letton, dans lequel apparaît pour la première fois le personnage de Maigret. Auteur prolifique à l''extrême, Simenon multiplie les publications de romans. Fort du succès du cycle des Maigret, il entre aux éditions Gallimard en 1935. Il se tourne alors vers des réalisations plus psychologiques, telles que les Fiançailles de M. Hire ou l''Aîné des Ferchaux. Au cours d''un exil aux Etats-Unis, il se penche sur sa vie en publiant Je me souviens et Pedigree, deux oeuvres autobiographiques. Il s''installe ensuite en Suisse et s''y éteint en 1989.', '01adf905d83e3162aa25ba0627b569b91433606278.jpg'),
(4, 'Eric-Emmanuel Schmitt', 'Dramaturge, romancier, nouvelliste, essayiste, cinéaste, traduit en 50 langues et joué dans autant de pays, Eric-Emmanuel Schmitt est un des auteurs les plus lus et les plus représentés dans le monde. Il a été récompensé par l''Académie Française en juillet 2001 avec le Grand Prix du théâtre, pour l''ensemble de son oeuvre. En 2009, Ulysse from Bagdad lui a valu le Prix des grands espaces littéraires. En 2010, il a obtenu le prix Goncourt de la nouvelle pour son recueil Concerto à la mémoire d''un ange.', 'd8d7bb1f1f9197adbb9b609e6aab33001433606425.jpg'),
(5, 'Philippe Geluck', 'Philippe Geluck est né à Bruxelles le 7 mai 1954. Déjà tout petit, il décide qu''il deviendrait comédien. Dès 1975, il joue au Théâtre National de Belgique ("Roméo et Juliette", "l''Opéra de Quat''sous", ... ou bien encore "les oeuvres de Chaval et Copi"). Rapidement, il a les honneurs du petit écran où il anime plus de mille émissions au ton ironique, et cela depuis 1978. Citons parmi eux "Lollipop", "L''esprit de famille" et "le Jeu des dictionnaires". En 1982, il crée un one-man-show, "Un certain plume", de Michaux, avec lequel il recueille un succès énorme. Il participe en 1983 au film d''André Delvaux "Benvenuta" ainsi qu''au téléfilm de JL Colmant, "Jackson et le Mnémocide", d''après le scénario de Jean Van Hamme. Avec "Un peu de tout..." Geluck remporte le prix de l''émission la plus drôle à la Rose d''Or de Montreux. De 1988 à nos jours, il participe, à la RTBF (radio et/ou télé) , au "Jeu des Dictionnaires", à "l''Empire des Médias" et à la "Semaine Infernale" (où naîtra "Le Docteur G. répond à vos questions"). Ses apparitions médiatiques se caractérisent toujours sous l''empreinte de l''humour. Aujourd'' hui, Philippe poursuit en France, et avec brio, une carrière télé déjà bien remplie en Belgique. Parallèlement, Philippe dessine. A 14 ans, il publie ses premières illustrations dans "Azimut", une petite brochure de la régie Renault. Il est également présent dans "l''Oeuf", un mensuel d''humour destiné au corps médical, et dans "Clé pour la Musique". Il expose des dessins et des aquarelles à Londres, Paris, Milan, Copenhaghe et Dallas. Il réalise également trois livres pour enfants d''après "Lollipop" aux éditions Labor-Nathan en 1984 et participe à l''éphémère magazine "Jouez avec Quick et Flupke", aux éditions Casterman en […]', 'd6e9fc05352267393b36787538dea9aa1433606708.jpg'),
(6, 'Amélie Nothomb', 'Amélie Nothomb est un écrivain belge de langue française. Elle est né le 13 août 1967 à Kobe, au Japon, où son père, le baron Patrick Nothomb, fut ambassadeur de Belgique. Belgique, qu''elle ne connaîtra qu''à 17 ans, pour y terminer ses études de philologie romane à l''Université libre de Bruxelles.\r\n\r\nDepuis 1992, Amélie Nothomb publie aux éditions Albin Michel un roman par an.\r\n\r\nStupeur et tremblements, roman de son expérience professionnelle au Japon, sera récompensé en 1999 par Le Grand Prix du roman de l''Académie française.', 'c6b6680afecbbd53db1c431c5e796f401433606808.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `edition_id` int(11) NOT NULL,
  `langage` varchar(255) NOT NULL,
  `length` int(11) unsigned NOT NULL,
  `year` year(4) NOT NULL,
  `img_file` varchar(255) NOT NULL,
  `disponibility` int(2) NOT NULL,
  `selection` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `category_id`, `description`, `edition_id`, `langage`, `length`, `year`, `img_file`, `disponibility`, `selection`) VALUES
(1, 'La part du colibri', 1, 1, '" Comment se fait-il que l''humanité, en dépit de ressources planétaires suffisantes et de prouesses technologiques sans précédent, ne parvienne pas à faire en sorte que chaque être humain puisse se nourrir, se vêtir, s''abriter, se soigner et développer les potentialités nécessaires à son accomplissement ? [...] Comment se fait-il que nous n''ayons pas pris conscience de la valeur inestimable de notre petite planète, seule oasis de vie au sein d''un désert sidéral infini, et que nous ne cessions de la piller, de la polluer, de la détruire aveuglément au lieu d''en prendre soin et d''y construire la paix et la concorde entre les peuples ? " Ce texte de Pierre Rabhi nous amène à ouvrir les yeux sur le devenir de la planète et de l''espèce humaine, et propose une réflexion sur la " nécessaire décroissance ".\r\nIl apporte des solutions concrètes, réalistes, à l''échelle humaine, que chacun peut mettre en œuvre, partager, propager. Une manière de ne pas se sentir impuissant face à demain. La part de chacun, La Part du colibri, comme il le dit avec poésie. ', 4, 'Français', 51, 2009, 'feb5b5bd329af668f99acf3f5edf25d21433608944.jpg', 1, 0),
(2, 'Maigret, l''affaire Saint-Fiacre', 3, 4, 'Dans l''église du village de Saint-Fiacre (village fictif inspiré de Paray-le-Frésil), la comtesse, femme au cœur fragile, succombe à une crise cardiaque. Il s''agit bien pourtant d''un crime commis à l''aide d''une simple coupure de journal glissée dans le missel de la comtesse de Saint-Fiacre : une lettre anonyme a prévenu les services de police judiciaire. Maigret assiste impuissant au forfait. Il rencontre ensuite les suspects, mais évoque surtout les souvenirs qui affluent de son enfance passée en ces lieux.\r\n\r\nLe coupable est démasqué lors d''un dîner placé sous le signe de Walter Scott où tous les protagonistes seront rassemblés, et c''est le comte de Saint-Fiacre qui va résoudre l''énigme. La preuve est toutefois apportée par Maigret qui se fait la réflexion que « son rôle dans cette affaire s''était borné à apporter le dernier chaînon, un tout petit chaînon qui bouclait parfaitement le cercle. »', 2, 'Français', 186, 1932, 'd5854873bcb1fc083704c7bb384ff67d1433609204.gif', 1, 0),
(3, 'Lorsque j''étais une œuvre d''art', 4, 6, 'Dans un État insulaire, Tazio, le frère cadet des jumeaux Firelli, deux mannequins célèbres d''une grande beauté, a décidé, à vingt ans, de se suicider en se jetant du haut d''une falaise, puisqu''il se trouve laid, banal et médiocre, dans l’ombre de ses frères, connus dans le monde entier pour leur beauté. Il en est empêché par la proposition de Zeus-Peter Lama, un artiste qui lui demande 24 heures pour changer sa vie. L''artiste contemporain exubérant lui propose de faire disparaître complètement son ancienne et déprimante vie, et de faire de lui une sculpture vivante nommé Adam bis. Il va ensuite soumettre sa volonté à Zeus-Peter Lama qu’il appelle son « bienfaiteur » et va se laisser transformer. Son corps va être totalement transformé et déshumanisé pour devenir une « œuvre d’art ». Sa rencontre avec un autre artiste, le peintre Hannibal va lui faire adopter une autre vision sur le monde, lui et Fiona, sa fille l''encouragent et lui donnent la volonté de reconquérir et réclamer son droit à la vie et à la liberté. Le personnage de Tazio Firelli nous montre que l’homme accorde trop d’importance aux opinions d''autrui et donc à son apparence et va, le cas échéant, tenter de la changer pour se faire accepter.', 2, 'Français', 252, 2002, '35a7ea5d7263c93509eccb5ca7518dbd1433609384.jpg', 0, 0),
(4, 'Le chat est content', 5, 7, '... il faut le voir pour le croire !', 5, 'Français', 47, 2000, '0ccbe4b5ef120694ff731e66832962881433609737.jpg', 1, 0),
(5, 'Harry Potter à l''école des sorcier', 2, 3, 'A la suite de la mort étrange de ses parents, le bébé Harry Potter est amené en moto volante par le géant Hagrid devant la maison des Dursley, son oncle et sa tante..\r\n\r\n  Deux mystérieux personnages rôdent aux abords de Privet Drive : le professeur Albus Dumbledore et le professeur Minerva Mac Gonagall qui était apparu quelques minutes auparavant sous la forme d''un chat.\r\n\r\n  Les jours précédents des phénomènes bizarres ont été constatés : des vols de hiboux en plein jour, des pluies d''étoiles filantes... De plus, on a vu en ville d''étranges personnages vêtus de grandes capes violettes.\r\n\r\n  Harry Potter grandit. Il est malheureux chez son oncle et sa tante qui ne l''aiment pas. Il est tyrannisé par Dudley, le fils infect des Dursley, et sa bande dont le jeu favori est la chasse au Harry.\r\n\r\n  Dix années passent...\r\n\r\n  Le jour de ses 11 ans, Harry apprend de la bouche du géant Hagrid venu le récupérer auprès de la famille Dursley qu''il est le fils de sorciers tués par le représentant des forces du Mal, le terrible Voldemort, le jour de Halloween. Voldemort a également essayé de tuer Harry, âgé de 1 an, mais il n''a pas réussi dans son entreprise. Seul Harry a pu résister au mauvais sort lancé contre la famille Potter...', 1, 'Anglais', 306, 1997, '567572ab5df667bd42d97226d0d095011433609901.jpg', 1, 0),
(6, 'Pétronille', 6, 6, 'Amélie Nothomb relate sa rencontre avec Pétronille Fanto lors d''une dédicace dans une librairie. Rapidement elle sent que cette personne est différente de ses autres lecteurs, un certain charisme s''en dégage, et Nothomb, buveuse de champagne qualifiée, se dit qu''elle pourrait enfin avoir trouvé celle qu''elle convoitait : une compagne de boisson afin de goûter à l''ivresse non plus solitaire mais en couple. L''auteur évoque également une rencontre avec Vivienne Westwood qu''elle devait interviewer ou encore une descente à ski légèrement éméchée.', 3, 'Français', 198, 2014, 'dce5e29119ecf0e2a37d811962ad6f7e1433610301.jpg', 1, 1),
(7, 'La bible selon le chat', 5, 7, 'La Bible selon Le Chat répond à toutes les questions que se posent les humains depuis la nuit des temps. Fini le doute, voici la lumière. Avec cet album, la communauté des hommes va enfin comprendre pourquoi il était vain de s’entre-massacrer depuis tant d’années.\r\nLa vérité sur tout cela, Le Chat nous la révèle dans son onzième commandement (le moins connu, sans doute le plus beau) : « Tu riras de tout, car, vu qu’on va tous crever un jour, seul l’humour te permettra d’avoir un peu de recul sur les vicissitudes de l’existence ».', 5, 'Français', 160, 2013, 'b37aada166effd49d65e0e258748b9631433610467.jpg', 1, 0),
(8, 'Harry Potter et la chambre des secrets', 2, 3, 'Alors que l''oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d''importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition. Il lui annonce que de terribles dangers menacent l''école de Poudlard et qu''il ne doit pas y retourner en septembre. Harry refuse de le croire.\r\nMais sitôt la rentrée des classes effectuée, ce dernier entend une voix malveillante. Celle-ci lui dit que la redoutable et légendaire Chambre des secrets est à nouveau ouverte, permettant ainsi à l''héritier de Serpentard de semer le chaos à Poudlard. Les victimes, retrouvées pétrifiées par une force mystérieuse, se succèdent dans les couloirs de l''école, sans que les professeurs - pas même le populaire Gilderoy Lockhart - ne parviennent à endiguer la menace. Aidé de Ron et Hermione, Harry doit agir au plus vite pour sauver Poudlard.', 3, 'Anglais', 288, 1998, 'dd808379a686f479a1b41fdf5888b8261433610669.jpg', 0, 0),
(9, 'Oscar et la dame en rose', 4, 8, 'Oscar, garçon de dix ans, séjourne à l''hôpital des enfants. Ni les médecins ni ses parents n''osent lui dire la vérité sur sa maladie. Seule Rose, femme à l''air bougon, venue livrer ses pizzas, communique avec lui sans détour. Pour le distraire, Rose propose un jeu à Oscar : faire comme si chaque journée comptait désormais pour dix ans. Elle lui offre ainsi une vie entière en quelques jours. Pour qu''il se confie davantage, elle lui suggère aussi d''écrire à Dieu. Dans ses lettres, Oscar avoue ses douleurs, ses inquiétudes, ses joies, son premier amour, le temps qui passe... Une amitié singulière naît entre Oscar et Rose. Tous deux sont loin d''imaginer à quel point cette complicité va bouleverser leur destin. ', 2, 'Français', 120, 2002, 'ed1e41aca2a8331ae936f42172e81d8b1433611115.gif', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `books_libraries`
--

CREATE TABLE `books_libraries` (
  `id` int(11) unsigned NOT NULL,
  `book_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `books_libraries`
--

INSERT INTO `books_libraries` (`id`, `book_id`, `library_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 5),
(4, 2, 1),
(5, 2, 4),
(6, 2, 6),
(7, 3, 1),
(8, 3, 3),
(9, 4, 1),
(10, 4, 5),
(11, 5, 1),
(12, 5, 3),
(13, 5, 4),
(14, 5, 6),
(15, 6, 3),
(16, 6, 4),
(17, 6, 5),
(18, 7, 1),
(19, 7, 2),
(20, 7, 5),
(21, 8, 3),
(22, 8, 5),
(23, 8, 6),
(24, 9, 5),
(25, 9, 6);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Philosophie naturaliste', 'En philosophie, le naturalisme est la conception selon laquelle tout ce qui existe — objets et événements inclus — ne comporte de cause, d''explication et de fin que naturelle.\r\n\r\nLe naturalisme ne doit pas être confondu avec le matérialisme, qui est une conception portant sur la nature profonde de la réalité. Le matérialisme implique le naturalisme philosophique mais l''inverse n''est pas toujours vrai. Historiquement toutefois, ces deux conceptions du monde se sont développées conjointement.'),
(2, 'Aventure', 'Le roman d’aventures est un type de roman populaire qui met particulièrement l''accent sur l''action en multipliant les péripéties plutôt violentes, dans lequel le lecteur, plutôt masculin et jeune, s''identifie à des héros, en général positifs, et où le souci de la forme littéraire est relativement peu important.\r\n\r\nCentré sur l''intérêt dramatique, le suspense, parfois au détriment de la vraisemblance, le roman d''aventure inclut des personnages nombreux mais simplifiés et des références fonctionnelles à une réalité aussi bien historique que géographique souvent exotique, ce qui le distingue aussi bien du roman d''analyse psychologique que du roman d''analyse sociale ou sociologique qui visent une plus grande complexité. Il est également sous-tendu par une morale plutôt schématique qui divisent les hommes en bons et méchants, le héros (généralement vainqueur) défendant le camp du bien, d''où la place qu''on lui a fait dans la littérature pour la jeunesse.\r\n\r\nLe roman d''aventure (ou d''aventures) qui appartient au domaine de la littérature populaire a connu son âge d''or en Europe entre 1850 et 1950, en France et en Angleterre en particulier, au moment de l''établissement d''empires coloniaux, et aux États-Unis dans le contexte de la conquête de l''ouest : il est marqué en effet par l''exploration du monde dit « sauvage », sa domination par l''Occident et sa transformation par la technologie moderne. De célèbres auteurs de romans d''aventure ont marqué l''histoire du genre comme Walter Scott, Alexandre Dumas père, Fenimore Cooper, Robert Louis Stevenson, Jules Verne, Rudyard Kipling ou Joseph Conrad, avant que ce type de roman ne soit concurrencé fortement par le cinéma populaire, puis à partir de 1950 par les bandes dessinées et aujourd''hui par les séries télévisées et les jeux video.'),
(3, 'Fantastique', 'Le fantastique est un registre littéraire qui se caractérise par l’intrusion du surnaturel dans le cadre réaliste pour un récit. Selon le théoricien de la littérature Tzvetan Todorov, le fantastique se distingue du merveilleux par l''hésitation qu''il produit entre le surnaturel et le naturel, le possible ou l''impossible et parfois entre le logique et l''illogique. Le merveilleux, au contraire, fait appel au surnaturel dans lequel, une fois acceptés les présupposés d''un monde magique, les choses se déroulent de manière presque normale et familière. Le fantastique peut être utilisé au sein des divers genres : policier, science-fiction, horreur, contes, romances, aventures ou encore merveilleux lui-même. Cette définition plaçant le fantastique à la frontière de l''étrange et du merveilleux est généralement acceptée, mais a fait l''objet de nombreuses controverses, telle que celle menée par Stanislas Lem.\r\n\r\nLe héros fantastique a presque systématiquement une réaction de refus, de rejet ou de peur face aux événements surnaturels qui surviennent. Le fantastique est très souvent lié à une atmosphère particulière, une sorte de crispation due à la rencontre de l’impossible. La peur est souvent présente, que ce soit chez le héros ou dans une volonté de l’auteur de provoquer l’angoisse chez le lecteur ; néanmoins ce n’est pas une condition sine qua non du fantastique.'),
(4, 'Policier', 'Le roman policier (familièrement appelé « polar » en France ou parfois « rompol » ) est un roman relevant du genre policier. Le drame y est fondé sur l''attention d''un fait ou, plus précisément, d''une intrigue, et sur une recherche méthodique faite de preuves, le plus souvent par une enquête policière ou encore une enquête de détective privé. L''abréviation policier (pour roman policier) est également utilisée. Le genre policier comporte six invariants : le crime ou délit, le mobile, le coupable, la victime, le mode opératoire et l''enquête. Le roman policier recouvre beaucoup de types de romans, notamment le roman noir et le roman à suspense ou thriller. Si l''action est transposée au minimum d''un siècle en arrière, on pourra le qualifier raisonnablement de roman policier historique. Il existe également des romans policiers de science-fiction.'),
(5, 'Théorie politique', 'La science politique consiste à étudier les processus politiques mettant en jeu des rapports de pouvoir entre les individus, les groupes, et au sein de l''État, mais pas seulement. Des tendances contemporaines tentent de saisir les rapports de forces sur une base transnationale (par exemple, entre diasporas ou entre firmes multinationales) ainsi que certains courants postmodernes qui mettent l''accent sur le langage (philosophie du langage), sur la biopolitique, ou encore sur les conceptions genrées des individus.\r\n\r\nComme de nombreuses disciplines universitaires, la science politique est divisée en sous-disciplines. L''American Political Science Association compte 42 sections organisées. Parmi les sous-disciplines les plus importantes, mentionnons : la philosophie politique, les relations ou études internationales, la politique comparée, l''étude des comportements électoraux, l''administration publique et les politiques publiques.'),
(6, 'Roman', 'Le roman est un genre littéraire, caractérisé pour l''essentiel par une narration fictionnelle plus ou moins longue. La place importante faite à l''imagination transparaît dans certaines expressions comme « C''est du roman ! » ou dans certaines acceptions de l’adjectif « romanesque » qui renvoient à l''extraordinaire des personnages, des situations ou de l''intrigue.'),
(7, 'Bande dessinée', 'Les bandes dessinées sont des récits fondés sur la succession d''images dessinées, accompagnées le plus généralement de textes. La bande dessinée est un mode d''expression propre au XXème siècle, bien qu''il soit né antérieurement ; il se distingue nettement des genres narratifs qui lui sont pourtant apparentés, comme le roman ou le roman-photo. Les bandes dessinées sont publiées sur des supports extrêmement divers : dans la presse générale, qui peut leur consacrer une fraction de page (une simple bande, que l''on appelle un "strip") ou plusieurs pages - voire des suppléments spéciaux -, dans des magazines spécialisés ou sous forme d''albums contenant une ou plusieurs histoires. Souvent humoristique, surtout à ses débuts (d''où son nom de "comics" en anglais), la bande dessinée s''est élargie aux genres les plus divers : l''aventure, le policier, l''espionnage, la comédie dramatique, l''érotisme, etc. '),
(8, 'Dramatique', 'Le drame (du latin drama, emprunté au grec ancien δρᾶμα / drâma, qui signifie « action (théâtrale), pièce de théâtre ») désigne étymologiquement toute action scénique. Il peut donc désigner, au sens large, toute œuvre dramatique. Dans un sens plus restreint, il peut désigner un certain nombre de genres de pièces de théâtre, comme le drame liturgique, le drame historique, le drame bourgeois, le drame romantique, le drame symboliste... Le drame se distingue alors des deux grands genres dramatiques traditionnels, la tragédie et la comédie.');

-- --------------------------------------------------------

--
-- Structure de la table `editions`
--

CREATE TABLE `editions` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `editions`
--

INSERT INTO `editions` (`id`, `name`, `description`, `img_file`) VALUES
(1, 'Folio', 'La marque « Folio » est déposée officiellement le 24 mars 1971 et créée en 1972 à la suite de la rupture avec la maison Hachette concernant Le Livre de poche1. La Condition humaine par André Malraux est le premier titre de cette collection ; suivi de L''Étranger d''Albert Camus. Dès le début, la collection accueille ses auteurs phares et des œuvres classiques.\r\n\r\nLors de sa création, la collection Folio s''est distinguée par l''adoption du format 10x18 cm exactement (10,8x17,8), plus allongé que le format utilisé traditionnellement par les collections de poche d''alors en France. De même, le parti-pris de la collection fut le choix homogénéité graphique et typographique : sur un fond entièrement blanc — clin d''œil à la collection « Blanche » de la NRF, phare de sa maison-mère, Gallimard, et contre-pied des couvertures bigarrées des collections de poche de l''époque — se déclinaient le nom de l''auteur et le titre en police Baskerville Old Face noire, au-dessus d''une illustration forte. Le logotype de la collection s''écrivait dans la même police noire.', 'ae7a2db6602b837315f6a4b554e98f0b1433606917.jpg'),
(2, 'Le livre de poche', 'Le Livre de Poche est la première maison d’édition en format poche en France. 5 000 titres au catalogue, des plus classiques aux plus contemporains, pour tous les goûts et tous les lecteurs !\r\n\r\nLe Livre de poche (parfois abrégé LDP) est, à l''origine, le nom d''une collection littéraire apparue le 9 février 1953 sous l''impulsion d''Henri Filipacchi et éditée par la Librairie générale française, filiale d''Hachette depuis 1954.', '4b9398b1a9c8826b70f8cfc5292f57d21433607101.png'),
(3, 'Gallimard', 'Les Éditions Gallimard, appelées jusqu’en 1919 les éditions de la Nouvelle Revue française et jusqu’en 1961 la librairie Gallimard, sont un groupe d''édition français. La maison d''édition a été fondée par Gaston Gallimard en 1911. Le groupe Gallimard est actuellement dirigé par Antoine Gallimard. Considérée comme l''une des plus importantes et influentes maisons d''édition en France, notamment pour la littérature du XXe siècle et contemporaine, Gallimard possède en 2011 un catalogue constitué de 36 prix Goncourt, 38 écrivains ayant reçu le prix Nobel de littérature, et 10 écrivains récompensés du prix Pulitzer.', '739444d8ad5c8ab69693a5f68ccd69031433607196.gif'),
(4, 'L''aube', 'Les éditions de l''Aube ont été fondées par Marion Hennebert et Jean Viard. Pour elle, la littérature, principalement étrangère. Pour lui, les essais : politique, sciences humaines, aménagement du territoire. Mais l''Aube, c''est avant tout un réseau : amis, auteurs, traducteurs, actionnaires, partenaires, souffleurs d''idées... Cette maison est indépendante, généraliste, passionnée et engagée.', '5820946f88743051b177eb53e6245bae1433607308.jpg'),
(5, 'Casterman', 'Casterman est un éditeur belge de bande dessinée et de livres pour la jeunesse. Le fondateur, Donat Casterman, s''installe comme libraire-relieur en 1776 à Tournai. Il devient éditeur peu après et ensuite imprimeur. Durant tout le XIXe siècle, l''édition développe un important catalogue, largement dédié aux publications religieuses ou édifiantes et aux ouvrages destinés à la jeunesse, en particulier les livres de prix. L''impression et la reliure sont assurées dans les ateliers tournaisiens qui occupent une à deux centaines de personnes.', '531dea13a77f9df4d90b15d6640b78a31433609622.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) unsigned NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `libraries`
--

INSERT INTO `libraries` (`id`, `name`, `address`, `phone`, `img_file`) VALUES
(1, 'Waremme', 'Rue Rewe 13, 4300 Waremme, Belgique', '+32 19 32 29 29', 'ed3209333a85714fd14f1881596acfa31433608257.jpg'),
(2, 'Chiroux', 'Rue des Croisiers 15, 4000 Liège, Belgique', '+32 4 232 86 86', 'c147ad9fd4d9a0adaba7912e66b9b1381433608313.jpg'),
(3, 'Vervier', '4800 Verviers, Belgique', '+32 87 33 84 22', '0d5b1c4c7f720f698946c7f6ab08f6871433608428.jpg'),
(4, 'Bruxelles', 'Rue Haute 247, 1000 Ville de Bruxelles, Belgique', '+32 2 512 88 64', '7aafd5ace1c1b43a7caef2a7712b7df21433608512.jpg'),
(5, 'Huy', 'Rue des Augustins 18/b, 4500 Huy, Belgique', '+32 85 23 07 41', '814be24a3a6ceafa517b6f065064c09d1433608565.png'),
(6, 'Bastogne', 'Rue Gustave Delperdange 5B, 3620 Bastogne, Belgique', '+32 61 21 69 80', 'eeb0e937fe747bada095b6fe23d5e7971433608652.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'lp-admin', '5674b3644aa2548e1a0c09dcd81f11c27fa9c6c3', 1),
(2, 'dv-admin', '7fb1ab98242c942901effb2045f1267654e64be2', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index pour la table `books_libraries`
--
ALTER TABLE `books_libraries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `books_libraries`
--
ALTER TABLE `books_libraries`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `editions`
--
ALTER TABLE `editions`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
