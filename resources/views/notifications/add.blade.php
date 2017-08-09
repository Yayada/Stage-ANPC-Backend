@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notifications
        <small>Nouvelle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active"><Notications></Notications></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <form role="form" method="post" action = {{route('notifications.store')}}>
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Titre</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Titre">
                </div>
                <div class="form-group">
                  <label for="body">Contenu</label>
                  <input type="text" class="form-control" name="body" id="body" placeholder="Contenu">
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
