<?php $this->layout('interfaceLayout', ['title' => $lieu]); ?>
<?php $this->start('main_content'); ?>
<p>
La ville dans laquelle tu circules n’est que ruine et végétaux. Les seuls bruits que tu entends sont ceux des combats dans le lointain, parfois des morceaux de pierre s’écroulant d’immeuble.
Par endroit tu peux apercevoir des animaux errer dans les rues, fuyant devant ta présence qui semble les déranger.
Les rues sont désespérément vides, le vent portant des bouts de papier tel une scène de western.
</p>
<form action="" method="post">
  <button type="submit" id="explore" name="button">Exploration</button>
</form>
  <button type="button" id="heal" name="button">Soin</button>
  <a href="<?= $this->url('camp')?>"><button type="button" id="return" name="button">Retour au camp</button></a>

<?php $this->stop('main_content'); ?>






<?php /* $this->start('ajax'); ?>

<?php $url = $this->url('exploration', ['lieu' => $lieu]); ?>
<script type="text/javascript">

 $(document).ready(function(){

     $('#explore').on('click', function(e){
      e.preventDefault();

      location.href = "";


       });
     });

</script>
<?php */ ?>
