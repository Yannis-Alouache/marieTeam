<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="margin-top: 20px; margin-bottom: 20px" href="?action=defaut">
                <div class="sidebar-brand-icon">
                    <img width="100" height="100" src="img/core-img/logo.png" />
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="?action=admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Liaisons
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?action=adminAjouterLiaisons">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Ajouter</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="?action=adminModifierLiaisons">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Modifier</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Statistique
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Visionner</span>
                </a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $pseudo  ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php 
                        if (isset($message)) {
                            echo '
                                <div class="alert alert-dark" role="alert">'
                                    . $message .
                                '</div>
                            ';
                        }
                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modifier une Liaison</h1>
                    </div>


                        <form action="./?action=adminModifierLiaisons" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Liaison</label>
                                    <select name="liaisonSelect" class="form-control" placeholder="selectionnez une liaison à modifier">
                                        <option selected value="null"></option>
                                        <?php 
                                            foreach ($liaisons as &$liaison) {
                                                echo '
                                                    <option value=' . $liaison["codeLiaison"] .'>'. $liaison["portDepart"] . "-" . $liaison["portArriver"] .'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Choisir</button>

                        </form>                  
                        </br>
                        </br>
                        <form action="./?action=adminModifierLiaisons" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Port de Départ</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="portDepart" value='<?php if (isset($liaisonToModify["portDepart"])) echo $liaisonToModify["portDepart"]; ?>' placeholder="Port de Départ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Port d'Arrivé</label>
                                    <input type="text" class="form-control" id="inputPassword4" name="portArrive" value='<?php if (isset($liaisonToModify["portArriver"])) echo $liaisonToModify["portArriver"]; ?>' placeholder="Port d'Arrivé">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">Distance en milles marin </label>
                                <input type="number" step="0.1" min="0" class="form-control" id="inputEmail4" name="distance" value='<?php if (isset($liaisonToModify["distance"])) echo $liaisonToModify["distance"]; ?>' placeholder="0">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputPassword4">Secteur</label>
                                <select id="inputState" name="secteurId" class="form-control">
                                    <option selected value='<?php if (isset($liaisonToModify["secteurId"])) echo $liaisonToModify["secteurId"] ?>'><?php if (isset($liaisonToModify["secteurId"])) echo get_sector_name_by_id($liaisonToModify["secteurId"])["nomSecteur"] ?></option>
                                    <?php 
                                        foreach ($secteurs as &$secteur) {
                                            echo '
                                                <option value=' . $secteur["id"] .'>'. $secteur["nomSecteur"] .'</option>
                                            ';
                                        }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>