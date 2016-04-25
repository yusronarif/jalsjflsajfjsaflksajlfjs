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

        $('.ptotal').each(function (i, el)
        {
            var _subtotal = 0;
            var _spans = 0;

            $('.subtotal-'+$(el).attr('data-id')).each(function(x, subs)
            {
                _subtotal = _subtotal + Number($(subs).val());
                _spans = _spans + 1;
            });

            $(el).html(_subtotal);
            $('.need-spans').attr('rowspan', _spans);
            //$('table.table').css('display', 'block');
        })
    });
</script>
<?php
}
?>
