<?php

class upload
{
    public static function checkUpload() {

        $isValid = false;

        try {
            // Check if not empty
            if (empty($_FILES)) {
                throw new \Exception("Aucun fichier envoyé.");
            }

            // File type validation
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
            $file_type = mime_content_type($_FILES['img']['tmp_name']);
            if (!in_array($file_type, $allowed_types)) {
                throw new \Exception("Format de fichier invalide. Vous devez utiliser une image au format .jpg, .jpeg ou .png.");
            }
            
            // Limit file size
            $max_size = 300 * 1024;
            if ($_FILES['img']['size'] > $max_size) {
                throw new \Exception("Le poids de l'image ne doit pas excéder 300 KB.");
            }

            $isValid = true;

        } catch (\Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }

        return $isValid;
    }

    public static function upload(object $model)
    {           
        // Rename
        if (get_class($model) === 'Models\User') {
            $file_name = $_SESSION['id'] . '.jpg';
        } else {
            $file_name = $_SESSION['id'] . '_' . time() . '.jpg';
        }

        // Locate directory or create it
        $modelName = str_replace('Models\\', '/' ,get_class($model)); 
        $target_dir = 'uploads' . $modelName . '/';
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }
        $target_path = $target_dir . $file_name;

        // Store
        try {

            if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_path)) {
                throw new \Exception("Erreur dans l'hébergement de l'image.");
            }

            $_SESSION['message'] = "L'image a été téléchargée avec succès.";
            return [$target_path];

        } catch (\Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
        }
    }
}