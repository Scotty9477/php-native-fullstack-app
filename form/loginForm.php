<?php
require_once BASE_PATH. '/core/formBuilder.php';
class loginForm {

    public function buildForm() {
        $form = new FormBuilder('/training/login');
        $form->addInput('text', 'username', 'Username', ['required' => true])
            ->addInput('password', 'password', 'Password', ['id'=> 'password', 'required' => true])
            ->addButton('submit', 'Login');

        return $form;
    }

    public function render() {
       echo $this->buildForm()->render();
    }

}
?>