@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vidèos
        <small>Toutes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Vidèos</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class ="row">
        <div class="col-md-6 col-xs-12">
            <a href="{{route('videos.create')}}" class="btn btn-flat btn-primary">
                Nouvelle vidèo  
                <i class="fa fa-plus"></i>
            </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Toutes les vidèos</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                <tr>
                    <th>Rubrique</th>
                    <th>URl</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Crée le</th>
                    <th>Modifée le</th>
                    <th>Actions</th>
                </tr>
                @foreach($videos as $video)
                <tr>
                    <td>{{$video->rubrique->name}}</td>
                    <td>{{$video->url}}</td>
                    <td>{{$video->title}}</td>
                    <td>{{$video->description}}</td>
                    <td>{{$video->created_at}}</td>
                    <td>{{$video->updated_at}}</td>
                    <td>    
                        <a href="{{route('videos.edit',['id' => $video->id])}}" class="btn btn-xs btn-success">
                            Modifier 
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{route('videos.delete',['id' => $video->id])}}" class="btn btn-xs btn-danger">
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
