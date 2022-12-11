<?php
/**
 * @var \Illuminate\Database\Eloquent\Builder|\App\Models\Page[] $pages
 * @var \Illuminate\Database\Eloquent\Builder|\App\Models\Article[] $articles
 * @var \Illuminate\Database\Eloquent\Builder|\App\Models\Category[] $categories
 * @var \Illuminate\Database\Eloquent\Builder|\App\Models\Tag[] $tags
 * @var \Illuminate\Database\Eloquent\Builder|\App\Models\User[] $users
 */
?>
<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <loc>{{ route('gallery.index') }}</loc>
        <loc>{{ route('contact.index') }}</loc>
        <loc>{{ route('frontend.projects') }}</loc>
    </url>
    @foreach($pages as $page)
        <url>
            <loc>{{ route('page.show',$page) }}</loc>
        </url>
    @endforeach
    @foreach($concerns as $concern)
        <url>
            <loc>{{ route('concern.show',$concern) }}</loc>
        </url>
    @endforeach
    @foreach($projects as $project)
        <url>
            <loc>{{ route('frontend.project.show',$project) }}</loc>
        </url>
    @endforeach

</urlset>
