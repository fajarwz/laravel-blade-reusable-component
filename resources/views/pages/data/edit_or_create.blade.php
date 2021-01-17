@extends('layouts.main')

@section('title')
  @if(isset($item))
    Edit Data - LBRC
  @else 
    Add Data - LBRC
  @endif
@endsection 

@section('header-title')
  @if(isset($item))
    Edit Data
  @else 
    Add Data 
  @endif
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Article</a></div>
  <div class="breadcrumb-item"><a href="{{ route('room.index') }}">Data</a></div>
  <div class="breadcrumb-item @if(isset($item)) '' @else 'active' @endif">
    @if(isset($item))
      <a href="#">Edit Data</a>
    @else 
      Add Data
    @endif
  </div>
  @isset($item)
    <div class="breadcrumb-item active">{{ $item->name }}</div>
  @endisset
@endsection

@section('section-title')
  @if(isset($item))
    Edit Data
  @else 
    Add Data 
  @endif
@endsection 
    
@section('section-lead')
  Please fill this form below to @if(isset($item)) edit data {{ $item->name }} @else add data. @endif
@endsection

@section('content')

  @component('components.form')

    @slot('row_class', 'justify-content-center')
    @slot('col_class', 'col-12 col-md-6')

    @if(isset($item))
      @slot('form_method', 'POST')
      @slot('method', 'PUT')
      @slot('form_action', 'data.update')
      @slot('update_id', $item->id)
    @else 
      @slot('form_method', 'POST')
      @slot('form_action', 'data.store')
    @endif

    @slot('is_form_with_file', 'true')

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'code')
          @slot('input_type', 'text')
          @slot('input_name', 'code')
          @isset($item->code)
            @slot('input_value')
              {{ $item->code }}
            @endslot 
          @endisset
          @isset($item)
            @slot('other_attributes', 'disabled')
          @endisset
          @empty($item)
            @slot('form_group_class', 'required')
            @slot('other_attributes', 'required autofocus')
          @endempty
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Title')
          @slot('input_type', 'text')
          @slot('input_name', 'title')
          @isset($item->title)
            @slot('input_value')
              {{ $item->title }}
            @endslot 
          @endisset
          @isset($item)
            @slot('other_attributes', 'autofocus')
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Content')
          @slot('input_type', 'text')
          @slot('input_name', 'content')
          @isset($item->content)
            @slot('input_value')
              {{ $item->content }}
            @endslot 
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Foto')
          @slot('input_type', 'file')
          @slot('input_name', 'photo')
          @isset($item)
            @slot('help_text', 'Max: 2048MB')
          @endisset 
      @endcomponent

    @endslot

    @slot('card_footer', 'true')
    @slot('card_footer_class', 'text-right')
    @slot('card_footer_content')
      @include('includes.save-cancel-btn')
    @endslot 

  @endcomponent

@endsection
