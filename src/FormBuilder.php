<?php

namespace Proimond\Html;

use Collective\Html\FormBuilder as FormBuilderCollective;
use Proimond\Html\Traits\FormTraits;

class FormBuilder extends FormBuilderCollective
{

    use FormTraits;

    /**
     * @param array $options
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function openHorizontal( array $options = [] )
    {

        $class = 'form-horizontal';
        if ( isset( $options[ 'class' ] ) ) {
            $options[ 'class' ] .= " {$class}";
        } else {
            $options[ 'class' ] = $class;
        }

        return $this->open( $options );

    }

    public function horizontalTextInput( $name, $value = '', array $options = [] )
    {

        $label = $this->getLabelHtml( $options );
        $input = $this->getInputHtml( $name, $value, $options );

        $colWidth = "col-sm-" . $this->getWidth( $options, true );

        return $this->toHtmlString( "<div class='form-group'>{$label}<div class='{$colWidth}'>{$input}</div></div>" );


    }

}