<x-layout>
    <x-slot:title>Posting Page</x-slot:title>
    <form method="POST" action="{{ route('articles.store') }}">
        @csrf
        <input name="judul" placeholder="Title">
        <input name="penulis_id" placeholder="penulis id" type="number" value="1">
        <input name="category_id" placeholder="Title" type="number" value="1">
        <input name="slug" placeholder="slug">
        <textarea name="isi" placeholder="Content"></textarea>
        <button type="submit">Save</button>
    </form>
</x-layout>
