<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php wp_title('|', true, 'left'); ?>
        <?php bloginfo('name'); ?>
    </title>

    <?php wp_head(); ?>

</head>


<body>

    <header>
        <div class="bg"></div> <!-- .bg -->
        <div class="jumbotron">
            
            <div class="titles-wrap">
                <h1><?php bloginfo('name'); ?></h1>
                <small><?php bloginfo('description'); ?></small>
            </div> <!-- .titles-wrap -->
        
        </div> <!-- .jumbotron -->
    </header>


    <div class="nav-wrap">
        
        <nav class="nav nav-pills" data-spy="affix" data-offset-top="660">
            <div class="container">
            
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> <!-- .navbar-header -->

                <div id="navbar" class="navbar-collapse collapse">          
                    <?php
                        $args = array(
                                'menu'  => 'header-menu',
                                'menu_class' => 'nav navbar-nav',
                                'container' => 'false'
                            );
                        wp_nav_menu( $args );
                    ?>
                </div><!--/.navbar-collapse -->

            </div> <!-- .container -->
        </nav>
    </div> <!-- .nav-wrap -->





