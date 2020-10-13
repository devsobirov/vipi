<?php
$title = 'Поддержка';
$breadcrumbs = [
    [
        'name' => 'Личный кабинет',
        'route' => route(\Illuminate\Support\Facades\Auth::user()->roles[0]->name . '.index'),
    ],
    [
        'name' => $title,
        'route' => '',
    ]
];
?>
@extends('layouts.app')

@section('title', $title)

@section('dashboard')
    <x-dashboard :title="$title" :breadcrumbs="$breadcrumbs"/>
@endsection

@section('sidebar')
    @parent

    <div class="sidebar col-lg-3">
        <x-office/>
    </div>
@endsection

@section('content')
    <div class="items col-lg-9">
        <x-user-title/>
        @if(Auth::user()->hasRole('client'))
            <div class="items__btn">
                <a class="btn btn-danger" href="{{ route('support.create') }}">{{ __('Написать в поддержку') }}</a>
            </div>
        @endif
        <section>
            <div class="row item-font">
                <div class="col-sm-2">№</div>
                <div class="col-sm-4">Наименование</div>
                <div class="col-sm-2">Тема</div>
                <div class="col-sm-2"></div>
            </div>
            @foreach($supports as $item)
                <div class="row item-font">
                    <div class="col-sm-2">SUP{{ $item->id }}</div>
                    <div class="col-sm-4">{{ $item->title }}</div>
                    <div class="col-sm-2">
                        @if($item->order)
                            {{ $item->order->title }}
                        @endif
                        @if($item->parcel)
                            {{ $item->parcel->title }}
                        @endif
                        @if(!$item->parcel && !$item->order)
                            {{ __('Общий') }}
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <div class="col-sm-2">
                            <a class="btn btn-danger" href="{{ route('support.show', $item) }}">{{ __('Перейти') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection