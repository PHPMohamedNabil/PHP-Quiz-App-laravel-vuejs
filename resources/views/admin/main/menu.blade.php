<style type="text/css">
 .widget-menu>li>a {
     background-color: #fff;
    color: #767676;
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}
</style>
       <div class="wrapper">
            <div class="container">
                <div class="row">
                  <div class="span3">
                      <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-bullhorn"></i>Create Quiz </a>
                                </li>
                                <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-inbox"></i>Quizzes
                                     </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('question.create')}}"><i class="menu-icon icon-bold"></i>Create Question </a></li>
                                <li><a href="{{route('question.index')}}"><i class="menu-icon icon-book"></i>Questions </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('user.create')}}"><i class="menu-icon icon-bold"></i>Create User </a></li>
                                <li><a href="{{route('user.index')}}"><i class="menu-icon icon-book"></i>view Users </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('exam.assign')}}"><i class="menu-icon icon-bold"></i>Assign Exam </a></li>
                                <li><a href="{{route('exam.all')}}"><i class="menu-icon icon-book"></i>view User Exam </a></li>
                                 <li><a href="{{route('results')}}"><i class="menu-icon icon-book"></i>view User Results </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                        <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-inbox"></i>
                                        {{ __('Logout') }}
                                    </a>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->