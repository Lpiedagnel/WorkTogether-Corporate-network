// Delete button alert
function deleteAlert(id, model) {
    if (window.confirm(`Êtes-vous sûr(e) de supprimer ce ${model === 'message' ? 'message' : 'commentaire'} ?`)) {
        window.location.href= `index.php?controller=${model}&action=delete&id=${id}`
    }
}

// Update interaction with AJAX
function socialInteraction(e, controller, id) {

    e.preventDefault()

    const xhr = new XMLHttpRequest()
    xhr.open('GET', `index.php?controller=${controller}&action=add&id=${id}`, true)

    xhr.onload = function() {
        if (this.status == 200) {

            const link = e.target

            switch (controller) {
                case "likes":
                    const likesCount = JSON.parse(this.responseText)
                    link.innerHTML = `&#x1F499; J'aime ! ${likesCount > 0 ? "("+likesCount+")" : ""}`
                    break
                
                case "follow":
                    link.className = link.className === "t-center" ? "outline" : "t-center";
                    link.textContent = link.textContent === "Suivre" ? "Suivi" : "Suivre";
                    break

                default:
                    break
            }
        }
    }

    xhr.send()
}