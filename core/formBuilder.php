<?php

class FormBuilder{
    private $formElements = [];
    private $method;
    private $action;


    public function __construct($action, $method = 'POST'){
        $this->method = strtoupper($method);
        $this->action = $action;
    }

    public function addInput($type, $name, $label = '', $attributes = []) {
        $input = [
            'type' => $type,
            'name' => $name,
            'label' => $label,
            'attributes' => $attributes
        ];
        $this->formElements[] = $input;
        return $this;
    }

    public function addTextarea($name, $label = '', $attributes = []) {
        $textarea = [
            'type' => 'textarea',
            'name' => $name,
            'label' => $label,
            'attributes' => $attributes
        ];
        $this->formElements[] = $textarea;
        return $this;
    }

    public function addButton($type, $text, $attributes = []) {
        $button = [
            'type' => $type,
            'text' => $text,
            'attributes' => $attributes
        ];
        $this->formElements[] = $button;
        return $this;
    }
    

    public function render(){
        $form = "<form action=\"{$this->action}\" method=\"{$this->method}\">\n";

        foreach($this->formElements as $element){
            if(isset($element['label']) && $element['label']){
                $form .= "<label for=\"{$element['name']}\">{$element['label']}</label>\n";
            }

            $attributesString = $this->renderAttributes($element['attributes']);

            switch ($element['type']) {
                case 'textarea':
                    $form .= "<textarea name=\"{$element['name']}\" id=\"{$element['name']}\" {$attributesString}></textarea>\n";
                    break;
                case 'submit':
                case 'button':
                    $form .= "<button type=\"{$element['type']}\" {$attributesString}>{$element['text']}</button>\n";
                    break;
                default:
                    $form .= "<input type=\"{$element['type']}\" name=\"{$element['name']}\" id=\"{$element['name']}\" {$attributesString}/>\n";
                    break;
            }
            
        }
        $form .= "</form>\n";
        return $form;
    }

    private function renderAttributes($attributes) {
        $attributesString = '';
        foreach ($attributes as $key => $value) {
            $attributesString .= " {$key}=\"{$value}\"";
        }
        return $attributesString;
    }

}

?>