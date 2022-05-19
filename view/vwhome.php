<?php require_once 'view/vwheader.php'; ?>

<style>
    .btn {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 16px;
        font-size: 16px;
        cursor: pointer;
    }
</style>

<main class="page landing-page" >
    <!-- <div class="container">
        <div class="d-flex justify-content-center align-items-center content">
            <h3>Panels</h3>
        </div>
    </div> -->

    <!-- <div class="container">
        <div class="d-flex justify-content-center align-items-center content">
            <button class="btn"><a href="index.php?controller=ctrlapartment&action=viewapartmentall"><i class="fa fa-home"></i></a></button>
            <button class="btn"><a href="index.php?controller=ctrlinstallation&action=viewinstallationall"><i class="fa fa-home"></i></a></button>
            <button class="btn"><a href="index.php?controller=ctrloperator&action=viewoperatorall"><i class="fa fa-home"></i></a></button>
        </div>
    </div> -->

    <!-- Main part of the page, containing the buttons -->
    <section class="portfolio-block skills border-0" style="padding-top: 0px;">
        <div class="container">
            <div class="heading"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <form action="index.php?controller=ctrlapartment&action=viewapartmentall" method="post">
                            <button class="border-0 bg-white">
                                <div class="card-header bg-transparent border-0"><i class="fa fa-home fa-border fa-4x text-primary" aria-hidden="true"></i>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">Apartments</h3>
                                    <p class="card-text">Manage the apartments we're working on</p>
                                </div>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <form action="index.php?controller=ctrlinstallation&action=viewinstallationall" method="post">
                            <button class="border-0 bg-white">
                                <div class="card-header bg-transparent border-0"><i class="fa fa-cogs fa-border fa-4x text-primary" aria-hidden="true"></i>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">Installations</h3>
                                    <p class="card-text">View the works carried out and those in progress</p>
                                </div>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <form action="index.php?controller=ctrloperator&action=viewoperatorall" method="post">
                            <button class="border-0 bg-white">
                                <div class="card-header bg-transparent border-0"><i class="fa fa-briefcase fa-border fa-4x text-primary" aria-hidden="true"></i></div>
                                <div class="card-body">
                                    <h3 class="card-title">Operators</h3>
                                    <p class="card-text">Have a look at our workforce</p>
                                </div>
                    </div>
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- <section class="portfolio-block website gradient">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-5 offset-lg-1 text">
                <h3>Website Project</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget velit ultricies, feugiat est
                    sed, efr nunc, vivamus vel accumsan dui. Quisque ac dolor cursus, volutpat nisl vel, porttitor
                    eros.</p>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="portfolio-laptop-mockup">
                    <div class="screen">
                        <div class="screen-content" style="background-image:url(&quot;./img/tech/image6.png&quot;);"></div>
                    </div>
                    <div class="keyboard"></div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?php require_once 'view/vwfooter.php'; ?>
</body>

</html>