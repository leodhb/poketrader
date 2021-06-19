<div class="container">
<header class="row poketrader-header mb-4">
        <div class="col-12 text-center mt-4 mb-2">
            <img src="img/poketrader-logo.png" alt="Logomarca do Pokemon Trade" class="branding img-fluid">
            <h1>Histórico</h1>
            <p class="header-subtitle">Aqui você pode consultar o histórico de trocas entre players</p>
        </div>
    </header>
    <div class="row justify-content-center">
        <div class="col-12">
            <?php foreach($data as $trade): 
                $trade_data = json_decode(base64_decode($trade->trade_data));
                $trade_player1 = $trade_data->player1_deck;
                $trade_player2 = $trade_data->player2_deck;
            ?>
                <div class="row mb-4 trade-history-row p-2">
                    <div class="col-12 py-4 text-center">
                        <h5>Troca realizada em <?= $trade->created_at?> entre <b><?= $trade->player_1?></b> e <b><?= $trade->player_2?></b><h5>
                        <hr>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="row trade-player-items pokedex-red">
                            <div class="col-12 text-center">
                                <h1 class="mt-2 text-white"><?= $trade->player_1 ?></h1>
                                <hr>
                            </div>

                            <?php foreach($trade_player1 as $pokemon): ?>
                                <div class="col-md-6 col-12 p-2">
                                    <div class="pokemon-card p-1">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="<?= $pokemon->pokemon_img?>" alt="${props.pokemon_name}" class="img-responsive">
                                            </div>
                                            <div class="col-5 my-auto text-center">
                                                <h5 class="mt-2 pokemon-name"><?= $pokemon->pokemon_name?></h5>
                                                <p class="pokemon-pts"><b>XP: </b><?= $pokemon->pokemon_xp?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-lg-2 col-12">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <img src="img/tradeicon.png" alt="Trocou por" class="img-fluid mt-4 mb-4 trade-icon">
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        
                        <div class="row trade-player-items pokedex-blue">
                                <div class="col-12 text-center">
                                    <h1 class="mt-2 text-white"><?= $trade->player_2 ?></h1>
                                    <hr>
                                </div>

                            <?php foreach($trade_player2 as $pokemon): ?>
                                <div class="col-md-6 col-12 p-2">
                                    <div class="pokemon-card p-1">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="<?= $pokemon->pokemon_img?>" alt="${props.pokemon_name}" class="img-responsive">
                                            </div>
                                            <div class="col-5 my-auto text-center">
                                                <h5 class="mt-2 pokemon-name"><?= $pokemon->pokemon_name?></h5>
                                                <p class="pokemon-pts"><b>XP: </b><?= $pokemon->pokemon_xp?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>