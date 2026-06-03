<label for="title">Judul</label>
<input id="title" type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required>

<label for="content">Konten</label>
<textarea id="content" name="content" required>{{ old('content', $post->content ?? '') }}</textarea>
