document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('number_of_card').addEventListener('input', () => {
        const card = document.getElementById('number_of_card').value || '1';
        const url = `https://pokeapi.co/api/v2/pokemon/${card}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur réseau ou API');
                }
                return response.json();
            })
            .then(content => {
                const cardDiv = document.getElementById('card_html');
                cardDiv.innerHTML = `
                    <h2>${content.name}</h2>
                    <img src="${content.sprites.front_default}">
                    <p>Type: ${content.types.map(type => type.type.name)}</p>
                    <p>Statistiques:</p>
                    <ul>
                        ${content.stats.map(stat => `<li>${stat.stat.name}: ${stat.base_stat}</li>`).join('')}
                    </ul>
                    <p>Capacités:</p>
                    <ul>
                        ${content.abilities.map(ability => `<li>${ability.ability.name}</li>`).join('')}
                `;
            })
            .catch(error => {
                console.error(error);
                const cardDiv = document.getElementById('card_html');
                cardDiv.innerHTML = `<p style="color: red;">Erreur lors de la récupération des données.</p>`;
            });
    });
});