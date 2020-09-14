@extends('layouts.app')

@section('title', $item->title )

@section('sidebar')
    @parent

    <div class="sidebar col">
        <p>{{ $item->name }} Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, unde.</p>
    </div>
@endsection

@section('content')
    <div class="item col-lg-10">
        <div class="item__btn">
            @auth
                <a href="{{ route('article.create') }}" class="btn btn-danger item__link">Добавить новую статью</a>
            @endauth
        </div>
        <article class="item__article">
            <header><h1 class="item__title">{{ $item->title }}</h1></header>
            <div class="item__text">{{ $item->text }}</div>
            <footer class="item__footer">
                @auth
                    <a href="{{ route('article.edit', $item) }}" class="btn btn-danger item__link">Редактировать</a>
                    @if($item->category_id !== 1)
                        <form method="POST"
                              action="{{ route('article.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger item__link">
                                {{ __('Удалить') }}
                            </button>
                        </form>
                    @endif
                @endauth
            </footer>
        </article>
    </div>
@endsection