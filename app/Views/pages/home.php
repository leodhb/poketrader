<div class="container">
    <header class="row poketrader-header">
        <div class="col-12 text-center mt-4 mb-2">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12">
                    <img src="img/poketrader-logo.png" alt="Logomarca do Pokemon Trade" class="img-fluid">
                </div>
            </div>
            <h1>Bem-vindo ao PokeTrader!</h1>
            <p class="header-subtitle">Aqui você e seu amigo podem trocar 1 a 6 pokémons cada</p>
            <?php include_once('../app/Views/components/navbar.php'); ?>
        </div>
    </header>
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 text-center p-3">
            <div class="pokedex-outer">
                <div class="pokedex pokedex-red">
                    <h1 class="player-name mr-4"><em id="player_name_p1">PLAYER 1</em> <button class="btn btn-primary ml-4 btn-edit-name" id="name_btn_p1"><i class="fas fa-user-edit"></i></button> </h1>
                    <div class="row p-1 search-wrapper">
                        <div class="col-9 p-0">
                            <input type="text" id="search_input_p1" class="form-control search-input" placeholder="Procure por um Pokémon">
                        </div>
                        <div class="col-3 p-0">
                            <button class="btn btn-primary w-100 search-btn" id="search_btn_p1" data-search="search_input_p1" data-pokedex="pokedex_p1"><i class="fas fa-plus"></i>  </button>
                        </div>
                    </div>
                </div>
                <div class="row pokedex-list p-4" id="pokedex_p1">
                </div>
                <hr>
                <div class="row pb-3 justify-content-center" id="display_xp_sum_p1"></div>
            </div>
        </div>

        <div class="col-md-6 text-center p-3">
            <div class="pokedex-outer">
                <div class="pokedex pokedex-blue">
                    <h1 class="player-name mr-4"><em id="player_name_p2">PLAYER 2</em> <button class="btn btn-primary ml-4 btn-edit-name" id="name_btn_p2"><i class="fas fa-user-edit"></i></button> </h1>
                    <div class="row p-1 search-wrapper">
                        <div class="col-9 p-0">
                            <input type="text" id="search_input_p2" class="form-control search-input" placeholder="Procure por um Pokémon">
                        </div>
                        <div class="col-3 p-0">
                            <button class="btn btn-primary w-100 search-btn" id="search_btn_p2" data-input="search_input_p1" data-pokedex="pokedex_p1"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="row pokedex-list p-4" id="pokedex_p2">
                </div>
                <hr>
                <div class="row pb-3 justify-content-center" id="display_xp_sum_p2"></div>
            </div>
        </div>


        
    </div>
</div>

<div class="container-fluid bottom-nav-pokedex">
<footer class="col-12 text-center">
            <div class="alert alert-primary mt-2 pb-0" role="alert">
                <p id="display_xp_conclusion"></p>
            </div>
            <button class="btn btn-primary btn-lg mb-4" id="trade_btn"><i class="fas fa-exchange-alt"></i> TROCAR</button>
</footer>

</div>