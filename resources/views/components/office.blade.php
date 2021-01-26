<div>
    {{--@if(Auth::user()->hasRole('manager'))--}}
        {{--@if($clients_new)--}}
            {{--<a href="#" class="nav-link-style d-flex flex-wrap align-items-center mb-2">--}}
                {{--<span class="new py-1 px-4 bg-light text-dark rounded-pill">Новые клиенты - {{ $clients_new }}</span>--}}
            {{--</a>--}}
        {{--@endif--}}
        {{--@if($orders_new)--}}
            {{--<a href="{{ route('manager.order.new') }}" class="nav-link-style d-flex flex-wrap align-items-center mb-2">--}}
                {{--<span class="new py-1 px-4 bg-light text-dark rounded-pill">Новые заказы - {{ $orders_new }}</span>--}}
            {{--</a>--}}
        {{--@endif--}}
        {{--@if($parcels_new)--}}
            {{--<a href="{{ route('manager.parcel.new') }}" class="nav-link-style d-flex flex-wrap align-items-center mb-2">--}}
                {{--<span class="new py-1 px-4 bg-light text-dark rounded-pill">Новые посылки - {{ $parcels_new }}</span>--}}
            {{--</a>--}}
        {{--@endif--}}
        {{--@if($supports_new)--}}
            {{--<a href="{{ route('manager.support-new') }}" class="nav-link-style d-flex flex-wrap align-items-center mb-2">--}}
                {{--<span class="new py-1 px-4 bg-light text-dark rounded-pill">Новые запросы - {{ $supports_new }}</span>--}}
            {{--</a>--}}
        {{--@endif--}}
    {{--@endif--}}
    @if($messages_new && Auth::user()->hasRole('superAdmin'))
        <a href="{{ route('support.index') }}" class="nav-link-style d-flex flex-wrap align-items-center mb-2">
            <span class="new py-1 px-4 bg-light text-dark rounded-pill">
                <i class="fas fa-exclamation-triangle"></i>
                Все непрочитанные сообщения - {{ $messages_new }}
            </span>
        </a>
    @endif
    @if($messages_new_for_manager && Auth::user()->hasRole('manager'))
        <a href="{{ route('manager.support-my') }}" class="nav-link-style d-flex flex-wrap align-items-center mb-2">
            <span class="new py-1 px-4 bg-light text-dark rounded-pill">
                <i class="fas fa-exclamation-triangle"></i>
                Непрочитанные сообщения - {{ $messages_new_for_manager }}
            </span>
        </a>
    @endif
    @if($messages_new_for_client && Auth::user()->hasRole('client'))
        <a href="{{ route('client.support-all') }}" class="nav-link-style d-flex flex-wrap align-items-center mb-2">
            <span class="new py-1 px-4 bg-light text-dark rounded-pill">
                <i class="fas fa-exclamation-triangle"></i>
                Непрочитанные сообщения - {{ $messages_new_for_client }}
            </span>
        </a>
    @endif
</div>
<ul class="{{ $css }}">
    <li class="{{ $css }}__list"><a href="{{ url('/') }}" class="{{ $css }}__link">Главная</a></li>
</ul>
@if(Auth::user()->hasRole('superAdmin'))
    <ul class="{{ $css }}">
        <li class="{{ $css }}__list">
            <a class="{{ $css }}__link bg-light text-dark">СуперАдмин</a>
        </li>
        <li class="{{ $css }}__list">
            <a href="{{ route('superAdmin.user.index') }}" class="{{ $css }}__link d-flex justify-content-between">
                Пользователи
                @if($clients_new)
                    <span class="bg-white text-dark px-1 rounded-top rounded-bottom">{{ $clients_new }}</span>
                @endif
            </a>
        </li>
        <li class="{{ $css }}__list">
            <a href="{{ route('superAdmin.statistic') }}" class="{{ $css }}__link d-flex justify-content-between">Статистика</a>
        </li>
        <li class="{{ $css }}__list">
            <a href="{{ route('superAdmin.address.index') }}" class="{{ $css }}__link d-flex justify-content-between">Адреса клиентов</a>
        </li>
        <li class="{{ $css }}__list">
            <a href="{{ route('order.index') }}" class="{{ $css }}__link d-flex justify-content-between">
                Заказы клиентов
                @if($orders_new)
                    <span class="bg-white text-dark px-1 rounded-top rounded-bottom">{{ $orders_new }}</span>
                @endif
            </a>
        </li>
        <li class="{{ $css }}__list">
            <a href="{{ route('superAdmin.parcel.index') }}" class="{{ $css }}__link d-flex justify-content-between">
                Посылки клиентов
                @if($parcels_new)
                    <span class="bg-white text-dark px-1 rounded-top rounded-bottom">{{ $parcels_new }}</span>
                @endif
            </a>
        </li>
    </ul>
@endif
@if(Auth::user()->hasRole('admin'))
    <ul class="{{ $css }}">
        <li class="{{ $css }}__list">
            <a class="{{ $css }}__link bg-light text-dark">Админ</a>
        </li>
        <li class="{{ $css }}__list"><a href="{{ route('status.index') }}" class="{{ $css }}__link d-flex justify-content-between">Статусы</a></li>
        <li class="{{ $css }}__list"><a href="{{ route('country.index') }}" class="{{ $css }}__link d-flex justify-content-between">Страны</a></li>
    </ul>
@endif
@if(Auth::user()->hasRole('manager'))
    <ul class="{{ $css }}">
        <li class="{{ $css }}__list">
            <a class="{{ $css }}__link bg-light text-dark">Менеджер</a>
        </li>
        <li class="{{ $css }}__list">
            <a href="{{ route('order.new') }}" class="{{ $css }}__link d-flex justify-content-between">
                Новые заказы
                @if($orders_new)
                    <span class="bg-white text-dark px-1 rounded-top rounded-bottom">{{ $orders_new }}</span>
                @endif
            </a>
        </li>
        <li class="{{ $css }}__list"><a href="{{ route('order.my') }}" class="{{ $css }}__link d-flex justify-content-between">Мой заказы</a></li>
        <li class="{{ $css }}__list">
            <a href="{{ route('manager.parcel.new') }}" class="{{ $css }}__link d-flex justify-content-between">
                Новые посылки
                @if($parcels_new)
                    <span class="bg-white text-dark px-1 rounded-top rounded-bottom">{{ $parcels_new }}</span>
                @endif
            </a>
        </li>
        <li class="{{ $css }}__list"><a href="{{ route('manager.parcel.my') }}" class="{{ $css }}__link d-flex justify-content-between">Мой посылки</a></li>
        <li class="{{ $css }}__list">
            <a href="{{ route('manager.support-new') }}" class="{{ $css }}__link d-flex justify-content-between">
                Запросы в поддрежку
                @if($messages_new_for_manager)
                    <span class="bg-white text-dark px-1 rounded-top rounded-bottom">{{ $messages_new_for_manager }}</span>
                @endif
            </a>
        </li>
        <li class="{{ $css }}__list"><a href="{{ route('manager.support-my') }}" class="{{ $css }}__link d-flex justify-content-between">Моя поддержка</a></li>
    </ul>
@endif
@if(Auth::user()->hasRole('client'))
<ul class="{{ $css }}">
    <li class="{{ $css }}__list"><a href="{{ route('address.index') }}" class="{{ $css }}__link d-flex justify-content-between">Адреса доставки</a></li>
    <li class="{{ $css }}__list"><a href="{{ route('order.create') }}" class="{{ $css }}__link d-flex justify-content-between">Новый заказ</a></li>
    <li class="{{ $css }}__list"><a href="{{ route('order.my') }}" class="{{ $css }}__link d-flex justify-content-between">Мой заказы</a></li>
    <li class="{{ $css }}__list"><a href="{{ route('parcel.create') }}" class="{{ $css }}__link d-flex justify-content-between">Новая посылка</a></li>
    <li class="{{ $css }}__list"><a href="{{ route('parcel.index') }}" class="{{ $css }}__link d-flex justify-content-between">Мой посылки</a></li>
    <li class="{{ $css }}__list"><a href="{{ route('client.support-all') }}" class="{{ $css }}__link d-flex justify-content-between">Поддержка</a></li>
</ul>
@endif

{{--<div class="cz-sidebar-static rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0">--}}
    {{--<div class="px-4 pt-4 mb-4">--}}
        {{--<div class="media align-items-center">--}}
            {{--<div class="img-thumbnail rounded-circle position-relative">--}}
                {{--<img alt="{{ Auth::user()->name }}" src="https://secure.gravatar.com/avatar/2fb4970879b372ca73ec4796ac0aa342?s=90&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/2fb4970879b372ca73ec4796ac0aa342?s=180&amp;d=mm&amp;r=g 2x" class="avatar avatar-40 photo rounded-circle" height="40" width="40" gurl="https://secure.gravatar.com/avatar/2fb4970879b372ca73ec4796ac0aa342?s=90&amp;d=mm&amp;r=g" loading="lazy">						</div>--}}
            {{--<div class="media-body pl-3">--}}
                {{--<h3 class="font-size-base mb-0">{{ Auth::user()->name }}</h3>--}}
                {{--<span class="text-accent font-size-sm">{{ Auth::user()->email }}</span>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<nav>--}}
        {{--<div class="accordion" id="accordionExample">--}}
            {{--@if(Auth::user()->hasRole('manager'))--}}
                {{--<div class="is-active border-top py-2">--}}
                    {{--@if($clients_new)--}}
                        {{--<a href="#" class="nav-link-style d-flex flex-wrap align-items-center px-4 mb-2">--}}
                            {{--<span class="new ml-2 badge bg-danger rounded-pill">Новые клиенты - {{ $clients_new }}</span>--}}
                        {{--</a>--}}
                    {{--@endif--}}
                    {{--@if($orders_new)--}}
                        {{--<a href="{{ route('manager.order.new') }}" class="nav-link-style d-flex flex-wrap align-items-center px-4 mb-2">--}}
                            {{--<span class="new ml-2 badge bg-danger rounded-pill">Новые заказы - {{ $orders_new }}</span>--}}
                        {{--</a>--}}
                    {{--@endif--}}
                    {{--@if($parcels_new)--}}
                        {{--<a href="{{ route('manager.parcel.new') }}" class="nav-link-style d-flex flex-wrap align-items-center px-4 mb-2">--}}
                            {{--<span class="new ml-2 badge bg-danger rounded-pill">Новые посылки - {{ $parcels_new }}</span>--}}
                        {{--</a>--}}
                    {{--@endif--}}
                    {{--@if($supports_new)--}}
                        {{--<a href="#" class="nav-link-style d-flex flex-wrap align-items-center px-4">--}}
                            {{--<span class="new ml-2 badge bg-danger rounded-pill">Новые запросы - {{ $supports_new }}</span>--}}
                        {{--</a>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<div class="is-active border-top mb-0">--}}
                {{--<a href="{{ route(\Illuminate\Support\Facades\Auth::user()->roles[0]->name . '.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                    {{--<i class="czi-home align-middle opacity-60 mr-2"></i>Главная</a>--}}
            {{--</div>--}}
            {{--<div class="border-top mb-0">--}}
                {{--@if(!$profile = \App\Profile::query()->where('user_id', '=', Auth::user()->id)->first())--}}
                    {{--<a href="{{ route('profile.create') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                        {{--<i class="czi-user align-middle opacity-60 mr-2"></i>Профиль</a>--}}
                {{--@else--}}
                    {{--<a href="{{ route('profile.show', $profile) }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                        {{--<i class="czi-user align-middle opacity-60 mr-2"></i>Профиль</a>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--@if(Auth::user()->hasRole('superAdmin'))--}}
                {{--<div>--}}
                    {{--<div id="heading1" class="btn alert alert-danger d-block text-left mb-0" data-target="#collapse1" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">--}}
                        {{--СуперАдминистратор--}}
                    {{--</div>--}}
                    {{--<div id="collapse1" class="collapse mt-0 pt-0" aria-labelledby="heading1" data-parent="#accordionExample">--}}
                        {{--<ul class="list-unstyled mb-0">--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('superAdmin.user.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-user align-middle opacity-60 mr-2"></i>Пользователи--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('superAdmin.statistic') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-list align-middle opacity-60 mr-2"></i>Статистика--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('superAdmin.address.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-location align-middle opacity-60 mr-2"></i>Адреса клиентов--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('superAdmin.order.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-bag align-middle opacity-60 mr-2"></i>Заказы клиентов--}}
                                    {{--<span class="new ml-2 badge bg-danger rounded-pill">{{ $orders_new }}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('superAdmin.parcel.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-basket align-middle opacity-60 mr-2"></i>Посылки клиентов--}}
                                    {{--<span class="new ml-2 badge bg-danger rounded-pill">{{ $parcels_new }}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--@if(Auth::user()->hasRole('admin'))--}}
                {{--<div>--}}
                    {{--<div id="heading2" class="btn alert alert-danger d-block text-left mb-0" data-target="#collapse2" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">--}}
                        {{--Администратор--}}
                    {{--</div>--}}
                    {{--<div id="collapse2" class="collapse mt-0 pt-0" aria-labelledby="heading2" data-parent="#accordionExample">--}}
                        {{--<ul class="list-unstyled mb-0">--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('category.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-bag align-middle opacity-60 mr-2"></i>Категории--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('article.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-bag align-middle opacity-60 mr-2"></i>Статьи--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('contact.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-bag align-middle opacity-60 mr-2"></i>Контакты--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('country.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-bag align-middle opacity-60 mr-2"></i>Страны--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--@if(Auth::user()->hasRole('manager'))--}}
                {{--<div>--}}
                    {{--<div id="heading3" class="btn alert alert-danger d-block text-left mb-0" data-target="#collapse3" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">--}}
                        {{--Менеджер--}}
                    {{--</div>--}}
                    {{--<div id="collapse3" class="collapse mt-0 pt-0" aria-labelledby="heading3" data-parent="#accordionExample">--}}
                        {{--<div class="border-top mb-0">--}}
                            {{--<a href="{{ route('manager.statistic') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                {{--<i class="czi-list align-middle opacity-60 mr-2"></i>Статистика--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="accordion" id="accordionExample2">--}}
                            {{--<div>--}}
                                {{--<div id="heading4" class="btn border-top nav-link-style d-flex align-items-center px-4 py-3" data-target="#collapse4" data-toggle="collapse" aria-expanded="true" aria-controls="collapse4">--}}
                                    {{--<i class="czi-bag align-middle opacity-60 mr-2"></i>Заказы--}}
                                    {{--<span class="new ml-2 badge bg-danger rounded-pill">{{ $orders_new }}</span>--}}
                                {{--</div>--}}
                                {{--<div id="collapse4" class="collapse mt-0 pt-0" aria-labelledby="heading4" data-parent="#accordionExample2">--}}
                                    {{--<ul class="list-unstyled mb-0">--}}
                                        {{--<li class="border-top mb-0">--}}
                                            {{--<a href="{{ route('manager.order.new') }}" class="nav-link-style d-flex align-items-center pr-4 pl-5 py-3">--}}
                                                {{--Новые заказы--}}
                                                {{--<span class="font-size-sm text-muted ml-auto">0</span>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="border-top mb-0">--}}
                                            {{--<a href="{{ route('manager.order.my') }}" class="nav-link-style d-flex align-items-center pr-4 pl-5 py-3">--}}
                                                {{--Мои заказы--}}
                                                {{--<span class="font-size-sm text-muted ml-auto">0</span>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div>--}}
                                {{--<div id="heading5" class="btn border-top nav-link-style d-flex align-items-center px-4 py-3" data-target="#collapse5" data-toggle="collapse" aria-expanded="true" aria-controls="collapse5">--}}
                                    {{--<i class="czi-basket align-middle opacity-60 mr-2"></i>Посылки--}}
                                    {{--<span class="new ml-2 badge bg-danger rounded-pill">{{ $parcels_new }}</span>--}}
                                {{--</div>--}}
                                {{--<div id="collapse5" class="collapse mt-0 pt-0" aria-labelledby="heading5" data-parent="#accordionExample2">--}}
                                    {{--<ul class="list-unstyled mb-0">--}}
                                        {{--<li class="border-top mb-0">--}}
                                            {{--<a href="{{ route('manager.parcel.new') }}" class="nav-link-style d-flex align-items-center pr-4 pl-5 py-3">--}}
                                                {{--Посылки в работу--}}
                                                {{--<span class="font-size-sm text-muted ml-auto">0</span>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="border-top mb-0">--}}
                                            {{--<a href="{{ route('manager.parcel.my') }}" class="nav-link-style d-flex align-items-center pr-4 pl-5 py-3">--}}
                                                {{--Мои посылки--}}
                                                {{--<span class="font-size-sm text-muted ml-auto">0</span>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div>--}}
                                {{--<div id="heading6" class="btn border-top nav-link-style d-flex align-items-center px-4 py-3" data-target="#collapse6" data-toggle="collapse" aria-expanded="true" aria-controls="collapse6">--}}
                                    {{--<i class="czi-support align-middle opacity-60 mr-2"></i>Поддержка--}}
                                    {{--<span class="new ml-2 badge bg-danger rounded-pill">{{ $supports_new }}</span>--}}
                                {{--</div>--}}
                                {{--<div id="collapse6" class="collapse mt-0 pt-0" aria-labelledby="heading6" data-parent="#accordionExample2">--}}
                                    {{--<ul class="list-unstyled mb-0">--}}
                                        {{--<li class="border-top mb-0">--}}
                                            {{--<a href="{{ route('manager.support-new') }}" class="nav-link-style d-flex align-items-center pr-4 pl-5 py-3">--}}
                                                {{--Запросы в поддрежку--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="border-top mb-0">--}}
                                            {{--<a href="{{ route('manager.support-my') }}" class="nav-link-style d-flex align-items-center pr-4 pl-5 py-3">--}}
                                                {{--Моя поддержка--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--@if(Auth::user()->hasRole('client'))--}}
                {{--<div>--}}
                    {{--<div id="heading1" class="btn alert alert-danger d-block text-left mb-0" data-target="#collapse1" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">--}}
                        {{--Клиент--}}
                    {{--</div>--}}
                    {{--<div id="collapse1" class="collapse show mt-0 pt-0" aria-labelledby="heading1" data-parent="#accordionExample2">--}}
                        {{--<ul class="list-unstyled mb-0">--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('address.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-location align-middle opacity-60 mr-2"></i>Адреса доставки</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('order.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-bag align-middle opacity-60 mr-2"></i>Заказы--}}
                                    {{--<span class="font-size-sm text-muted ml-auto">{{ $client_orders_all }}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('parcel.index') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-basket align-middle opacity-60 mr-2"></i>Посылки--}}
                                    {{--<span class="font-size-sm text-muted ml-auto">{{ $client_parcels_all }}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="border-top mb-0">--}}
                                {{--<a href="{{ route('client.support-all') }}" class="nav-link-style d-flex align-items-center px-4 py-3">--}}
                                    {{--<i class="czi-support align-middle opacity-60 mr-2"></i>Поддержка--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<div class="border-top mb-0">--}}
                {{--<a class="nav-link-style d-block px-4 py-3" href="{{ route('logout') }}"--}}
                   {{--onclick="event.preventDefault();document.getElementById('logout-form').submit();">--}}
                    {{--<i class="czi-sign-out align-middle opacity-60 mr-2"></i>{{ __('Выйти') }}--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}

{{--</div>--}}

{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
    {{--@csrf--}}
{{--</form>--}}