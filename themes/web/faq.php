<?php
   $this->layout("_theme");
?>

<?php
   if(!empty($faqs)){
       //var_dump($faqs);
       foreach ($faqs as $faq){
           //var_dump($faq);
           echo "<div>{$faq->question} - {$faq->answer}</div>";
       }
   }
?>
