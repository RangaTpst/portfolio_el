<?php

namespace App\Controllers;

class SitemapController
{
    public function index()
    {
        // Liste des routes publiques, pas des fichiers
        $urls = [
            '/' => '2025-06-20',
            '/projets' => '2025-06-20',
            '/contact' => '2025-06-20',
            '/about' => '2025-06-20',
            '/mentions-legales' => '2025-06-20',
            '/politique-confidentialite' => '2025-06-20',
            '/plan-du-site' => '2025-06-20',
        ];

        header('Content-Type: application/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $path => $lastmod) {
            echo '  <url>' . "\n";
            echo '    <loc>' . htmlspecialchars('https://' . $_SERVER['HTTP_HOST'] . $path) . '</loc>' . "\n";
            echo '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
            echo '    <changefreq>monthly</changefreq>' . "\n";
            echo '    <priority>0.8</priority>' . "\n";
            echo '  </url>' . "\n";
        }

        echo '</urlset>';
    }
}