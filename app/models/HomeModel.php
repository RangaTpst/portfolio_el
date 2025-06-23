<?php

namespace App\Models;

class HomeModel
{
    public function getWelcomeMessage(): string
    {
        return "Bienvenue sur mon portfolio !";
    }
    /***
    public function getFeaturedProjects(): array
    {
        // Imaginons un jour où tu veux afficher 3 projets mis en avant en page d'accueil
        return [
            [
                'name' => 'UNIQ&CO',
                'slug' => 'uniq-and-co',
                'image' => 'assets/img/uniqco.jpg'
            ],
            [
                'name' => 'Passion Foot',
                'slug' => 'passion-foot',
                'image' => 'assets/img/passionfoot.jpg'
            ],
            [
                'name' => 'Origen',
                'slug' => 'origen',
                'image' => 'assets/img/origen.jpg'
            ]
        ];
    }
    ***/
}
