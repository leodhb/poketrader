$(document).ready(function () {
  let player1_deck = [];
  let player2_deck = [];
  let xp_sum_p1 = 0;
  let xp_sum_p2 = 0;

  updateTradePoints();

  $(document).on("click", ".close-btn", function () {
    let delete_id = this.id;
    let pokedex_id = $(this).attr("data-pokedex");
    removePokemonCard(delete_id, pokedex_id);
  });

  $(".search-btn").click(function (e) {
    console.log(this.id);
    let pokedex_id = "";
    let searchbox_id = "";
    let pokedex_lenght = 0;

    switch (this.id) {
      case "search_btn_p1":
        pokedex_id = "#pokedex_p1";
        searchbox_id = "#search_input_p1";
        pokedex_lenght = player1_deck.length;
        break;
      case "search_btn_p2":
        pokedex_id = "#pokedex_p2";
        searchbox_id = "#search_input_p2";
        pokedex_lenght = player2_deck.length;
    }

    let pokemon = $(searchbox_id).val().toLowerCase();
    console.log("TAMANHO", pokedex_lenght);

    if (pokemon) {
      const pokeApi = `https://pokeapi.co/api/v2/pokemon/${pokemon}/`;
      $.ajax({
        url: pokeApi,
        type: "GET",
        dataType: "json",
        success: function (data) {
          const props = {
            pokemon_img: data["sprites"]["front_default"],
            pokemon_name: pokemon,
            pokemon_id: data.id,
            pokemon_xp: data.base_experience,
            diff: generateID(15),
            pokedex_id: pokedex_id,
          };

          switch (pokedex_id) {
            case "#pokedex_p1":
              pokedex_lenght < 6
                ? player1_deck.push(props) && renderPokemonCard(props)
                : alert("Você não pode adicionar mais que 6 pokémons");
                updateTradePoints();
              break;
            case "#pokedex_p2":
              pokedex_lenght < 6
                ? player2_deck.push(props) && renderPokemonCard(props)
                : alert("Você não pode adicionar mais que 6 pokémons");
                updateTradePoints();
          }
        },
        error: function () {},
      });
    }

    $('input').val('');
  });

  const renderPokemonCard = (props) => {
    $(props.pokedex_id).append(`<div class="col-md-6 col-12 p-2" id="pokemon_${
      props.pokemon_id
    }${props.diff}">
        <div class="pokemon-card p-1">
            <img src="img/close.png" alt="Excluir Pokémon" width="25" height="25" class="close-btn" data-pokedex="${props.pokedex_id.replace(
              "#",
              ""
            )}" id="delete_p1_${props.pokemon_id}${props.diff}">
            <div class="row">
                <div class="col-5">
                    <img id="img1" src="${props.pokemon_img}" alt="${
      props.pokemon_name
    }" class="img-responsive">
                </div>
                <div class="col-5 my-auto text-left">
                    <h5 class="mt-2 pokemon-name" id="name1">${
                      props.pokemon_name
                    }</h5>
                    <p class="pokemon-pts" id="xp1">${props.pokemon_xp}</p>
                </div>
            </div>
        </div>
    </div>`);
  };

  const removePokemonCard = (delete_id, pokedex_id) => {
    delete_id = delete_id.split("_").pop();
    switch (pokedex_id) {
      case "pokedex_p1":
        pokedex_lenght = player1_deck.length;
        player1_deck = player1_deck.filter(function (el) {
          return el.diff != delete_id.slice(delete_id.length - 15);
        });
        break;
      case "pokedex_p2":
        pokedex_lenght = player2_deck.length;
        player2_deck = player2_deck.filter(function (el) {
          return el.diff != delete_id.slice(delete_id.length - 15);
        });
    }
    $(`#pokemon_${delete_id}`).remove();
    updateTradePoints();
  };


  /* this type of function cannot use arrow syntax */
  function updateTradePoints() {

    if(player1_deck.length) {
      xp_sum_p1 = player1_deck.map(p => p.pokemon_xp).reduce((a, b) => a + b);
    } else {
      xp_sum_p1 = 0;
    }
    
    if(player2_deck.length) {
      xp_sum_p2 = player2_deck.map(p => p.pokemon_xp).reduce((a, b) => a + b);
    } else {
      xp_sum_p2 = 0;
    }

    $("div#display_xp_sum_p1").html("Pontos: " + xp_sum_p1);
    $("div#display_xp_sum_p2").html("Pontos: " + xp_sum_p2);
    $("p#display_xp_conclusion").html(getDisplayMessage());
  }


  function getDisplayMessage() {
    let display_message = '';
    let percentage_difference = percentage(xp_sum_p1, xp_sum_p2);
    console.log('porcentagem: ', percentage_difference);


    if(xp_sum_p1 === 0 && xp_sum_p2 === 0) {
      display_message = 'Pokedex vazio';
    } else if(percentage_difference > 10) {
      display_message = 'Esta troca não é justa';
    } else {
      display_message = 'Esta troca é Justa!';
    }

    return display_message;
  }

  function percentage(a, b) {
    return  100 * Math.abs( ( a - b ) / ( (a+b)/2 ) );
  }
  
});