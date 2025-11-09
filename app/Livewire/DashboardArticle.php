<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class DashboardArticle extends Component
{
    use WithPagination;

    public $judul, $isi, $selectedCategory, $articleId;

    // public $selectedArticles = [];
    public $selectedArticles = [];

    public $showEditModal = false;

    public array $selectedCategories = [];

    // public $categories = [];
    public $search = '';

    // reset pagination when search changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function editModal($id)
    {
        $articles = Article::findOrFail($id);

        $this->articleId = $id;
        $this->judul = $articles->judul;
        $this->isi = $articles->isi;
        $this->selectedCategory = $articles->category_id;

        $this->showEditModal = true;
    }

    public function updateArticle()
    {
        $this->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'selectedCategory' => 'required|integer',
        ]);

        $article = Article::findOrFail($this->articleId);

        $article->update([
            'judul' => $this->judul,
            'isi' => $this->isi,
            'category_id' => $this->selectedCategory,
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Article updated successfully!');

        $this->showEditModal = false;
    }

    public function deleteArticle($id)
    {
        $article = Article::where('penulis_id', Auth::id()) // only delete own articles
            ->findOrFail($id);

        $article->delete();

        session()->flash('success', 'Article deleted successfully!');
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            // get only IDs (array), not paginator
            $this->selectedArticles = Article::query()
                ->where('penulis_id', Auth::id())
                ->when(
                    $this->search,
                    fn($q) =>
                    $q->where('judul', 'like', '%' . $this->search . '%')
                )
                ->when(
                    !empty($this->selectedCategories),
                    fn($q) =>
                    $q->whereIn('category_id', $this->selectedCategories)
                )
                ->pluck('id') // only IDs
                ->toArray();
        } else {
            $this->selectedArticles = [];
        }
    }

    // Delete selected
    public function deleteSelected()
    {
        Article::whereIn('id', $this->selectedArticles)->delete();
        $this->selectedArticles = [];
        session()->flash('message', 'Selected articles deleted successfully.');
    }

    public function render()
    {
        $articles = Article::query()
            ->where('penulis_id', Auth::id())
            ->when(
                $this->search,
                fn($q) =>
                $q->where('judul', 'like', '%' . $this->search . '%')
            )
            ->when(
                !empty($this->selectedCategories),
                fn($q) =>
                $q->whereIn('category_id', $this->selectedCategories)
            )
            ->latest()
            ->paginate(5);

        // $this->article = $articles;

        return view('livewire.dashboard-article', [
            'articles' => $articles,
            'categories' => Category::all(),
        ]);
    }
}
