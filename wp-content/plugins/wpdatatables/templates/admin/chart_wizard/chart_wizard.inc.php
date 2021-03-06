<?php defined('ABSPATH') or die("Cannot access pages directly."); ?>

<?php if (isset($chartObj)) { ?>
    <script type='text/javascript'>var editing_chart_data = {
            render_data: <?php echo json_encode($chartObj->getRenderData()); ?>,
            highcharts_render_data: <?php echo json_encode($chartObj->getHighchartsRenderData()); ?>,
            chartjs_render_data: <?php echo json_encode($chartObj->getChartJSRenderData()); ?>,
            engine: "<?php echo $chartObj->getEngine();?>",
            type: "<?php echo $chartObj->getType(); ?>",
            selected_columns: <?php echo json_encode($chartObj->getSelectedColumns()) ?>,
            range_type: "<?php echo $chartObj->getRangeType() ?>"<?php if( $chartObj->getRangeType() == 'picked_range' ){ ?>,
            row_range: <?php echo json_encode($chartObj->getRowRange()); } ?>,
            title: "<?php echo $chartObj->getTitle(); ?>",
            follow_filtering: <?php echo (int)$chartObj->getFollowFiltering(); ?>,
            wpdatatable_id: <?php echo $chartObj->getwpDataTableId(); ?>  };</script>
<?php } ?>

<div class="wrap wdt-datatables-admin-wrap">

    <!-- .container -->
    <div class="container">

        <!-- .row -->
        <div class="row">

            <div class="card wdt-chart-wizard">

                <!-- Preloader -->
                <?php include WDT_TEMPLATE_PATH . 'admin/common/preloader.inc.php'; ?>
                <!-- /Preloader -->

                <div class="card-header wdt-admin-card-header ch-alt">
                    <img id="wpdt-inline-logo" style="width: 60px;height: 50px;"
                         src="<?php echo WDT_ROOT_URL; ?>assets/img/logo-large.png"/>
                    <h2>
                        <span><?php _e('Create a Chart', 'wpdatatables'); ?></span>
                        <small><?php _e('Chart Creation Wizard', 'wpdatatables'); ?></small>
                    </h2>
                    <ul class="actions p-t-5">
                        <li>
                            <button class="btn bgm-red btn-icon btn-lg waves-effect waves-circle waves-float wdt-backend-close"
                                    title="" data-toggle="tooltip" data-original-title="Cancel">
                                <i class="zmdi zmdi-close"></i>
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body card-padding">
                    <?php wp_nonce_field('wdtChartWizardNonce', 'wdtNonce'); ?>
                    <input type="hidden" id="wp-data-chart-id" value="<?php echo $chartId ?>"/>
                    <input type="hidden" id="wdt-browse-charts-url"
                           value="<?php echo admin_url('admin.php?page=wpdatatables-charts'); ?>"/>

                    <ol class="breadcrumb chart-wizard-breadcrumb">
                        <li class="chart_wizard_breadcrumbs_block  step1 active"
                            id="step1"><?php _e('Chart title & type', 'wpdatatables'); ?></li>
                        <li class="chart_wizard_breadcrumbs_block  step2"
                            id="step2"><?php _e('Data source', 'wpdatatables'); ?></li>
                        <li class="chart_wizard_breadcrumbs_block  step3"
                            id="step3"><?php _e('Data range', 'wpdatatables'); ?></li>
                        <li class="chart_wizard_breadcrumbs_block  step4"
                            id="step4"><?php _e('Formatting and preview', 'wpdatatables'); ?></li>
                        <li class="chart_wizard_breadcrumbs_block  step5"
                            id="step5"><?php _e('Save and get shortcode', 'wpdatatables'); ?></li>
                    </ol>

                    <div class="steps m-t-20">

                        <div class="chart-wizard-step step1" data-step="step1">

                            <?php include WDT_TEMPLATE_PATH . 'admin/chart_wizard/steps/step1.inc.php'; ?>

                        </div>

                        <?php  ?>

                    </div>

                    <div class="row m-t-15 m-b-5 p-l-15 p-r-15">
                        <button class="btn btn-success btn-icon-text waves-effect pull-right m-l-5"
                                style="display:none;" id="finishButton"><i
                                    class="zmdi zmdi-check"></i> <?php _e('Finish', 'wpdatatables'); ?></button>
                        <button class="btn btn-primary btn-icon-text waves-effect pull-right m-l-5"
                                disabled="disabled"
                                id="wdt-chart-wizard-next-step"><?php _e('Next ', 'wpdatatables'); ?></button>
                        <button class="btn btn-primary btn-icon-text waves-effect pull-right" disabled="disabled"
                                id="wdt-chart-wizard-previous-step"><?php _e(' Previous', 'wpdatatables'); ?></button>
                        <a class="btn btn-default btn-icon-text waves-effect wdt-documentation"
                           data-doc-page="chart_wizard">
                            <i class="zmdi zmdi-help-outline"></i> Documentation
                        </a></div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <?php  ?>

</div>

<?php  ?>
