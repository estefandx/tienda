<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
           
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="{{ url('producto/create') }}"><i class='fa fa-link'></i> <span>Registrar Producto</span></a></li>
            <li><a href="{{ url('/listado_productos') }}"><i class='fa fa-link'></i> <span>Listar Producto</span></a></li>
            <li><a href="{{ url('cargar_archivo') }}"><i class='fa fa-link'></i> <span>Cargar Archivo </span></a></li>
              <li><a href="{{ url('cargar_imagenes') }}"><i class='fa fa-link'></i> <span>Cargar Imagenes  </span></a></li>
            <li><a href="{{ url('actualizar') }}"><i class='fa fa-link'></i> <span>Actualizar Precios</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
