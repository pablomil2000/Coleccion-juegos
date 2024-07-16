console.log('scripts_game.js loaded');
games = []
company = []
function saveGame (game) {
    // sinopsis assosiative array
    games[game.id] = game;
}

function saveCompanies (companies) {
    // company assosiative array
    for (let i = 0; i < companies.length; i++) {
        company[companies[i].id] = companies[i];
    }

    // console.table(company);
} 