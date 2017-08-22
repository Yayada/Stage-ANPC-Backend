@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vidèos
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Vidèos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <form role="form" method="post" action = "/videos/{{$video->id}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                <div class="form-group">
                    <label for="title">Rubrique</label>
                    <select  class="form-control" name="rubrique">
                        <option value="{{$video->rubrique->id}}" selected >{{$video->rubrique->name}}</option>
                        @foreach($rubriques as $rubrique)
                                <option value="{{$rubrique->id}}">{{$rubrique->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="title">Titre</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Titre" value={{$video->title}}>
                </div>                  
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description de la vidèo" value={{$video->description}}>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="URL de la vidèo" value={{$video->url}}>
                </div>
                <div class="form-group">
                  <label for="imgUrl">Chemin d'image d'arrière plan</label>
                  <input type="text" class="form-control" name="imgUrl" id="imgUrl" placeholder="Chemin d'image d'arrière plan" value={{$video->url_image}}>
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
