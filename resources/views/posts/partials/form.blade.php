<label for="title">Judul</label>
<input id="title" type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required>

<label for="content">Konten</label>
<textarea id="content" name="content" required>{{ old('content', $post->content ?? '') }}</textarea>

<label>Tags</label>
<div class="checkbox-list">
    @php
        $selectedTags = old('tags', isset($post) ? $post->tags->pluck('id')->toArray() : []);
    @endphp

    @forelse ($tags as $tag)
        <label class="checkbox-item">
            <input
                type="checkbox"
                name="tags[]"
                value="{{ $tag->id }}"
                {{ in_array($tag->id, $selectedTags) ? 'checked' : '' }}
            >
            {{ $tag->name }}
        </label>
    @empty
        <p>Belum ada tag. Jalankan seeder tag terlebih dahulu.</p>
    @endforelse
</div>
