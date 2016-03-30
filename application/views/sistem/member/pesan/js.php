<script>
    $(document).ready(function (){
        send_cart = function (_id){
            if($('input[type="radio"].ambil'+_id).is(':checked'))
                document.location.href = '<?php echo site_url('member/pesan/cart');?>/'+_id+'::'+$('input[type="radio"].ambil'+_id+':checked').val();
            else alert('Pengambilan pesanan belum dipilih');
        }
    });
</script>