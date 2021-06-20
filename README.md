<p align="center">
  <img align="middle" width="400" src="https://poketrader-leod.herokuapp.com/img/poketrader-logo.png">
</p>
<h1 align="center">PokéTrader - A Simple Pokémon trade calculator</h1>

Deploy [here](https://poketrader-leod.herokuapp.com/)


## About the project
PokeTrader is a technical test made for the <b>BxBlue Selective Process</b>. BxBlue is a brazilian startup that works with payroll loans.

## Running it locally
1. Create a MySQL database and change the connection data in [Database.php](https://github.com/leodhb/poketrader/blob/main/app/Libraries/Database.php)
2. Run the MySQL query below
~~~~sql
CREATE TABLE `trades` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `player_1` varchar(45) NOT NULL,
  `player_2` varchar(45) NOT NULL,
  `trade_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
~~~~
3. Now just clone this repository to your apache2 localhost folder

## Questions?
You can contact me through social media or email me at henrikleod@gmail.com. I'll be glad to help 💜
