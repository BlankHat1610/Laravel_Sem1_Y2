@if(isset($articles))
    @foreach($articles as $article)
        <div class="article" style="display: flex; padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #f2f2f2;">
            <div class="article_avatar" style="width: 30%;">
                <a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">
                    <img src="{{ pare_url_file($article->a_avatar) }}" style="width: 100%;" alt="">
                </a>
            </div>
            <div class="article_avatar" style="width: 70%; margin-left: 20px;">
                <h2 style="font-size: 14px;"><a href="{{ route('get.detail.article', [$article->a_slug, $article->id]) }}">{{ $article->a_name }}</a></h2>
                <p style="font-size: 13px;">{{ $article->a_description }}</p>
                <p>Admin <span>{{ $article->created_at }}</span></p>
            </div>
        </div>
    @endforeach
@endif
