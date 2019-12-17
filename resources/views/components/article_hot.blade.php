@if(isset($articleHot))
    @foreach($articleHot as $arHot)
        <div class="article_hot_item">
            <div class="article_img">
                <a href="{{ route('get.detail.article',[$arHot->a_slug,$arHot->id]) }}">
                    <img src="{{ pare_url_file($arHot->a_avatar) }}" alt="">
                </a>
            </div>
            <div class="article_info">
                <a href="{{ route('get.detail.article',[$arHot->a_slug,$arHot->id]) }}">
                    <h3 style="font-size: 16px; margin: 10px 0;">{{ $arHot->a_name }}</h3>
                </a>
                <p>{{ $arHot->a_description }}</p>
            </div>
        </div>
    @endforeach
@endif
