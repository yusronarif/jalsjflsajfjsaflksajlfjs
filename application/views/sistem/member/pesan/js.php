<script>
    $(document).ready(function (){
        $('body').on('click', '.btn-beli', function(){
            $data = $.parseJSON($('#data-'+$(this).attr('data-cart')).val());

            $('#cartId').val($(this).attr('data-cart'));
            $('#cartMenu').html(': '+$data.menu);
            $('#cartHarga').html(': Rp. '+$data.harga);
            $('#cartKantin').html(': '+$data.kantin);
        });

        $('body').on('click', '#cartConfirm', function(){
            if($('#cartId').val()) {
                $.ajax({
                    'type': 'post',
                    'url': '<?php echo site_url('member/pesan/cart');?>',
                    'data': $('#modalCart input, #modalCart select').serialize(),
                    'cache': false,
                    'dataType': 'html',
                    'success': function(_rs){
                        document.location.href = '<?php echo site_url('member/pesan');?>?'+_rs;
                    },
                    'error': function(){ alert('error'); }
                });
            }
            else alert('unknown menus');
        });
    });
</script>
