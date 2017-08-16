@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Questions
        <small>Toutes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Questions</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Toutes les questions</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                <tr>
                    <th>Section</th>
                    <th>Question </th>
                    <th>Réponse</th>
                    <th>Crée le</th>
                    <th>Modifiée le</th>
                    <th>Actions</th>
                </tr>
                @foreach($faqQuestions as $faqQuestion)
                
                <tr>
                    <td>{{$faqQuestion->faqSection->title}}</td>
                    <td><?= $faqQuestion->content ?></td>
                    <td><?=$faqQuestion->response ?></td>
                    <td>{{$faqQuestion->created_at}}</td>
                    <td>{{$faqQuestion->updated_at}}</td>
                    <td>                   
                        <a href="{{route('sections.edit',['id' => $faqQuestion->id])}}" class="btn btn-xs btn-success">
                            Modifier 
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{route('sections.delete',['id' => $faqQuestion->id])}}" class="btn btn-xs btn-danger">
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
