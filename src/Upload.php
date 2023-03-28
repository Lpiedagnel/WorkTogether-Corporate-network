<?php

class upload
{
    public static function checkUpload() {
        // Check if not empty
        if (empty($_FILES)) {
            $message['text'] = "Aucun fichier";
            $message['success'] = false;
        }

        // File type validation
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
        $file_type = mime_content_type($_FILES['img']['tmp_name']);
        if (!in_array($file_type, $allowed_types)) {
            $message['text'] = "Format de fichier invalide. Vous devez utiliser une image au format .jpg, .jpeg ou .png.";
            $message['success'] = false;
        }

        // Limit file size
        $max_size = 1024 * 1024;
        if ($_FILES['img']['size'] > $max_size) {
            $message['text'] = "Le poids de l'image ne doit pas excéder 1 MB.";
            $message['success'] = false;
        }

        $message = isset($message) ? $message : null;

        return $message;
    }

    public static function upload(object $model)
    {           
        // Rename
        $file_name = $_SESSION['id'] . '.jpg';

        $modelName = str_replace('Models\\', '/' ,get_class($model)); 
        $target_dir = 'uploads' . $modelName . '/';
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }

        $target_path = $target_dir . $file_name;

        // Store
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_path)) {
            $message['text'] = "Erreur dans l'hébergement de l'image.";
            $message['success'] = false;
        }

        $message['text'] = "L'image a été téléchargée avec succès.";
        $message['success'] = true;

        return [$message, $target_path];
    }
}