<?php
 use Nette\Environment, Nette\Security\AuthenticationException, Nette\Forms\FormContainer, Nette\Forms\Form;
 

final class EventlistPresenter extends BasePresenter
{
    public function actionShow($week, $year)
    {
        if(is_null($week))
            $week = date("W");
        if(is_null($year))
            $year = date("Y");

        list($from,$to) = Tools::weekRange($year, $week);

        
        $this->template->weekdays = Tools::getAllDaysofWeek($year, $week);
        $this->template->events = Event::findAll()->
                where("DATE_FORMAT(event_date,'%Y-%m-%d') BETWEEN %d AND %d",$from,$to);
    }

    public function actionAdd()
    {

    }

    public function renderAdd()
    {
        $this->setLayout(false);
    }

    public function createComponentEventForm($name)
    {
        FormContainer::extensionMethod("addJsonDependentSelectBox", "DependentSelectBox\JsonDependentSelectBox::formAddJsonDependentSelectBox");

        $form = new \Nette\Application\AppForm($this, $name);
        $form->addText('datum_cas', 'Datum a čas:')
             ->addRule(Form::FILLED, 'Zadejte prosím datum a čas.')
             ->getControlPrototype()->class("datetime");
        $form->addTextArea('text','Událost:', 40, 2)
             ->addRule(\Nette\Forms\Form::FILLED, 'Musíte vyplnit text!');
        $form->addSelect('obor', 'Obory:',Auth_users::findAllSpec($this->getUser()->id));
        $form->addJsonDependentSelectBox('rok', 'Ročník', $form['obor'], callback('Specialization::countYear'));
        $form->addSelect('semestr', 'Semestr:',array("ZS"=>"ZS","LS"=>"LS"));
        $form->addJsonDependentSelectBox('predmet', 'Předmět', array($form['semestr'],$form['obor'],$form['rok']), callback('Specialization::findAllSubject'));
        $form->addSelect('soukromy', 'Soukromý:',array("Veřejné"=>"Veřejné","Student"=>"Student","Učitel"=>"Učitel"));
        if($this->isAjax())
            $form["predmet"]->addOnSubmitCallback(array($this, "invalidateControl"), "eventForm");
        
         //$form->addSelect('predmet', 'Predmet:', Auth_users::findAllSubject($this->getUser()));
        $form->addSubmit('save', 'Uložit');
        $form->addSubmit('back', 'Zpět')->setValidationScope(NULL);
        $form->onSubmit[] = callback($this,'processEventForm');
        return $form;
    }

    public function processEventForm(\Nette\Application\AppForm $form)
    {
        if($form['save']->isSubmittedBy()){
             $values = $form->getValues();

            $event = new Event;
            $event = Event::create(array(
                "text" => $values['text'],
                "event_date" => $values['datum_cas'],
                "event_edit" => $values['datum_cas'],
                "event_auth" => $values['soukromy'],
                "sub_id" => $values['predmet'],
                "user_id" => $this->getUser()->id,
            ));
            $event->save();
             echo '<script type="text/javascript">parent.location.href="'.$this->link("Eventlist:show").'"</script>';
            $this->terminate();
        }
       
    }


}