<div class="row">
    <div class="col-4">
        <img class="w-100 h-100" src="{{{asset('img/yg6Jlg.png')}}}" alt="some img">
    </div>

    <div class="col-md-8">
        <h2 class="l-padding-20"><b>ОСТАННІ ПУБЛІКАЦІЇ</b></h2>
        <ul class="list">
            @foreach(\PageManager::getPagesByType(\App\Models\Page::TYPE_PAGE,10) as $slug => $title)
                <li>
                    <a href="{{{route('pages.page',$slug)}}}" target="_blank"
                       class="list-link nounderline">{{{$title}}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3><b>НОВИНИ ГРОМАДСЬКОЇ РАДИ</b></h3>
        <ul class="list l-margin--20">
            @foreach(\PageManager::getPagesByType(\App\Models\Page::TYPE_NEWS,5) as $slug => $title)
                <li>
                    <a href="{{{route('pages.page',$slug)}}}" target="_blank"
                       class="list-link nounderline">{{{$title}}}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col">
        <h3><b>AНОНСИ ГРОМАДСЬКОЇ РАДИ</b></h3>
        <ul class="list l-margin--20">
            @foreach(\PageManager::getPagesByType(\App\Models\Page::TYPE_ANNOUNCE,5) as $slug => $title)
                <li>
                    <a href="{{{route('pages.page',$slug)}}}" class="list-link nounderline"
                       target="_blank">{{{$title}}}</a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
