<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_view_article_index()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/articles');

        $response->assertStatus(200);
        $response->assertViewIs('articles.posts');
    }

    /** @test */
    public function authenticated_user_can_create_article()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $formData = [
            'judul' => 'Test Article',
            'category_id' => $category->id,
            'isi' => 'This is the article content.',
        ];

        $response = $this->post('/articles', $formData);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('articles', [
            'judul' => 'Test Article',
            'penulis_id' => $user->id,
        ]);
    }

    /** @test */
    public function it_requires_validation_when_creating_article()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/articles', []);

        $response->assertSessionHasErrors(['judul', 'category_id', 'isi']);
    }

    /** @test */
    public function can_view_article_post()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $article = Article::factory()->create();

        $response = $this->get("/articles/post/{$article->slug}");

        $response->assertStatus(200);
        $response->assertViewIs('articles.post');
        $response->assertViewHas('article', $article);
    }

    /** @test */
    public function can_view_articles_by_category()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $article = Article::factory()->create(['category_id' => $category->id]);

        $response = $this->get("/articles/category/{$category->slug}");

        $response->assertStatus(200);
        $response->assertViewIs('articles.posts');
    }

    /** @test */
    public function can_view_articles_by_specific_author()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $author = User::factory()->create();
        $articlesByAuthor = Article::factory(2)->create([
            'penulis_id' => $author->id,
        ]);

        // Act (visit the author's article page)
        $response = $this->get("/penulis/articles/{$author->username}");

        // Assert (check response, view, and data)
        $response->assertStatus(200);
        $response->assertViewIs('articles.posts');
        $response->assertViewHas('artikel');

        // check that returned articles belong to the author
        $artikelData = $response->viewData('artikel');
        $this->assertTrue(
            $artikelData->every(fn($article) => $article->penulis_id === $author->id)
        );
    }
}
