<?php include('head.php'); ?>
<?php $currpage = basename($_SERVER["SCRIPT_FILENAME"], '.php')  ?>

<body>
    <header>
        <div class="logo mt-3">
            <img src="img/logo.png" alt="logo" />
        </div>
        <div class="text-end pb-2 me-5">
            <a class="logout" href="/logout">Logout</a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="container">
                    <?php if ($currpage == 'utentes') { ?>
                        <div class="navbar-nav" style="justify-content: start">
                            <a class="nav-link <?php if ($currpage == 'utentes') echo 'active'; ?>" aria-current="page" href="utentes.php">Lista de utentes</a>
                        </div>
                    <?php } else { ?>
                        <div class="navbar-nav">
                            <a class="nav-link <?php if ($currpage == 'amnese') echo 'active'; ?>" aria-current="page" href='javascript:form.submit()'>AMNESE</a>
                            <a class="nav-link <?php if ($currpage == 'queixas') echo 'active'; ?>" href='javascript:form.submit()'>Queixas</a>
                            <a class="nav-link <?php if ($currpage == 'doencas') echo 'active'; ?>" href='javascript:form.submit()'>Doenças</a>
                            <a class="nav-link <?php if ($currpage == 'amaparelhos') echo 'active'; ?>" href='javascript:form.submit()'>Amnese por aparelhos</a>
                            <a class="nav-link <?php if ($currpage == 'tratamentos') echo 'active'; ?>" href='javascript:form.submit()'>Tratamento/Medicação</a>
                            <a class="nav-link <?php if ($currpage == 'dor') echo 'active'; ?>" href='javascript:form.submit()'>Dor</a>
                            <a class="nav-link <?php if ($currpage == 'classesdor') echo 'active'; ?>" href='javascript:form.submit()'>Classes de dor</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    
</header>


