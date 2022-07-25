<?php include('header.php'); ?>
<section class="pt-2 pb-1" style="background: center / cover url(../public/img/banner_queixas.png) no-repeat">
    <div class="container">
        <div class="col-md-5 col-sm-12">
            <h1 class="pagetitle">Queixas</h1>
        </div>
    </div>
</section>

<?php include("templates/backsection.php"); ?>

<section class="formulario">
    <form name="form" action="/save<?php if (isset($id)) echo '?id='.$id; ?>" method="post">
        <div class="container d-flex">
            <div class="form-group col-sm-6 col-xs-12 px-4">
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">O que é que o trouxe aqui?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="trouxe" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Há quanto tempo?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="tempo" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Suspeita da razão pela qual está com dor?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="suspeita" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">A família tem qualquer histórico de problemas na coluna?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="historicoColuna" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Há um histórico de traumatismo?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="historicoTraumatismo" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Se houver um histórico de trauma, foi uma postura específica, postura sustentada ou uma postura repetitiva?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="historicoPostura" placeholder="" value="" required>
                </div>
                
            </div>
            <div class="form-group col-sm-6 col-xs-12 px-4">
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">A família tem qualquer histórico de problemas na coluna?</label>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Existe antecedente de doença, cirurgia ou lesões graves que tenham ocorrido com o paciente?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="antecedentes" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">O sapato faz diferença para a postura ou os sintomas do paciente?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="sapato" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Se uma deformidade estiver presente, ela é progressiva ou estacionária?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="deformidade" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">Existem posturas ou ações que aumentam ou diminuam a dor?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="posturaDor" placeholder="" value="" required>
                </div>
                <div class="form-row mb-2 page-text">
                    <label for="validationTooltip01">O que o paciente é capaz de fazer funcionalmente?</label>
                    <input type="text" class="form-control" id="validationTooltip01" name="funcionalmente" placeholder="" value="" required>
                </div>
            </div>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Tipo de Dor:</label>
                    </div>
                </div>
                <div class="form-group col-sm-9 px-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dorAguda" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Aguda</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dorDifusa" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">Difusa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dorQueimadura" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Queimadura</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dorPulsante" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Pulsante</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dorFormigueiro" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Formigueiro</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Intensidade:</label>
                    </div>
                </div>
                <div class="form-group col-sm-9 px-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">7</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">8</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">9</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="intensidade" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">10</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Horário:</label>
                    </div>
                </div>
                <div class="form-group col-sm-9 px-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="horarioMatinal" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Matinal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="horarioMeioDia" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">Meio-dia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="horarioTarde" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Á tarde</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="horarioNoite" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Noite</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="horarioMadrugada" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Madrugada</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Época do ano:</label>
                    </div>
                </div>
                <div class="form-group col-sm-9 px-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="epocaPrimavera" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Primavera</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="epocaVerao" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">Verão</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="epocaOutono" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Outono</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="epocaInverno" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Inverno</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1"><h3>Histórico Pessoal</h3></label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Parto: </label>
                    </div>
                </div>
                <div class="form-group col-sm-9 px-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="partoPrematuro" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Prematuro</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="partoNatural" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">Natural</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="partoCesariana" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Cesariana</label>
                    </div>
                </div>
            </div>
            <div class="row my-4 d-flex">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Aquisição da marcha: </label>
                    </div>
                </div>
                <div class="form-group col-sm-1 px-4">
                    <div class="d-flex">
                        <input class="form-control-custom" type="text" name="marchaMeses" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Meses</label>
                    </div>
                </div>
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Aquisição da fala: </label>
                    </div>
                </div>
                <div class="form-group col-sm-1 px-4">
                    <div class="d-flex">
                        <input class="form-control-custom" type="text" name="falaMeses" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Meses</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Ciclo Hormonal: </label>
                    </div>
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="hormonalIdade" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Menarca Idade</label>
                    </div>
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="hormonalMenstruacao" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">Menstruação</label>
                    </div>
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="hormonalDuracao" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Duração</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-7 px-4">
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class="form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="hormonalCiclo" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Ciclo</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-7 px-4">
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class="form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="hormonalContraceptivos" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Contraceptivos</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Psico-afetivos: </label>
                    </div>
                </div>
                <div class="form-group col-sm-3 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="relacoesFamiliares" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Relações Familiares</label>
                    </div>
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name=" " id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">(+ / - )</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Psico-sociais: </label>
                    </div>
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="psicoIntegrado" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">Integrado</label>
                    </div>
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="psicoParte" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">Á parte</label>
                    </div>
                </div>
                <div class="form-group col-sm-2 px-4">
                    <div class=" form-check-inline d-flex">
                        <input class="form-control-custom" type="text" name="psicoDesintegrado" id="inlineCheckbox1" value="">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">Desintegrado</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text"
                               for="inlineCheckbox1">Satisfação com a Vida:</label>
                    </div>
                </div>
                <div class="form-group col-sm-9 px-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">7</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">8</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">9</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="satisfacao" id="inlineCheckbox3" value="option3">
                        <label class="form-check-label page-text-thin" for="inlineCheckbox3">10</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Ocupação:</label>
                    </div>
                </div>
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check-inline d-flex">
                        <input class="form-control-custom-2" type="text" name="ocupacao" id="inlineCheckbox1" value="">
                    </div>
                </div>
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Satisfação de 1 a 10: </label>
                    </div>
                </div>
                <div class="form-group col-sm-1 px-4">
                    <div class="d-flex">
                        <input class="form-control-custom" type="text" name="ocupacaoSatisfacao" id="inlineCheckbox1" value="">
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="form-group col-sm-3 px-4">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label page-text" for="inlineCheckbox1">Hobbies:</label>
                    </div>
                </div>
                <div class="form-group col-sm-9 px-4">
                    <div class="form-check-inline d-flex">
                        <input class="form-control-custom-2" type="text" name="hobbies" id="inlineCheckbox1" value="">
                    </div>
                </div>
            </div>
        </div>        
    </form>
</section>

<?php include('footer.php'); ?>