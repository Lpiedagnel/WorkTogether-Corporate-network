// Delete button alert
function deleteAlert(id, model) {
    if (window.confirm(`Êtes-vous sûr(e) de supprimer ce ${model === 'message' ? 'message' : 'commentaire'} ?`)) {
        window.location.href= `index.php?controller=${model}&action=delete&id=${id}`
    }
}