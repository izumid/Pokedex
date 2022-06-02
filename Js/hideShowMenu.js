function showMenu(param){
    x = document.getElementById(param);

    switch(param){
        case 'HistoryAttack':
            x.style.marginTop = "0vh";
            x.style.marginRight = "0vh";

            case 'HistoryAbilities':
            x.style.marginTop = "0vh";
            x.style.marginRight = "0vh";

            case 'HistoryType':
            x.style.marginTop = "0vh";
            x.style.marginRight = "0vh";

            case 'HistoryEvolution':
            x.style.marginTop = "0vh";
            x.style.marginLeft = "0vh";

            case 'HistoryPokemon':
            x.style.marginTop = "0vh";
            x.style.marginLeft = "0vh";
    }
}

function hideMenu(param){
    x = document.getElementById(param);

    switch(param){
        case 'HistoryAttack':
            x.style.marginRight = "-200vh";
            x.style.marginTop = "-200vh";
        break

        case 'HistoryAbilities':
            x.style.marginTop = "200vh";
            x.style.marginRight = "-200vh";
        break

        case 'HistoryType':
            x.style.marginTop = "-200vh";
        break

        case 'HistoryEvolution':
            x.style.marginTop = "-200vh";
            x.style.marginLeft = "-200vh";
        break

        case 'HistoryPokemon':
            x.style.marginTop = "200vh";
            x.style.marginLeft = "-200vh";
         break
    }
}