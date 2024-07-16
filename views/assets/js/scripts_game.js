console.log('scripts_game.js loaded');
games = []
company = []
platformGame = []
globalPlatforms = []

function saveGame (element) {
    // sinopsis assosiative array
    games[element.id] = element;
}

function saveCompanies (companies) {
    // company assosiative array
    for (let i = 0; i < companies.length; i++) {
        company[companies[i].id] = companies[i];
    }

    // console.table(company);
}

function savePlatforms (platforms) {
    // platform assosiative array
    for (let i = 0; i < platforms.length; i++) {
        globalPlatforms[platforms[i].id] = platforms[i];
    }

    // console.table(globalPlatforms);
}

function savePlatformsGames (game_id, platforms) {
    // platformGame assosiative array
    platformGame[game_id] = platforms;
}