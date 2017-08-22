@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Utilisateurs
        <small>Tous</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Utilisateurs</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class ="row">
        <div class="col-md-6 col-xs-12">
            <a href="{{route('register')}}" class="btn btn-flat btn-primary">
                Nouvel Utilisateur
                <i class="fa fa-plus"></i>
            </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tous les utlilisateurs</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Crée le</th>
                    <th>Modifiée le</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
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
