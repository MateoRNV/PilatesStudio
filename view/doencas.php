<?php include('header.php'); ?>
<section class="pt-2 pb-1" style="background: center / cover url(../public/img/banner_doencas.png) no-repeat">
    <div class="container">
        <div class="col-md-5 col-sm-12">
            <h1 class="pagetitle">Doenças</h1>
        </div>
    </div>
</section>

<?php include("templates/backsection.php"); ?>

<div class="formulario">
<form name="form" action="/save<?php if (isset($id)) echo '?id='.$id; ?>" method="post">
    <div class="container">
        <p class="page-text">Doenças conhecidas por ordem cronológica</p>
        <div class="input-group mb-3">
            <div class="input-group-prepend mb-2">
                <span class="page-text">Infância</span>
            </div>
            <textarea class="form-control-custom-2" aria-label="Infância"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend mb-2">
                <span class="page-text">Adolescência</span>
            </div>
            <textarea class="form-control-custom-2" aria-label="Adolescência"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend mb-2">
                <span class="page-text">Adulto</span>
            </div>
            <textarea class="form-control-custom-2" aria-label="Adulto"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend mb-2">
                <span class="page-text">Alergias?</span>
            </div>
            <textarea class="form-control-custom-2" aria-label="Alergias"></textarea>
        </div>
    </div>
</form>
</div>

<?php include('footer.php'); ?>