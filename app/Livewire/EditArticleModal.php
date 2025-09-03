<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class EditArticleModal extends Component
{
    public $articleId;
    public $judul;
    public $isi;
    public $categoryId;

    public $categories;

    protected $listeners = ['debugModal' => 'testClick'];

    public function testClick()
    {
        dd('Livewire is working ✅');
    }

    public function mount($articleId, $categories)
    {
        $this->articleId = $articleId;

        $article = Article::findOrFail($articleId);

        // dd("Ini adalah nilai article: " . $article . " dan ini adalah category: " . json_encode($categories, JSON_PRETTY_PRINT));

        // Prefill inputs automatically
        $this->judul = $article->judul;
        $this->isi = $article->isi;
        $this->categoryId = $article->category_id;
        $this->categories = $categories;
    }

    public function updateArticle()
    {
        dd('executed');
        $this->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'categoryId' => 'required|integer',
        ]);

        $article = Article::findOrFail($this->articleId);

        $article->update([
            'judul' => $this->judul,
            'isi' => $this->isi,
            'category_id' => $this->categoryId,
        ]);

        session()->flash('success', 'Article updated successfully!');

        // If using modal, close it
        $this->dispatchBrowserEvent('close-modal');
    }

}
