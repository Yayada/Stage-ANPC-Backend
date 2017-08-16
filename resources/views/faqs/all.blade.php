@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Faq
        <small>Toutes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">faq</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class ="row">
        <div class="col-md-6 col-xs-12">
            <a href="{{route('faq.create')}}" class="btn btn-flat btn-primary">
                Nouvelle Faq 
                <i class="fa fa-plus"></i>
            </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Toutes les faq</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                <tr>
                    <th>Nom</th>
                    <th>Nombre de sections </th>
                    <th>Crée le</th>
                    <th>Modifiée le</th>
                    <th>Actions</th>
                </tr>
                @foreach($faqs as $faq)
                
                <tr>
                    <td>{{$faq->title}}</td>
                    <td>{{$faq->faqSections->count()}}</td>
                    <td>{{$faq->created_at}}</td>
                    <td>{{$faq->updated_at}}</td>
                    <td>    
                        <a href="{{route('sections.byFaq',['id' => $faq->id])}}" class="btn btn-xs btn-primary">
                            Voir sections 
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{route('faq.edit',['id' => $faq->id])}}" class="btn btn-xs btn-success">
                            Modifier 
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{route('faq.delete',['id' => $faq->id])}}" class="btn btn-xs btn-danger">
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
