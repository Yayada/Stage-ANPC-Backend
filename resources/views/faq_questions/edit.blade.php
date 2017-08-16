@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Questions
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li class="active">Questions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
            <form role="form" method="post" action = "/questions/{{$faqQuestion->id}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                <div class="form-group">
                    <label for="title">Section</label>
                    <select  class="form-control" name="section">
                        <option value="{{$faqQuestion->faqSection->id}}" selected >{{$faqQuestion->faqSection->title}}</option>
                        @foreach($faqSections as $section)
                                <option value="{{$faqQuestion->faqSection->id}}">{{$section->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="title">Question</label>
                  <textarea type="text" class="form-control" name="question" id="question" placeholder="Contenu de la question ">{{$faqQuestion->content}}</textarea>
                </div>                
                <div class="form-group">
                    <label for="title">Réponse</label>
                    <textarea class="textarea" name="response" id="response" placeholder="Réponse à la question"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$faqQuestion->response}}</textarea>

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
