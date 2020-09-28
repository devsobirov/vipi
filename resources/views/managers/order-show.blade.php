@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('sidebar')
    @parent

    <div class="sidebar col">
        <x-office/>
    </div>
@endsection

@section('content')
    <div class="item col-lg-9">
        <h2>Заказы:</h2>
        <div class="item__body">
            <div>
                @if($order->manager_id !== null)
                    <div>Менеджер: {{ $order->manager->name }}</div>
                @endif
                @if($order->parcel_id !== null)
                    <div>Посылка: {{ $order->parcel['title'] }}</div>
                @endif
                <div>Дата создания заказа: {{ date('d.m.Y H:i', date_timestamp_get($order->created_at)) }}</div>
                <div>Дата обновления заказа: {{ date('d.m.Y H:i', date_timestamp_get($order->updated_at)) }}</div>
            </div>
            <div>
                <div>Количество: {{ $order->count }}</div>
                @if($order->link)
                    <div>Ссылка: <a href="{{ $order->link }}">{{ $order->link }}</a></div>
                @endif
                @if($order->color)
                    <div>Ссылка: {{ $order->color }}</div>
                @endif
                @if($order->size)
                    <div>Ссылка: {{ $order->size }}</div>
                @endif
                <p>{{ $order->description }}</p>
            </div>
        </div>

        <form method="POST"
              action="{{ route('manager.order-status', $order) }}">
            @csrf
            @method('PUT')
            <select name="status_id"
                    id="status_id"
                    class="form-control"
                    required>
                @foreach ($statuses as $status)
                    <option {{ (int)$status->id === (int)$order->status_id ? 'selected="selected"' : '' }} value="{{ $status->id }}">
                        {{ $status->title }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-danger item__link">
                {{ __('Изменить статус') }}
            </button>
        </form>

        <form method="POST"
              action="{{ route('manager.order-transfer', $order) }}">
            @csrf
            @method('PUT')
            <select name="manager_id"
                    id="manager_id"
                    class="form-control"
                    required>
                @foreach ($managers as $manager)
                    <option {{ (int)$manager->id === (int)$order->manager_id ? 'selected="selected"' : '' }} value="{{ $manager->id }}">
                        {{ $manager->profile['lastname'] }} ({{ $manager->name }})
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-danger item__link">
                {{ __('Передать заказ') }}
            </button>
        </form>
    </div>
@endsection