<div class="pcoded-content">

    <?php if (isset($message)) echo $message; ?>

    <?php
    if (UserInfo('saque_liberado') == 1 && SystemInfo('saque_liberado') == 1) {

        if (isset($cancelamento_ativo)) {

            /* Verifica se o módulo está ativo */
            if ($cancelamento_ativo == 1) {
                /* Verifica se a raiz já foi sacada antes */
                if ($raiz_sacada == 0) {
                    /* Verifica se a fatura existe e é do usuário */
                    if ($habilitado_saque === true) {
    ?>

                        <!-- slider -->
                        <div id="app">
                            <!-- Fashion slider container -->
                            <div class="fashion-slider mt-4">
                                <div class="swiper">
                                    <div class="swiper-wrapper">

                                        <!-- configure slide color with "data-slide-bg-color" attribute -->
                                        <div class="swiper-slide" data-slide-bg-color="#071126">
                                            <!-- slide title wrap -->
                                            <div class="fashion-slider-title" data-swiper-parallax="-130%">
                                                <!-- slide title text -->
                                                <div class="fashion-slider-title-text pt-4">
                                                    <h2 class="text-white is-size-4"><?php echo $this->lang->line('saq_valor_raiz'); ?></h2>
                                                    <span class="font-serif"><?php echo MOEDA; ?> <?php echo number_format($saldo_raiz, 2, ',', '.'); ?></span>
                                                    <p>
                                                        <span class="is-size-4"><?php echo $this->lang->line('saq_valor_raiz_desc'); ?></span> &nbsp;
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- slide image wrap -->
                                            <div class="fashion-slider-scale"><img src="<?php echo base_url(''); ?>/assets/pages/backoffice/bgplanos.jpg"></div>
                                        </div>
                                        <!-- configure slide color with "data-slide-bg-color" attribute -->
                                        <div class="swiper-slide" data-slide-bg-color="#071126">
                                            <!-- slide title wrap -->
                                            <div class="fashion-slider-title" data-swiper-parallax="-130%">
                                                <!-- slide title text -->
                                                <div class="fashion-slider-title-text pt-4">
                                                    <h2 class="text-white is-size-4"><?php echo $this->lang->line('saq_valor_raiz_sacar_taxa'); ?></h2>
                                                    <span class="font-serif"><?php echo MOEDA; ?> <?php echo number_format(($saldo_raiz - ($saldo_raiz * ($cancelamento_taxa / 100))), 2, ',', '.'); ?></span>
                                                    <p>
                                                        <span class="is-size-4"><?php echo sprintf($this->lang->line('saq_valor_raiz_sacar_taxa_desc'), $cancelamento_taxa); ?></span> &nbsp;
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- slide image wrap -->
                                            <div class="fashion-slider-scale"><img src="<?php echo base_url(''); ?>/assets/pages/backoffice/bgrendimentos.jpg"></div>
                                        </div>

                                    </div>
                                    <!-- right/next navigation button -->
                                    <div class="fashion-slider-button-prev fashion-slider-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 350 160 90">
                                            <g class="fashion-slider-svg-wrap">
                                                <g class="fashion-slider-svg-circle-wrap">
                                                    <circle cx="42" cy="42" r="40"></circle>
                                                </g>
                                                <path class="fashion-slider-svg-arrow" d="M.983,6.929,4.447,3.464.983,0,0,.983,2.482,3.464,0,5.946Z">
                                                </path>
                                                <path class="fashion-slider-svg-line" d="M80,0H0"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <!-- left/previous navigation button -->
                                    <div class="fashion-slider-button-next fashion-slider-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 350 160 90">
                                            <g class="fashion-slider-svg-wrap">
                                                <g class="fashion-slider-svg-circle-wrap">
                                                    <circle cx="42" cy="42" r="40"></circle>
                                                </g>
                                                <path class="fashion-slider-svg-arrow" d="M.983,6.929,4.447,3.464.983,0,0,.983,2.482,3.464,0,5.946Z">
                                                </path>
                                                <path class="fashion-slider-svg-line" d="M80,0H0"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .slider -->

                        <div class="card mt-4">
                            <div class="card-header">
                                <h5><?php echo $this->lang->line('saq_selecione_valor'); ?></h5>
                            </div>
                            <div class="card-body table-border-style">
                                <form action="" method="post" id="cancelar_contrato">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <?php
                                            if (empty($pix) || $pix == '{}') {
                                                echo alerts($this->lang->line('cadastre_uma_conta'), 'danger');
                                            }
                                            ?>

                                            <ul class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                <?php
                                                if (!empty($newpay) && $newpay != '{}' && (isset($meio_disponivel['newpay']) && $meio_disponivel['newpay'] == true)) {
                                                ?>
                                                    <li><a class="select_account btn btn-outline-secondary mr-2 mb-4" id="v-pills-newpay-tab" data-toggle="pill" href="#v-pills-newpay" role="tab" aria-controls="v-pills-newpay" aria-selected="false" data-account="2"><?php echo $this->lang->line('saq_tipo_newpay'); ?></a></li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($conta_bancaria) && $conta_bancaria != '{}' && (isset($meio_disponivel['conta_bancaria']) && $meio_disponivel['conta_bancaria'] == true)) {
                                                ?>
                                                    <li><a class="select_account btn btn-outline-secondary mr-2 mb-4" id="v-pills-conta_bancaria-tab" data-toggle="pill" href="#v-pills-conta_bancaria" role="tab" aria-controls="v-pills-conta_bancaria" aria-selected="false" data-account="3"><?php echo $this->lang->line('saq_tipo_conta_bancaria'); ?></a></li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($carteira_bitcoin) && $carteira_bitcoin != '{}' && (isset($meio_disponivel['carteira_bitcoin']) && $meio_disponivel['carteira_bitcoin'] == true)) {
                                                ?>
                                                    <li><a class="select_account btn btn-outline-secondary mr-2 mb-4" id="v-pills-carteira_bitcoin-tab" data-toggle="pill" href="#v-pills-carteira_bitcoin" role="tab" aria-controls="v-pills-carteira_bitcoin" aria-selected="false" data-account="4"><?php echo $this->lang->line('saq_tipo_carteira_bitcoin'); ?></a></li>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($pix) && $pix != '{}' && (isset($meio_disponivel['pix']) && $meio_disponivel['pix'] == true)) {
                                                ?>
                                                    <li><a class="select_account btn btn-outline-secondary mr-2 mb-4" id="v-pills-pix-tab" data-toggle="pill" href="#v-pills-pix" role="tab" aria-controls="v-pills-pix" aria-selected="false" data-account="5"><?php echo $this->lang->line('saq_tipo_pix'); ?></a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <?php
                                                if (!empty($newpay) && $newpay != '{}' && (isset($meio_disponivel['newpay']) && $meio_disponivel['newpay'] == true)) {
                                                ?>
                                                    <div class="tab-pane fade" id="v-pills-newpay" role="tabpanel" aria-labelledby="v-pills-newpay-tab">
                                                        <?php echo alerts($this->lang->line('saq_aviso_antes_solicitar'), 'info'); ?>

                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_newpay'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        $newpayArray = json_decode($newpay, true);
                                                                        echo $newpayArray['newpay'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($conta_bancaria) && $conta_bancaria != '{}' && (isset($meio_disponivel['conta_bancaria']) && $meio_disponivel['conta_bancaria'] == true)) {

                                                    $bancoArray = json_decode($conta_bancaria, true);
                                                ?>
                                                    <div class="tab-pane fade" id="v-pills-conta_bancaria" role="tabpanel" aria-labelledby="v-pills-conta_bancaria-tab">
                                                        <?php echo alerts($this->lang->line('saq_aviso_antes_solicitar'), 'info'); ?>

                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_banco'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        echo BancoID($bancoArray['banco']);
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_agencia'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        echo $bancoArray['agencia'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_conta'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        echo $bancoArray['conta'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_tipo_conta'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        echo ($bancoArray['tipo'] == 1) ? $this->lang->line('saq_form_tipo_conta_corrente') : $this->lang->line('saq_form_tipo_conta_poupanca');
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_titular'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        echo $bancoArray['titular'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_documento'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        echo $bancoArray['documento'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($carteira_bitcoin) && $carteira_bitcoin != '{}' && (isset($meio_disponivel['carteira_bitcoin']) && $meio_disponivel['carteira_bitcoin'] == true)) {
                                                ?>
                                                    <div class="tab-pane fade" id="v-pills-carteira_bitcoin" role="tabpanel" aria-labelledby="v-pills-carteira_bitcoin-tab">
                                                        <?php echo alerts($this->lang->line('saq_aviso_antes_solicitar'), 'info'); ?>

                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_carteira_bitcoin'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        $carteiraBTCArray = json_decode($carteira_bitcoin, true);
                                                                        echo $carteiraBTCArray['carteira_bitcoin'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (!empty($pix) && $pix != '{}' && (isset($meio_disponivel['pix']) && $meio_disponivel['pix'] == true)) {
                                                ?>
                                                    <div class="tab-pane fade" id="v-pills-pix" role="tabpanel" aria-labelledby="v-pills-pix-tab">
                                                        <?php echo alerts($this->lang->line('saq_aviso_antes_solicitar'), 'info'); ?>

                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td><strong><?php echo $this->lang->line('saq_form_pix'); ?></strong></td>
                                                                    <td>
                                                                        <?php
                                                                        $pixArray = json_decode($pix, true);
                                                                        echo $pixArray['pix'];
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bg-danger text-white"><strong><?php echo $this->lang->line('saq_form_tipo_chave_pix'); ?></strong></td>
                                                                    <td class="bg-danger text-white">
                                                                        <?php
                                                                        $pixArray = json_decode($pix, true);
                                                                        echo ($pixArray['tipo'] != 'EVP') ? $pixArray['tipo'] : 'Chave Aleatória';
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" name="submit" value="Solicitar" class="btn btn-success btn-block text-uppercase" load-button="on" load-text="<?php echo $this->lang->line('saq_solicitar_saque_andamento_button'); ?>" disabled><?php echo $this->lang->line('saq_solicitar_saque_button'); ?></button>
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                            <input type="hidden" name="conta" value="0" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
    <?php
                    } else {
                        echo alerts($this->lang->line('saq_valor_contrato_nao_existe'), 'danger');
                    }
                } else {
                    echo alerts($this->lang->line('saq_valor_raiz_nao_autorizado'), 'danger');
                }
            } else {
                echo alerts($this->lang->line('saq_valor_contrato_nao_autorizado'), 'danger');
            }
        }
    } else {
        echo alerts($this->lang->line('saq_conta_nao_habilitada'), 'danger');
    }
    ?>
</div>

<?php echo $this->recaptcha->getScriptTag(); ?>
<?php echo $this->recaptcha->getWidget('cancelar_contrato'); ?>