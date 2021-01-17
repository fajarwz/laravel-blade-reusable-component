@extends('layouts.main')

@section('title', 'Data - LBRC')

@section('header-title', 'Data')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Article</a></div>
  <div class="breadcrumb-item active">Data</div>
@endsection

@section('section-title', 'Data')
    
@section('section-lead')
  This is the list of data.
@endsection

@section('content')

  @component('components.datatables')

    @slot('buttons')
      <a href="{{ route('data.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Add Data</a>
    @endslot
    
    @slot('table_id', 'data-table')

    @slot('table_header')
      <tr>
        <th>#</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Content</th>
      </tr>
    @endslot
      
  @endcomponent

@endsection

@push('after-script')

  <script>
  $(document).ready(function() {
    $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('data.json') }}',
      order: [2, 'asc'],
      columns: [
      {
        name: 'DT_RowIndex',
        data: 'DT_RowIndex',
        orderable: false, 
        searchable: false
      },
      {
        name: 'photo',
        data: 'photo',
        orderable: false, 
        searchable: false,
        render: function ( data, type, row ) {
          return `<img src="{{ asset('storage/${data}') }}" class="img-fluid" style="min-width: 80px; height: auto;">`;
        }
      },
      {
        name: 'title',
        data: 'title',
      },
      {
        name: 'content',
        data: 'content',
      },
    ],
    });
  
  });

</script>

@endpush