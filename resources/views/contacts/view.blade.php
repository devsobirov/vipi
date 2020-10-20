<?php
$title = $article->meta_title ?? $article->title;
$meta_description = $article->meta_description;
$meta_keywords = $article->meta_keywords;
?>
@extends('layouts.app')

@section('title', $title)
@section('description', $meta_description)
@section('keywords', $meta_keywords)

@section('content')
    <div class="content w-100">
        <h1>Контактная информация</h1>
        <p>{!! $article->text !!}</p>
        <section class="contact d-flex flex-column flex-md-row">
            @foreach ($contacts as $item)
                <article class="contact__item col-md-6 p-0">
                    <h2 class="contact__title">{{ $item->title }}</h2>
                    <p>{!! $item->address !!}</p>
                    <p>{{ $item->phone }}</p>
                    <p>{{ $item->email }}</p>
                </article>
            @endforeach
        </section>
    </div>
@endsection