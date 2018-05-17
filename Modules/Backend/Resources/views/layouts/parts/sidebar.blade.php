<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">Navigation</li>

            <li><a href="{{route('Backend::home')}}"><i class="fa fa-dashboard"></i><span> Vue d'ensemble</span></a></li>

            <!-- Gestions des Catégories -->
            <li>
                <a href="{{route('Backend::CategoriesController.index')}}">
                    <i class="fa fa-th"></i>
                    <span>Catégories</span>
                </a>
            </li>
            <!-- Fin de gestion des Catégories -->

            <!-- Gestions des evenements
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Évenements</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-list"></i> Ajouter un évenement</a></li>
                    <li><a href=""><i class="fa fa-list"></i> Voir les événements</a></li>
                </ul>
            </li>
             Fin de gestion des utilisateurs -->

            <!-- Gestions des utilisateurs
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Utilisateurs</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-list"></i> Clients</a></li>
                    <li><a href=""><i class="fa fa-list"></i> Staff</a></li>
                </ul>
            </li>
            wFin de gestion des utilisateurs -->

        </ul>
    </section>
</aside>