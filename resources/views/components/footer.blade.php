<h3 class="text-center">
    <b>
        Індикативний моніторинг досягнення Україною цілей сталого розвитку ООН до 2030-го року
    </b>
</h3>
<div class="row">
    @foreach(\DirectoryManager::getMainDirectories() as $directory)
        <img class="icon-main" src="{{{asset("img/main/sdg-uk-{$directory->id}.png")}}}">
    @endforeach
    <img class="icon-main" src="{{{asset("img/main/sdg-uk-18.png")}}}">
</div>
