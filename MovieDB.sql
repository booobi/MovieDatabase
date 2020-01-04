-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 07:46 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryId` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `Name`, `IsActive`, `Description`) VALUES
(1, 'Drama', b'1', 'Category drama'),
(2, 'Action', b'1', 'Category action'),
(3, 'Thriller', b'1', 'Category thriller'),
(4, 'Comedy', b'1', 'Category comedy'),
(5, 'Horror', b'1', 'Category horror'),
(6, 'Documentary', b'1', 'Category documentary'),
(7, 'Mistery', b'1', 'Category mistery');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `CommentId` int(11) NOT NULL,
  `OwnerId` int(11) NOT NULL,
  `ParentPostId` int(11) NOT NULL,
  `AnswerToCommentId` int(11) NOT NULL,
  `Content` varchar(250) NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events_participants`
--

CREATE TABLE IF NOT EXISTS `events_participants` (
  `Events_ParticipantsId` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL,
  `EventId` int(11) NOT NULL,
  `IsApproved` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `movieevents`
--

CREATE TABLE IF NOT EXISTS `movieevents` (
  `MovieEventId` int(11) NOT NULL,
  `Name` varchar(150),
  `Duration` int(11) NOT NULL,
  `MovieId` int(11) NOT NULL,
  `OwnerId` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `movieevents`(`MovieEventId`,`Name`,`Duration`,`MovieId`, `OwnerId`, `Time`, `Location`) VALUES 
(1,'Mladost Party',66,4,4,date_format(DATE_ADD(NOW() ,  INTERVAL 3 HOUR),'%Y-%m-%d %H'),'Mladost Kino Arena'),
(2,'Lulin Party',70,2,4,date_format(DATE_ADD(NOW() ,  INTERVAL 1 Day),'%Y-%m-%d %H'),'Lulin Kino Cinemax'),
(3,'Arena Armeec Party',120,3,4,date_format(DATE_ADD(NOW() ,  INTERVAL 2 Day),'%Y-%m-%d %H'),'Arena Armeec');

-- --------------------------------------------------------

--
-- Table structure for table `movieexchanges`
--

CREATE TABLE IF NOT EXISTS `movieexchanges` (
  `Movie_ExchangesId` int(11) NOT NULL,
  `ExchangeRequestBy` int(11) NOT NULL,
  `ExchangeRequestTo` int(11) NOT NULL,
  `MovieToShare` int(11) NOT NULL,
  `RequesterRating` float DEFAULT NULL,
  `ApprovalRating` float DEFAULT NULL,
  `IsApproved` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `movieexchanges` 
(`Movie_ExchangesId`, `ExchangeRequestBy`, `ExchangeRequestTo`, 
`MovieToShare`, `RequesterRating`, `ApprovalRating`, `IsApproved`) VALUES 
(1, 1, 4, 1, 5, 6, 0), (2, 4, 1, 2, 6, 5, 0), (5, 6, 4, 5, 5, 6, 0);
-- --------------------------------------------------------

--
-- Table structure for table `moviefestivals`
--

CREATE TABLE IF NOT EXISTS `moviefestivals` (
  `MovieFestivalId` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `moviefestivals`(`MovieFestivalId`, `Name`, `Description`) 
VALUES 
(1,'Arctic Film Festival','Arctic Film Festival is an annual film festival held in September in the Norwegian archipelago, Svalbard\'s town, Longyearbyen.'),
(2,'British Urban Film Festival','The British Urban Film Festival (BUFF) was formed in July 2005 to showcase urban independent cinema in the absence of any such state-sponsored activity in the UK.'),
(3,'Camerimage','The International Film Festival of the Art of Cinematography Camerimage is a festival dedicated to the celebration of cinematography and recognition of its creators, cinematographers.'),
(4,'Cannes Film Festival','The Cannes Festival until 2002 called the International Film Festival (Festival international du film) and known in English as the Cannes Film Festival, is an annual film festival held in Cannes, France.');

-- --------------------------------------------------------

--
-- Table structure for table `movieparticipants`
--

CREATE TABLE IF NOT EXISTS `movieparticipants` (
  `MovieParticipantId` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Position` varchar(150) NOT NULL,
  `UpdatedOn` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `CreatedOn` TIMESTAMP NOT NULL DEFAULT NOW()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- DATA FOR MOVIEPARTICIPANTS
--
INSERT INTO `movieparticipants`(`MovieParticipantId`, `FirstName`, `LastName`, `Position`) VALUES 
(1, "Tim", "Robbins","actor"),
(2, "Morgan", "Freeman","actor"),
(3, "Bob", "Gunton","actor"),
(4, "William", "Sadler","actor"),
(5, "Frank", "Darabont","director"),

(6, "Marlon", "Brando","actor"),
(7, "Al", "Pacino","actor"),
(8, "Francis", "Coppola","director"),

(9, "Marlon", "Brando","actor"),
(10, "Al", "Pacino","actor"),
(11, "Francis", "Coppola","director"),

(12, "Christian", "Bale","actor"),
(13, "Heath", "Ledger","actor"),
(14, "Aaron", "Eckhart","actor"),
(15, "Michael", "Caine","actor"),
(16, "Christopher", "Nolan","director"),

(17, "Martin", "Balsam","actor"),
(18, "John", "Fiedler","actor"),
(19, "Lee", "Cobb","actor"),
(20, "Jack", "Klugman","actor"),
(21, "Sidney", "Lumet","director"),

(22, "Liam", "Neeson","actor"),
(23, "Ben", "Kingsley","actor"),
(24, "Ralph", "Fiennes","actor"),
(25, "Caroline", "Goodall","actor"),
(26, "Steven", " Spielberg","director"),

(27, "Noel", "Appleby","actor"),
(28, "Ali", "Astin","actor"),
(29, "Sean", "Astin","actor"),
(30, "Peter", "Jackson","director"),

(31, "Tim", "Roth","actor"),
(32, "Amanda", "Plummer","actor"),
(33, "Laura", "Lovelace","actor"),
(34, "Quentin", "Tarantino","director"),

(35, "Eli", "Wallach","actor"),
(36, "Clint", "Eastwood","actor"),
(37, "Lee Van", "Cleef","actor"),
(38, "Sergio", "Leone","director"),
 
(39, "Edward", "Norton","actor"),
(40, "Brad", "Pitt","actor"),
(41, "Meat", "Loaf","actor"),
(42, "David", "Fincher","director");


--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `MovieId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ReleaseDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` varchar(250) DEFAULT NULL,
  `Link` varchar(200) DEFAULT NULL,
  `Country` varchar(150) NOT NULL,
  `Language` varchar(150) NOT NULL,
  `MovieRating` float NOT NULL DEFAULT '0',
  `IMDBRating` float DEFAULT '0',
  `PosterImgSrc` varchar(150) NOT NULL,
  `TrailerSrc` varchar(150) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL,
  `Duration` time NOT NULL,
  `Tags` varchar(150) NOT NULL DEFAULT '',
  `Rewards` varchar(250) DEFAULT NULL,
  `MovieStudio` varchar(250) DEFAULT NULL,
  `MusicStudio` varchar(250) DEFAULT NULL,
  `UpdatedOn` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `CreatedOn` TIMESTAMP NOT NULL DEFAULT NOW()
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MovieId`, `Name`, `ReleaseDate`, `Description`, `Link`, `Country`, `Language`, `MovieRating`, `IMDBRating`, `PosterImgSrc`, `TrailerSrc`, `IsActive`, `Duration`, `Tags`, `Rewards`) VALUES
(1, 'The Shawshank Redemption', '1993-12-31', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'https://www.imdb.com/title/tt0111161/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_1', 'USA', 'English', 0, 9.3, 'https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg', 'https://www.youtube.com/watch?v=6hB3S9bIaco', b'1', '02:22:00', '', '20/20 Awards - Best Adapted Screenplay'),
(2, 'The Godfather', '1971-12-31', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'https://www.imdb.com/title/tt0068646/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_2', 'USA', 'English', 0, 9.2, 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SY1000_CR0,0,704,1000_AL_.jpg', 'https://www.youtube.com/watch?v=sY1S34973zA', b'1', '02:55:00', '', 'Academy Award for Best Actor'),
(3, 'The Godfather: Part II', '1974-12-12', 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.', 'https://www.imdb.com/title/tt0071562/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_3', 'USA', 'English', 0, 9, 'https://m.media-amazon.com/images/M/MV5BMWMwMGQzZTItY2JlNC00OWZiLWIyMDctNDk2ZDQ2YjRjMWQ0XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SY1000_CR0,0,701,1000_AL_.jpg', 'https://www.youtube.com/watch?v=9O1Iy9od7-A', b'1', '03:22:00', '', 'Academy Award for Best Picture'),
(4, 'The Dark Knight', '2008-07-25', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'https://www.imdb.com/title/tt0468569/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_4', 'USA', 'English', 0, 9, 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SY1000_CR0,0,675,1000_AL_.jpg', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', b'1', '02:32:00', '', 'Academy Award for Best Actor in a Supporting Role'),
(5, '12 Angry Men', '1957-04-10', 'A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence.', 'https://www.imdb.com/title/tt0050083/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_5', 'USA', 'English', 0, 8.9, 'https://m.media-amazon.com/images/M/MV5BMWU4N2FjNzYtNTVkNC00NzQ0LTg0MjAtYTJlMjFhNGUxZDFmXkEyXkFqcGdeQXVyNjc1NTYyMjg@._V1_SY1000_CR0,0,649,1000_AL_.jpg', 'https://www.youtube.com/watch?v=Z4Ym5vBfk50', b'1', '01:36:00', '', 'Writers Guild of America Award for Best Written Drama'),
(6, 'Schindler''s List', '1992-12-31', 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 'https://www.imdb.com/title/tt0108052/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_6', 'USA', 'English', 0, 8.9, 'https://m.media-amazon.com/images/M/MV5BNDE4OTMxMTctNmRhYy00NWE2LTg3YzItYTk3M2UwOTU5Njg4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SY1000_CR0,0,666,1000_AL_.jpg', 'https://www.youtube.com/watch?v=gG22XNhtnoY', b'1', '03:15:00', '', 'Academy Award for Best Picture'),
(7, 'The Lord of the Rings: The Return of the King', '2002-12-31', 'Gandalf and Aragorn lead the World of Men against Sauron''s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 'https://www.imdb.com/title/tt0167260/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_7', 'USA', 'English', 0, 8.9, 'https://m.media-amazon.com/images/M/MV5BNzA5ZDNlZWMtM2NhNS00NDJjLTk4NDItYTRmY2EwMWZlMTY3XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SY1000_CR0,0,675,1000_AL_.jpg', 'https://www.youtube.com/results?search_query=The+Lord+of+the+Rings%3A+The+Return+of+the+King', b'1', '03:21:00', '', 'Academy Award for Best Visual Effects'),
(8, 'Pulp Fiction', '1993-12-31', 'he lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'https://www.imdb.com/title/tt0110912/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_8', 'USA', 'English', 0, 8.9, 'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SY1000_CR0,0,686,1000_AL_.jpg', 'https://www.youtube.com/watch?v=s7EdQ4FqbhY', b'1', '02:34:00', '', 'Palme dOr'),
(9, 'The Good, the Bad and the Ugly', '1966-12-23', 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.', 'https://www.imdb.com/title/tt0060196/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_9', 'USA', 'English', 0, 8.8, 'https://m.media-amazon.com/images/M/MV5BOTQ5NDI3MTI4MF5BMl5BanBnXkFtZTgwNDQ4ODE5MDE@._V1_SY1000_CR0,0,656,1000_AL_.jpg', 'https://www.youtube.com/watch?v=WCN5JJY_wiA', b'1', '02:58:00', '', 'None'),
(10, 'Fight Club', '1999-09-10', 'An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.', 'https://www.imdb.com/title/tt0137523/?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=e31d89dd-322d-4646-8962-327b42fe94b1&pf_rd_r=2B0KGJBCJ189MC86XCHS&pf_rd_s=center-1&pf_rd_t=15506&pf_rd_i=top&ref_=chttp_tt_10', 'USA', 'English', 0, 8.8, 'https://m.media-amazon.com/images/M/MV5BMmEzNTkxYjQtZTc0MC00YTVjLTg5ZTEtZWMwOWVlYzY0NWIwXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SY1000_CR0,0,666,1000_AL_.jpg', 'https://www.youtube.com/watch?v=qtRKdVHc-cE', b'1', '02:19:00', '', 'Best Effects, Sound Effects Editing');

-- --------------------------------------------------------

--
-- Table structure for table `movies_categories`
--

CREATE TABLE IF NOT EXISTS `movies_categories` (
  `Movies_CategoriesId` int(11) NOT NULL,
  `MovieId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies_categories`
--

INSERT INTO `movies_categories` (`Movies_CategoriesId`, `MovieId`, `CategoryId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3),
(4, 4, 2),
(5, 10, 2),
(6, 10, 3),
(7, 8, 2),
(8, 8, 3),
(9, 6, 1),
(10, 9, 2),
(11, 7, 2),
(12, 7, 3),
(13, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies_participants`
--

CREATE TABLE IF NOT EXISTS `movies_participants` (
  `Movies_ParticipantsId` int(11) NOT NULL,
  `MovieId` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL,
  `IsMainActor` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- DATA FOR MOVIES_PARTICIPANTS
--
INSERT INTO `movies_participants`(`Movies_ParticipantsId`, `MovieId`, `ParticipantId`, `IsMainActor`) VALUES 
(1,1,1,1),
(2,1,2,1),
(3,1,3,1),
(4,1,4,0),
(5,1,5,0),

(6,2,6,1),
(7,2,7,1),
(8,2,8,0),

(9,3,9,1),
(10,3,10,1),
(11,3,11,0),

(12,4,12,1),
(13,4,13,1),
(14,4,14,0),
(15,4,15,0),
(16,4,16,0),

(17,5,17,1),
(18,5,18,1),
(19,5,19,1),
(20,5,20,1),
(21,5,21,0),

(22,6,22,1),
(23,6,23,1),
(24,6,24,1),
(25,6,25,0),
(26,6,26,0),

(27,7,27,1),
(28,7,28,1),
(29,7,29,1),
(30,7,30,0),

(31,8,31,1),
(32,8,32,1),
(33,8,33,1),
(34,8,34,0),

(35,9,35,1),
(36,9,36,1),
(37,9,37,1),
(38,9,38,0),

(39,10,39,1),
(40,10,40,1),
(41,10,41,0),
(42,10,42,0);

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `PostId` int(11) NOT NULL,
  `OwnerId` int(11) NOT NULL,
  `MovieId` int(11) DEFAULT NULL,
  `Rating` float NOT NULL,
  `Content` varchar(250) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userratings`
--

CREATE TABLE IF NOT EXISTS `userratings` (
  `UserRatingId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL,
  `MovieRating` float NOT NULL,
  `PostRating` float,
  `PostId` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `IsActive` bit(1) NOT NULL,
  `IsMalicious` bit(1) NOT NULL,
  `IsApprovedByAdmin` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `Password`, `Email`, `Role`, `IsActive`, `IsMalicious`, `IsApprovedByAdmin`) VALUES
(1, 'test', 'test', 'test', 'test', 'user', b'0', b'0', b'0'),
(4, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'qweqew@abv.bg', 'user', b'0', b'0', b'0'),
(5, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'qweqe2w@abv.bg', 'user', b'0', b'0', b'0'),
(6, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'pvasilev@abv.bg', 'user', b'0', b'0', b'0'),
(7, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'pva2silev@abv.bg', 'standard', b'0', b'0', b'0'),
(11, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'pvasilev9525@gmail.com', 'standard', b'0', b'0', b'0'),
(12, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'penko@abv.bg', 'standard', b'0', b'0', b'0'),
(13, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'penk1o@abv.bg', 'standard', b'0', b'0', b'0'),
(14, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'penko123@abv.bg', 'standard', b'0', b'0', b'0'),
(15, 'dae', 'dae', '643b8280a923483a65784bf99ff49f29', 'balyci@abv.bg', 'standard', b'0', b'0', b'0'),
(16, 'penko', 'vasilev', '4297f44b13955235245b2497399d7a93', 'qqq@abv.bg', 'standard', b'0', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `user_owned_movies`
--

CREATE TABLE IF NOT EXISTS `user_owned_movies` (
  `User_Owned_MoviesId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `MovieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `watchlateritems`
--

CREATE TABLE IF NOT EXISTS `watchlateritems` (
  `WatchLaterItemId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `MovieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryId`), ADD UNIQUE KEY `CategoryId_UNIQUE` (`CategoryId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentId`), ADD UNIQUE KEY `CommentId_UNIQUE` (`CommentId`), ADD KEY `OwnerId_idx` (`OwnerId`), ADD KEY `ParentPostId_idx` (`ParentPostId`), ADD KEY `AnswerToCommentId_idx` (`AnswerToCommentId`);

--
-- Indexes for table `events_participants`
--
ALTER TABLE `events_participants`
  ADD PRIMARY KEY (`Events_ParticipantsId`), ADD UNIQUE KEY `Events_ParticipantsId_UNIQUE` (`Events_ParticipantsId`), ADD KEY `ParticipantId_idx` (`ParticipantId`), ADD KEY `EventId_idx` (`EventId`);

--
-- Indexes for table `movieevents`
--
ALTER TABLE `movieevents`
  ADD PRIMARY KEY (`MovieEventId`), ADD UNIQUE KEY `MovieEventId_UNIQUE` (`MovieEventId`), ADD KEY `MovieId_idx` (`MovieId`), ADD KEY `OwnerId_idx` (`OwnerId`);

--
-- Indexes for table `movieexchanges`
--
ALTER TABLE `movieexchanges`
  ADD PRIMARY KEY (`Movie_ExchangesId`), ADD UNIQUE KEY `Movie_ExchangesId_UNIQUE` (`Movie_ExchangesId`), ADD KEY `ExchangeRequestedBy_idx` (`ExchangeRequestBy`), ADD KEY `ExchangeRequestedTo_idx` (`ExchangeRequestTo`), ADD KEY `MovieToShare_idx` (`MovieToShare`);

--
-- Indexes for table `moviefestivals`
--
ALTER TABLE `moviefestivals`
  ADD PRIMARY KEY (`MovieFestivalId`), ADD UNIQUE KEY `MovieFestivalId_UNIQUE` (`MovieFestivalId`);

--
-- Indexes for table `movieparticipants`
--
ALTER TABLE `movieparticipants`
  ADD PRIMARY KEY (`MovieParticipantId`), ADD UNIQUE KEY `MovieParticipantId_UNIQUE` (`MovieParticipantId`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MovieId`), ADD UNIQUE KEY `idMovies_UNIQUE` (`MovieId`);

--
-- Indexes for table `movies_categories`
--
ALTER TABLE `movies_categories`
  ADD PRIMARY KEY (`Movies_CategoriesId`), ADD UNIQUE KEY `Movies_CategoriesId_UNIQUE` (`Movies_CategoriesId`), ADD KEY `MovieId_idx` (`MovieId`), ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `movies_participants`
--
ALTER TABLE `movies_participants`
  ADD PRIMARY KEY (`Movies_ParticipantsId`), ADD UNIQUE KEY `Movies_ParticipantsId_UNIQUE` (`Movies_ParticipantsId`), ADD KEY `ParticipantId_idx` (`ParticipantId`), ADD KEY `MovieId_idx` (`MovieId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostId`), ADD UNIQUE KEY `PostId_UNIQUE` (`PostId`), ADD KEY `OwnerId_idx` (`OwnerId`), ADD KEY `MovieId_idx` (`MovieId`);

--
-- Indexes for table `userratings`
--
ALTER TABLE `userratings`
  ADD PRIMARY KEY (`UserRatingId`), ADD UNIQUE KEY `UserRatingId_UNIQUE` (`UserRatingId`), ADD KEY `UserId_idx` (`UserId`), ADD KEY `MovieId_idx` (`MovieID`), ADD KEY `PostId_idx` (`PostId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `UserId_UNIQUE` (`UserId`);

--
-- Indexes for table `user_owned_movies`
--
ALTER TABLE `user_owned_movies`
  ADD PRIMARY KEY (`User_Owned_MoviesId`), ADD UNIQUE KEY `User_Owned_MoviesId_UNIQUE` (`User_Owned_MoviesId`), ADD KEY `UserId_idx` (`UserId`), ADD KEY `MovieId_idx` (`MovieId`);

--
-- Indexes for table `watchlateritems`
--
ALTER TABLE `watchlateritems`
  ADD PRIMARY KEY (`WatchLaterItemId`), ADD UNIQUE KEY `WatchLaterItemId_UNIQUE` (`WatchLaterItemId`), ADD KEY `UserId_idx` (`UserId`), ADD KEY `MovieId_idx` (`MovieId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events_participants`
--
ALTER TABLE `events_participants`
  MODIFY `Events_ParticipantsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movieevents`
--
ALTER TABLE `movieevents`
  MODIFY `MovieEventId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movieexchanges`
--
ALTER TABLE `movieexchanges`
  MODIFY `Movie_ExchangesId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `moviefestivals`
--
ALTER TABLE `moviefestivals`
  MODIFY `MovieFestivalId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movieparticipants`
--
ALTER TABLE `movieparticipants`
  MODIFY `MovieParticipantId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MovieId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `movies_categories`
--
ALTER TABLE `movies_categories`
  MODIFY `Movies_CategoriesId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `movies_participants`
--
ALTER TABLE `movies_participants`
  MODIFY `Movies_ParticipantsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userratings`
--
ALTER TABLE `userratings`
  MODIFY `UserRatingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_owned_movies`
--
ALTER TABLE `user_owned_movies`
  MODIFY `User_Owned_MoviesId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `watchlateritems`
--
ALTER TABLE `watchlateritems`
  MODIFY `WatchLaterItemId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `AnswerToCommentId` FOREIGN KEY (`AnswerToCommentId`) REFERENCES `comments` (`CommentId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `OwnerId` FOREIGN KEY (`OwnerId`) REFERENCES `users` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `ParentPostId` FOREIGN KEY (`ParentPostId`) REFERENCES `posts` (`PostId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `events_participants`
--
ALTER TABLE `events_participants`
ADD CONSTRAINT `EventIdE` FOREIGN KEY (`EventId`) REFERENCES `movieevents` (`MovieEventId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `ParticipantIdE` FOREIGN KEY (`ParticipantId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `movieevents`
--
ALTER TABLE `movieevents`
ADD CONSTRAINT `MovieIdE` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`MovieId`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `OwnerIdE` FOREIGN KEY (`OwnerId`) REFERENCES `users` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `movieexchanges`
--
ALTER TABLE `movieexchanges`
ADD CONSTRAINT `ExchangeRequestedBy` FOREIGN KEY (`ExchangeRequestBy`) REFERENCES `users` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `ExchangeRequestedTo` FOREIGN KEY (`ExchangeRequestTo`) REFERENCES `users` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `MovieToShare` FOREIGN KEY (`MovieToShare`) REFERENCES `movies` (`MovieId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `movies_categories`
--
ALTER TABLE `movies_categories`
ADD CONSTRAINT `CategoryId` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`),
ADD CONSTRAINT `MovieId` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`MovieId`) ON DELETE CASCADE;

--
-- Constraints for table `movies_participants`
--
ALTER TABLE `movies_participants`
ADD CONSTRAINT `MovieIdP` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`MovieId`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `ParticipantId` FOREIGN KEY (`ParticipantId`) REFERENCES `movieparticipants` (`MovieParticipantId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `MovieIdPosts` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`MovieId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `OwnerIdP` FOREIGN KEY (`OwnerId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `userratings`
--
-- ALTER TABLE `userratings`
-- ADD CONSTRAINT `MovieIdR` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MovieId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
-- ADD CONSTRAINT `PostIdR` FOREIGN KEY (`PostId`) REFERENCES `posts` (`PostId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
-- ADD CONSTRAINT `UserIdR` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_owned_movies`
--
ALTER TABLE `user_owned_movies`
ADD CONSTRAINT `MovieIdOw` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`MovieId`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `UserIdOw` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `watchlateritems`
--
ALTER TABLE `watchlateritems`
ADD CONSTRAINT `MovieIdW` FOREIGN KEY (`MovieId`) REFERENCES `movies` (`MovieId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `UserIdW` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
