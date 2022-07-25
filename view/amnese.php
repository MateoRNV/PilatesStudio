<?php include('header.php'); ?>
<section class="pt-2 pb-1" style="background: center / cover url(img/banner_amnese.png) no-repeat">
    <div class="container">
        <div class="col-md-5 col-sm-12">
            <h1 class="pagetitle">Amnese</h1>
        </div>
    </div>
</section>

<?php include("templates/backsection.php"); ?>

<section class="formulario">

    <form name="form" action="/save<?php if (isset($id)) echo '?id='.$id; ?>" method="post">
        <?php include('templates/message.php'); ?>
        <div class="container d-flex">
            <div class="form-group col-sm-6 col-xs-12 px-4">
                <p class="page-text">DADOS PESSOAIS</p>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Nome completo</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="name" placeholder="Nome completo" value="<?= $name ?? ''; ?>" required>
                </div>
                <div class="form-row mb-2 d-flex  page-text">
                    <div class="col-4 px-1">
                        <label for="validationTooltip01">Data de nascimento</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="birthDate" placeholder="Data de nascimento" value="<?= $birthDate ?? ''; ?>" required>
                    </div>
                    <div class="col-3 px-1">
                        <label for="validationTooltip01">Idade</label>
                        <input type="number" class="form-control" id="validationTooltip01" name="age" placeholder="Idade" value="<?= $age ?? '' ?>" required>
                    </div>
                    <div class="col-5 px-1">
                        <label for="validationTooltip01">Naturalidade</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="nationality" placeholder="Naturalidade" value="<?= $nationality ?? '' ?>" required>
                    </div>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">NIF</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="nif" placeholder="NIF" value="<?= $nif ?? '' ?>" required>
                </div>
                <p class="page-text">CONTACTOS E MORADA</p>
                <div class="form-row mb-2 d-flex  page-text">
                    <div class="col-9 px-1">
                        <label for="validationTooltip01">Email</label>
                        <input type="email" class="form-control" id="validationTooltip01" name="email" placeholder="Email" value="<?= $email ?? '' ?>" required>
                    </div>
                    <div class="col-3 px-1">
                        <label for="validationTooltip01">Telemóvel</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="phone" placeholder="Telemóvel" value="<?= $phone ?? '' ?>" required>
                    </div>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">MORADA</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="address" placeholder="Morada" value="<?= $address ?? '' ?>" required>
                </div>
            </div>
            <div class="form-group col-sm-6 col-xs-12 px-4">
                <p class="page-text">CONTACTOS DE EMERGÊNCIA</p>
                <div class="row aviso">
                    <p>Para sua segurança deverá inserir um contacto de emergência válido de alguém próximo que possamos contactar facilmente.</p>
                </div>
                <div class="form-row mt-2 mb-2 page-text">
                    <label for="validationTooltip01">Nome completo</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="nameEmergency" placeholder="Nome completo" value="<?= $emergencyName ?? '' ?>" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Telemóvel</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="phoneEmergency" placeholder="Telemóvel" value="<?= $emergencyPhone ?? '' ?>" required>
                </div>
            </div>
        </div>   
    </form>
</section>

<?php include('footer.php'); ?>
