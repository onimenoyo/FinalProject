<?php
  namespace Services;

  class Validation
  {
    public function validateText($text, $min = 3 , $max = 50) {
          $errors = '';
          $title = trim(strip_tags($text));
          // on verifie si le $text correcpond a nos attentes
          if (!empty($title)) {
              if (strlen($title) < $min) {
                  $errors = 'votre champ doit faire au moins '.$min.' caractères';
              } elseif (strlen($title) > $max) {
                  $errors = 'votre champ doit faire au maximum '.$max.' caractères';
              }
          } else {
              $errors = 'veuillez remplir ce champ';
          }
          if (!empty($errors)) {
              return $errors;
          }
          return false;
      }
  public function validateNumber($number, $min, $max) {
      if(isset($number)) {
        $errors = '';
        $title = trim(strip_tags($number));
          if(!is_numeric($title)) {
          $errors = 'Votre champ doit etre un nombre';
        }
          if($title < $min) {
          $errors = 'votre champ doit faire au moins '.$min;
          }
          if($title > $max) {
          $errors = 'votre champ doit faire au maximum '.$max;
          }
      }
      else {
        if ($title =! 0) {
          $errors = 'Veuillez renseigner votre champ.';
        }

      }
      if (!empty($errors)) {
        return $errors;
      }
      return false;
    }
      public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    // verification si une requete est AJAX
        public function isAjax(){
          if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            return true;
          };
          return false;
        }
      }


 ?>
