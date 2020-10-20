<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;

   class EmailsController extends AppController{

      public function index(){
         $email = new Email('default');
         $email->to('antoine.laboissiere@gmail.com')->subject('Test')->send('Je fais un test');
      }
   }
?>