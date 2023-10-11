<?php

namespace App\Cells;

class ButtonsCell
{
    public function destroy(array $params): string
    {

        $formAttributes = [
            'class'     => 'd-inline',
            'onsubmit'  => 'return confirm("Tem certeza da exclusão?");',
        ];

        $form = form_open($params['route'], attributes: $formAttributes, hidden: ['_method' => 'DELETE']);

        $form .= form_button([
            'class'     => $params['btn_class'] ?? ' btn btn-sm btn-danger',
            'type'      => 'submit',
            'content'   => 'Destruir'
        ]);

        $form .= form_close();

        return $form;
    }
}
