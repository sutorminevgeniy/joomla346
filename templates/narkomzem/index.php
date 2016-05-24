<?php 
defined( '_JEXEC' ) or die; 
$app = JFactory::getApplication();
$pageClassSuffix = $app->getMenu()->getActive()? $app->getMenu()->getActive()->params->get('pageclass_sfx', 'default') : 'default';
$pageClassSuffix = 'pcs_' . $pageClassSuffix;
?>

<!DOCTYPE html>

<html class="<?php echo $pageClassSuffix ?>">
<head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/templates/system/css/system.css" type="text/css" rel="stylesheet" />
    <link href="/templates/system/css/general.css" type="text/css" rel="stylesheet" />

    <link href="/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" rel="stylesheet" />


    <script type="text/javascript">
        jQuery.noConflict();
    </script>
    <!--[if lt IE 9]>
    <script src="/templates/<?php echo $this->template; ?>/js/libs/html5shiv.min.js"></script>
    <script src="/templates/<?php echo $this->template; ?>/js/libs/respond.min.js"></script>
    <![endif]-->

</head>
    
<body>
    <div class="wraiper">
        <header>
            <a href="/" class="headerLogo"></a>
        </header>

        <jdoc:include type="modules" name="pos-Menu-01" />

        <jdoc:include type="modules" name="pos-Top-01" />

        <div class="middle">
            <?php if ($this->countModules('pos-AsideLeft-01')){ ?>
                <aside class="left">
                    <jdoc:include type="modules" name="pos-AsideLeft-01" />
                </aside>
            <?php } ?>
            
            <?php if ($this->countModules('pos-AsideRight-01')){ ?>
            <aside class="right">
                <jdoc:include type="modules" name="pos-AsideRight-01" />
            </aside>
            <?php } ?>

            <section>
                <jdoc:include type="modules" name="pos-BreadCr-01" />

                <jdoc:include type="modules" name="pos-TopCont-01" />

                <jdoc:include type="message" />
                <jdoc:include type="component" />

                <jdoc:include type="modules" name="pos-BottomCont-01" />
            </section>
        </div>

        <jdoc:include type="modules" name="pos-Bottom-01" />

        <div class="rasporka"></div>
    </div>
    <footer>

    </footer>
</body>
</html>
