        <div class="block">
            <div align="center">
                <img alt="" src="<?php echo base_url('uploads/images/comodo_secure.png'); ?>">
            </div>
        </div>
        <!-- Footer -->
        <div class="footer clearfix">
            <div class="pull-left">&copy; <?php echo date("Y"); ?>.
                <a href="<?php echo site_url(); ?>" target="_blank"><?php echo $site_name; ?></a> support by
                <a href="https://goodsyst.com" target="_blank">GoodSyst</a>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<script type="text/javascript" src="<?php echo base_url('assets/back/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/jquery-ui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/charts/sparkline.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/uniform.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/inputmask.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/autosize.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/inputlimit.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/listbox.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/multiselect.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/tags.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/switch.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/uploader/plupload.full.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/uploader/plupload.queue.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/wysihtml5/wysihtml5.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/forms/wysihtml5/toolbar.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/daterangepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/fancybox.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/moment.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/jgrowl.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/datatables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/tabletools.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/colorpicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/fullcalendar.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/plugins/interface/timepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/better-dom/dist/better-dom.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/better-i18n-plugin/dist/better-i18n-plugin.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/better-time-element/dist/better-time-element.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/better-emmet-plugin/dist/better-emmet-plugin.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/better-dateinput-polyfill/dist/better-dateinput-polyfill.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/back/js/application.js'); ?>"></script>
<?php if($javascript) $this->load->view($javascript);?>

</body>
</html>
