<?php

function url(string $path = ''): string
{
    // Détection du chemin de base automatique en local
    $base = $_SERVER['HTTP_HOST'] === 'localhost'
        ? '/portfolio_elisa/public'
        : ''; // en prod, Nginx pointera directement sur /public

    return $base . '/' . ltrim($path, '/');
}
