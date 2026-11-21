<?php

use App\Models\Post;
use App\Models\Tag;

it('lists the tags with their published post count', function () {
    $tag = Tag::factory()->create();
    Post::factory()->published()->count(2)->create()->each(fn ($post) => $post->tags()->attach($tag));
    Post::factory()->create(['title' => 'Brouillon'])->tags()->attach($tag);

    $this->getJson('/api/tags')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.slug', $tag->slug)
        ->assertJsonPath('data.0.posts_count', 2);
});

it('filters posts by tag slug', function () {
    $tag = Tag::factory()->create();
    $tagged = Post::factory()->published()->create(['title' => 'Avec tag']);
    $tagged->tags()->attach($tag);
    Post::factory()->published()->create(['title' => 'Sans tag']);

    $this->getJson('/api/posts?tag='.$tag->slug)
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $tagged->id);
});

it('returns a JSON 404 for an unknown tag', function () {
    $this->getJson('/api/tags/999')
        ->assertNotFound()
        ->assertJsonStructure(['message']);
});
