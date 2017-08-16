@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sections de l' Faq
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Sections de l' Faq</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <form role="form" method="post" action = "/sections/{{$faqSection->id}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                <div class="form-group">
                    <label for="title">Faq</label>
                    <select  class="form-control" name="faq">
                        <option value="{{$faqSection->faq->id}}" selected >{{$faqSection->faq->title}}</option>
                        @foreach($faqs as $faq)
                                <option value="{{$faq->id}}">{{$faq->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Nom</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Nom de l'Faq " value={{$faqSection->title}}>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
