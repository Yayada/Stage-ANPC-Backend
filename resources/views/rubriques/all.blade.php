@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rubriques
        <small>Toutes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">rubriques</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class ="row">
        <div class="col-md-6 col-xs-12">
            <a href="{{route('rubriques.create')}}" class="btn btn-flat btn-primary">
                Nouvelle rubrique 
                <i class="fa fa-plus"></i>
            </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Toutes les rubriques</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                <tr>
                    <th>Nom</th>
                    <th>Crée le</th>
                    <th>Modifiée le</th>
                    <th>Actions</th>
                </tr>
                @foreach($rubriques as $rubrique)
                <tr>
                    <td>{{$rubrique->name}}</td>
                    <td>{{$rubrique->created_at}}</td>
                    <td>{{$rubrique->updated_at}}</td>
                    <td>    
                        <a href="{{route('videos.byRubrique',['id' => $rubrique->id])}}" class="btn btn-xs btn-primary">
                            Voir vidèos 
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{route('rubriques.edit',['id' => $rubrique->id])}}" class="btn btn-xs btn-success">
                            Modifier 
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{route('rubriques.delete',['id' => $rubrique->id])}}" class="btn btn-xs btn-danger">
                            Supprimer 
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach                
                </table>
            </div>
        </div>    
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
