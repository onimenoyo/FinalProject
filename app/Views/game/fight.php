<?php $this->layout('layout', ['title' => 'Combat!']) ?>
<?php $this->start('main_content'); ?>

  <button type="button" class="attack" name="button">Attaque </button>
  <button type="button" class="magie" name="button">Magie  </button>
  <button type="button" class="heal" name="button">Se soigner </button>
  <button type="button" class="run" name="button">Fuite ! </button>

<div class="info">

</div>


<?php $this->stop('main_content'); ?>

<?php $this->start('ajax'); ?>

<?php
$url='';

/* $url = $this->url('', ['cible' => $fight['cible'], 'deg' => $fight['deg']  ]); */?>

<script type="text/javascript">

  $(document).ready(function(){

    $(.attack).on('click', function(e){
      e.preventDefault();
      $.ajax({
        url : <?php echo $url ?>,
        type : 'GET',
        // en cas de succés :
        success : function (data){
          data.result;
          $('.info').html(result);


        },
        // si erreur :
        error : function(err){
          console.log (err);
        }
      })
    })

</script>

<?php $this->stop('ajax') ?>
