// Delete button alert
function deleteAlert(id, model) {
    if (window.confirm(`Êtes-vous sûr(e) de supprimer ce ${model === 'message' ? 'message' : 'commentaire'} ?`)) {
        window.location.href= `index.php?controller=${model}&action=delete&id=${id}`
    }
}

// Change like with Ajax
function changeLike(e, id) {

    e.preventDefault()

    const xhr = new XMLHttpRequest()
    xhr.open('GET', `index.php?controller=likes&action=add&id=${id}`, true)

    xhr.onload = function() {
        if (this.status == 200) {
            const likesCount = JSON.parse(this.responseText)
            const link = e.target

            link.innerHTML = `&#x1F499; J'aime ! ${likesCount > 0 ? "("+likesCount+")" : ""}`
        }
    }

    xhr.send()
}