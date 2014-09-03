<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RH - CONTROLE DE INTERNOS</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('assets/css/bootstrap.css') }}

    <!-- Add custom CSS here -->
    {{ HTML::style('assets/css/sb-admin.css') }}
    {{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
    <!-- Page Specific CSS -->
    {{ HTML::style('http://cdn.oesmith.co.uk/morris-0.4.3.min.css') }}
    {{ HTML::script('assets/js/jquery-1.10.2.js') }}
    {{ HTML::script('assets/js/angular.min.js') }}
    {{ HTML::script('assets/js/jquery.maskedinput.js') }}
    <script type="text/javascript">
    $(function(){
      $('input[type=text]').blur(function(){
        var str = $(this).val().toUpperCase()
        $(this).val(str)
      })
    })
    </script>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Controle de Internos</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li>
              {{ link_to_route('setors.index', 'Setor') }}
              {{ link_to_route('internos.index', 'Internos') }}
              {{ link_to_route('frequencia.index', 'Frequencia dos Internos') }}
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
        <div class="row">
          @if (Session::has('message'))
            <div class="alert alert-warning fade in">
              <button type="button" class="btn close" data-dismiss="alert" aria-hidden="true">
                ×
              </button>
              <strong>
                {{ Session::get('message') }}
              </strong>
              @if ($errors->any())
                <ul>
                  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
              @endif
            </div>
          @endif

          @yield('main')
        </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->



    <!-- Page Specific Plugins -->
    {{--
    {{ HTML::script('assets/http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}
    {{ HTML::script('assets/http://cdn.oesmith.co.uk/morris-0.4.3.min.js') }}
    {{ HTML::script('assets/js/morris/chart-data-morris.js') }}
    {{ HTML::script('assets/js/tablesorter/jquery.tablesorter.js') }}
    {{ HTML::script('assets/js/tablesorter/tables.js') }}
     --}}

  </body>
</html>