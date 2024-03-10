@extends('admin.layouts.app', ['title'=> trans_choice('labels.module.customer',1)])

@section('content')
<h1>ashavsbas</h1>
<br><br><br><br>
@dump(Auth::user())

asad



@endsection

@push('scripts')

@endpush