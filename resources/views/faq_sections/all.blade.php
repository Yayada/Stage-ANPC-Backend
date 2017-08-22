@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sections de l' Faq
        <small>Toutes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Sections de l' Faq</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class ="row">
        <div class="col-md-6 col-xs-12">
            <a href="{{route('sections.create')}}" class="btn btn-flat btn-primary">
                Nouvelle Sections de l' Faq 
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
                    <th>Nombre de questions </th>
                    <th>Crée le</th>
                    <th>Modifiée le</th>
                    <th>Actions</th>
                </tr>
                @foreach($faqSections as $faqSection)
                
                <tr>
                    <td>{{$faqSection->title}}</td>
                    <td>{{$faqSection->faqQuestions->count()}}</td>
                    <td>{{$faqSection->created_at}}</td>
                    <td>{{$faqSection->updated_at}}</td>
                    <td>
                        <a href="{{route('questions.byFaqSection',['id' => $faqSection->id])}}" class="btn btn-xs btn-primary">
                            Voir questions 
                            <i class="fa fa-list"></i>
                        </a>                          
                        <a href="{{route('questions.new',['id' => $faqSection->id])}}" class="btn btn-xs btn-primary">
                            Nouvelle question 
                            <i class="fa fa-plus"></i>
                        </a>                        
                        <a href="{{route('sections.edit',['id' => $faqSection->id])}}" class="btn btn-xs btn-success">
                            Modifier 
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{route('sections.delete',['id' => $faqSection->id])}}" class="btn btn-xs btn-danger">
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
