<?php
$title = 'Создание/Редактирование посылок';
$breadcrumbs = [
    [
        'name' => 'Личный кабинет',
        'route' => route(\Illuminate\Support\Facades\Auth::user()->roles[0]->name . '.index'),
    ],
    [
        'name' => 'Все посылки',
        'route' => route('parcel.index'),
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
    <div class="col-lg-9">
        <x-user-title/>
        <form method="POST"
              action="@if (!$parcel->id){{ route('parcel.store') }}@else{{ route('parcel.update', $parcel) }}@endif">
            @csrf
            @if ($parcel->id) @method('PUT') @endif

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="title" class="col-form-label text-md-right">{{ __('Наименование') }} <span class="star">*</span></label>
                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{ $parcel->title ?? old('title') }}"
                           placeholder="Наименование посылки"
                           required autofocus>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="address_id" class="col-form-label text-md-right">{{ __('Адрес') }} <span class="star">*</span></label>
                    <select name="address_id"
                            id="address_id"
                            class="form-control @error('address_id') is-invalid @enderror"
                            required>
                        @foreach ($addresses as $address)
                            <option {{ $address->id === $parcel->address_id ? 'selected="selected"' : '' }} value="{{ $address->id }}">
                                {{ $address->city }} {{ $address->street }} {{ $address->building }}
                            </option>
                        @endforeach
                    </select>
                    @error('address_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="description" class="col-form-label text-md-right">{{ __('Описание') }}</label>
                    <textarea name="description"
                              id="description"
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Напишите Ваши пожелания по посылке, для нашего менеджера"
                              cols="30" rows="3">{{ $parcel->description ?? old('description') }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        @if (!$parcel->id){{ __('Далее') }}@else{{ __('Сохранить') }}@endif
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection