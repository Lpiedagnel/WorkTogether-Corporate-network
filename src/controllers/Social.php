<?php

namespace Controllers;

require_once('src/autoload.php');

abstract class Social extends Controller
{
    protected $target_id; // String to define the target inside child controller
    protected $trigger_id; // String to define the trigger of action inside child controller

    public function add()
    {
        $this->checkAuth();

        if (isset($_GET['id'])) {
            
            $data = [
                $this->target_id => htmlspecialchars($_GET['id']),
                $this->trigger_id => $_SESSION['id']
            ];

            $and = " AND {$this->trigger_id} = {$data[$this->trigger_id]}";

            // If trigger has already do this interaction
            if ($previousInteraction = $this->model->findOne($data[$this->target_id], $this->target_id, $and)) {
                $this->model->delete('id', $previousInteraction['id']);
            } else {
            // If not already did this interaction
                $this->model->insert($data);
            }
            
            // Echo the update number of ajax
            $interactions = $this->model->findAll("", $this->target_id . ' ='. $data[$this->target_id]);
            $interactionsNumber = count($interactions);

            echo json_encode($interactionsNumber);
        }
    }
}