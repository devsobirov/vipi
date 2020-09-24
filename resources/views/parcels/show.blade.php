@extends('layouts.app')

@section('title', $item->title )

@section('sidebar')
    @parent

    <div class="sidebar col">
        <x-office/>
    </div>
@endsection

@section('content')
    <div class="item col-lg-9">
        <article class="item__article">
            <header><h1 class="item__title">{{ $item->title }}
                    <span class="badge badge-warning">{{ $item->status->title }}</span>
                </h1></header>
            <div class="item__text row">
                <div class="col-md-6">{{ $item->description }}</div>
                <div class="col-md-6">{{ $item->address }}</div>
            </div>
            <footer class="item__footer">
                @auth
                    <a href="{{ route('parcel.edit', $item) }}" class="btn btn-danger item__link">Редактировать</a>
                    <form method="POST"
                          action="{{ route('parcel.destroy', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger item__link">
                            {{ __('Удалить') }}
                        </button>
                    </form>
                @endauth
            </footer>
        </article>

        <h2>Заказы:</h2>
        <section>
            <div class="row item-font">
                <div class="col-sm-2">№</div>
                <div class="col-sm-6">Наименование</div>
                <div class="col-sm-2">Кол-во</div>
                <div class="col-sm-2"></div>
            </div>
            @foreach($item->orders as $order)
                <div class="row item-font">
                    <div class="col-sm-2">Z{{ $order->id }}</div>
                    <div class="col-sm-6">{{ $order->title }}</div>
                    <div class="col-sm-2">{{ $order->count }}</div>
                    <div class="col-sm-2">
                        <form method="POST"
                              action="{{ route('parcel.order-delete-parcel-id', $order) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger item__link">
                                {{ __('Удалить') }}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </section>
        <form method="POST"
              action="{{ route('parcel.order-add-parcel-id', $item) }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="col">
                    <label for="order_id" class="col-form-label text-md-right">{{ __('Выберете заказы в посылку') }} <span class="star">*</span></label>
                    <select name="order_id[]"
                            id="order_id"
                            class="form-control @error('order_id') is-invalid @enderror"
                            multiple
                            size="10"
                            required>
                        @foreach ($orders as $order)
                            <option {{ $order->id === $item->order_id ? 'selected="selected"' : '' }} value="{{ $order->id }}">
                                {{ $order->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('order_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-danger item__link">
                {{ __('Добавить заказы в посылку') }}
            </button>
        </form>
    </div>
@endsection