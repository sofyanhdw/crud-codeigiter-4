<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<form action="<?= site_url('/produk/adding') ?>" method="POST">
<input type="hidden" class="withcsrf" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

    <!-- Nama produk form -->
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Nama Produk :</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icon-left">
                    <input class="input" type="text" placeholder="Nama Produk">
                </div>
            </div>
        </div>
    </div>

    <!-- kategori produk -->
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">kategori :</label>
        </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth ">
                        <select class="txt_csrfname" name="id_kategori" id="id_kategori">
                            <option value="">---PILIH---</option>
                            <?php foreach ($tm_kategori as $row) { ?>
                            <option value="<?= $row['id_kategori'] ?>">
                            <?= ucfirst($row['nama_kategori']) ?>
                            <?php } ?>
                            </option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Sub Kategori produk 1-->
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Sub kategori 1 :</label>
        </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                        <select name="id_subkategori1" id="id_subkategori1">
                            <option value="">---PILIH---</option>
                        </select>
                        </div>                        
                    </div>
                </div>
            </div>
    </div>

     <!-- Sub Kategori produk 2 -->
     <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Sub kategori 2 :</label>
        </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                        <select name="id_subkategori2" id="id_subkategori2">
                            <option value="">---PILIH---</option>
                        </select>
                        </div>                        
                    </div>
                </div>
            </div>
    </div>
</form>

<script>
   $(document).ready(function(){

    $('#id_kategori').change(function(){

    // CSRF Hash
    var csrfName = $('.withcsrf').attr('name'); // CSRF Token name
    var csrfHash = $('.withcsrf').val(); // CSRF hash
    
    var subkategori1_id_kategori = $('#id_kategori').val();

    var action = 'get_sub1';

    if(subkategori1_id_kategori != '')
    {
        $.ajax({
            url:"<?= base_url('produk/DynamicSub'); ?>",
            method:"POST",
            data:{[csrfName]: csrfHash, subkategori1_id_kategori:subkategori1_id_kategori, DynamicSub:action},
            dataType:"JSON",
            success:function(data)
            {
                // Update CSRF hash
                $('.withcsrf').val(data.token);
                var html = '<option value="">---PILIH---</option>';

                for(var count = 0; count < data.length; count++)
                {
                    
                    html += '<option value="'+data[count].id_subkategori1+'">'+data[count].nama_subkategori1+'</option>';

                }
                 
                $('#id_subkategori1').html(html);
            }
        });
    }
    else
    {

        $('#id_subkategori1').val('');
    }
    $('#id_subkategori2').val('');
});

$('#id_subkategori1').change(function(){

    // CSRF Hash
    var csrfName = $('.withcsrf').attr('name'); // CSRF Token name
    var csrfHash = $('.withcsrf').val(); // CSRF hash


    var subkategori2_id_subkategori1 = $('#id_subkategori1').val();

    var action = 'get_sub2';

    if(subkategori2_id_subkategori1 != '')
    {
        $.ajax({
            url:"<?= base_url('produk/DynamicSub'); ?>",
            method:"POST",
            data:{[csrfName]: csrfHash, subkategori2_id_subkategori1:subkategori2_id_subkategori1, DynamicSub:action},
            dataType:"JSON",
            success:function(data)
            {

                // Update CSRF hash
                $('.withcsrf').val(data.token);
                var html = '<option value="">---PILIH---</option>';

                for(var count = 0; count < data.length; count++)
                {
                    html += '<option value="'+data[count].id_subkategori2+'">'+data[count].nama_subkategori2+'</option>';
                }

                $('#id_subkategori2').html(html);
            }
        });
    }
    else
    {

        $('#id_subkategori2').val('');
    }

});

});
</script>


<?= $this->endSection() ?>)