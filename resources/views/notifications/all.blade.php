@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notifications
        <small>Historique</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">notifications</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class ="row">
        <div class="col-md-6 col-xs-12">
            <a href="{{route('notifications.create')}}" class="btn btn-flat btn-primary">
                Nouvelle notification 
                <i class="fa fa-plus"></i>
            </a>
        </div>
      </div>
      <br>        
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Toutes les notifications</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                <tr>
                    <th>Expéditeur</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Envoyée le</th>
                </tr>
                @foreach($notifications as $notification)
                <tr>
                    <td>{{$notification->user->name}}
                    <td>{{$notification->title}}</td>
                    <td>{{$notification->body}}</td>
                    <td>{{$notification->created_at}}</td>
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
