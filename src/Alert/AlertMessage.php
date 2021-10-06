<?php

namespace App\Alert;

class AlertMessage {

    private $data = [];

    public  function  __construct(array $data)
    {
        $this->data = $data;
    }

    public  function message (): void {

        if (array_key_exists('danger' , $this->data)){
            $this->danger($this->data);
        }

        else if (array_key_exists('success' , $this->data)){
            $this->success($this->data);
        }

        else if (array_key_exists('warning' , $this->data)){
            $this->warning($this->data);
        }

        else if (array_key_exists('info' , $this->data)){
            $this->info($this->data);
        }

        else if (array_key_exists('secondary' , $this->data)){
            $this->secondary($this->data);
        }
    }



    /**
     * @param array $data
     */
    private function  danger (array $data)
    {
        echo "<div class='alert alert-danger'>";
        echo "Vous n'avez pas rempli le formulaire correctement";
            echo "<ul>";
            foreach ($data['danger'] as $key => $message){
                echo "<li>" . $message . "</li>";
            }
            echo "</ul>";
        echo "</div>";
    }



    private function  success (array $data): void
    {
        echo "<div class='alert alert-success'>";
            echo "<ul>";
            foreach ($data['success'] as $key => $message){
                echo "<li>" . $message . "</li>";
            }
            echo "</ul>";
        echo "</div>";
    }


    /**
     * @param array $data
     */
    private function  warning (array $data)
    {
        echo "<div class='alert alert-warning'>";
            echo "<ul>";
            foreach ($data['warning'] as $key => $message){
                echo "<li>" . $message . "</li>";
            }
            echo "</ul>";
        echo "</div>";

    }

    /**
     * @param array $data
     */
    private function  info (array $data)
    {
        echo "<div class='alert alert-info'>";
        echo "<ul>";
        foreach ($data['info'] as $key => $message){
            echo "<li>" . $message . "</li>";
        }
        echo "</ul>";
        echo "</div>";

    }


    /**
     * @param array $data
     */
    private function  secondary (array $data)
    {
        echo "<div class='alert alert-secondary'>";
        echo "<ul>";
        foreach ($data['secondary'] as $key => $message){
            echo "<li>" . $message . "</li>";
        }
        echo "</ul>";
        echo "</div>";

    }

}