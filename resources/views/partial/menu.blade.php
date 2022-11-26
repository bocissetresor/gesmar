<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('http://127.0.0.1:8000/') }}" class="site_title"><i class="fa fa-paw"></i> <span>GESMAR!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('images/img.jpg') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenue,</span>
                <h2>Mr Coulibaly Pied</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home </a>

                    </li>
                    <li><a><i class="fa fa-edit"></i> Exploitations <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('ancien_client') }}">Demande Contrat</a></li>
                            <li><a href="{{ url('page_ordonnacement') }}">Faire Ordonnancement</a></li>
                            <li><a href="{{ url('affiche_resumer_compte') }}">Affiche Contrats</a></li>
                            <li><a href="{{ url('affiche_emplacement1') }}">Affiche Emplacements</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-bank"></i> Paiements <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('ouverture_caisse') }}">Ouverture Caisse</a></li>
                            <li><a href="{{ url('voir_historique_paiement') }}">Historique des paiements</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-database"></i> Comptabilité <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('affiche_commerciaux') }}">Voir les Commerciaux</a></li>
                            <li><a href="{{ url('voir_paiement_journalier') }}">Voir les paiements</a></li>
                            <li><a href="{{ url('etablir_loyer') }}">Etablir les Loyers</a></li>
                            <li><a href="{{ url('affiche_resumer_compte') }}">Affiche Contrats</a></li>
                            <li><a href="{{ url('affiche_resumer_comptable') }}">Affiche Résumé Comptable</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-male"></i> Commerciaux <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('commerciaux_voir_client') }}">Voir ces clients</a></li>
                            <li><a href="{{ url('commerciaux_voir_pay') }}">Voir ces encaissements</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-cogs"></i> Gestion d'Equipement <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('affiche_compteurCie') }}">Cree Compteur CIE</a></li>
                            <li><a href="{{ url('affiche_compteurSodeci') }}">Cree Compteur SODECI</a></li>
                            <li><a href="{{ url('affiche_gaz') }}">Cree Equip Gaz</a></li>
                            <li><a href="{{ url('affiche_propriete') }}">Cree Autre Equipement</a></li>
                            <li><a href="{{ url('affiche_contrat_index2') }}">Regler Index Equipement</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-sitemap"></i> Gestion du Site <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/affiche') }}">Cree Site</a></li>
                            <li><a href="{{ url('nouveau_client') }}">Cree Loataire</a></li>
                            <li><a href="{{ url('affiche_emplacement1') }}">Affiche Emplacements</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-bar-chart-o"></i> Statistique <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('statistique_finance') }}">Voir Statistique Finance</a></li>
                            <li><a href="{{ url('statistique_locataire') }}">Voir Statistique Locataire</a></li>
                            <li><a href="{{ url('statistique_journaliere') }}">Voir Statistique Journaliere</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-search"></i> Etat des Lieux <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('etat_lieux') }}">Voir Etat des Lieux</a></li>
                        </ul>
                    </li>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">

            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>