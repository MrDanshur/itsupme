<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/global/classes/SiteConfig.class.php');
$config->initialize();
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="/global/css/templateStyles.css" rel="stylesheet" type="text/css">
    <link href="/css/MainPageStyles.css" rel="stylesheet" type="text/css">
    <link href="/css/round_corner.css" rel="stylesheet" type="text/css">
    <link href="/global/jsObjects/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
    <link href="/global/jsObjects/SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="<?= SiteConfig::getService('internalsite.design.logo')->getFaviconPath(); ?>" type="image/png">
    <script type="text/javascript" src="/global/js/jquery.js"></script>
    <script type="text/javascript" src="/global/js/html2canvas.min.js"></script>
    <script type="text/javascript">
        <!--
        var SS_hr = <?php echo(date('h')); ?>;
        var SS_min = <?php echo(date('i')); ?>;
        var SS_sec = <?php echo(date('s')); ?>;
        var SS_am = <?php echo(date('A') == 'AM' ? 'true' : 'false'); ?>;

        var SS_hr_expire = <?php echo(date('h', strtotime('+24 minute'))); ?>;
        var SS_min_expire = <?php echo(date('i', strtotime('+24 minute'))); ?>;
        var SS_sec_expire = <?php echo(date('s', strtotime('+24 minute'))); ?>;
        var SS_am_expire = <?php echo(date('A', strtotime('+24 minute')) == 'AM' ? 'true' : 'false'); ?>;
        setInterval("SYS_TimeTrack()", 1000);

        //-->
    </script>
    <script type="text/javascript" src="/global/js/template.js"></script>
    <?php SiteConfig::loadInclude('js_loader.php'); ?>
    <title><?= SiteConfig::getService("service_container")->getParameter("app.site_title"); ?></title>
    <script src="/scripts/js/load_metrics.js" type="text/javascript"></script>

</head>
<body>
<div id="wholepage" class="posCenter">
    <?php
    // INCLUDE HEADER
    require($_SERVER["DOCUMENT_ROOT"] . "/global/includes/header.php");
    // INCLUDE MENU
    require($_SERVER['DOCUMENT_ROOT'] . '/global/includes/nav_menu.php');
    ?>
    <section class="main">

        <?php if (!UserSecurity::isLoggedin()) {
            UserSecurity::redirectToLoginPage();
        } ?>
        <?php displayMsgs(); ?>

        <table>
            <tr>
                <td><b class="r0"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>

                    <div class="center_block2">
                        <table class="fullWidth">
                            <tr>
                                <td class="headbackground center">Announcements</td>
                            </tr>
                            <tr>
                                <td><h3>Error Reporting System</h3>

                                    <p>New Error Reporting page has been developed. Please use it to notify web
                                        developers about any errors that you encounter while using the website. The
                                        reporting page can be found under the Help section on top of every page.</p>

                                    <h3><strong>Secure Connection To Our Website</strong></h3>

                                    <p>We have implemented a Secure Socket Layer (SSL) Protocol into our system. This
                                        means that every time you access any
                                        of <?= SiteConfig::getProperty("SiteAddress"); ?> pages the information
                                        exchanged between you and the website is protected from hackers. What do you
                                        have to watch out for? If you see a <strong><span style="color:#FF0000">RED Background</span></strong>
                                        on the top of the window where the website address is displayed, you must
                                        <strong><span style="color:#FF0000">STOP</span></strong> what you are doing and
                                        contact the IT immediately. Under <strong><span style="color:#FF0000">NO circumstances</span></strong>
                                        should you log on to the website if the address bar is RED or if you receive a
                                        security warning message.</p></td>
                            </tr>
                        </table>
                    </div>
                    <b class="r0"><b class="r4"></b><b class="r3"></b><b class="r2"></b><b class="r1"></b></b></td>
            </tr>
        </table>
        <p>&nbsp; </p>
        <input name="server_proc_time" id="server_proc_time" type="hidden"
               value="<?= $config->getLoadingTime(true); ?>"/>
        <input name="server_query_count" id="server_query_count" type="hidden" value="<?= DB::globalQueryCount(); ?>"/>
        <?php require_once($config->includes . "ipTracker.php"); ?>
        <input name="client_ip" id="client_ip" type="hidden" value="<?= ipTracker::getIP(); ?>"/>
        <input name="performance_test_date_time" id="performance_test_date_time" type="hidden"
               value="<?= date("Y-m-d H:i:s"); ?>"/>
    </section>
    <?php
    #the label below can be used to quit the script at anytime, while still printing the end HTML
    endOfMain:
    if ($config->isSandbox()) {
        ?>

        <hr>
        <p>Page generated in <?= $config->getLoadingTime(); ?> with <?= DB::globalQueryCount(); ?> queries.</p>
    <?php } ?>
</div>
<?php
if (UserSecurity::isLoggedin()) {
    ?>
    <script type="text/javascript">
        var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
            imgDown: "/global/jsObjects/SpryAssets/SpryMenuBarDownHover.gif",
            imgRight: "/global/jsObjects/SpryAssets/SpryMenuBarRightHover.gif"
        })</script>
<?php } ?>
<div id="floating_side_menu_container" <?php if (!UserSecurity::isLoggedin()){ ?>style="display:none"<?php } ?>>
    <img src="/images/icons/report_error.png" width="43" height="57" class="menu_button" id="report_error_button"
         title="Report Error">
    <img src="/images/icons/arrow-slide-right.png" width="25" height="25"
         style="position:absolute; bottom:-12px; left:13px" id="floating_side_menu_hide_arrow">
    <img id="floating_side_menu_expand_arrow" src="/images/icons/arrow-slide-left.png" width="25" height="25"
         style="position:absolute; left:-15px">
</div>
</body>
</html>
