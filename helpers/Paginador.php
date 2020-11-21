<?php

class Paginator{

    private $paginas;
    private $url;

    public function __construct($paginas, $url){
        $this->paginas = $paginas;
        $this->url = $url;
    }

    public function getPaginador(){
        $html =  '
            <nav aria-label="Page navigation example" >
                <ul class="pagination justify-content-center">';
                    for($i=1; $i<=$this->paginas; $i++) {
                        $html .= '
                        <li class="page-item">
                            <a class="page-link" href="'.$this->url.'&pagina='.$i.'">'.$i.'</a>
                        </li>';
                    }
        $html .= '
                </ul>
            </nav>';

        return $html;
    }

}