// Fonction pour effectuer une requête GET vers l'API
async function fetchLatestBreach() {
    const apiUrl = "https://haveibeenpwned.com/api/v3/latestbreach";

    try {
        const response = await fetch(apiUrl, {
            method: "GET",
            headers: {
                "User-Agent": "JavaScript-Client",
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        displayLatestBreach(data);
    } catch (error) {
        console.error("Erreur lors de la requête API :", error);
        displayLatestBreachError(error.message);
    }
}

breachInfo.innerHTML = `
    <h4 style="color: red;">Dernière fuite :</h4>
    <ul>
        <li><strong style="font-weight: bold; color: blue;">Nom :</strong> ${data.Name || "Non disponible"}</li>
        <li><strong>Date :</strong> ${data.BreachDate || "Non disponible"}</li>
    </ul>
    `;

    // Fonction pour afficher les résultats sous "Connexion" dans le menu
function displayLatestBreach(data) {
    const menu = document.querySelector(".navmenu ul");
    if (menu) {
        const breachInfo = document.createElement("li");
        breachInfo.innerHTML = `
            <h4>Dernière fuite :</h4>
            <ul>
                <li><strong>Nom :</strong> ${data.Name || "Non disponible"}</li>
                <li><strong>Date :</strong> ${data.BreachDate || "Non disponible"}</li>
            </ul>
        `;
        menu.appendChild(breachInfo);
    }
}

// Fonction pour afficher une erreur en cas de problème
function displayLatestBreachError(message) {
    const menu = document.querySelector(".navmenu ul");
    if (menu) {
        const errorInfo = document.createElement("li");
        errorInfo.innerHTML = `<p>Erreur lors de la récupération des données : ${message}</p>`;
        menu.appendChild(errorInfo);
    }
}

// Appeler la fonction lors du chargement du script
fetchLatestBreach();