<?php
    class Connection2 extends Mysqli{
        function __construct()
        {
            parent:: __construct('210.17.1.36:3317', 'Aramirez', 'Uh)9Q*cs', 'vivewow');
            $this->set_charset('utf8');
            $this->connect_error ==NULL ? 'Conexión exítosa a la BD' : die('Error al conectarse a la BD');

        }//end __construct
    }//end class Connection