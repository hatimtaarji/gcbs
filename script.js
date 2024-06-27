document.addEventListener('DOMContentLoaded', () => {
    const searchBar = document.getElementById('searchBar');
    const searchResults = document.getElementById('searchResults');
    <form name="contact" netlify></form>

    searchBar.addEventListener('input', () => {
        const query = searchBar.value.trim().toLowerCase();
        if (query !== '') {
            searchClients(query);
        } else {
            searchResults.innerHTML = '';
        }
    });

    async function searchClients(query) {
        try {
            const response = await fetch(`search_clients.php?query=${query}`);
            const result = await response.text();
            searchResults.innerHTML = result;
        } catch (error) {
            console.error('Erreur:', error);
        }
    }
});
