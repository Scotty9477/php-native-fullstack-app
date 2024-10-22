<?php
require_once BASE_PATH. '/core/formBuilder.php';

class registerForm {

    public function buildForm() {
        $form = new FormBuilder('/training/register');
        $form->addInput('text', 'username', 'Username', ['id'=>'email','required' => true])
            ->addInput('email', 'email', 'Email', ['id'=>'email','required' => true])
            ->addInput('password', 'password', 'Password', ['id'=> 'password', 'required' => true])
            ->addInput('checkbox', 'is_admin', 'Admin', ['id'=>'is_admin', 'value' => 1])
            ->addButton('submit', 'Register');

        return $form;
    }

    public function render() {
       echo $this->buildForm()->render();
    }

}

?>