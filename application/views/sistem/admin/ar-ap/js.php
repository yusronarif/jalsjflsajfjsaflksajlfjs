<?php
$pfile = explode('ar-ap/', $subview)[1];
if ($pfile == 'piutang-raw') {
?>
<script>
    $(document).ready(function () {
        arCreate = function($id){
            $f = $('<form method="post" action="<?php echo site_url('admin/ar-ap/piutang/create')?>">');
            $f.append($('<input type="hidden" name="<?php echo $this->security->get_csrf_token_name()?>">').val('<?php echo $this->security->get_csrf_hash()?>'));
            $f.append($('<input type="hidden" name="xid">').val($id));
            $f.submit();
        }
    });
</script>
<?php
}
?>
