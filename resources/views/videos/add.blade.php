@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rubriques
        <small>Nouvelle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Rubriques</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <form role="form" method="post" action = {{route('videos.store')}}>
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                    <label for="title">Rubrique</label>
                    <select  class="form-control" name="rubrique">
                        @foreach($rubriques as $rubrique)
                                <option value="{{$rubrique->id}}">{{$rubrique->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="title">Titre</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Titre">
                </div>                
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                </div>
                <div class="form-group">
                  <label for="imgUrl">Chemin d'image d'arrière plan</label>
                  <input type="text" class="form-control" name="imgUrl" id="imgUrl" placeholder="Chemin d'image d'arrière plan">
                </div>
                <div class="form-group">
                  <label for="title">URL</label>
                  <input type="text" class="form-control" name="url" id="url" placeholder="URL de la vidèo">
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
