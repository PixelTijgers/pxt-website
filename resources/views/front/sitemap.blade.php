<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url($home->slug) }}</loc>
        <lastmod>{{ $home->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
</urlset>
