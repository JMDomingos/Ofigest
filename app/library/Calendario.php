<?php
/**
 * Created by PhpStorm.
 * User: José M. Domingos
 * Date: 15-04-2016
 * Time: 12:01
 *
 * Modded from
 * @author  Xu Ding
 * @email   thedilab@gmail.com
 * @website http://www.StarTutorial.com
 **/

use Phalcon\Mvc\User\Component;

class Calendario extends Component {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }

    /********************* PROPERTY ********************/
    private $dayLabels = array("Seg","Ter","Qua","Qui","Sex","Sab","Dom");
    private $currentYear=0;
    private $currentMonth=0;
    private $currentDay=0;
    private $currentDate=null;
    private $daysInMonth=0;
    private $naviHref= null;
    private $marcacoes = array();

    /********************* PUBLIC **********************/

    /**
     * print out the calendar
     */
    public function show($marcacoes) {
        $this->marcacoes = $marcacoes;
        $year  == null;
        $month == null;

        if(null==$year&&isset($_GET['year'])){
            $year = $_GET['year'];
        }else if(null==$year){
            $year = date("Y",time());
        }

        if(null==$month&&isset($_GET['month'])){
            $month = $_GET['month'];
        }else if(null==$month){
            $month = date("m",time());
        }

        $this->currentYear=$year;
        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="calendar">'.
            '<div class="box">'.
            $this->_createNavi().
            '</div>'.
            '<div class="box-content">'.
            '<ul class="label">'.$this->_createLabels().'</ul>';
        $content.='<div class="clear"></div>';
        $content.='<ul class="dates">';

        $weeksInMonth = $this->_weeksInMonth($month,$year);
        // Create weeks in a month
        for( $i=0; $i<$weeksInMonth; $i++ ){
            //Create days in a week
            for($j=1;$j<=7;$j++){
                $content.=$this->_showDay($i*7+$j);
            }
        }

        $content.='</ul>';
        $content.='<div class="clear"></div>';
        $content.='</div>';
        $content.='</div>';
        return $content;
    }

    /********************* PRIVATE **********************/
    /**
     * create the li element for ul
     */
    private function _showDay($cellNumber){
        if($this->currentDay==0){
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                $this->currentDay=1;
            }
        }
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
            $cellContent = $this->currentDay;

            $thisDayHas = array_filter($this->marcacoes, function($line) {
                if($line['data']==$this->currentDate) return true;
            });

            if(count($thisDayHas)>0) {
                foreach($thisDayHas as $marcacao) {
                    $cliente = Clientes::findFirst($marcacao['id_cliente']);
                    $viatura = Veiculos::findFirstByMatricula($marcacao['matricula']);
                    if($marcacao['id_morada']>0) {
                        $moradas = ClientesMoradas::findFirstById($marcacao['id_morada']);
                    }

                    $cor = '#d9edf7'; //azul - por defeito
                    if($marcacao['confirmed']) $cor = '#67b168'; //verde
                    else $cor = '#efe24b'; //amarelo
                    if($marcacao['caraterUrgencia']) $cor = '#ce8483'; //vermelho

                    //BOOTSTRAP POP-OVER
                    $cellContent .= '<div style="background-color: ' . $cor. '; margin: 1px; cursor: pointer;"
                        onClick="javascript:location.href=\'/OfiGest/manutencoes_agendadas/edit/' . $marcacao['id'] . '\';"
                        data-toggle="popover" title="Detalhes da marcação" data-html="true"
                        data-content="<table>
                        <tr><th>Data/Hora:</th><td>' . $marcacao['data'] . ' ' . $marcacao['hora'] . '</td></tr>
                        <tr><th>Viatura:</th><td>' . $marcacao['matricula'] . '<BR>' .
                            $viatura->Modelos->Marcas->getMarca() . ' ' . $viatura->Modelos->getModelo() . '</td></tr>
                        <tr><th>Cliente:</th><td>' . $cliente->getNome() . '</td></tr>
                        <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
                        <tr><th>Mensagem:</th><td>' . $marcacao['mensagem'] . '</td></tr>
                        <tr><th>Aguarda orçamento:</th><td>' . ($marcacao['aguarda_orcamento']?'Sim':'Não') . '<br><br></td></tr>
                        <tr><th>Deslocação:</th><td>';
                            if($marcacao['id_morada']==0)
                                $cellContent .= 'Não';
                            else {
                                if(count($moradas)>0) {
                                    $cellContent .= $moradas->morada_rua . '<br>';
                                    $cellContent .= $moradas->morada_cp_localidade;
                                } else $cellContent .= "Morada indisponível!";
                            }
                        $cellContent .= '</td></tr>
                        <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
                        <tr><th>Contatos:</th><td>' . $cliente->getTelefone() . ' / ' . $cliente->getTelemovel() . '</td></tr>
                        <tr><th>Email:</th><td>' . $cliente->getEmail() . '</td></tr>
                        <tr><th>Marcado p/ cliente:</th><td>' . $marcacao['doneByCliLogin'] . '</td></tr>
                        <tr><th>Confirmado:</th><td>' . $marcacao['confirmed'] . '</td></tr>
                        <tr><th>Urgente:</th><td>' . $marcacao['caraterUrgencia'] . '</td></tr>
                        </table>' . '" data-trigger="hover" ><strong>';

                    if(!$marcacao['confirmed'])
                        $cellContent .= '<span class="blink_me">';
                    $cellContent .= substr($marcacao['hora'],0,5).'/'.$marcacao['matricula'];
                    if(!$marcacao['confirmed'])
                        $cellContent .= '</span>';
                    $cellContent .= '</strong></div>';
                }
            }

            $this->currentDay++;
        }else{
            $this->currentDate =null;
            $cellContent=null;
        }

        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
        ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }

    /**
     * create navigation
     */
    private function _createNavi(){
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
        return
            '<div class="header">'. //$this->naviHref.
            '<a class="prev" href="'.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'"> << </a>'.
            '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
            '<a class="next" href="'.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'"> >> </a>'.
            '</div>';
    }

    /**
     * create calendar week labels
     */
    private function _createLabels(){
        $content='';
        foreach($this->dayLabels as $index=>$label){
            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
        }
        return $content;
    }

    /**
     * calculate number of weeks in a particular month
     */
    private function _weeksInMonth($month=null,$year=null){
        if( null==($year) )
            $year =  date("Y",time());
        if(null==($month))
            $month = date("m",time());
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
        if($monthEndingDay<$monthStartDay)
            $numOfweeks++;
        return $numOfweeks;
    }

    /**
     * calculate number of days in a particular month
     */
    private function _daysInMonth($month=null,$year=null){
        if(null==($year))
            $year =  date("Y",time());
        if(null==($month))
            $month = date("m",time());
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
}
