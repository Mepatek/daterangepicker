<?php

namespace Mepatek\DateRangePicker;

use Nette;
use Nette\Utils\Html;

/**
 * DateRangePicker
 */
class DateRangePicker extends Nette\Application\UI\Control
{
    /** @var string **/
    protected $id;
    
    /** @var Nette\Utils\Html  control element template */
    protected $control;
    
    public function __construct()
    {
        parent::__construct();
        $this->control = Html::el('div')
                            ->insert(0, '<i class="icon-calendar"></i>')
                            ->insert(1, '&nbsp;')
                            ->insert(2, '<span class="visible-lg-inline-block">&nbsp;</span>')
                            ->insert(3, '&nbsp;')
                            ->insert(4, '<i class="fa fa-angle-down"></i>');
    }
    
    /**
    * @return Nette\Utils\Html
    */
    public function getPrototype()
    {
        return $this->control;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * @param string $class
     * @return \Nette\Templating\FileTemplate
     * @internal
     */
    public function createTemplate($class = NULL)
    {
        $template = parent::createTemplate($class);
        $template->setFile(__DIR__ . '/DateRangePicker.latte');
        //$template->registerHelper('translate', callback($this->getTranslator(), 'translate'));

        return $template;
    }


    /**
     * @internal
     */
    public function render()
    {
        // vložíme do šablony nějaké parametry
        $this->control->id = $this->id;
        $this->template->control = $this->control;
        // a vykreslíme ji
        $this->template->render();
    }
}
