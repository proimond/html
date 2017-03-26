<?php

namespace Proimond\Html\Traits;

use Proimond\Html\HtmlBuilder;

trait FormTraits
{

    /**
     * @param array $options
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected function getLabelHtmlString( array $options )
    {
        return $this->toHtmlString( $this->getLabelHtml( $options ) );
    }

    /**
     * @param array $options
     *
     * @return string
     */
    protected function getLabelHtml( array $options )
    {

        $id   = isset( $options[ 'id' ] ) ? $options[ 'id' ] : '';
        $text = isset( $options[ 'text' ] ) ? $options[ 'text' ] : '';

        unset( $options[ "width" ] );
        unset( $options[ "text" ] );
        unset( $options[ "placeholder" ] );

        $colWidth     = "col-sm-" . $this->getWidth( $options );
        $labelOptions = [ 'class' => "{$colWidth} control-label" ];
        $labelOptions = $this->html->attributes( array_merge( $options, $labelOptions ) );

        return '<label for="' . $id . '"' . $labelOptions . '>' . $text . '</label>';

    }

    /**
     * @param array $options
     * @param bool  $inverse
     *
     * @return string
     */
    protected function getWidth( array $options, $inverse = false )
    {
        $width = isset( $options[ 'width' ] ) ? $options[ 'width' ] : 2;
        if ( $width > 12 ) {
            $width = 2;
        }
        if ( $inverse === true ) {
            $width = 12 - $width;
        }

        return $width;
    }

    /**
     * @param       $name
     * @param       $value
     * @param array $options
     *
     * @return string
     */
    protected function getInputHtml( $name, $value, array $options )
    {
        return $this->getInputHtmlString( $name, $value, $options )
                    ->toHtml();

    }

    /**
     * @param       $name
     * @param       $value
     * @param array $options
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected function getInputHtmlString( $name, $value, array $options )
    {

        unset( $options[ "width" ] );
        unset( $options[ "text" ] );
        $class        = isset( $options[ 'class' ] ) ? $options[ 'class' ] . " form-control" : "form-control";
        $inputOptions = [ "class" => $class ];

        return $this->text( $name, $value, array_merge( $options, $inputOptions ) );
    }

}