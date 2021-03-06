<div class="col-10">
    <div class="row nounderline text-sm">
        <div class="padding-1px col ">
            <a href="{{{route('home')}}}">
                <button
                    class="btn btn-navbar btn  btn-block @if(request()->routeIs('home')) active @endif">{{{__('ГОЛОВНА')}}}</button>
            </a>
        </div>
        <div class="padding-1px col ">
            <a href="{{{route('pages')}}}">
                <button class="btn btn-navbar btn  btn-block @if(request()->routeIs('page*')) active @endif">{{{__('ПУБЛІКАЦІЇ')}}}</button>
            </a>
        </div>
        <div class="padding-1px col ">
            <a href="#">
                <button class="btn btn-navbar btn  btn-block">{{{__('СТАТИСТИКА')}}}</button>
            </a>
        </div>
        <div class="padding-1px col ">
            <a href="#">
                <button class="btn btn-navbar btn  btn-block">{{{__('ІНФОГРАФІКА')}}}</button>
            </a>
        </div>
        <div class="padding-1px col ">
            <a href="#">
                <button class="btn btn-navbar btn  btn-block">{{{__('БАРОМЕТР')}}}</button>
            </a>
        </div>
        <div class="padding-1px col ">
            <a href="#">
                <button class="btn btn-navbar btn  btn-block">{{{__("ЦІЛІ СТАЛОГО")}}} <br> {{{__("РОЗВИТКУ")}}}</button>
            </a>
        </div>
        <div class="padding-1px col ">
            <a href="#">
                <button class="btn btn-navbar btn  btn-block">{{{__("ГРОМАДСЬКА")}}}<br>{{{__("РАДА")}}}</button>
            </a>
        </div>
        <div class="padding-1px col ">
            <a href="#">
                <button class="btn btn-navbar btn  btn-block">{{{__('КОНТАКТИ')}}}</button>
            </a>
        </div>
    </div>
</div>

